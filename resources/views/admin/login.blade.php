@extends('layouts.login')
@section('tittle','login')
@section('content')
    <form action="{{route('check.admin')}}" method="POST">
        @if(session() -> has('error_validate'))
            <div class="alert alert-danger">
                {{session()-> get('error_validate') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
            @error('email')
            <br>
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
            @error('password')
            <br>
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember_token"> Remember Me
            </label>
            <label class="pull-right">
                <a href="#">Forgotten Password?</a>
            </label>

        </div>
        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
        <div class="social-login-content">
            <div class="social-button">
                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
            </div>
        </div>
{{--        <div class="register-link m-t-15 text-center">--}}
{{--            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>--}}
{{--        </div>--}}
    </form>
@endsection
