<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [];

        $data['category'] = Category::where('status',1)->latest()->get();

        $data['products'] = Product::where('status',1)->latest()->get();

        $data['lts_products'] = Product::where('status',1)->latest()->limit(3)->get();

        return view('frontend.index',$data);
    }
}
