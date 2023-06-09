@extends('layouts.master')
@push('title')| Account Profile @endpush

@section('css')

@endsection
@section('modals')

@endsection
@section('page-header')
{{-- <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Student/h4>
			<span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Profile</span>
		</div>
	</div>
</div> --}}
@endsection
@section('content')
				<div class="card mb-3 pb-0 w-100 mt-1">
					<div class="card-header d-flex pb-0 pt-2">
						<h4 class="pb-0 pl-2 pb-0">
							<i class="fa fa-id-card mr-1" aria-hidden="true"></i> Profile
						</h4>
						<div class="mg-l-auto pl-2  mt-md-0">
							{{-- <a href="" class="mr-2 btn btn-primary"
							>
								Create Formation
							</a> --}}
						</div>
					</div>
                    <div class="card-body pr-0 pt-0 pb-3">
                        <div class="row pr-0">
                            <div class="col-sm-12 col-md-12 col-lg-3">
                                <div class="main-profile-overview">
                                    <div class="main-img-user profile-user">
                                        <img alt="" src="{{auth('company')->user()->avatar}}">
                                        <a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                    </div>
                                    <div class="d-flex justify-content-between mg-b-20">
                                        <div>
                                            <h5 class="main-profile-name">{{auth('company')->user()->name}}</h5>
                                            <p class="main-profile-name-text">{{auth('company')->user()->company_type}} Company</p>
                                        </div>
                                    </div>
                                </div><!-- main-profile-overview -->
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-9 row pr-0">
                                <form action="{{route('company.update', auth('company')->user()->name)}}" method="POST" class="col-12 row pr-0">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text"  class="form-control  @error('name') is-invalid @enderror" value="{{auth('company')->user()->name}}" name="name" id="name">
                                            @error('name')
                                            <small class="text-danger d-block">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text"  class="form-control  @error('address') is-invalid @enderror" value="{{auth('company')->user()->address}}" name="address" id="address">
                                            @error('address')
                                            <small class="text-danger d-block">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select class="form-control @error('company_type') is-invalid @enderror" name="company_type" id="company_type">
                                                <option  value="{{auth('company')->user()->company_type}}" selected hidden >{{auth('company')->user()->company_type}}</option>
                                                <option value="Public">Public</option>
                                                <option value="Private">Private</option>
                                            </select>
            
                                            @error('company_type')
                                            <small class="text-danger d-block">
                                                            {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    
            
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text"  class="form-control  @error('category') is-invalid @enderror" value="{{auth('company')->user()->category}}" name="category" id="category">
                                            @error('category')
                                            <small class="text-danger d-block">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control  @error('email') is-invalid @enderror"  value="{{auth('company')->user()->email}}" name="email" id="email" >
                                            @error('email')
                                            <small class="text-danger d-block">
                                                            {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{auth('company')->user()->phone}}" name="phone" id="phone" >
                                            @error('phone')
                                            <small class="text-danger d-block">
                                                            {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                                                <option  value="{{auth('company')->user()->municipals->states->id}}" hidden >{{auth('company')->user()->municipals->states->name}}</option>
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
                                        <div class="form-group">
                                            <label for="city">Municipal</label>
                                            <select class="form-control @error('municipal') is-invalid @enderror" name="municipal" id="municipal">
                                                <option  value="{{auth('company')->user()->municipals->id}}" hidden >{{auth('company')->user()->municipals->name}}</option>
                                                @foreach ($municipals as $municipal)
                                                <option value="{{$municipal->id}}">{{$municipal->name}}</option>
                                                @endforeach
                                            </select>
            
                                            @error('municipal')
                                            <small class="text-danger d-block">
                                                            {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="AboutMe">Description</label>
                                            <textarea id="AboutMe" rows="3" style="height: 70px" class="form-control" name="description">{{auth('company')->user()->description}}</textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary ml-3" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
				</div><!-- End Card -->

			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#state').change(function() {
            var state = $(this).val();
            
            if (state) {
                $.ajax({
                    url: '/city',
                    type: 'get',
                    dataType: 'json',
                    data: {state: state},
                    success: function(response) {
                        
                       $('#municipal').empty();
                        $.each(response, function(key, value) {
                            $('#municipal').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#municipal').empty();
                $('#municipal').append('<option hidden >Select a municipality</option>');
            }
        });
    });
</script>
@endsection