@extends('admin.admin_layouts')

@section('manage-products')
    active
@endsection

@section('main_body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Product List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-sm-12">

                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">All Product List</h6>
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
                            <th class="wd-15p">Product Image</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Product Quantity</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-15p">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_products as $products)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td></td>
                                    <td>{{ $products->product_name }}</td>
                                    <td>{{ $products->product_quantity }}</td>
                                    <td>{{ $products->category->category_name }}</td>
                                    <td> @if ($products->status == 'Active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">InActive</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        @if ($products->status == 'Active')
                                            <a href="{{ route('inactive.product',['product_id'=>$products->id]) }}" style="margin-right: 5px" class="btn btn-danger btn-sm white">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('active.product',['product_id'=>$products->id]) }}" style="margin-right: 5px" class="btn btn-success btn-sm white">
                                                <i class="fas fa-thumbs-up"></i>
                                            </a>
                                        @endif
                                        <a style="margin-right: 5px" href="{{ route('products.edit',['product'=>$products->id]) }}" class="btn-sm btn-success btn"><i class="fas fa-edit"></i></a>
                                        {!! Form::open(['url'=>route('products.destroy',$products->id)]) !!}
                                        @method('DELETE')
                                        <button onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div><!-- table-wrapper -->
                  </div><!-- card -->
            </div>
        </div>


@endsection
