<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Category;

class CartController extends Controller
{

    public function cartPage()
    {
        $data = [];

        $data['category'] = Category::where('status',1)->latest()->get();

        $data['carts'] = Cart::where('user_ip',request()->ip())->latest()->get();

        return view('frontend.cart_page',$data);
    }



    public function addToCart(Request $req, $id)
    {

        $check = Cart::where('product_id',$id)->where('user_ip',request()->ip())->first();

        if($check == true)
        {
            Cart::where('product_id',$id)->where('user_ip',request()->ip())->increment('product_qty');

            $value = "Product Added on Cart";

            Session::flash("alert-success",$value);

            return redirect()->back();
        }else{

            Cart::insert([
                'product_id' =>$id,
                'product_qty' => 1,
                'product_price' => $req->price,
                'user_ip' => request()->ip()
            ]);

            return redirect()->back();
        }


    }
}
