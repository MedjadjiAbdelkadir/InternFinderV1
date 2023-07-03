@extends('layouts.master')
@section('css')
<style>
  .header-section {
    color: #0b409c;
    padding-top: 100px;
	padding-bottom: 150px
  }
  .header-section .header-title h1{
	padding-top: 40px;
	padding-bottom: 20px;
    text-align: center;
    font-size: 50px;
    font-weight: 600;
  }
  .header-section .header-title p{
    text-align: center;
    font-size: 20px;
    font-weight: 600;
  }

  .headheader-sectioner .header-body .title, 
  .header-section .header-body .place{
    position: relative;
  }
  .header-section .header-body input{
    text-indent: 35px;
	height: 50px;
  }
  .header-section .header-body i{
	position: absolute;
	top: 8px;
	left: 20px;
	color: #aaaaaa;
  }
  .header-section .header-body button{
	padding: 12px 4px;
  }
  .header-section .header-body .title i{
	left: 30px;
  }
  .header-section .header-footer{
    padding-top: 20px;
    text-align: center;
  }
</style>
<!-- Maps css -->
<!-- Maps css -->
<!-- Maps css -->
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

@endsection
@section('content')

                @include('includes.sections.header')
				@include('includes.sections.companies')
				@include('includes.sections.formations')
				@include('includes.sections.faqs')
				@include('includes.sections.contact')
				
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