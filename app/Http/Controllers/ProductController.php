<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=> 'required',
            'description'=> 'required',
            'image' => 'required'
        ]);

        $imageName= $request->file('image')->getClientOriginalName();
        $image = $request->file('image')->move(public_path('product'), $imageName);

        $product = Product::create([
            'name'=> request('name'),
            'description'=> request('description'),
            'image'=> $imageName,
        ]);
        return redirect()->back()->with('message', 'New Product Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product ,$id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product ,$id)
    {
        request()->validate([
            'name'=> 'required',
            'description'=> 'required',
            'image' => 'nullable'
        ]);
        $product = Product::findOrFail($id);
if(isset($request->image)){
    $imageName= $request->file('image')->getClientOriginalName();
    $image = $request->file('image')->move(public_path('product'), $imageName);
    $product->image = $imageName;
}

$product->update([
    'name'=> request('name'),
    'description'=> request('description'),
 ]);




        return redirect()->back()->with('message', 'New Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product , $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
