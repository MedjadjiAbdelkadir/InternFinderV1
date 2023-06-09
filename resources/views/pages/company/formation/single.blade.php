@extends('layouts.master')
@push('title')| Formaton @endpush

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
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
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Formation</h4>
                {{-- <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Products</span> --}}
            </div>
        </div>
        <!--
        <div class="d-flex my-xl-auto right-content">
  
            <div class="mb-3 mb-xl-0 btn btn-primary">
                Edit
                {{-- <i class="fa fa-pencil fa-2x"></i> --}}
            </div>
        </div>
        -->
    </div>
@endsection

@section('content')

            <div class="card mb-3 pb-0 w-100 mt-1">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="h4 mt-2">General Information</h5>
                        <div class="mg-l-auto">
                            <a class=" btn btn-primary" 
                                href="{{route('company.formations.edit', ['name'=>auth('company')->user()->name , 'formation'=>$formation])}}"
                            >Edit
                            {{-- <i class="fa fa-pencil" aria-hidden="true"></i> --}}
                            </a>
                            {{-- <a class=" btn btn-danger" 
                                href="{{route('company.formations.destroy', ['name'=>auth('company')->user()->name , 'formation'=>$formation])}}"
                            >Delete</a> --}}
                            <a type="button" class="btn btn-danger" id="modal-remove"
                                data-toggle="modal" data-target="#modal-remove"
                                data-bs-item="Formation"
                                data-bs-title="Delete Formation"
                                data-bs-url="{{ route('company.formations.destroy', ['name'=>auth('company')->user()->name ,'formation'=>$formation->id]) }}"
                            >
                            Delete
                            {{-- <i class="fa fa-trash-o" aria-hidden="true"></i> --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body row mb-0 pb-0">
                    <div class="col-sm-12 col-md-12 pb-0 mb-0">
                        <div class="general-information">
                            <div class="row">
                                <div class="col-md-2 col-lg-2 d-none d-md-block">
                                    <img src="{{Avatar::create($formation->company->name)->toBase64()}}" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-sm-12 col-md-10">
                                    <div class="header-content">  
                                        <h3 class="title text-primary">{{$formation->title}}</h3>
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
    </div><!-- Container closed -->

@endsection
@section('js')
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