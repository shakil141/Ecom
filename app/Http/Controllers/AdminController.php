<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Coupon;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Admin Dashboard Login

    public function index()
    {
        return view('admin.dashboard');
    }

    // Admin Dashboard Logout

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }

    // category Status Active

    public function activeCategory($category_id)
    {
        Category::where('id',$category_id)->update(['status'=>1]);

        $value = 'Category Active Successfully';

        Session::flash('alert-success',$value);

        return redirect()->route('categories.index');
    }

    // category Status InActive

    public function inActiveCategory($category_id)
    {
        Category::where('id',$category_id)->update(['status'=>0]);

        $value = 'Category InActive Successfully';

        Session::flash('alert-success',$value);

        return redirect()->route('categories.index');
    }

    // Brand Status Active

    public function activeBrand($brand_id)
    {
        Brand::where('id',$brand_id)->update(['status'=>1]);

        $value = 'Brand Active Successfully';

        Session::flash('alert-success',$value);

        return redirect()->route('brand.index');
    }

    // brand Status InActive

    public function inActiveBrand($brand_id)
    {
        Brand::where('id',$brand_id)->update(['status'=>0]);

        $value = 'Brand InActive Successfully';

        Session::flash('alert-success',$value);

        return redirect()->route('brand.index');
    }

    // product Status InActive

    public function activeProduct($product_id)
    {
        Product::where('id',$product_id)->update(['status'=>1]);

        $value = "Product Active Successfully";

        Session::flash('alert-success',$value);

        return redirect()->route('products.index');
    }

    public function inActiveProduct($product_id)
    {
        Product::where('id',$product_id)->update(['status'=>0]);

        $value = "Product InActive Successfully";

        Session::flash('alert-danger',$value);

        return redirect()->route('products.index');
    }

    public function activeCoupon($coupon_id)
    {
        Coupon::where('id',$coupon_id)->update(['status'=>1]);

        $value = "Coupon Active Successfully";

        Session::flash('alert-success',$value);

        return redirect()->back();
    }

    public function inactiveCoupon($coupon_id)
    {
        Coupon::where('id',$coupon_id)->update(['status'=>0]);

        $value = "Coupon InActive Successfully";

        Session::flash('alert-danger',$value);

        return redirect()->back();
    }
}
