@extends('admin.admin_layouts')

@section('main_body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item">Category</span>
    <span class="breadcrumb-item active">Edit Category</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm justify-content-center">

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text text-info">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        {!! Toastr::message() !!}
                        <form action="{{ route('categories.update',['category'=>$single_category->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                              <label for="exampleInputCategory" class="form-label">Category Name</label>
                              <input type="text" name="category_name" value="{{ old('category_name') ?? $single_category->category_name }}" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputCategory">
                                @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputStatus" class="form-label">Status :</label>

                              @if ($single_category->status == 'Active')
                                <input type="checkbox"  id="exampleInputStatus" name="status" checked>
                              @else
                                <input type="checkbox" id="exampleInputStatus" name="status">
                              @endif
                            </div>
                            <input type="submit" class="btn btn-info btn-sm" value="Update Category">
                          </form>
                    </div>
                  </div>
            </div>
        </div>


@endsection
