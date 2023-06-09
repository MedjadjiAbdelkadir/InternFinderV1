<!-- main-sidebar -->
		{{-- <div class="app-sidebar__overlay" data-toggle="sidebar"></div> --}}
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{route('home')}}">
					<img src="{{URL::asset('assets/img/brand/logo.svg')}}" class="main-logo" alt="logo">
				</a>
				<a class="desktop-logo logo-dark active" href="{{route('home')}}">
					<img src="{{URL::asset('assets/img/brand/logo-white.svg')}}" class="main-logo dark-theme" alt="logo">
				</a>
				<a class="logo-icon mobile-logo icon-light active" href="{{route('home')}}">
					<img src="{{URL::asset('assets/img/brand/favicon.svg')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{route('home')}}">
					<img src="{{URL::asset('assets/img/brand/favicon-white.svg')}}" class="logo-icon dark-theme" alt="logo">
				</a>
			</div>
			<div class="main-sidemenu">
				{{-- <div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">Petey Cruiser</h4>
							<span class="mb-0 text-muted">Premium Member</span>
						</div>
					</div>
				</div> --}}
				<ul class="side-menu">
					<li class="side-item side-item-category">Dashboard</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ route('home') }}">
							<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg>
							<span class="side-menu__label">Index</span>
						</a>
					</li>
					<li class="side-item side-item-category">Formations</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<i class="fa fa-bullhorn fa-2x mr-1  side-menu__icon mb-auto" aria-hidden="true"></i>
							<span class="side-menu__label mr-2">Formations</span></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('company.formations.index',auth('company')->user()->name) }}">All Formarions</a></li>
							<li><a class="slide-item" href="{{ route('company.formations.create',auth('company')->user()->name) }}">Create Formation</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='chart-flot') }}">Reserved Formation</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">Closed Registration Formation</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='chart-echart') }}">Suspended Formation</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='chart-sparkline') }}">Ending Formation</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='chart-peity') }}">Current Formation</a></li>
						</ul>
					</li>
					

				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
