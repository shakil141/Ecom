<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view('admin.coupon.index',['coupons'=>$coupons]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required'
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'created_at' => Carbon::now()
        ]);

        $value = 'Coupon Added';

        Session::flash('alert-success',$value);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single_coupon = Coupon::findOrFail($id);

        return view('admin.coupon.edit',['single_coupon'=>$single_coupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'coupon_name' => 'required'
        ]);

        $single_coupon = Coupon::findOrFail($id);

        $single_coupon->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'updated_at' => Carbon::now(),
        ]);

        $value = 'Coupon Updated';

        Session::flash('alert-success',$value);

        return redirect()->route('coupons.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $single_coupon = Coupon::findOrFail($id);

        $single_coupon->delete();

        $value = 'Coupon Deleted';

        Session::flash('alert-danger',$value);

        return redirect()->route('coupons.index');

    }
}
