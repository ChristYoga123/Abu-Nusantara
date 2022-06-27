<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::product(request(['cari']))->paginate(10);

        return view('products.index', compact('products'));
    }
}
