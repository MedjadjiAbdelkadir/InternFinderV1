@extends('layouts.app')
@push('title')| Create Account Student @endpush
@section('css')

@endsection
@section('content')

<div class="register-page" style="background-image: url({{asset('assets/images/login-bg.jpg')}})">
   <div class="container register-container register-student-container">
      <div class="row">
         <div class="col-md-4 p-0 d-none d-md-block" >
            <div class="first-content">
               <h4 class="text-center mb-4">Find the Best internship in Algeria</h4>
               <p> 
                  <i class="bi bi-star"></i>Apply for internship easily
               </p>
               <p> 
               <i class="bi bi-star"></i>Get discovered by top companies
               </p>
               <p>
               <i class="bi bi-star"></i>Explore the right internship
               </p>
            </div>
         </div>

         <div class="col-sm-12 col-lg-8 pt-3 pb-3">

            <div class="header-form">
               <div class="logo">
                  <a href="{{route('home')}}">
                     <span>Intern</span><span>Finder</span>
                  </a> 
              </div>
               <div class="title mb-3" >
                  <h3>Register Student</h3>
               </div>
            </div>

            <form action="{{route('register.student')}}" method="POST" class="ml-2">
               @csrf
               <div class="row">                   
                  <div class="col-sm-12 col-lg-6 ">
                     <div class="form-group mb-1">
                        <label for="first_name">First Name</label>
                        <input type="text"  class="form-control  @error('first_name') is-invalid @enderror" 
                        id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" autofocus >
                        @error('first_name')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                        @enderror              
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                     <div class="form-group mb-1">
                        <label for="last_name">Last Name</label>
                        <input type="text"  class="form-control  @error('last_name') is-invalid @enderror" 
                        id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" >
                        @error('last_name')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                     <div class="form-group mb-1">
                        <label for="email">Email</label>
                        <input type="text"  class="form-control  @error('email') is-invalid @enderror" 
                        id="email" name="email" value="{{ old('email') }}" placeholder="Email" >
                        @error('email')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                     <div class="form-group mb-1">
                        <label for="phone">Phone</label>
                        <input type="text"  class="form-control  @error('phone') is-invalid @enderror" 
                        id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone" >
                        @error('phone')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                     <div class="form-group mb-1">
                        <label for="password">Password</label>
                        <input type="password"  class="form-control  @error('password') is-invalid @enderror" 
                        id="password" name="password" value="{{ old('password') }}"placeholder="Password" >
                        @error('password')
                        <small class="text-danger d-block">
                           {{ $message }}
                        </small>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                     <div class="form-group mb-1">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password"  class="form-control  @error('password_confirmation') is-invalid @enderror" 
                        id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"
                        placeholder="Confirm Password" >
                        @error('password_confirmation')
                           <small class="text-danger d-block">
                           {{ $message }}
                           </small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                     <div class="form-group mb-1">
                        <label for="gender">Gender</label>
                        <select class="form-control @error('gender') is-invalid @enderror" 
                           id="gender" name="gender" value="{{ old('gender') }}">
                           <option selected disabled hidden>Select Gender</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</optionv>
                        </select>
                        @error('gender')
                        <small class="text-danger d-block">
                           {{ $message }}
                        </small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                     <div class="form-group mb-1">
                        <label for="date">Date Birth</label>
                        <div class="">
                              <div class="input-group date" id="datepicker">
                                 <input type="date" class="form-control  @error('dateBirth') is-invalid @enderror" 
                                 id="birthDate" name="dateBirth" value="{{ old('dateBirth') }}" 
                                 min="1980-01-01" max="2005-01-01" >

                                 {{-- <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                          <i class="fa fa-calendar"></i>
                                    </span>
                                 </span> --}}
                              </div>
                        </div>
                     </div>
                     @error('dateBirth')
                     <small class="text-danger d-block">
                        {{ $message }}
                     </small>
                     @enderror
                     <script type="text/javascript">
                        $(function() {
                           $('#datepicker').datepicker();
                        });
                     </script>
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