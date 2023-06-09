@extends('layouts.app')

@push('title')| Create Account Company @endpush
@section('css')

@endsection
@section('content')
   <div class="register-page " style="background-image: url({{asset('assets/images/login-bg.jpg')}})">
      <div class="container register-container register-company-container">
         <div class="row">
            <div class="col-md-4 p-0 d-none d-md-block">
            <div class="first-content">
               <h4 class="text-center mb-4">Find the Best internship in Algeria</h4>
               <p>
                  <i class="bi bi-star"></i>Apply for internship easily
               </p>
               <p>
                  <i class="bi bi-star"></i> Get discovered by top companies
               </p>
               <p>
                  <i class="bi bi-star"></i> Explore the right internship
               </p>
            </div>
            </div>
            <div class="col-sm-12 col-lg-8 pl-3 pb-2">
            <div class="header-form">
               <div class="logo">
                  <a href="{{route('home')}}">
                     <span>Intern</span><span>Finder</span>
                  </a> 
              </div>
               <div class="title mb-3" >
                  <h3>Register Company</h3>
               </div>
            </div>

               <form action="{{route('register.company')}}"  method="POST">
               @csrf
                  <div class="row">                 
                     <div class="col-sm-12 col-lg-6 ">
                        <div class="form-group mb-2">
                           <label for="first_name">Name</label>
                           <input type="text"  class="form-control  @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}" placeholder="Company Name" autofocus >
                           @error('name')
                              <small class="text-danger d-block mt-1">
                                 {{ $message }}
                              </small>
                           @enderror           
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-2">
                           <label for="company_type">Type</label>
                           <select class="form-control @error('company_type') is-invalid @enderror" 
                              id="company_type" name="company_type" value="{{ old('company_type') }}">
                              <option selected disabled hidden>Select Type Company</option>
                              <option value="Public">Public</option>
                              <option value="Private">Private</optionv>
                           </select>
                           @error('company_type')
                           <small class="text-danger d-block mt-1">
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>


                     <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-2">
                           <label for="category">Category</label>
                           <input type="text"  class="form-control  @error('category') is-invalid @enderror" 
                           id="category" name="category" value="{{ old('category') }}" placeholder="Company category" >
                           @error('category')
                              <small class="text-danger d-block mt-1">
                                 {{ $message }}
                              </small>
                           @enderror           
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-2">
                           <label for="phone">Phone</label>
                           <input type="text"  class="form-control  @error('phone') is-invalid @enderror" 
                           id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone" >
                           @error('phone')
                              <small class="text-danger d-block mt-1">
                                 {{ $message }}
                              </small>
                           @enderror
                        </div>
                     </div>

                     <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-2">
                           <label for="email">Email</label>
                           <input type="text" class="form-control  @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" placeholder="Email" >
                           @error('email')
                              <small class="text-danger d-block mt-1">
                                 {{ $message }}
                              </small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-2">
                           <label for="password">Password</label>
                           <input type="password"  class="form-control  @error('password') is-invalid @enderror" 
                           id="password" name="password" value="{{ old('password') }}" placeholder="Password">
                           @error('password')
                           <small class="text-danger d-block mt-1">
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>

                     <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                           <label for="state">State</label>
                           <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                                 <option hidden value="">Select a State</option>
                                 @foreach ($states as $item => $state)
                                 <option value="{{$state->code}}">{{$state->name}}</option>
                                 @endforeach
                           </select>
   
                           @error('state')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
   
                     <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                           <label for="city">Municipal</label>
                           <select class="form-control @error('municipal') is-invalid @enderror" name="municipal" id="municipal">
                                 <option hidden value="">Select a City</option>
                           </select>
   
                           @error('municipal')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     
                     <div class="col-sm-12 col-md-12 mt-3 mb-3">
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                     </div>
                  </div>
                  have an account?<a href="{{ route('loginForm') }}" class="text-decoration-none ml-2">Sign In</a>
               </form>



            </div>
         </div>
      </div>
   </div>      
@endsection

@section('scripts')

@endsection

