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
				<!-- row -->
				{{-- <div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">TODAY ORDERS</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">$5,74.12</h4>
											<p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> +427</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">TODAY EARNINGS</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">$1,230.17</h4>
											<p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -23.09%</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">TOTAL EARNINGS</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">$7,125.70</h4>
											<p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> 52.09%</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">PRODUCT SOLD</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">$4,820.50</h4>
											<p class="mb-0 tx-12 text-white op-7">Compared to last Month</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -152.3</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
				</div> --}}

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
											<h4 class="tx-20 font-weight-bold mb-1 text-white">12</h4>
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
											<h4 class="tx-20 font-weight-bold mb-1 text-white">7</h4>
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
											<h4 class="tx-20 font-weight-bold mb-1 text-white">15</h4>
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
											<h4 class="tx-20 font-weight-bold mb-1 text-white">12</h4>
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
											<h4 class="tx-20 font-weight-bold mb-1 text-white">9</h4>
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
											<h4 class="tx-20 font-weight-bold mb-1 text-white">5</h4>
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
				<!-- row closed -->


				<!-- row opened -->
				<div class="row row-sm">

					<div class="col-xl-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header pb-1">
								<h3 class="card-title mb-2">Sales Activity</h3>
								<p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
							</div>
							<div class="product-timeline card-body pt-2 mt-1">
								<ul class="timeline-1 mb-0">
									<li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#" class="float-left tx-11 text-muted">3 days ago</a>
										<p class="mb-0 text-muted tx-12">1.3k New Products</p>
									</li>
									<li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#" class="float-left tx-11 text-muted">35 mins ago</a>
										<p class="mb-0 text-muted tx-12">1k New Sales</p>
									</li>
									<li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#" class="float-left tx-11 text-muted">50 mins ago</a>
										<p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
									</li>
									<li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#" class="float-left tx-11 text-muted">1 hour ago</a>
										<p class="mb-0 text-muted tx-12">3k New profit</p>
									</li>
									<li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
										<p class="mb-0 text-muted tx-12">15% increased</p>
									</li>
									<li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
										<p class="mb-0 text-muted tx-12">1.5k reviews</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- row close -->

				<!-- row opened -->
				<div class="row row-sm row-deck">
					<div class="col-md-12 col-lg-12 col-xl-12">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">Your Most Recent Earnings</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">Date</th>
											<th class="wd-lg-25p tx-right">Sales Count</th>
											<th class="wd-lg-25p tx-right">Earnings</th>
											<th class="wd-lg-25p tx-right">Tax Witheld</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>05 Dec 2019</td>
											<td class="tx-right tx-medium tx-inverse">34</td>
											<td class="tx-right tx-medium tx-inverse">$658.20</td>
											<td class="tx-right tx-medium tx-danger">-$45.10</td>
										</tr>
										<tr>
											<td>06 Dec 2019</td>
											<td class="tx-right tx-medium tx-inverse">26</td>
											<td class="tx-right tx-medium tx-inverse">$453.25</td>
											<td class="tx-right tx-medium tx-danger">-$15.02</td>
										</tr>
										<tr>
											<td>07 Dec 2019</td>
											<td class="tx-right tx-medium tx-inverse">34</td>
											<td class="tx-right tx-medium tx-inverse">$653.12</td>
											<td class="tx-right tx-medium tx-danger">-$13.45</td>
										</tr>
										<tr>
											<td>08 Dec 2019</td>
											<td class="tx-right tx-medium tx-inverse">45</td>
											<td class="tx-right tx-medium tx-inverse">$546.47</td>
											<td class="tx-right tx-medium tx-danger">-$24.22</td>
										</tr>
										<tr>
											<td>09 Dec 2019</td>
											<td class="tx-right tx-medium tx-inverse">31</td>
											<td class="tx-right tx-medium tx-inverse">$425.72</td>
											<td class="tx-right tx-medium tx-danger">-$25.01</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
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