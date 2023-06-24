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
@push('title')| Company Dashboard @endpush
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

@section('css')

@endsection

@section('page-header')
<div class="card mt-3">
    <div class="card-header bg-transparent  pd-t-20 ">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mb-0">Dashborad</h4>
        </div>
    </div>
</div>
@endsection
@section('content')


                <div class="card">
                    <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title text-capitalize mb-0">Internships</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="row row-sm">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.formations',['name'=>auth('company')->user()->name]) }}" class="card overflow-hidden sales-card bg-primary-gradient">
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
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.formations.status',['name'=>auth('company')->user()->name , 'status'=>'open']) }}" class="card overflow-hidden sales-card bg-secondary-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Open Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$openFormations}}</h4>
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
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.formations.status',['name'=>auth('company')->user()->name , 'status'=>'started']) }}"  class="card overflow-hidden sales-card bg-warning-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Start Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$currentFormations}}</h4>
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

                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.formations.status',['name'=>auth('company')->user()->name , 'status'=>'closed']) }}"  class="card overflow-hidden sales-card bg-danger-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Close Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$closeFormations}}</h4>
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
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.formations.status',['name'=>auth('company')->user()->name , 'status'=>'finished']) }}" class="card overflow-hidden sales-card bg-success-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Finshed Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$finishedFormations}}</h4>
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
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title text-capitalize mb-0 ">Applies</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="row row-sm">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.applies',['name'=>auth('company')->user()->name]) }}" class="card overflow-hidden sales-card bg-primary-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">All Applies</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$allApplies}}</h4>
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
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.applies.status',['name'=>auth('company')->user()->name ,'status'=>'registered']) }}" class="card overflow-hidden sales-card bg-secondary-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Registed Applies</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$registeredApplies}}</h4>
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
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.applies.status',['name'=>auth('company')->user()->name ,'status'=>'readay']) }}"  class="card overflow-hidden sales-card bg-warning-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Internship Being Processed</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$readyApplies}}</h4>
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
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.applies.status',['name'=>auth('company')->user()->name ,'status'=>'rejected']) }}"  class="card overflow-hidden sales-card bg-danger-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Rejected Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$rejectedApplies}}</h4>
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
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl">
                                <a href="{{ route('company.dashboard.applies.status',['name'=>auth('company')->user()->name ,'status'=>'acceptable']) }}" class="card overflow-hidden sales-card bg-success-gradient">
                                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                        <div class="">
                                            <h6 class="mb-3 tx-12 text-white">Accepted Internships</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <div class="">
                                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$acceptApplies}}</h4>
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
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
					<div class="col-sm-12 col-md-5 col-lg-5">
                        <div class="card">
                            {{-- <div class="card-header pb-1">
                                <h3 class="card-title mb-2">Top 5 Trainees </h3>
                                <p class="tx-12 mb-0 text-muted">List of the best trainers who have undergone training in our Company</p>
                            </div> --}}
                            <div class="card-header bg-transparent pd-b-0 bd-b-0">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title text-capitalize">Top Trainees</h4>
                                    <a href="" class="btn btn-sm btn-outline-primary">Show All Trainees</a>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body p-0 customers mt-1">
                                <div class="list-group list-lg-group list-group-flush">
                                    <div class="list-group-item list-group-item-action" href="#">
                                        <div class="d-flex justify-content-between">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle ml-3 mr-3 my-auto" src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Image description">
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <h5 class="mb-1 tx-15">Lahcene Medjadji</h5>
                                                            <p class="mb-0 tx-13 text-muted">Male</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <h4 class="mr-5 mt-2">17/20</h4>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action" href="#">
                                        <div class="d-flex justify-content-between">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle ml-3 mr-3 my-auto" src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Image description">
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <h5 class="mb-1 tx-15">Meziane Khalil</h5>
                                                            <p class="mb-0 tx-13 text-muted">Male</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <h4 class="mr-5 mt-2">16/20</h4>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action" href="#">
                                        <div class="d-flex justify-content-between">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle ml-3 mr-3 my-auto" src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Image description">
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <h5 class="mb-1 tx-15">Salah Eddine</h5>
                                                            <p class="mb-0 tx-13 text-muted">Male</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <h4 class="mr-5 mt-2">15/20</h4>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action" href="#">
                                        <div class="d-flex justify-content-between">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle ml-3 mr-3 my-auto" src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Image description">
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <h5 class="mb-1 tx-15">Mourad Lazri</h5>
                                                            <p class="mb-0 tx-13 text-muted">Male</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <h4 class="mr-5 mt-2">14.25/20</h4>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action" href="#">
                                        <div class="d-flex justify-content-between">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle ml-3 mr-3 my-auto" src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Image description">
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <h5 class="mb-1 tx-15">Kourdoughli Othmane</h5>
                                                            <p class="mb-0 tx-13 text-muted">Male</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <h4 class="mr-5 mt-2">13/20</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7 col-lg-7">
                        <div class="card">
                            <div class="card-header bg-transparent pd-b-0 bd-b-0">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title text-capitalize">Top Internshtips</h4>
                                    <a href="" class="btn btn-sm btn-outline-primary">Show All Internshtips </a>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="table-responsive country-table">
                                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="wd-lg-90p text-capitalize">Formation Name</th>
                                                <th class="wd-lg-10p tx-right text-capitalize">Permanence</th>
                                                <th class="text-capitalize">Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Predefined button styles, each serving its own this</td>
                                                <td class="">Full Time</td>
                                                <td class="text-success">17</td>
                                            </tr>
                                            <tr>
                                                <td>Predefined button styles, each serving its own this</td>
                                                <td class="">Full Time</td>
                                                <td class="text-success">17</td>
                                            </tr>
                                            <tr>
                                                <td>Predefined button styles, each serving its own this</td>
                                                <td class="">Full Time</td>
                                                <td class="text-success">17</td>
                                            </tr>
                                            <tr>
                                                <td>Predefined button styles, each serving its own this</td>
                                                <td class="">Full Time</td>
                                                <td class="text-success">17</td>
                                            </tr>
                                            <tr>
                                                <td>Predefined button styles, each serving its own this</td>
                                                <td class="">Full Time</td>
                                                <td class="text-success">17</td>
                                            </tr>
                                            <tr>
                                                <td>Predefined button styles, each serving its own this</td>
                                                <td class="">Full Time</td>
                                                <td class="text-success">17</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




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