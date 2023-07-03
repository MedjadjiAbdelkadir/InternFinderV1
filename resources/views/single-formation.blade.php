@extends('layouts.master')
@section('css')

<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

@endsection
@section('content')
<!-- Start Modal Confirm Your Apply -->
<div class="modal fade" id="modal-confirm-apply" tabindex="-1" data-backdrop="static" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Confirm Your Apply</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('apply.store') }}">
               @method('POST')
               @csrf
               <input type="text" hidden name="formation_id" id="formation_id" value="{{$formation->id}}" />
                <div class="modal-body">
                   <p id="contnet-model">Are you sure to register for this Formation?</p>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Yes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Confirm Your Apply -->

   

   <div class="card mb-3 pb-0 w-100 mt-2">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            <h4 class="content-title mb-0 my-auto">Information</h4>
            <div class="mg-l-auto">
                <a type="button" class=" btn btn-primary btn-success text-white" 
                    id="modal-create" data-toggle="modal" data-target="#modal-confirm-apply"
                >Apply Now</a> 
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
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>


@endsection