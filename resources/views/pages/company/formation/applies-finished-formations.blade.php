@extends('layouts.master')
@push('title')| All Formation @endpush
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('modals')

<!-- Start Modal Delete Formation -->
<div class="modal fade" id="modal-remove" tabindex="-1" role="dialog" aria-labelledby="ModalSkillsTitle" aria-modal="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header pt-2 pb-2">
				<h5 class="modal-title" id="modal-title">
					<i class="bi bi-trash3-fill text-danger"></i>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form method="post"  id="removeForm">
				@method('DELETE')
				@csrf
				<div class="modal-body text-center pt-0 pb-0">
					<p class="pt-3 pb-3">
						Are you sure you want to delete this <span id="contnet-model"></span>
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
<!-- End Modal Delete Formation -->
@endsection
@section('page-header')
				{{-- <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Formation</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Formation</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb --> --}}
@endsection

@section('content')

                        <div class="card mb-3 pb-0 w-100 mt-2">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="content-title mb-0 my-auto">All Order List</h4>
									<h5>
										{{-- {{$applicants->formations}} --}}
									</h5>

									{{-- <a type="button" href="{{ route('company.formations.create',auth('company')->user()->name) }}" class="btn btn-primary ml-2">
										<i class="fa fa-plus" aria-hidden="true"></i>
										Create Formation
									</a> --}}
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>
											<tr>
												<th class="wd-lg-8p text-center"><span>id</span></th>
												<th class="wd-lg-20p text-center"><span>Full Name</span></th>
												<th class="wd-lg-20p text-center"><span>Email</span></th>
												<th class="wd-lg-20p text-center"><span>Phone</span></th>
												<th class="wd-lg-20p text-center"><span>Gender</span></th>
												<th class="wd-lg-20p text-center"><span>Status</span></th>
												<th class="wd-lg-20p text-center">Action</th>
											</tr>
										</thead>
										<tbody>

											@foreach ($applicants as $item=>$applicant)
											<tr>
												<td class="text-center">{{$item++}}</td>
												<td class="">{{$applicant->students->last_name.' '.$applicant->students->first_name }}</td>
												<td class="">{{$applicant->students->email}}</td>
												<td class="text-center">{{$applicant->students->phone}}</td>
												<td class="text-center">{{$applicant->students->gender}}</td>
												{{-- <td class="text-center">{{$applicant->students->dateBirth->format('d M Y')}}</td> --}}
												<td class="text-center">
													{{$applicant->created_at}}
												</td>
												<td class="text-center">
													@if ($applicant->status == 1) <span class="text-primary">Registered</span>
													@elseif($applicant->status == 2)<span class="text-warning">In Processing</span> 
													@elseif($applicant->status == 4)<span class="text-success">Accept</span> 
													@else <span class="text-danger">Rejected</span>
													@endif
												</td>


												<td class="text-center">
													<a href="{{route('company.formations.apply.show', ['name'=>auth('company')->user()->name , 'formation'=>$applicant->formations->id , 'apply'=>$applicant->id]	)}}" class="mr-2 btn btn-sm btn-primary">
														Show Profile
														{{-- <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i> --}}
													</a>
                                                    <a href="" class="btn btn-success">Evaluation</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>							
							</div>
							<div class="card-footer mg-y-0 pd-y-0 pt-2">
								@if(isset($applicants))
								    {!! $applicants->appends(['sort' => 'votes'])->links() !!}
							    @endif 
							</div>
						</div><!-- End Card -->
					</div>
				</div><!-- Container closed -->

@endsection
@section('js')

<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script> 

<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<script>
	$(document).ready(function() {
		$(document).on('click', '#modal-remove', function(event){
			console.log('Cliked Btn Remove Formations')
			var content = $(this).data('bs-item')
			var title = $(this).data('bs-title')

			console.log('title', title);
			console.log('content', content);

			$('#modal-title').empty()
			$('#contnet-model').empty()
			$('#modal-title').append('<span>' + title + '</span>');
			$('#contnet-model').append('<span>' + content + '</span>');
	
			var url = $(this).data('bs-url');
			console.log(url);
			$('#removeForm').attr('action', url);
		});
	});
</script>
@endsection