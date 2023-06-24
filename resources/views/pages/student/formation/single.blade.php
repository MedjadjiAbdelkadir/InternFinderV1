@extends('layouts.master')
@push('title')| Formaton @endpush
{{-- @include('pages.student.formation.cancel') --}}
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
@endsection

@section('modals')
<!-- Start Modal Cancel Join Formation -->
<div class="modal" id="cancel-join-formation">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <form method="post" id="cancelFormationForm">
                @csrf               
                @method('DELETE')
                <input type="hidden" value="3" class="form-control" id="status" name="status" />
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close " data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button> 
                    <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger mg-b-20">Cancel !</h4>
                    <p class="mg-b-20 mg-x-20">Are you sure you want to Cancel Join this formation</p>
                    <button class="btn ripple btn-danger pd-x-25" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Cancel Join Formation -->
@endsection
@section('page-header')

@endsection

@section('content')

            <div class="card mb-3 pb-0 w-100 mt-2">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="content-title mb-0 my-auto">Information</h4>
                        <div class="mg-l-auto">
                            <a type="button" class="btn btn-danger text-white px-2" id="btn_cancel_formation"
                                data-toggle="modal" data-target="#cancel-join-formation"
                                data-bs-url="{{ route('student.formations.destroy', ['name'=>auth('student')->user()->full_name ,'formation'=>$formation->id]) }}"
                            >
                            {{-- <i class="fa fa-trash-o mr-1" aria-hidden="true"></i> --}}
                            Cancel the joining request
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body row mb-0 pb-0">
                    <div class="col-sm-12 col-md-12 pb-0 mb-0">
                        <div class="general-information">
                            <div class="row">
                                <div class="col-md-2 col-lg-2 d-none d-md-block">
                                    <img src="{{$formation->company->avatar}}" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-sm-12 col-md-10">
                                    <div class="header-content">  
                                        <h3 class="title text-primary">{{$formation->title}}</h3>
                                        <h6 class="">
                                            <i class="fa fa-envelope-o mr-1" aria-hidden="true"></i>{{$formation->company->email}}
                                        </h6>
                                        <h6 class="">
                                            <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>{{$formation->municipals->name}}, {{$formation->municipals->states->name}}
                                        </h6>
                                        <h6 class="">
                                            <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i> {{ date('d M Y',strtotime($formation->start)) }} To {{ date('d M Y',strtotime($formation->end)) }}  
                                        </h6>
                                        <h6 class="">
                                            <i class="fa fa-users mr-1" aria-hidden="true"></i> {{$formation->nbr_place}}  Places
                                        </h6>
                                        <h6>
                                            <i class="fa fa-clock mr-1"></i> {{$formation->permanence == 1 ? 'Full Time' : 'Part Time' }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-12 mt-1">
                                    <div class="form-group">
                                        <h6 class="h5">Description</h6>
                                        <p>{{$formation->description}}</p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 mt-0 pt-0">
                        <div class="education-section mb-1">
                                <h5 class="h4">Education </h5>
                                @foreach($formation->formationUniversityEducations as $universityEducations)
                                <p class="m-0 pl-2">{{$universityEducations->degreeUniversities->name}} - {{$universityEducations->specialty->name}}</p>
                                @endforeach
                                @foreach($formation->formationInstituteEducations as $instituteEducations)
                                <p class="m-0 pl-2">{{$instituteEducations->degreeInstitutes->name}} - {{$instituteEducations->name}}</p> 
                                @endforeach
                        </div>
                        <div class="experience-section">
                            <h5 class="h4">Experience</h5>
                            @foreach($formation->formationExperiences as $experience)							
                                <p class="m-0 pl-2">{{$experience->durations->duration}} - {{$experience->specialty}}</p>
                            @endforeach
                        </div>
                        <div classs="languages-section mb-2">
                            <h5 class="h4">Language</h5>
                            @foreach($formation->formationLanguages as $language)
                            <p class="m-0 pl-2">{{$language->languages->name}} : {{$language->levels->level}}</p>
                            @endforeach			
                        </div>
                    </div>

                </div>

            </div> <!-- End Card -->
        </div>
    </div>

@endsection
@section('js')
<script>
	$(document).ready(function() {
		$(document).on('click', '#btn_cancel_formation', function(event){
			console.log('Cliked Btn Remove Formations')
			var url = $(this).data('bs-url');
			console.log(url);
			$('#cancelFormationForm').attr('action', url);
		});
	});
</script>
@endsection