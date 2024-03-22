<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use QrCode;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->paginate(10);

        return view('backend.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('backend.items.create', compact('users', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->validate([
            'serial_no' => 'required|string',
            'product' => 'required|numeric',
            'user' => 'required|numeric',
            'color' => 'required'
        ]);

        DB::beginTransaction();
        try{
                $url = $request->url().'/'.$input['serial_no'];
                $path = "uploads/qrcodes/{$input['serial_no']}.png";
                $fullpath = "../public/{$path}";

                QrCode::format('png')->size(300)->color(40,40,40)->generate($url, $fullpath);

                Item::create([
                    'serial_no' => $input['serial_no'],
                    'product_id' => $input['product'],
                    'user_id' => $input['user'],
                    'color' => $input['color'],
                    'qr_code' => $path
                ]);

                DB::commit();
                return redirect()->route('items.index')->with('success', "Item registered successfully");
        }catch(\Throwable $err){
            DB::rollBack();

            return redirect()->route('items.create')->with('failure', "Item registration failed. {$err->getMessage()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('backend.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $users = User::all();
        $products = Product::all();
        return view('backend.items.edit', compact('item', 'users', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $input = $request->validate([
            'serial_no' => 'required|string',
            'product' => 'required|numeric',
            'user' => 'required|numeric',
            'color' => 'required'
        ]);

        $updated = false;

        DB::beginTransaction();
        try{
                if($item->serial_no !== $input['serial_no']){
                    $oldPath =  "../public/{$item->qr_code}";
                    $url = $request->url().'/'.$input['serial_no'];
                    $path = "uploads/qrcodes/{$input['serial_no']}.png";
                    $fullpath = "../public/{$path}";
                    QrCode::format('png')->size(300)->color(40,40,40)->generate($url, $fullpath);
                    $updated = true;
                }
                else{
                    $path = $item->qr_code;
                }
              
                $item->update([
                    'serial_no' => $input['serial_no'],
                    'product_id' => $input['product'],
                    'user_id' => $input['user'],
                    'color' => $input['color'],
                    'qr_code' => $path
                ]);

                DB::commit();

                if($updated)
                {
                   unlink($oldPath);
                }
               
                return redirect()->route('items.index')->with('success', "Item registered successfully");
        }catch(\Throwable $err){
            DB::rollBack();

            return redirect()->route('items.create')->with('failure', "Item registration failed. {$err->getMessage()}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Item $item)
    {
        if($item->delete()){
            $items = Item::latest()
                        ->paginate(10, ['*'], 'page', $request->page);
                $items->setPath(route('items.index'));
                return view('backend.partials.tables.items', compact('items'));
            }
    }

    public function showOwner(Item $item)
    {
        return view('backend.items.show', compact('item'));
    }
}
