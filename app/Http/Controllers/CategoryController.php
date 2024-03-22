<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
// use App\Traits\ProcessImage;

//to be moved to s3
class CategoryController extends Controller
{
    // use ProcessImage;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $input = $request->validate([
                'name' => 'required|min:2|unique:categories',
                'description' => 'required',
            ]);
            
            $category = new Category($input);
    
            $category->save();
    
            return redirect()->route('categories.index')->with('message', "{$request->name} category created successfully");
        }catch(\Throwable $err){
            return redirect()->route('categories.create')->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         $update = $request->validate([
            'name' => "required|min:2|unique:categories,name,$category->id",
            'description' => 'required'
        ]);

        $category->slug = null;

        $category->update($update);

        return redirect()->route('categories.show', $category->slug)->with('message', "{$request->name} category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->route('categories.index')->with('message', "Category has been deleted successfully");
        }
    }
}
