@extends('layouts.master')
@push('title')| Edit Evaluation @endpush
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

@endsection

@section('content')

                    <div class="card mb-3 pb-0 w-100 mt-2">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="content-title mb-0 my-auto">Edit Evaluation</h4>
                            </div>
                        </div>
                        <hr>
                        <form action="{{route('student.evaluation.update', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" method="POST">
                            @method('PUT')
							@csrf
							{{-- <input type="hidden" name="apply_id" id="apply_id"> --}}
							<div class="card-body pt-0 px-0">
								<div class="general-information px-4">
									Formation : {{$evaluation->formations->title}} <br>
									Company : {{$evaluation->formations->company->name}} 
								</div>
								<hr>
								
								<div class="general-information px-4">
									<h5 class="">Evaluation</h5>

									<div class="form-group">
										<div class="main-content-label">
											Time 
										</div>
										<p class="">the company's commitment to entry and exit dates</p>
										<div class="row">
											<div class="col-lg-1">
												<label class="rdiobox">
													<input name="time" type="radio" {{$evaluation->time == 1 ? 'checked' : ''}}  value="1"> 
													<span>1/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="time" type="radio" {{$evaluation->time == 2 ? 'checked' : ''}} value="2"> 
													<span>2/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input  name="time" type="radio" {{$evaluation->time == 3 ? 'checked' : ''}}  value="3"> 
													<span>3/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input  name="time" type="radio" {{$evaluation->time == 4 ? 'checked' : ''}} value="4"> 
													<span>4/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="time" type="radio" {{$evaluation->time == 5 ? 'checked' : ''}}  value="5"> 
													<span>5/5</span>
												</label>
											</div>
										</div>
									</div>
	
									<div class="form-group">
										<div class="main-content-label">
											Rules and Conditions 
										</div>
										<p class="">The company's application and respect for all laws and conditions</p>
										<div class="row">
											<div class="col-lg-1">
												<label class="rdiobox">
													<input name="rules_conditions" type="radio" {{$evaluation->rules_conditions == 1 ? 'checked' : ''}} value="1"> 
													<span>1/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input  name="rules_conditions" type="radio" {{$evaluation->rules_conditions == 2 ? 'checked' : ''}} value="2"> 
													<span>2/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input  name="rules_conditions" type="radio" {{$evaluation->rules_conditions == 3 ? 'checked' : ''}} value="3"> 
													<span>3/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input  name="rules_conditions" type="radio" {{$evaluation->rules_conditions == 4 ? 'checked' : ''}} value="4"> 
													<span>4/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input  name="rules_conditions" type="radio" {{$evaluation->rules_conditions == 5 ? 'checked' : ''}} value="5"> 
													<span>5/5</span>
												</label>
											</div>
										</div>
									</div>
	
									<div class="form-group">
										<div class="main-content-label">
											Environment 
										</div>
										<p class="">Providing a suitable environment for learning</p>
										<div class="row ">
											<div class="col-lg-1">
												<label class="rdiobox">
													<input name="environment" type="radio" {{$evaluation->environment == 1 ? 'checked' : ''}} value="1"> 
													<span>1/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="environment" type="radio" {{$evaluation->environment == 2 ? 'checked' : ''}} value="2"> 
													<span>2/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="environment" type="radio" {{$evaluation->environment == 3 ? 'checked' : ''}} value="3"> 
													<span>3/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="environment" type="radio" {{$evaluation->environment == 4 ? 'checked' : ''}} value="4"> 
													<span>4/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="environment" type="radio"  {{$evaluation->environment == 5 ? 'checked' : ''}} value="5"> 
													<span>5/5</span>
												</label>
											</div>
										</div>
									</div>
	
									<div class="form-group">
										<div class="main-content-label">
											Content 
										</div>
										<p class="">The content of the course matches the publication</p>
										<div class="row">
											<div class="col-lg-1">
												<label class="rdiobox">
													<input name="content" type="radio" {{$evaluation->content == 1 ? 'checked' : ''}} value="1"> 
													<span>1/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="content" type="radio" {{$evaluation->content == 2 ? 'checked' : ''}} value="2"> 
													<span>2/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="content" type="radio" {{$evaluation->content == 3 ? 'checked' : ''}} value="3"> 
													<span>3/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="content" type="radio" {{$evaluation->content == 4 ? 'checked' : ''}} value="4"> 
													<span>4/5</span>
												</label>
											</div>
											<div class="col-lg-1 mg-t-20 mg-lg-t-0">
												<label class="rdiobox">
													<input name="content" type="radio" {{$evaluation->content == 5 ? 'checked' : ''}} value="5"> 
													<span>5/5</span>
												</label>
											</div>
										</div>
									</div>
	
									<div class="form-group">
										<div class="main-content-label">
											Remark 
										</div>
										<p class="">If you have any other comments, mention them here</p>
										<textarea class="form-control"  name="remark" 
										placeholder="Textarea" rows="3"
										>{{$evaluation->remark}}</textarea>
	
									</div>
								</div>

								<button type="submit" class="btn btn-success mt-2 mx-4">
									Update
								</button>
							</div>
                        </form>
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

@endsection