{{-- {{$allFormations}}
<br>
{{$registeredFormations}}
<br>
{{$acceptFormations}}
<br>
{{$readyFormations}}
<br>
{{$rejectedFormations}} --}}
@extends('layouts.master')
@push('title')| Student Dashboard @endpush
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

@section('css')

@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Student</h4>
			<span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Dashborad</span>
		</div>
	</div>
</div>
@endsection
@section('content')


                <div class="card">
                    <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-0">Formations</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-sm">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href="{{ route('student.formations.index',['name'=>auth('student')->user()->full_name]) }}" class="card overflow-hidden sales-card bg-primary-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">All Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$allFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7"> +4</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href="{{route('student.formation.index',['name'=>auth('student')->user()->full_name , 'status'=>'registered'])}}" class="card overflow-hidden sales-card bg-warning">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Registered Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$registeredFormations }}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7"> +3</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href="{{route('student.formation.index',['name'=>auth('student')->user()->full_name , 'status'=>'acceptable'])}}" class="card overflow-hidden sales-card bg-success-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Accepted Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$acceptFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7"> +3</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href="{{route('student.formation.index',['name'=>auth('student')->user()->full_name , 'status'=>'rejected'])}}"  class="card overflow-hidden sales-card bg-danger-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Rejected Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$rejectedFormations}} </h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7">+6</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href="{{route('student.formation.index',['name'=>auth('student')->user()->full_name , 'status'=>'readay'])}}"  class="card overflow-hidden sales-card bg-warning-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Internship Being Processed</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$readyFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7">+3</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href=""  class="card overflow-hidden sales-card bg-purple-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Current Internship</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$currentFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7">+2</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href=""  class="card overflow-hidden sales-card bg-info-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Finished Internship</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$finishedFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7">+3</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="card">
                    <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-0">Evaluations</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-sm">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href="" class="card overflow-hidden sales-card bg-primary-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">All Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$allFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7"> +4</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href="" class="card overflow-hidden sales-card bg-success-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Accepted Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$acceptFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7"> +3</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href=""  class="card overflow-hidden sales-card bg-danger-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Rejected Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$rejectedFormations}} </h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7">+6</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href=""  class="card overflow-hidden sales-card bg-warning-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Internship Being Processed</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$readyFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7">+3</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href=""  class="card overflow-hidden sales-card bg-purple-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Current Internship</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$currentFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7">+2</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <a href=""  class="card overflow-hidden sales-card bg-info-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Finished Internship</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$finishedFormations}}</h4>
                                                    <p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
                                                </div>
                                                <span class="float-right my-auto mr-auto">
                                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                                    <span class="text-white op-7">+3</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}

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