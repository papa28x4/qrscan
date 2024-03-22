<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);


        // return $products;

        return view('backend.products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::where('slug', '!=', 'all')->get();
        return view('backend.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        // return $request->all();
        $input = $request->validate([
            'name' => 'required|min:2',
            'code' => 'required|min:2',
            'description' => 'nullable',
            'category' => 'required|numeric',
            'cost' => 'required|numeric',
            'brand' => 'required|numeric',
            'images' => 'required',
            'images.*' =>'mimes:jpeg,png,jpg,gif|max:4096',
            'processor' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'os' => 'required',
            'screen' => 'required',
            'wireless' => 'required'
        ]);
        

        // return $input;

        // return $input;
        DB::beginTransaction();
        try{

            $basic_details = [
                'processor' =>  $input['processor'], 
                'memory' => $input['memory'], 
                'storage' => $input['storage'],
                'os' => $input['os'], 
                'screen' => $input['screen'], 
                'wireless' => $input['wireless'],
            ];    
            
            // unset($input['category']);
            $product = new Product(array_merge($input, [
                'user_id' => auth()->id(),
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'basic_details' => $basic_details
            ]));

            $product->save();
         
            if($request->hasFile('images')){
                $count = 1;
                $files = $request->file('images');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $uniqueFilename = time() .'-'. $filename;
                    $image = Storage::putFileAs('products', $file, $uniqueFilename);
                    $images[] = [
                        'id' => $count, 
                        'src' => $image
                    ];
                    $count++;
                }         
            }else{
                // logger('request does not have images');
                $images = []; //dummy image
            }
            $data = [
                'images' => $images
            ];

            $productImage = new ProductImage($data);
           
            $product->images()->save($productImage);
            
            DB::commit();
            return redirect()->route('products.index')->with('product-created', "Product created successfully");
        }catch(\Throwable $err){
            DB::rollBack();

            return redirect()->route('products.create')->with('product-creation-failed', "Product creation failed. {$err->getMessage()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return $product->images;
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $brands = Brand::all();

        $categories = Category::where('slug', '!=', 'all')->get();

        return view('backend.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $update = $request->validate([
            'name' => 'required|min:2',
            'code' => 'required|min:2',
            'description' => 'nullable',
            'category' => 'required|numeric',
            'cost' => 'required|numeric',
            'brand' => 'required|numeric',
            'images' => 'sometimes',
            'images.*' =>'mimes:jpeg,png,jpg,gif|max:4096',
            'processor' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'os' => 'required',
            'screen' => 'required',
            'wireless' => 'required'
        ]);

        // return $update;

        $old = $product->images()->first() ? $product->images()->first()->images : [];
        $dbImagesCount = count($old);
        $oldImages = $request->old_images ? $request->old_images : [];
        $updatedDBImagesCount = count($oldImages);

        $old = collect($old);

        $filter = $old->filter(function ($value) use ($oldImages){
            return in_array($value['id'], $oldImages);
        });
        $filter = array_values($filter->toArray());

        DB::beginTransaction();
        try{
          
            $basic_details = [
                'processor' =>  $update['processor'], 
                'memory' => $update['memory'], 
                'storage' => $update['storage'],
                'os' => $update['os'], 
                'screen' => $update['screen'], 
                'wireless' => $update['wireless'],
            ];    
            

            $update = array_merge($update, [
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'basic_details' => $basic_details
            ]);

            // return $update;
            $product->slug = null;

            $product->update($update);
         
            if($request->hasFile('images')){
                logger('came to the IF BLOCK because it has images');
                $count = $updatedDBImagesCount + 1;
                $files = $request->file('images');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $uniqueFilename = time() .'-'. $filename;
                    $image = Storage::putFileAs('products', $file, $uniqueFilename);
                    $images[] = [
                        'id' => $count, 
                        'src' => $image
                    ];
                    $count++;
                }  
               
                // return $images;
                $images = array_merge($filter, $images);  
       
                $data = [
                    'images' => $images
                ];
                
                if($product->images()->first()){
                    $product->images()->update($data);
                    logger('came to the IF BLOCK images were updated');
                }else{
                    $productImage = new ProductImage($data);
                    $product->images()->save($productImage);
                    logger('came to the ELSE BLOCK because no initial images. Images were added');
                }
                
            }elseif($dbImagesCount !== $updatedDBImagesCount){
                $data = [
                    'images' => $filter
                ];
                $product->images()->update($data);
                logger('came to the ELSEIF BLOCK because no new images were added rather one or more Images were removed');
            }
            
            DB::commit();
            return redirect()->route('products.show', $product->slug)->with('product-updated', "Product updated successfully");
        }catch(\Throwable $err){
            DB::rollBack();
            // dd($err);
            return redirect()->route('products.edit', $product->slug)->with('product-update-failed', "Product update failed. {$err->getMessage()}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        if($product->delete()){
        $products = Product::latest()
                    ->paginate(10, ['*'], 'page', $request->page);
            $products->setPath(route('products.index'));
            return view('backend.partials.tables.products', compact('products'));
        }
    }

    public function basicDetails(Request $request, $category)
    {
        return view('backend.partials.product-basic-details', ['cat' => $category]);
    }


    public function test()
    {
        return view('test');
    }
}
