@extends('admin.admin_layouts')

@section('brand')
    active
@endsection
@section('main_body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Coupon Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text text-info">Update Coupon</h4>
                    </div>
                    <div class="card-body">
                        {!! Toastr::message() !!}
                        <form action="{{ route('coupons.update',['coupon'=>$single_coupon->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                              <label for="exampleInputCoupon" class="form-label">Coupon Name</label>
                              <input type="text" name="coupon_name" value="{{ old('coupon_name') ?? $single_coupon->coupon_name }}" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputCoupon">
                                @error('coupon_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-success btn-sm" value="Update Coupon">
                          </form>
                    </div>
                  </div>
            </div>
        </div>


@endsection
