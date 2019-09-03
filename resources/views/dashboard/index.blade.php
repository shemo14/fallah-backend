@include('dashboard.layouts.header')

<!-- Begin page -->
<div id="app">
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{url('admin/')}}" style="font-family: JF-Flat;" class="logo"><img class="site-logo" src="{{appPath()}}/images/site/logo.png" width="100%" style="height: 70px;"><i style="color: #fff !important;" class="fa fa-home"></i></a>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">

                    <!-- Page title -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button onclick="hideImg()" class="button-menu-mobile open-left">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>
                        <li>
                            <h4 class="page-title">@yield('title')</h4>
                        </li>
                    </ul>

                    <!-- Right(Notification and Searchbox -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <!-- Notification -->
                            <div class="notification-box">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <a href="javascript:void(0);" class="right-bar-toggle">
                                            <i class="zmdi zmdi-notifications-none"></i>
                                        </a>
                                        <div class="noti-dot">
                                            <span class="dot"></span>
                                            <span class="pulse"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Notification bar -->
                        </li>
                        <li>
                            @if(!request()->is('admin'))
                                <a href="{{url()->previous()}}" style="font-size: 24px;margin-top: 8px; color: red;">
                                    <i class="zmdi zmdi-arrow-back"></i>
                                </a>
                            @endif
                        </li>
                        <li>
                            <a href="{{route('logout')}}" class="text-custom notification-box" style="font-size: 24px;margin-top: 8px">
                                <i class="zmdi zmdi-power"></i>
                            </a>
                        </li>
                    </ul>

                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->

    @include('dashboard.layouts.sidebar')


    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page" id="Content" style="display:none;">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    @if ($errors->any())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger text-center">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>{!! session()->get('success') !!}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                            </div>
                        </div>
                    @endif

                    @if(session()->has('danger'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{!! session()->get('danger') !!}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                        </div>
                    </div>
                    @endif

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-center">
                <div class="row">
                    <div class="col-sm-12">Awamer ElShabaka &copy; {{date("Y")}}</div>
                </div>
            </footer>

        </div>

        @include('dashboard.layouts.notify')

    </div>
</div>

<!-- END wrapper -->


@include('dashboard.layouts.footer')