<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
class ProductCategoryController extends Controller
{
    public function index(){
        $product_categories = ProductCategory::productCategory(request(['cari']))->paginate(10);

        return view('product_categories.index', compact('product_categories'));
    }
}
