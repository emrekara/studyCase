<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Etiya StudyCase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/toastr/toastr.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/admin.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('css')
</head>
<body data-sidebar="dark" data-csrf="{{csrf_token()}}">
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <div class="navbar-brand-box">
                    <a href="{{route('admin.dashboard.index')}}" class="logo logo-dark" title="Study Case">
                        <span class="logo-sm">
                            <img src="{{asset('images/favicon.png')}}">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('images/logo.svg')}}">
                        </span>
                    </a>
                    <a href="{{route('admin.dashboard.index')}}" class="logo logo-light" title="Study Case">
                        <span class="logo-sm">
                            <img src="{{asset('images/favicon.png')}}">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('images/logo.svg')}}">
                        </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
            <div class="d-flex">
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-xl-inline-block ml-1">{{auth('admin')->user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('admin.logout')}}"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="{{route('admin.dashboard.index')}}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.currencies_api.index')}}" class="waves-effect">
                            <i class="bx bx-pin"></i>
                            <span>Currencies Api</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.currencies_logs.index')}}" class="waves-effect">
                            <i class="bx bx-history"></i>
                            <span>Currencies Logs</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">
                                <a href="{{route('admin.currencies_api.index')}}">{{$page_title}}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JAVASCRIPT -->
<script src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

@yield('js')
</body>
</html>
