@extends('admin.admin_layouts')

@section('brands')
    active
@endsection
@section('main_body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Brand</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text text-info">Edit Brand</h4>
                    </div>
                    <div class="card-body">

                        @if (session()->has('alert-success'))
                        <div class="alert alert-success">
                            <span>{{session('alert-success')}}</span>
                        </div>
                        @endif

                        <form action="{{ route('brand.update',['brand'=>$brands->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                              <label for="exampleInputBrand" class="form-label">Brand Name</label>
                              <input type="text" name="brand_name" value="{{ old('brand_name') ?? $brands->brand_name }}" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputBrand">
                                @error('brand_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-info btn-sm" value="Edit Brand">
                          </form>
                    </div>
                  </div>
            </div>
        </div>


@endsection
