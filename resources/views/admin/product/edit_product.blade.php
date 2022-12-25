@extends('admin.admin_layouts')

@section('main_body')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Update Product</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Product</h6>
                <form action="{{ route('products.update',['product'=>$single_product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{ old('product_name') ?? $single_product->product_name }}" placeholder="Enter Product Name"> </div>
                                    @error('product_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="{{ old('product_code') ?? $single_product->product_code }}" placeholder="product code"> </div>
                                    @error('product_code')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Slug: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_slug" value="{{ old('product_slug') ?? $single_product->product_slug }}" placeholder="product code"> </div>
                                    @error('product_slug')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>

                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_price" value="{{ old('product_price') ?? $single_product->product_price }}" placeholder="product price"> </div>
                                    @error('product_price')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity" value="{{ old('product_quantity') ?? $single_product->product_quantity }}" placeholder="product quantity"> </div>
                                    @error('product_quantity')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                            </div>
                            <!-- col-8 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $single_product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
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
                                        <option value="{{ $brand->id }}" {{ $brand->id == $single_product->brand_id ? 'selected' : ''  }}>{{ $brand->brand_name }}</option> @endforeach </select>
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
                                    <textarea  name="short_description" class="form-control">{{ $single_product->short_description }}</textarea>
                                    @error('short_description')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Long Description: </label>
                                    <textarea name="long_description" class="form-control">{{ $single_product->long_description }}</textarea>
                                    @error('long_description')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            @if(count($single_product['productImage']) > 0)
                                <div class="d-flex">
                                    @foreach($single_product['productImage'] as $pImage)
                                        <div class="" style="margin-right:10px">
                                            {{-- <a class="" href="{{ route('admin.product.remove-p-image', $pImage->id) }}">Remove</a> --}}
                                            <img width="100px" src="{{ asset($pImage['image_path']) }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                                                    <input multiple type="file" name="image[]" class="form-control"/>
                            <div class="form-layout-footer">
                                <input type="submit" class="btn btn-info mg-r-5" value="Update product">
                            </div>

                        </form>
                            {{-- <!-- col-12 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force ">
                                    <label class="form-control-label">Main Image thumbnail:</label>
                                    <input type="file" name="image[]" class="form-control">
                                    @error('image')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force ">
                                    <label class="form-control-label">Image Two:</label>
                                    <input type="file" name="image[]" class="form-control">
                                    @error('image')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force ">
                                    <label class="form-control-label">Image Three:</label>
                                    <input type="file" name="image[]" class="form-control">
                                    @error('image')
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
                </form> --}}
            </div>
        </div>
    </div>
@endsection
