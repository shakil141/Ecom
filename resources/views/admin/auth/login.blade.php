@extends('admin.admin_layouts')

@section('main_body')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><span class="tx-info tx-normal">admin</span></div>
        <hr>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!-- form-group -->
            <div class="form-group">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Log In</button>
        </form>


        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

@endsection
