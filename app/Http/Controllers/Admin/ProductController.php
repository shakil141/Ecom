<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
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
        $all_products = Product::orderBy('id','desc')->latest()->get();

        return view('admin.product.manage_product',['all_products'=>$all_products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['categories'] = Category::latest()->get();
        $data['brands'] = Brand::latest()->get();

        return view('admin.product.add_product',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {


        DB::beginTransaction();

        $images=array();

        $product =  Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_slug)),
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'product_price' => $request->product_price,
            'created_at' => Carbon::now()
        ]);

        if($files=$request->file('image_path')){
            foreach($files as $file){
                $coverPhoto = $file;
                $getExt = $coverPhoto->getClientOriginalExtension();
                $modifiedName = 'img_'.time().'_'.uniqid().'.'.$getExt;
                $destination ='photo/products/';
                $data['image_path'] = $destination.$modifiedName;
                $coverPhoto->move( $destination ,$modifiedName );

                ProductImage::create([
                    'image_path' => $data['image_path'],
                    'product_id' => $product->id,
                ]);
            }
        }
        DB::commit();
        $value = "Product Created Successfully";

        Session::flash('alert-success', $value);
        return redirect()->route('products.index');
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
        $data = [];

        $data['single_product'] = Product::findOrFail($id);

        $data['categories'] = Category::latest()->get();

        $data['brands'] = Brand::latest()->get();

        return view('admin.product.edit_product',$data);
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
        $single_product = Product::findOrFail($id);

        $single_product->fill($request->all())->save();

        $value = "Product Updated Successfully";

        Session::flash('alert-success', $value);
        return redirect()->route('products.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $single_product = Product::findOrFail($id);

        $single_product->delete();

        $value = "Product Deleted Successfully";

        Session::flash('alert-danger', $value);

        return redirect()->route('products.index');
    }
}
