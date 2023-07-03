@extends('layouts.master')
@section('css')

<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

@endsection
@section('content')

<div class="mb-3">
  <div class="header-content text-center pt-5">
      <h1>Search Result</h1>
  </div>
  <div class="main-contnet row">
      @foreach ($formations as $formation)        
          <div class="col-sm-12 col-md-6">
              <a href="{{route('formation',$formation->id)}}" class="card py-3 text-dark" >
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