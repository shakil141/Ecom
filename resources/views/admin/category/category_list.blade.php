@extends('admin.admin_layouts')

@section('categories')
    active
@endsection
@section('main_body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-sm-8">

                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">All Category List</h6>
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
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-15p">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        @if ($category->status == 'Active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">InActive</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        @if ($category->status == 'Active')
                                            <a href="{{ route('inactive.category',['category_id'=>$category->id]) }}" style="margin-right: 5px" class="btn btn-danger btn-sm white">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('active.category',['category_id'=>$category->id]) }}" style="margin-right: 5px" class="btn btn-success btn-sm white">
                                                <i class="fas fa-thumbs-up"></i>
                                            </a>
                                        @endif
                                        <a style="margin-right: 5px" href="{{ route('categories.edit',['category'=>$category->id]) }}" class="btn-sm btn-success btn"><i class="fas fa-edit"></i></a>
                                        {!! Form::open(['url'=>route('categories.destroy',$category->id)]) !!}
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
                        <h4 class="text text-info">Add Category</h4>
                    </div>
                    <div class="card-body">
                        {!! Toastr::message() !!}
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputCategory" class="form-label">Category Name</label>
                              <input type="text" name="category_name" value="{{ old('category_name') }}" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputCategory">
                                @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Status :</label>
                              <input type="checkbox" name="status" value="1">
                            </div>
                            <input type="submit" class="btn btn-success btn-sm" value="Add Category">
                          </form>
                    </div>
                  </div>
            </div>
        </div>


@endsection
