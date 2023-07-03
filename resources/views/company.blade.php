@extends('layouts.master')
@section('css')

<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

@endsection
@section('content')
                <div class="card mb-3 pb-0 w-100 mt-3">
                    <div class="card-header d-flexmb-0 pb-1">
                        <h4>Informations Of Compnay</h4>
                    </div>
                    <hr>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <img  class="rounded-circle" height="80px" src="{{$company->avatar}}"> 
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <h6 class="">
                                    {{-- substr($company->name,0, 19)  --}}
                                    <i class="fa fa-building mr-1" aria-hidden="true"></i>{{ $company->name }}
                                </h6>
                                <h6 class="">
                                    <i class="fa fa-phone mr-1" aria-hidden="true"></i>{{ $company->phone }}
                                </h6>
                                <h6 class="">
                                    <i class="fa fa-envelope mr-1" aria-hidden="true"></i>{{$company->email}}
                                </h6>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <h6 class="">
                                    <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>{{$company->municipals->states->name.','.$company->municipals->name}}
                                </h6>
                                <h6 class="">
                                    <i class="fa fa-map mr-1" aria-hidden="true"></i>{{$company->address}}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header d-flexmb-0 pb-1">
                        <h4>All Formations Of Compnay</h4>
                    </div>
                    <hr>
                    <div class="card-body pt-0 row">
                        @if($company->formations->count() > 0)
                        @foreach ($company->formations as $formation)        
                        <div class="col-sm-12 col-md-6">
                            <a href="" class="card py-3 text-dark" >
                                <div class="row pl-2">
                                    <div class="col-md-3 col-lg-3">
                                        <img  class="img-fluid rounded-circle"  src="{{$formation->company->avatar}}">
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="">
                                            {{-- <i class="fa fa-building mr-1" aria-hidden="true"></i> --}}
                                            {{ substr($formation->company->name,0, 32) }}
                                        </h4>
                                        <h6 class="">
                                            <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>
                                            {{$formation->municipals->name}} , {{$formation->municipals->states->name}}
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
                            </a> <!-- End Card -->
                        </div>
                        @endforeach
                        @else
                        <span class="text-danger pl-2">This Company Have Not Formations</span>
                        @endif
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