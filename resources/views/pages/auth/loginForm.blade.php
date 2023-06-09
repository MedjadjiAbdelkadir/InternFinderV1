@extends('layouts.app')
@push('title')| Login @endpush
@section('css')

@endsection

@section('content')
<div class="login-page" style="background-image: url({{asset('assets/images/login-bg.jpg')}})">
  <div class="container">
    <div class="col-xl-12 col-lg-12 login-container">
      <div class="row">
        <div class="col-md-6 d-none d-md-block">
          <div class="login-image w-100 d-block">
            <img src="{{asset('assets/images/login-image.jpg')}}" alt="Logo">
          </div>
        </div>
        <div class="col-md-6">
          <div class="login-form">
            <h5 class="text-capitalize">Login</h5>
            <form  method="POST" action="{{ route('login') }}" >
              @csrf
              <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="text" autofocus class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" >
                @error('email')
                  <small class="text-danger d-block">
                    {{ $message }}
                  </small>
                @enderror

              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control mb-1  @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="Password" >
                @error('password')
                  <small class="text-danger d-block">
                    {{ $message }}
                  </small>
                @enderror
                <a class="text-decoration-none" href="">Forgot your password ?</a>
              </div>
              
              @if(Session::has('error'))
                <div class="form-group">
                  <small class="text-danger">
                    {{Session::get('error')}}
                  </small>
                {{-- <div class="alert alert-danger alert-dismissible col-12 text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('error')}}
                </div> --}}
                </div>
              @endif
              
              <div class="form-group mt-3 mb-2">
                <button type="submit" class="btn btn-primary w-100">Login</button>
              </div>
            </form>

            Don't have an account?<a href="{{ route('select.form.register') }}" class="text-decoration-none  ml-2">Sign Up</a>
            {{-- <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password</a> --}}
          </div> 
        </div>

      </div>
    </div>
  </div>
 
</div>
@endsection
@section('scripts')

@endsection