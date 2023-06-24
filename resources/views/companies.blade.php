@extends('layouts.master')
@section('css')

<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

@endsection
@section('content')
                <div class="mb-3">
                    <div class="header-content text-center pt-5">
                        <h1>All Companies</h1>
                    </div>
                    <div class="main-contnet row">
                        @foreach ($companies as $company)        
                        <div class="col-sm-12 col-md-4">
                            <a href="" class="card py-3 text-dark">
                                <div class="row pl-2">
                                    <div class="col-md-3 col-lg-3">
                                        <img  class="rounded-circle" height="80px" src="{{$company->avatar}}">
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="">
                                            {{-- substr($company->name,0, 19)  --}}
                                            <i class="fa fa-building mr-1" aria-hidden="true"></i>{{ $company->name }}
                                        </h6>
                                        <h6 class="">
                                            <i class="fa fa-phone mr-1" aria-hidden="true"></i>{{ $company->phone }}
                                        </h6>
                                        <h6 class="">
                                            <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>{{$company->municipals->states->name.' '.$company->municipals->name}}
                                        </h6>
                                    </div>
                                </div>
                            </a> <!-- End Card -->
                        </div>
                    @endforeach
                    </div>
                    <div class="header-contnet">
                        @if(isset($formations))
                            {!! $formations->appends(['sort' => 'votes'])->links() !!}
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