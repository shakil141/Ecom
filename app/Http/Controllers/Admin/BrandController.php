<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
class BrandController extends Controller
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
        $brands = Brand::latest()->get();

        return view('admin.brand.index',['brands'=>$brands]);
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
            'brand_name'=> 'required|unique:brands,brand_name',

        ]);

        Brand::insert([
            'brand_name'=> $request->brand_name,
            'created_at' => Carbon::now(),
        ]);

        $value = "Brand Added Successfully";
        Session::flash('alert-success',$value);
        //Toastr::success('Post added successfully :)','Success');

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
        $brand = Brand::findOrFail($id);

        return view('admin.brand.brand_edit',['brands'=>$brand]);
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
            'brand_name'=> 'required|unique:brands,brand_name',

        ]);

        $brands = Brand::query()->findOrFail($id);

        $brands->fill($request->all())->save();

        $value =    "Brand Updated Successfully";

        Session::flash('alert-success',$value);
        //Toastr::success('Post added successfully :)','Success');

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();

        $value = "Brand Deleted Successfully";

        Session::flash('alert-danger', $value);

        return redirect()->route('brand.index');
    }
}
