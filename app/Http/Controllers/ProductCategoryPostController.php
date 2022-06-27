<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryPostController extends Controller
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
        return view('product_categories.create');
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
            'product_category_name' => 'required|max:255',
            'product_category_description' => 'required',
        ]);

        ProductCategory::create($validator);

        return redirect()->route('product_categories.index')->with('success', 'Kategori Produk telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory, $id)
    {
        $product_category = ProductCategory::find($id);

        return view('product_categories.show', compact('product_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory, $id)
    {
        $product_category = ProductCategory::find($id);

        return view('product_categories.edit', compact('product_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory, $id)
    {
        $validator = $request->validate([
            'product_category_name' => 'required|max:255',
            'product_category_description' => 'required',
        ]);

        $product_category = ProductCategory::find($id);
        $product_category->update($validator);

        return redirect()->route('product_categories.index')->with('success', 'Kategori Produk telah diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory, $id)
    {
        $product_category = ProductCategory::find($id);

        $product_category->delete();

        return redirect()->route('product_categories.index')->with('success', 'Kategori Produk telah dihapus.');
    }
}
