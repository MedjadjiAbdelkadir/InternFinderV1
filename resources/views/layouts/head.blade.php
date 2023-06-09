<!-- Title -->
<title>InternFinder @stack('title')</title>
<!-- Favicon -->
<link rel="icon" href="{{asset('assets/img/brand/Favicon.svg')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">

<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->

{{-- <link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}"> --}}

<link rel="stylesheet" href="{{URL::asset('assets/css/sidemenu.css')}}">
@yield('css')
<!--- Style css -->
{{-- <link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet"> --}}

<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets/css/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets/css/skin-modes.css')}}" rel="stylesheet">


<link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
@if( auth('student')->user() )
<style>
    
    .main-header{
        padding-left: 0;
    }
    .app-content{
        margin-left: 0;
    }
    .mobile-logo img{
        max-height: 50px;

    }

</style>
@endif
