@extends('admin.admin_layouts')

@section('brand')
    active
@endsection
@section('main_body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Coupon</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-sm-8">

                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">All Coupon List</h6>
                    @if (session()->has('alert-danger'))
                    <div class="alert alert-danger">
                        <span>{{session('alert-danger')}}</span>
                    </div>
                    @endif

                    @if (session()->has('alert-success'))
                    <div class="alert alert-success">
                        <span>{{session('alert-success')}}</span>
                    </div>
                    @endif
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">SL NO</th>
                            <th class="wd-15p">Coupon Name</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-15p">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $coupon->coupon_name }}</td>
                                    <td>
                                        @if ($coupon->status == 'Active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">InActive</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        @if ($coupon->status == 'Active')
                                            <a href="{{ route('inactive.coupon',['coupon_id'=>$coupon->id]) }}" style="margin-right: 5px" class="btn btn-danger btn-sm white">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('active.coupon',['coupon_id'=>$coupon->id]) }}" style="margin-right: 5px" class="btn btn-success btn-sm white">
                                                <i class="fas fa-thumbs-up"></i>
                                            </a>
                                        @endif
                                        <a style="margin-right: 5px" href="{{ route('coupons.edit',['coupon'=>$coupon->id]) }}" class="btn-sm btn-success btn"><i class="fas fa-edit"></i></a>
                                        {!! Form::open(['url'=>route('coupons.destroy',$coupon->id)]) !!}
                                            @method('DELETE')
                                            <button onclick="return confirm('Are You Sure ')" class="btn-sm btn-danger btn"><i class="fas fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div><!-- table-wrapper -->
                  </div><!-- card -->
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text text-info">Add Coupon</h4>
                    </div>
                    <div class="card-body">
                        {!! Toastr::message() !!}
                        <form action="{{ route('coupons.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputCoupon" class="form-label">Coupon Name</label>
                              <input type="text" name="coupon_name" value="{{ old('coupon_name') }}" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputCoupon">
                                @error('coupon_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-success btn-sm" value="Add Coupon">
                          </form>
                    </div>
                  </div>
            </div>
        </div>


@endsection
