<!-- main-header opened -->
	<div class="main-header sticky side-header nav nav-item">
		<div class="container-fluid">
			<div class="main-header-left ">
				{{-- @if( auth('company')->user() )
				<div class="responsive-logo">
					<a href="{{ route('home') }}">
						<img src="{{URL::asset('assets/img/brand/logo.svg')}}" class="logo-1" alt="logo">
					</a>
					<a href="{{ route('home') }}">
						<img src="{{URL::asset('assets/img/brand/logo-white.svg')}}" class="dark-logo-1" alt="logo">
					</a>
					<a href="{{ route('home') }}">
						<img src="{{URL::asset('assets/img/brand/favicon.svg')}}" class="logo-2" alt="logo">
					</a>
					<a href="{{ route('home') }}">
						<img src="{{URL::asset('assets/img/brand/favicon.svg')}}" class="dark-logo-2" alt="logo">
					</a>
				</div>
				@endif --}}

				@if(!auth('company')->user())
				<div class="nav active">
					<a class="desktop-logo d-sm-none d-md-block logo-light active ml-0" href="{{ url('/') }}">
						<img src="{{URL::asset('assets/img/brand/logo.svg')}}" class="main-logo" alt="logo">
					</a>
					{{-- <a class="desktop-logo d-sm-none d-md-block logo-dark active" href="{{ url('/') }}">
						<img src="{{URL::asset('assets/img/brand/logo-white.svg')}}" class="main-logo dark-theme" alt="logo">
					</a> --}}
					<a class="logo-icon mobile-logo  d-md-none d-sm-block ml-3 icon-light active" href="{{ url('/') }}">
						<img src="{{URL::asset('assets/img/brand/favicon.svg')}}" class="logo-icon " alt="logo">
					</a>
					{{-- <a class="logo-icon mobile-logo  d-md-none d-sm-block  icon-dark active" href="{{ url('/') }}">
						<img src="{{URL::asset('assets/img/brand/favicon-white.svg')}}" class="logo-icon dark-theme" alt="logo">
					</a> --}}
				</div>
				
				@endif
				@if( auth('company')->user() )
				<div class="app-sidebar__toggle" data-toggle="sidebar">
					<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
					<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
				</div>
				@endif

				{{-- <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
					<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
				</div> --}}
			</div>
			<div class="main-header-right">
				<ul class="nav">
					<li class="">
						<div class="dropdown  nav-itemd-none d-md-flex">
							<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
								<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/us_flag.jpg')}}" alt="img"></span>
								<div class="my-auto">
									<strong class="mr-2 ml-2 my-auto">English</strong>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
								<a href="#" class="dropdown-item d-flex ">
									<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/french_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">French</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/germany_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Germany</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/italy_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Italy</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/russia_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Russia</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/spain_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">spain</span>
									</div>
								</a>
							</div>
						</div>
					</li>
					<li class="">
						<div class="dropdown  nav-itemd-none d-md-flex">
							<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
								<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/us_flag.jpg')}}" alt="img"></span>
								<div class="my-auto">
									<strong class="mr-2 ml-2 my-auto">English</strong>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
								<a href="#" class="dropdown-item d-flex ">
									<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/french_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">French</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/germany_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Germany</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/italy_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Italy</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/russia_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Russia</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/spain_flag.jpg')}}" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">spain</span>
									</div>
								</a>
							</div>
						</div>
					</li>
				</ul>
				

				<div class="nav nav-item  navbar-nav-right ml-auto">
					@if (auth('student')->user() || auth('company')->user())
						<div class="nav-link" id="bs-example-navbar-collapse-1">
							<form class="navbar-form" role="search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search">
									<span class="input-group-btn">
										<button type="reset" class="btn btn-default">
											<i class="fas fa-times"></i>
										</button>
										<button type="submit" class="btn btn-default nav-link resp-btn">
											<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
										</button>
									</span>
								</div>
							</form>
						</div>
						<div class="dropdown nav-item main-header-message mt-3">
							<a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" pulse-danger"></span></a>
							<div class="dropdown-menu">
								<div class="menu-header-content bg-primary text-right">
									<div class="d-flex">
										<h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Messages</h6>
										<span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</span>
									</div>
									<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread messages</p>
								</div>
								<div class="main-message-list chat-scroll">
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="  drop-img  cover-image  " data-image-src="{{URL::asset('assets/img/faces/3.jpg')}}">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Petey Cruiser</h5>
											</div>
											<p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
											<p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/2.jpg')}}">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Jimmy Changa</h5>
											</div>
											<p class="mb-0 desc">All set ! Now, time to get to you now......</p>
											<p class="time mb-0 text-left float-right mr-2 mt-2">Mar 06 01:12 AM</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/9.jpg')}}">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Graham Cracker</h5>
											</div>
											<p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
											<p class="time mb-0 text-left float-right mr-2 mt-2">Feb 25 10:35 AM</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/12.jpg')}}">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Donatella Nobatti</h5>
											</div>
											<p class="mb-0 desc">Here are some products ...</p>
											<p class="time mb-0 text-left float-right mr-2 mt-2">Feb 12 05:12 PM</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/5.jpg')}}">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Anne Fibbiyon</h5>
											</div>
											<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
											<p class="time mb-0 text-left float-right mr-2 mt-2">Jan 29 03:16 PM</p>
										</div>
									</a>
								</div>
								<div class="text-center dropdown-footer">
									<a href="text-center">VIEW ALL</a>
								</div>
							</div>
						</div>
						<div class="dropdown nav-item main-header-notification mt-3">
							<a class="new nav-link" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class=" pulse"></span></a>
							<div class="dropdown-menu">
								<div class="menu-header-content bg-primary text-right">
									<div class="d-flex">
										<h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications</h6>
										<span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</span>
									</div>
									<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread Notifications</p>
								</div>
								<div class="main-notification-list Notification-scroll">
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-pink">
											<i class="la la-file-alt text-white"></i>
										</div>
										<div class="mr-3">
											<h5 class="notification-label mb-1">New files available</h5>
											<div class="notification-subtext">10 hour ago</div>
										</div>
										<div class="mr-auto" >
											<i class="las la-angle-left text-left text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3" href="#">
										<div class="notifyimg bg-purple">
											<i class="la la-gem text-white"></i>
										</div>
										<div class="mr-3">
											<h5 class="notification-label mb-1">Updates Available</h5>
											<div class="notification-subtext">2 days ago</div>
										</div>
										<div class="mr-auto" >
											<i class="las la-angle-left text-left text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-success">
											<i class="la la-shopping-basket text-white"></i>
										</div>
										<div class="mr-3">
											<h5 class="notification-label mb-1">New Order Received</h5>
											<div class="notification-subtext">1 hour ago</div>
										</div>
										<div class="mr-auto" >
											<i class="las la-angle-left text-left text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-warning">
											<i class="la la-envelope-open text-white"></i>
										</div>
										<div class="mr-3">
											<h5 class="notification-label mb-1">New review received</h5>
											<div class="notification-subtext">1 day ago</div>
										</div>
										<div class="mr-auto" >
											<i class="las la-angle-left text-left text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-danger">
											<i class="la la-user-check text-white"></i>
										</div>
										<div class="mr-3">
											<h5 class="notification-label mb-1">22 verified registrations</h5>
											<div class="notification-subtext">2 hour ago</div>
										</div>
										<div class="mr-auto" >
											<i class="las la-angle-left text-left text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-primary">
											<i class="la la-check-circle text-white"></i>
										</div>
										<div class="mr-3">
											<h5 class="notification-label mb-1">Project has been approved</h5>
											<div class="notification-subtext">4 hour ago</div>
										</div>
										<div class="mr-auto" >
											<i class="las la-angle-left text-left text-muted"></i>
										</div>
									</a>
								</div>
								<div class="dropdown-footer">
									<a href="">VIEW ALL</a>
								</div>
							</div>
						</div>
						<div class="nav-item full-screen fullscreen-button mt-3">
							<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
						</div>

						<div class="dropdown main-profile-menu nav nav-item nav-link">
							<a class="profile-user d-flex" href="">
								@if(auth('company')->check())
								<img alt="" class="" style="height: 50px; width:60px" src="{{auth('company')->user()->avatar}}" >
								@endif
								@if(auth('student')->check())

								<img alt="" src="{{Avatar::create(auth('student')->user()->first_name .' '.auth('student')->user()->last_name)->toBase64()}}" >
								{{-- <h5 class="bg-danger">{{auth('student')->user()->first_name .' '.auth('student')->user()->last_name}}</h5> --}}
								@endif
							</a>
							<div class="dropdown-menu">
								<div class="main-header-profile bg-primary p-3">
									<div class="d-flex wd-100p">
										@if(auth('company')->check())
										<div class="main-img-user">
											<img alt="" class="" style="height: 50px; width:60px" src="{{auth('company')->user()->avatar}}" >
										</div>
										<div class="mr-3 my-auto">
											<h6>{{auth('company')->user()->name}}</h6>
											<span>{{auth('company')->user()->email}}</span>
										</div>
										@endif
										@if(auth('student')->check())
										{{-- <div class="main-img-user mr-2">
											<img alt="" src="{{Avatar::create(auth('student')->user()->first_name .' '.auth('student')->user()->last_name)->toBase64()}}" >
										</div> --}}
										<div class="mr-3">
											<h6>{{auth('student')->user()->first_name .' '.auth('student')->user()->last_name}}</h6>
											<span>{{auth('student')->user()->email}}</span>
										</div>
										@endif


									</div>
								</div>
								{{-- <a class="dropdown-item" href="{{route('student.index',auth('student')->user()->full_name)}}"><i class="bx bx-cog"></i>Profile</a>
								<a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
								<a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit Profile</a>
								<a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
								<a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
								<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>
								 --}}
								@if(auth('student')->check())

									<a class="dropdown-item" href="">
										<i class="bx bxs-inbox"></i>Apply
									</a>
									<a class="dropdown-item" href="">
										<i class="bx bx-envelope"></i>Messages
									</a>
									<a class="dropdown-item" href="{{route('student.dashboard',auth('student')->user()->full_name)}}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										Dashboard
									</a>
									<a class="dropdown-item" href="{{route('student.index',auth('student')->user()->full_name)}}">
									    <i class="bx bx-cog"></i>Profile
								    </a>
									<a class="dropdown-item" href="{{route('student.settings',auth('student')->user()->full_name)}}">
										<i class="bx bx-slider-alt"></i>Account Settings
									</a>
							    @endif
								@if(auth('company')->check())
								<a class="dropdown-item" href="">
									<i class="bx bxs-inbox"></i>Formations
								</a>
								<a class="dropdown-item" href="">
									<i class="bx bx-envelope"></i>Messages
								</a>
								<a class="dropdown-item" href="">
									<i class="fa fa-th-large" aria-hidden="true"></i>
									Dashboard
								</a>
								<a class="dropdown-item" href="{{route('company.index',auth('company')->user()->name)}}">
									<i class="bx bx-cog"></i>Profile
								</a>
								<a class="dropdown-item" href="{{route('company.settings',auth('company')->user()->name)}}">
									<i class="bx bx-slider-alt"></i>Account Settings
								</a>
								@endif
								<a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out"></i>Logout</a>

							</div>
						</div>
					@endif

					@if(!auth('company')->user() && !auth('student')->user())
						<div class="nav nav-item nav-link">
							<div class="d-inline-block mr-1">
								<a href="{{route('loginForm')}}" class="btn btn-outline-primary bd-2 btn-rounded btn-block">Login</a>
							</div>
							<div class="d-inline-block">
								<a href="{{route('select.form.register')}}" class="btn btn-outline-warning bd-2 btn-rounded  btn-block">Register</a>
							</div>
						</div>
					@endif

				</div>
			</div>
		</div>
	</div>
<!-- /main-header -->
