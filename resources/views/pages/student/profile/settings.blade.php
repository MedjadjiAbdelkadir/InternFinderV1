@extends('layouts.master')
@push('title')| Account Settings @endpush
{{-- @include('includes.modals.deleteAccount') --}}
@section('css')
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
@section('modals')
<!-- Start Modal Remove -->
<div class="modal fade" id="modal-delete-account" tabindex="-1" role="dialog" aria-labelledby="ModalSkillsTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title h4" id="exampleModalLongTitle">
				<i class="fa fa-trash mr-2 text-danger"></i>Confirm Delete Account 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			</div>
			<form method="post"  id="deleteAccountForm">
	
				@method('DELETE')
				@csrf
				<div class="modal-body text-center">
					<p class="pt-3 pb-3">
						Are you sure you want to delete Your account
					<p/>
				</div>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
						Cancel
					</button>
					<button type="submit" class="btn btn-danger">
						Delete
					</button>
				</div>
			</form>
		</div>
    </div>
</div>
<!-- End Modal Remove -->
   
@endsection
@section('content')
				<div class="card mb-3 pb-0 w-100 mt-3">
					<div class="card-header d-flex">
						<h5 class="mb-0 pb-0 pl-2">Change Email</h5>
					</div>
					<div class="card-body pt-0">
						<form class="" action="{{route('student.updatePassword', auth('student')->user()->full_name)}}" method="POST">
							@method('PUT')
							@csrf
							<div class="col-sm-12 col-md-5 row">
								<div class="form-group col-12">
									<label for="email">New Email</label>
									<input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" id="email">
									@error('email')
									<small class="text-danger d-block">
										{{ $message }}
									</small>
									@enderror
								</div>
							</div>
							<button class="btn btn-primary ml-2" type="submit">Update Email</button>
						</form>
					</div>

					<hr>
					<div class="card-header d-flex">
						<h5 class="mb-0 pb-0 pl-2">Change Password</h5>
						
						{{-- <div class="mg-l-auto pl-2  mt-md-0">
							<a href="" class="mr-2 btn btn-success">
								Download Profile
							</a>
							<a href="" class="mr-2 btn btn-primary"
								id="edit-information"
								data-toggle="modal" data-target="#modal-edit-information"
							>
								Edit
							</a>
						</div> --}}
					</div>
					
					<div class="card-body pt-0">
						<form class="" action="{{route('student.updatePassword', auth('student')->user()->full_name)}}" method="POST">
							@method('PUT')
							@csrf
							<div class="col-sm-12 col-md-5 row">
								<div class="form-group col-12">
									<label for="password">Old Password</label>
									<input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" id="password">
									@error('password')
									<small class="text-danger d-block">
													{{ $message }}
									</small>
									@enderror
								</div>
	
								<div class="form-group col-12">
									<label for="new_assword">New Password</label>
									<input type="password"  class="form-control  @error('new_assword') is-invalid @enderror" name="new_assword" id="new_assword">
									@error('new_assword')
									<small class="text-danger d-block">
										{{ $message }}
									</small>
									@enderror
								</div>
								<div class="form-group col-12">
									<label for="password_confirmation">Confirm Password</label>
									<input type="password"  class="form-control  @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
									@error('password_confirmation')
									<small class="text-danger d-block">
										{{ $message }}
									</small>
									@enderror
								</div>
							</div>
							<button class="btn btn-primary ml-2" type="submit">Update Password</button>
						</form>
					</div>
					<hr>
					<div class="card-header d-flex">
						<h5 class="mb-0 pb-0 pl-2">Delete Account</h5>
					</div>
					<div class="card-body pr-0">
						<p>Are you sure you want to Delete your account? You will lose all your data</p>
						{{-- <button class="btn btn-danger" type="submit" id="delete-account">Delete Account</button> --}}
						<button class="btn btn-danger" id="btn-delete-account"
						data-toggle="modal" data-target="#modal-delete-account"
						data-bs-url="{{ route('student.destroy', ['name'=>auth('student')->user()->full_name]) }}"
						>Delete Account </button>
					</div>
				</div><!-- End Card -->

			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')

@endsection