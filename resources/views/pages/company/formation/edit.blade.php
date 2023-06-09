@extends('layouts.master')
@push('title')| Edit Formaton @endpush
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Formation</h4>
							<span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
		
	<div class="row row-sm">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
			<div class="card">
				<form action="{{route('company.formations.update', ['name'=>auth('company')->user()->name , 'formation'=>$formation->id])}}" method="POST">
					@method('PUT')
						@csrf
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<h4 class="card-title mg-b-0">Create Formation</h4>
					</div>
				</div>
				<div class="card-body row">

					<div class="col-sm-12 col-md-12 mt-2">
						<div class="general-information">
							<h5 class="h4 mt-2">General Information</h5>
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$formation->title}}" id="title" name="title">
										@error('title')
										<small class="text-danger d-block">
											{{ $message }}
										</small>
										@enderror
									</div>
								</div>
								<div class="col-sm-12 col-md-3">
									<div class="form-group">
										<label>Number of positions</label>
										<input type="text" class="form-control @error('nbr_place') is-invalid @enderror" id="nbr_place" value="{{$formation->nbr_place}}" name="nbr_place">
										@error('nbr_place')
										<small class="text-danger d-block">
											{{ $message }}
										</small>
										@enderror
									</div>
								</div>
								<div class="col-sm-12 col-md-3">
									<div class="form-group mb-1">
										<label for="state">Permanence</label>
										<select class="form-control @error('permanence') is-invalid @enderror" name="permanence" id="permanence">
											<option value="1">Full Time</option>
											<option value="2">Part Time</option>
											<option value="{{$formation->permanence}}" hidden selected>{{$formation->permanence == 1 ? 'Full Time' : 'Part Time' }}</option>
										</select>

										@error('permanence')
										<small class="text-danger d-block">
														{{ $message }}
										</small>
										@enderror
									</div>
								</div>

								<div class="col-sm-12 col-md-6 col-lg-3">
									<div class="form-group mb-1">
										<label for="state">State</label>
										<select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
											<option  value="{{$formation->municipals->states->id}}" hidden >{{$formation->municipals->states->name}}</option>
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
								<div class="col-sm-12 col-md-6 col-lg-3">
									<div class="form-group mb-1">
										<label for="city">Municipal</label>
										<select class="form-control @error('municipal') is-invalid @enderror" name="municipal" id="municipal">
											<option  value="{{$formation->municipals->id}}" hidden >{{$formation->municipals->name}}</option>
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
								<div class="col-sm-12 col-md-6 col-lg-3">
									<div class="form-group">
										<label for="date">Date start</label>
										<input type="date" class="form-control  @error('start') is-invalid @enderror" id="start"  value="{{ date('Y-m-d',strtotime($formation->start)) }}"  name="start">
										@error('start')
										<small class="text-danger d-block">
											{{ $message }}
										</small>
										@enderror
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-3">
									<div class="form-group">
										<label for="date">Date end </label>
										<input type="date" class="form-control @error('end') is-invalid @enderror" id="end" value="{{ date('Y-m-d',strtotime($formation->end)) }}" name="end">
										@error('end')
										<small class="text-danger d-block">
											{{ $message }}
										</small>
										@enderror
									</div>
								</div>
								<div class="col-sm-12 col-md-12">
									<div class="form-group mb-1">
										<label for="">Description</label>
										<textarea
											class="form-control @error('description') is-invalid @enderror"
											name="description" id="description" 
											rows="4"
										>{{$formation->description}}</textarea>
										@error('description')
										<small class="text-danger d-block">
											{{ $message }}
										</small>
										@enderror
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- <div class="col-sm-12 col-md-12 mt-2">
						<div class="education-section">
							<div class="header-section d-md-flex mb-0 mb-md-2">
								<h5 class="h4 pt-1"><i class="fa fa-graduation-cap mr-1" aria-hidden="true"></i> Education </h5>
								<div class="mg-l-auto pl-2 mt-2 mt-md-0">
									<div class="dropdown">
										<button class="btn btn-primary py-1 px-2" type="button" data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-plus mr-1"></i>
											Create Education
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#"
												data-toggle="modal" data-target="#modal-create-university_education" 
											>University Education</a>
											<a class="dropdown-item" href="#"
												data-toggle="modal" data-target="#modal-create-institute_education" 
											>Institute Education</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								@if(!empty($formation->formationUniversityEducations))
								@foreach($formation->formationUniversityEducations as $universityEducations)
									<div class="col-sm-12 col-md-8">
										<div class="form-group">
											<label>Specialty</label>
											<select class="form-control @error('specialty_university') is-invalid @enderror" name="specialty_university[]" id="specialty_university">
												<option  value="{{$universityEducations->specialty->id}}" hidden selected>{{$universityEducations->specialty->name}}</option>
												@foreach ($specialty_universities as $item => $specialty)
												<option value="{{$specialty->id}}">{{$specialty->name}}</option>
												@endforeach
											</select>
											@error('specialty_university')
												<small class="text-danger d-block">
												{{ $message }}
												</small>
											@enderror
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label>Level</label>
											<select class="form-control @error('degree_university') is-invalid @enderror" name="degree_university[]" id="degree_university">
												<option  value="{{$universityEducations->degreeUniversities->id}}" hidden selected>{{$universityEducations->degreeUniversities->name}}</option>
													@foreach ($degree_universities as $item => $degree)
													<option value="{{$degree->id}}">{{$degree->name}}</option>
													@endforeach
											</select>

											@error('degree_university')
												<small class="text-danger d-block">
												{{ $message }}
												</small>
											@enderror
										</div>
									</div>
									<div class="col-sm-12 col-md-1">
										<div class="form-group pt-1">
											<button type="button" class="btn btn-success form-control inline-block  mt-4"  id="add-education-university">
												<i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
								@endforeach

								
								@elseif(!empty($formation->formationInstituteEducations))
								@foreach($formation->formationInstituteEducations as $instituteEducations)
									<div class="col-sm-12 col-md-8">
										<div class="form-group">
											<label>Specialty</label>
											<input type="text" class="form-control  @error('specialty_institute') is-invalid @enderror" placeholder="Enter speciality" 
											name="specialty_institute[]" value="{{$instituteEducations->name}}" id="specialty_institute" />
											@error('specialty_institute')
											<small class="text-danger d-block">
											{{ $message }}
											</small>
											@enderror
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label>Level</label>
											<select class="form-control @error('degree_institute') is-invalid @enderror" name="degree_institute[]" id="degree_institute">
												<option selected hidden value="{{$instituteEducations->degreeInstitutes->id}}">{{$instituteEducations->degreeInstitutes->name}}</option>
												@foreach ($degree_institutes as $item => $degre)
												<option value="{{$degre->id}}">{{$degre->name}}</option>
												@endforeach
											</select>
											@error('degree_institute')
											<small class="text-danger d-block">
											{{ $message }}
											</small>
											@enderror
										</div>
									</div>
									<div class="col-sm-12 col-md-1">
										<div class="form-group pt-1">
											<button type="button" class="btn btn-success form-control inline-block  mt-4"  id="add-education-institute">
												<i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
								@endforeach
							    @else
									<span>There is no requirement for university degrees</span>
								@endif

							</div>

						</div>
					</div> --}}

					<div class="col-sm-12 col-md-12 mt-2">
						<div class="education-section">
							<h5 class="h4 pt-1"><i class="fa fa-graduation-cap mr-1" aria-hidden="true"></i> Education </h5>
							<div class="education-university mb-2">
								<div class="header-section d-md-flex mb-0 mb-md-2">
									<h5 class="h6 pt-2">Education University</h5>
									<div class="mg-l-auto pl-2 mt-2 mt-md-0">
										<button type="button" class="btn btn-success"  id="add-education-university">
											<i class="fa fa-plus"></i>
										</button>
									</div>
								</div>
								
									@if(!empty($formation->formationUniversityEducations))
										@foreach($formation->formationUniversityEducations as $universityEducations)
										<div class="row" id="">			
										    <div class="col-sm-12 col-md-8">
												<div class="form-group">
													<label>Specialty</label>
													<select class="form-control @error('specialty_university') is-invalid @enderror" name="specialty_university[]" id="specialty_university">
														<option  value="{{$universityEducations->specialty->id}}" hidden selected>{{$universityEducations->specialty->name}}</option>
														@foreach ($specialty_universities as $item => $specialty)
														<option value="{{$specialty->id}}">{{$specialty->name}}</option>
														@endforeach
													</select>
													@error('specialty_university')
														<small class="text-danger d-block">
														{{ $message }}
														</small>
													@enderror
												</div>
											</div>
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label>Level</label>
													<select class="form-control @error('degree_university') is-invalid @enderror" name="degree_university[]" id="degree_university">
														<option  value="{{$universityEducations->degreeUniversities->id}}" hidden selected>{{$universityEducations->degreeUniversities->name}}</option>
															@foreach ($degree_universities as $item => $degree)
															<option value="{{$degree->id}}">{{$degree->name}}</option>
															@endforeach
													</select>

													@error('degree_university')
														<small class="text-danger d-block">
														{{ $message }}
														</small>
													@enderror
												</div>
											</div>
											<div class="col-sm-12 col-md-1">
												<div class="form-group pt-1">
													<button type="button" class="btn btn-danger form-control inline-block  mt-4 remove_row-education-university"  id="remove-education-university">
														<i class="fa fa-minus"></i>
													</button>
												</div>
											</div>
										</div>
										@endforeach
									@else
									    <span>There is no academic requirement for this Formation</span>
									@endif
								
							</div>

							<div class="education-institute mb-2">
								<div class="header-section d-md-flex mb-0 mb-md-2">
									<h5 class="h6 pt-2">Education Institute</h5>
									<div class="mg-l-auto pl-2 mt-2 mt-md-0">
										<button type="button" class="btn btn-success"  id="add-education-university">
											<i class="fa fa-plus"></i>
										</button>
									</div>
								</div>
								<div class="row">
									@if(!empty($formation->formationInstituteEducations))
										@foreach($formation->formationInstituteEducations as $instituteEducations)
											<div class="col-sm-12 col-md-8">
												<div class="form-group">
													<label>Specialty</label>
													<input type="text" class="form-control  @error('specialty_institute') is-invalid @enderror" placeholder="Enter speciality" 
													name="specialty_institute[]" value="{{$instituteEducations->name}}" id="specialty_institute" />
													@error('specialty_institute')
													<small class="text-danger d-block">
													{{ $message }}
													</small>
													@enderror
												</div>
											</div>
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label>Level</label>
													<select class="form-control @error('degree_institute') is-invalid @enderror" name="degree_institute[]" id="degree_institute">
														<option selected hidden value="{{$instituteEducations->degreeInstitutes->id}}">{{$instituteEducations->degreeInstitutes->name}}</option>
														@foreach ($degree_institutes as $item => $degre)
														<option value="{{$degre->id}}">{{$degre->name}}</option>
														@endforeach
													</select>
													@error('degree_institute')
													<small class="text-danger d-block">
													{{ $message }}
													</small>
													@enderror
												</div>
											</div>
											<div class="col-sm-12 col-md-1">
												<div class="form-group pt-1">
													<button type="button" class="btn btn-success form-control inline-block  mt-4"  id="add-education-institute">
														<i class="fa fa-plus"></i>
													</button>
												</div>
											</div>
										@endforeach
									@else
									    <span>There is no academic requirement for this Formation</span>
									@endif
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-md-12 mt-2">
						<div class="experience-section">
							<div class="header-section d-md-flex mb-0 mb-md-2">
								<h5 class="h4 pt-1"><i class="fa fa-briefcase mr-1" aria-hidden="true"></i> Experience </h5>
								<div class="mg-l-auto pl-2 mt-2 mt-md-0">
									<button type="button" class="btn btn-success" id="add-experience">
										<i class="fa fa-plus"></i>
									</button>
								</div>
							</div>
							<div class="experiences mb-2">
								<div class="row">
									@foreach($formation->formationExperiences as $experience)							
										<div class="col-sm-12 col-md-8">
											<div class="form-group">
												<label>Specialty</label>
												<input type="text" class="form-control mt-1  @error('specialty_experience') is-invalid @enderror" name="specialty_experience[]" value="{{$experience->specialty}}" id="specialty_experience" placeholder="Enter Your Specialty">
												@error('specialty_experience')
												<small class="text-danger d-block">
													{{ $message }}
												</small>
												@enderror
											</div>
										</div>
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label>Years Of Experience</label>
												<select class="form-control @error('duration_experience') is-invalid @enderror" name="duration_experience[]" id="duration_experience">
													<option  value="{{$experience->durations->id}}" hidden selected>{{$experience->durations->duration}}</option>
													@foreach ($durationExperiences as $item => $duration)
													<option value="{{$duration->id}}">{{$duration->duration}}</option>
													@endforeach
												</select>
												@error('duration_experience')
													<small class="text-danger d-block">
													{{ $message }}
													</small>
												@enderror
											</div>
										</div>
										<div class="col-sm-12 col-md-1">
											<div class="form-group pt-1">
												<button type="button" class="btn btn-danger form-control inline-block  mt-4"  id="add-experience">
													<i class="fa fa-minus"></i>
												</button>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
			
					<div class="col-sm-12 col-md-12 mt-2">
						<div classs="languages-section">
							<div class="header-section d-md-flex mb-0 mb-md-2">
								<h5 class="h4 pt-1"><i class="fa fa-language mr-1" aria-hidden="true"></i> Language </h5>
								<div class="mg-l-auto pl-2 mt-2 mt-md-0">
									<button type="button" class="btn btn-success" id="add-language">
										<i class="fa fa-plus"></i>
									</button>
								</div>
							</div>
							<div class="languages mb-2">
								@if(!empty($formation->formationLanguages))								
									@foreach($formation->formationLanguages as $item => $language)
									<div class="language" id="{{$item}}">
										<div class="col-sm-12 col-md-12 row">
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label>Language</label>
													<select class="custom-select  @error('language_name') is-invalid @enderror" required id="inputGroupSelectLanguage" name="language_name[]" id="language_name">
														<option selected hidden value="{{$language->languages->id}}">{{$language->languages->name}}</option>
														@foreach ($list_languages as $item => $languages)
														<option value="{{$languages->id}}">{{$languages->name}}</option>
														@endforeach
													</select>
													@error('language_name')
														<small class="text-danger d-block">
														{{ $message }}
														</small>
													@enderror
												</div>
											</div>
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label>Level</label>
													<select class="custom-select @error('language_level') is-invalid @enderror" required id="inputGroupSelectlevelLanguage" name="language_level[]" id="language_level">
														<option selected hidden value="{{$language->levels->id}}">{{$language->levels->level}}</option>
														@foreach ($level_languages as $item => $level_language)
														<option value="{{$level_language->id}}">{{$level_language->level}}</option>
														@endforeach
													</select>
													@error('language_level')
														<small class="text-danger d-block">
														{{ $message }}
														</small>
													@enderror
												</div>
											</div>
											<div class="col-sm-12 col-md-1">
												<div class="form-group">
													<button type="button" class="btn btn-danger form-control inline-block mt-4"  id="btn_romove_language">
														<i class="fa fa-minus"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								@else
									<span>There is no Languages requirement for this Formation</span>
								@endif			
								
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-md-12 mt-2">
						<button type="submit" class="btn btn-primary">
							Update
						</button>
					</div>
				</div> <!-- End Card Body -->
				</form>
			</div> <!-- End Card -->
		</div>
	</div>

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){

		//var item = $(this).closest('#universityEducation').data('item'); 
		$(document).on('click','#btn_romove_language',function(){
            // var row_id = $(this).attr("id");
			var row = $('.language').attr('id');
            // $('#row'+row_id+'').remove();
			// item = $(this).closest('#language').data('item');

			console.log(row);

            
        });
        // ------------------------------- Start Add Education University ------------------------------- //
        var edu_university_id = 1;
        $('#add-education-university').click(function(){
            edu_university_id++;
												console.log('add-education-university Cliekd');
            $('.education-university').append('<div class="row mt-2"  id="row'+edu_university_id+'">'+
                '<div class="col-sm-12 col-md-8">'+
                    '<div class="form-group">'+
                        '<label>Specialty</label>'+
                        '<select class="form-control @error('specialty_university') is-invalid @enderror" name="specialty_university[]" id="specialty_university">'+
                            '<option selected disabled hidden>Select Specialty</option>'+
                            '@foreach ($specialty_universities as $item => $specialty)'+
                            '<option value="{{$specialty->id}}">{{$specialty->name}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '@error('specialty_university')'+
                            '<small class="text-danger d-block">'
                            {{ $message }}
                            '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Level</label>'+
                        '<select class="form-control @error('degree_university') is-invalid @enderror" name="degree_university[]" id="degree_university">'+
                                    '<option selected disabled hidden>Select Degree</option>'+
                                    '@foreach ($degree_universities as $item => $degree)'+
                                    '<option value="{{$degree->id}}">{{$degree->name}}</option>'+
                                    '@endforeach'+
                        '</select>'+
                        '@error('degree_university')'+
                            '<small class="text-danger d-block">'+
                            {{ $message }}
                            '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-1">'+
                    '<div class="form-group pt-1">'+
                        '<button type="button" id="'+edu_university_id+'" class="btn btn-danger form-control  mt-4 inline-block remove_row-education-university" >'+
                            '<i class="fa fa-minus"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+

            '</div>');
        });

        $(document).on('click','.remove_row-education-university',function(){
            var row_id = $(this).attr("id");
            $('#row'+row_id+'').remove();
            
        });
        // ------------------------------- End Add Education University ------------------------------- //

         // ------------------------------- Start Add Education Institute ------------------------------- //
        var edu_institute_id = 1;
        $('#add-education-institute').click(function(){
							
								    
            edu_institute_id++;
            $('.education-institute').append('<div class="row mt-2"  id="row'+edu_institute_id+'">'+
                '<div class="col-sm-12 col-md-8">'+
                    '<div class="form-group">'+
                        '<label>Specialty</label>'+
                        '<input type="text" class="form-control  @error('specialty_institute') is-invalid @enderror" placeholder="Enter speciality" name="specialty_institute[]" id="specialty_institute">'+
                        '@error('specialty_institute')'+
                            '<small class="text-danger d-block">'+
                                {{ $message }}
                            '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Level</label>'+
                        '<select class="form-control @error('degree_institute') is-invalid @enderror" name="degree_institute[]" id="degree_institute">'+
                                    '<option selected disabled hidden>Select Degree</option>'+
                                    '@foreach ($degree_institutes as $item => $degre)'+
                                    '<option value="{{$degre->id}}">{{$degre->name}}</option>'+
                                    '@endforeach'+
                                '</select>'+
                                '@error('degree_institute')'+
                                '<small class="text-danger d-block">'+
                                   {{ $message }}
                                '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-1">'+
                    '<div class="form-group pt-1">'+
                        '<button type="button" id="'+edu_institute_id+'" class="btn btn-danger form-control  mt-4 inline-block remove_row-education-university" >'+
                            '<i class="fa fa-minus"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+

            '</div>');

        });
		// remove-education-university
        $(document).on('click','.remove_row-education-institute',function(){
            var row_id = $(this).attr("id");
            $('#row'+row_id+'').remove();
            
        });

        // ------------------------------- End Add Education Institute ------------------------------- //

        // ------------------------------- Start Add Experiences ------------------------------- //
        var experience_id = 1 ;
        $('#add-experience').click(function(){
            experience_id++ ;
            $('.experiences').append('<div class="row mt-2"  id="row'+experience_id+'">'+
                '<div class="col-sm-12 col-md-8">'+
                    '<div class="form-group">'+
                        '<label>Language</label>'+
                        '<label>Specialty</label>'+
                        '<input type="text" class="form-control mt-1   @error('specialty_experience') is-invalid @enderror" name="specialty_experience[]" id="specialty_experience" placeholder="Enter Your Specialty">'+
                        '@error('specialty_experience')'+
                        '<small class="text-danger d-block">'+
                                   {{ $message }}
                        '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Years Of Experience</label>'+
                        '<select class="form-control mt-1 @error('duration_experience') is-invalid @enderror" id="duration_experience" name="duration_experience[]">'+
                            '<option selected hidden>Choose Duration</option>'+
                            '@foreach ($durationExperiences as $item => $durationExperience)'+
                            '<option value="{{$durationExperience->id}}">{{$durationExperience->duration}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '@error('duration_experience')'+
                        '<small class="text-danger d-block">'+
                                   {{ $message }}
                        '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-1">'+
                    '<div class="form-group pt-1">'+
                        '<button type="button" id="'+experience_id+'" class="btn btn-danger form-control  mt-4 inline-block remove_row-experience" >'+
                            '<i class="fa fa-minus"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+

            '</div>');

        });

        $(document).on('click', '.remove_row-experience', function(){
            var row_id = $(this).attr("id");
            $('#row'+row_id+'').remove();  
        });
        // ------------------------------- Start Add Experiences ------------------------------- //

        // ------------------------------- Start Add Languages ------------------------------- //
        var lang_id = 1 ;
        $('#add-language').click(function(){
            lang_id++ ;
												console.log(lang_id);
            $('.languages').append('<div class="row mt-2"  id="row'+lang_id+'">'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Language</label>'+
                        '<select class="form-control mt-1 @error('language_name') is-invalid @enderror" id="language_name" name="language_name[]">'+
                            '<option selected hidden>Choose Language</option>'+
                            '@foreach ($list_languages as $item => $list_language)'+
                            '<option value="{{$list_language->id}}">{{$list_language->name}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '@error('language_name')'+
                        '<small class="text-danger d-block">'+
                                   {{ $message }}
                        '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Level</label>'+
                        '<select class="form-control mt-1 @error('language_level') is-invalid @enderror" name="language_level[]" id="language_level">'+
                            '<option selected hidden>Choose Level</option>'+
                            '@foreach ($level_languages as $item => $level_language)'+
                            '<option value="{{$level_language->id}}">{{$level_language->level}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '@error('language_level')'+
                        '<small class="text-danger d-block">'+
                                   {{ $message }}
                        '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-1">'+
                    '<div class="form-group pt-1">'+
                        '<button type="button" id="'+lang_id+'" class="btn btn-danger form-control  mt-4 inline-block remove_row-language" >'+
                            '<i class="fa fa-minus"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+

            '</div>');

        });

        $(document).on('click', '.remove_row-language', function(){
            var row_id = $(this).attr("id");
            $('#row'+row_id+'').remove();  
        });
        // ------------------------------- End Add Languages ------------------------------- //


    });

</script>
@endsection