@extends('layouts.app')
@section('css')

@endsection

@push('title')| Choose Type @endpush

@section('content')
<div class="register-page">
    <div class="container register-container select-form-container">
        <div class="row">
            <div class="col-sm-12 col-md-4 p-0 d-none d-md-block " >
                <div class="first-content">
                    <h4 class="text-center mb-4">Welcome</h4>
                    <p class="text-center"> Choose and create your account now </p>
                </div>
            </div>

            <div class="col-sm-12 col-md-7  pt-5 pb-5 ml-4">
                
                <div class="header">
                    <div class="logo mb-3">
                        <a href="{{route('home')}}">
                            <span>Intern</span><span>Finder</span>
                        </a>
                    </div>
                </div>
                <h4>
                    Choose your account type
                </h4>

                <p>You can easily choose between accounts</p>
                <div class="items mt-4">
                    <div class="item-1 mb-3 w-75">
                        <a href="{{route('register.form.company')}}">
                            <div class="media">
                                <i class="icons bi bi-building "></i>
                                <div class="media-body">
                                <h5 class="mt-0">Register as a Company</h5>
                                <span>Publish internship.</span> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item-2 w-75">
                        <a href="{{route('register.form.student')}}">
                            <div class="media">
                                <i class="icons bi bi-journal"></i>
                                <div class="media-body">
                                <h5 class="mt-0">Register as a Student</h5>
                                <span>Search or find internship.</span> 
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('scripts')

@endsection

