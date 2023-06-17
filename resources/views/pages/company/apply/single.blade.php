@extends('layouts.master')
@push('title')| Student Profile @endpush

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

<!-- Start Modal Processing Of apply -->
<div class="modal" id="modal-processing-apply">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <form method="post" action="{{route('company.formations.apply.update', ['name'=>auth('company')->user()->name, 'formation'=> $applicant->formation_id ,'apply'=>$applicant->id])}}" id="updateStatus">
                @csrf               
                @method('PUT')
                <input type="hidden" value="2" class="form-control" id="status" name="status" />
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button> 
                    <i class="fa fa-hourglass-half fa-3x bd bd-4 pd-x-20 pd-y-12 bd-warning rounded-circle tx-warning mg-t-20" aria-hidden="true"></i>
                    {{-- <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i> --}}
                    <h4 class="tx-warning mg-b-20 mt-2">Processing !</h4>
                    <p class="mg-b-20 mg-x-20">Are you sure to put this request into Being processed for this student to join the Formation ?</p>
                    <button class="btn ripple btn-warning pd-x-25" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Processing Of apply -->


<!-- Start Modal Accept Of apply -->
<div class="modal" id="modal-accept-apply">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <form method="post" action="{{route('company.formations.apply.update', ['name'=>auth('company')->user()->name, 'formation'=> $applicant->formation_id ,'apply'=>$applicant->id])}}" id="updateStatus">
                @csrf               
                @method('PUT')
                <input type="hidden" value="4" class="form-control" id="status" name="status" />
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon ion-ios-checkmark-circle-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-success tx-semibold mg-b-20">Accept !</h4>
                    <p class="mg-b-20 mg-x-20">Are you sure to accept this student to be a member of the Formation ?</p>
                    <button class="btn ripple btn-success pd-x-25" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Accept Of apply -->

<!-- Start Modal Refused Of apply -->
<div class="modal" id="modal-refused-apply">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <form method="post" action="{{route('company.formations.apply.update', ['name'=>auth('company')->user()->name, 'formation'=> $applicant->formation_id ,'apply'=>$applicant->id])}}" id="updateStatus">
                @csrf               
                @method('PUT')
                <input type="hidden" value="3" class="form-control" id="status" name="status" />
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close " data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button> 
                    <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger mg-b-20">Refused !</h4>
                    <p class="mg-b-20 mg-x-20">Are you sure to decline this student's request to join the Formation ?</p>
                    <button class="btn ripple btn-danger pd-x-25" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Refused Of apply -->
@endsection
@section('page-header')

@endsection

@section('content')

            <div class="card mb-3 pb-0 w-100 mt-2">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="content-title mb-0 my-auto">Student Profile</h4>

                        <div class="mg-l-auto pl-2 mt-2 mt-md-0">

                            @if( $applicant->status == 1) 
                                <a href="" class="btn btn-success"
                                    data-toggle="modal" data-target="#modal-accept-apply"
                                >Accept</a>	
                                <a href="" class="btn btn-warning"
                                    data-toggle="modal" data-target="#modal-processing-apply"
                                >Processing</a>                    
                                <a href="" class="btn btn-danger"
                                    data-toggle="modal" data-target="#modal-refused-apply"
                                >Refused</a>
                            @elseif( $applicant->status == 2) 
                                <a href="" class="btn btn-success"
                                    data-toggle="modal" data-target="#modal-accept-apply"
                                >Accept</a>	                  
                                <a href="" class="btn btn-danger"
                                    data-toggle="modal" data-target="#modal-refused-apply"
                                >Refused</a>
                            @elseif( $applicant->status == 3) 
                                <h5 class="text-danger">This student has been rejected</h5>
                            @elseif( $applicant->status == 4) 
                                <h5 class="text-success">This student Has Been Accepted</h5>
                            @endif
    
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0 px-0">
                    <hr>
                    <div class="general-information mb-3 px-4">
                        <h5 class="h4 mb-3"><i class="fa fa-id-card mr-1" aria-hidden="true"></i> Profile </h5>
                        <div class="pl-3 row">
                            <div class="col-md-2 col-lg-2 d-none d-md-block">
                                {{-- <img src="{{Avatar::create($applicant->students->last_name.' '.$applicant->students->first_name)->toBase64()}}" class="img-fluid rounded-circle"> --}}
                                <img src="{{asset('assets/images/image-profile-default.png')}}" class="img-fluid rounded-circle">
                            </div>

                            <div class="col-sm-12 col-md-10">
                                <div class="main-content ml-0 pl-2">  
                                    <h3 class="title text-primary">{{$applicant->students->last_name.' '.$applicant->students->first_name}}</h3>
                                    <h6 class="">
                                        <i class="fa fa-envelope-o mr-1" aria-hidden="true"></i> {{ $applicant->students->email }} 
                                    </h6>
                                    <h6 class="">
                                        <i class="fa fa-phone mr-1" aria-hidden="true"></i> {{ $applicant->students->phone }} 
                                    </h6>
                                    <h6 class="">
                                        <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>
                                        {{$applicant->students->municipals->name}}, {{$applicant->students->municipals->states->name}}
                                    </h6>

                                    <h6 class="">
                                        <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i> {{ $applicant->students->dateBirth->format('d M Y') }} 
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="education-section mb-1 px-4">
                        <h5 class="h4"><i class="fa fa-graduation-cap mr-1" aria-hidden="true"></i> Education </h5>
                        <div class="pl-3">
                            @if(!empty($applicant->students->universityEducations))
                                @foreach($applicant->students->universityEducations as $universityEducation)
                                    <div class="d-flex">
                                        <h5 class="h4 mt-1">{{$universityEducation->degreeUniversities->name}} {{$universityEducation->specialty->name}},</h5>
                                        <div class="mg-l-auto">
                                            {{$universityEducation->start->format('d M Y')}} - {{$universityEducation->end->format('d M Y')}}
                                        </div>
                                    </div>
                                    <h6 class="h5"><i class="fa fa-university mr-1" aria-hidden="true"></i>{{$universityEducation->university->name}}</h6>
                                    <p>
                                        {{$universityEducation->description}}
                                    </p>
                                @endforeach
                            @endif
                            @if(!empty($applicant->students->instituteEducations))
                                @foreach($applicant->students->instituteEducations as $instituteEducation)
                                    <div class="d-flex">
                                        <h5 class="h4 mt-1">{{$instituteEducation->degreeInstitutes->name}} {{$instituteEducation->specialty}},</h5>
                                        <div class="mg-l-auto">
                                            {{$instituteEducation->start->format('d M Y')}} - {{$instituteEducation->end->format('d M Y')}}
                                        </div>
                                    </div>
                                    <h6 class="h5"><i class="fa fa-university mr-1" aria-hidden="true"></i>{{$instituteEducation->name}}</h6>
                                    <p>
                                        {{$instituteEducation->description}}
                                    </p>
                                @endforeach
                            @endif 
                        </div>
                    </div>
                    <hr>
                    <div class="experience-section mb-1 px-4">
                        <h5 class="h4"><i class="fa fa-briefcase mr-1" aria-hidden="true"></i> Experience </h5>
                        <div class="pl-3">
                            @if(!empty($applicant->students->experiences))
                                @foreach($applicant->students->experiences as $experience)
                                    <div class="d-flex">
                                        <h5 class="h4 mt-1">{{$experience->jobs->name}} ,{{$experience->specialty}}</h5>
                                        <div class="mg-l-auto">
                                            {{$experience->durations->duration}}
                                        </div>
                                    </div>
                                    <h6 class="h5"><i class="fa fa-university mr-1" aria-hidden="true"></i>{{$experience->company}}</h6>
                                    <p>
                                        {{$experience->description}}
                                    </p>
                                @endforeach
                            @endif
                        </div>
                        

                    </div>
                    <hr>
                    <div class="languages-section mb-1 px-4">
                        <h5 class="h4"><i class="fa fa-language mr-1" aria-hidden="true"></i> Languages </h5>
                        <div class="pl-3">
                            @if(!empty($applicant->students->languages))
                                @foreach($applicant->students->languages as $language)
                                    <h6 class="h6 mt-1">{{$language->languages->name}} - {{$language->levels->level}} </h6>
                                @endforeach
                            @endif
                        </div>
                    </div>

                
                </div>
            </div>   <!-- End Card -->
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

    $(document).ready(function () {

    });
</script>
@endsection