<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::all();
        return view('products.create', [
            'product_categories' => $product_categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'product_name' => 'required|max:255|unique:products',
            'product_slug' => 'required|max:255',
            'product_description' => 'required|min:10',
            'product_category_id' => 'required',
            'product_image' => 'required|image|file|mimes:jpeg,png,jpg|max:2048',
            'product_price' => 'required|gt:0',
            'product_discount_price' => 'required',
        ]);

        if($request->file('product_image')){
            $validator['product_image'] = $request->file('product_image')->store('product_images');
        }

        $product = Product::create($validator);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        
        return view('products.show', [
            'product' => $product,
            'product_categories' => ProductCategory::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'), [
            'product' => $product,
            'product_categories' => ProductCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::findOrFail($id);
        
        $validator = $request->validate([
            'product_name' => 'required|max:255|unique:products,product_name,' . $product->id,
            'product_slug' => 'required|max:255',
            'product_description' => 'required|min:10',
            'product_category_id' => 'required',
            'product_image' => 'image|file|mimes:jpeg,png,jpg|max:2048',
            'product_price' => 'required|gt:0',
            'product_discount_price' => 'required',
        ]);

        if($request->file('product_image')){
            if($request->product_old_image){
                Storage::delete($request->product_old_image);
            }
            $validator['product_image'] = $request->file('product_image')->store('product_images');
        }

        $product->update($validator);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);

        if($product->product_image){
            Storage::delete($product->product_image);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }

}
