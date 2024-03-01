<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        return view('frontend.home.index');
    }



    public function manu(){

        //  $category = Category::with('product', 'product.productimage')->where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $products = Product::with('category', 'productimage')->get();
        return view('frontend.manu.index', compact('categories', 'products'));
    }
}
