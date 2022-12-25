@extends('admin.admin_layouts')
@section('add-products')
    active
@endsection

@section('main_body')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add New Product</h6>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Enter Product Name"> </div>
                                    @error('product_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="{{ old('product_code') }}" placeholder="product code"> </div>
                                    @error('product_code')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Slug: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_slug" value="{{ old('product_slug') }}" placeholder="product code"> </div>
                                    @error('product_slug')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>

                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_price" value="{{ old('product_price') }}" placeholder="product price"> </div>
                                    @error('product_price')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity" value="{{ old('product_quantity') }}" placeholder="product quantity"> </div>
                                    @error('product_quantity')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <!-- col-8 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select name="category_id" class="form-control">
                                        <option selected disabled>Choose Category</option> @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option> @endforeach </select>
                                        @error('category_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select name="brand_id" class="form-control">
                                        <option selected disabled>Choose Brand</option> @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option> @endforeach </select>
                                        @error('brand_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                </div>
                            </div>
                            <!-- col-4 -->
                            <!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Short Description: </label>
                                    <textarea  name="short_description" class="form-control"></textarea>
                                    @error('short_description')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Long Description: </label>
                                    <textarea name="long_description" class="form-control"></textarea>
                                    @error('long_description')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-12 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force ">
                                    <label class="form-control-label">Main Image thumbnail:</label>
                                    <input type="file" multiple name="image_path[]" class="form-control">
                                    @error('image_path')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>



                        </div>
                        <!-- row -->
                        <div class="form-layout-footer">
                            <input type="submit" class="btn btn-info mg-r-5" value="Add product">
                        </div>
                        <!-- form-layout-footer -->
                    </div>
                    <!-- form-layout -->
                </form>
            </div>
        </div>
    </div>
@endsection
