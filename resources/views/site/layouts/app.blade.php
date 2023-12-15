<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('admin-panel/assets/images/logo/apple-touch-icon.html') }}">
    <link rel="shortcut icon" href="{{ asset('admin-panel/assets/images/logo/favicon.png') }}">

    <!-- core dependcies css -->
    <link rel="stylesheet" href="{{ asset('admin-panel/assets/vendor/bootstrap/dist/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-panel/assets/vendor/PACE/themes/blue/pace-theme-minimal.css') }}"/>

    <!-- page css -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- core css -->
    <link href="{{ asset('admin-panel/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-panel/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-panel/assets/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-panel/assets/css/animate.min.css') }}" rel="stylesheet">

    @stack('css')
    <link href="{{ asset('admin-panel/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-panel/css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="app header-success-gradient">
    <div class="layout">
        <!-- Header START -->
        <div class="header navbar">
            <div class="header-container">
                <div class="nav-logo">
                    <a href="{{url('admin')}}">
                        <div class="logo logo-dark"
                             style="background-image: url({{ asset('admin-panel/assets/images/logo/logo.png')}})"></div>
                    </a>
                </div>
                <ul class="nav-left">
                    <li>
                        <a class="sidenav-fold-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-menu"></i>
                        </a>
                        <a class="sidenav-expand-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="user-profile dropdown dropdown-animated scale-left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="profile-img img-fluid"
                                 src="" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-md p-v-0">
                            <li>
                                <ul class="list-media">
                                    <li class="list-item p-15">
                                        <div class="media-img">
                                            <img src="" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title text-semibold"></span>
                                            <span class="sub-title"></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{url('logout')}}">
                                    <i class="ti-power-off p-r-10"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header END -->

        <!-- Side Nav START -->
        <div class="side-nav expand-lg">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable">
                    <li class="side-nav-header">
                        <span>Navigation</span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="mdi mdi-image-filter-drama"></i>
                </span>
                            <span class="title">Phone Infos</span>
                            <span class="arrow">
                  <i class="mdi mdi-chevron-right"></i>
                </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('phone-infos.index') }}">Phone Info List</a></li>
                            <li><a href="{{ route('phone-infos.create') }}">Create Phone Info</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Side Nav END -->


        @yield('content')


    </div>
</div>

<script src="{{ asset('admin-panel/assets/js/vendor.js') }}"></script>

<script src="{{ asset('admin-panel/assets/js/app.min.js') }}"></script>
<!-- page js -->
@stack('js')
</body>


</html>
