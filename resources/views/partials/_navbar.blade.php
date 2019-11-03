<header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand">
                    <!-- Logo icon -->
                    <b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="" class="dark-logo" />
                        <!-- Light Logo icon -->
                        {{-- <img src="{{ asset('images/logo-light-icon.png') }}" alt="homepage" class="light-logo" /> --}}
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span>
                     <!-- dark Logo text -->
                     <img src="http://www.prospera-perwira.com/img/logo_prospera.png " height="50%" width="50%" alt="homepage" class="dark-logo" />
                     <!-- Light Logo text -->    
                     <img src="{{ asset('images/logo-light-text.png') }}" class="light-logo" alt="homepage" /></span> </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0 ">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                   
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item hidden-sm-down">
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a> </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://component-creator.com/images/testimonials/defaultuser.png" alt="user" class="profile-pic" /></a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img"><img src="https://component-creator.com/images/testimonials/defaultuser.png" alt="user"></div>
                                        <div class="u-text">
                                            <h4> {{ ucfirst(Auth::user()->name) }} </h4>
                                            {{-- <li role="separator" class="divider"></li> --}}
                                            <hr>
                                            <h5>Level : {{ Auth::user()->role->name }} </h5>
                                            <hr>
                                            <a href=" {{ Auth::user()->role->name == 'administrator' ?  route('viewdata.admin', Auth::user()->id) :  route('viewdata.hrd', Auth::user()->id) }} " class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                    </div>
                                </li>
                                @if (Auth::user()->role->name == 'administrator')
                                <hr>
                                    <li><a href=" {{ route('user.index') }} "><i class="ti-wallet"></i> Add Account</a></li>
                                @endif
                                {{-- <li><a href="#"><i class="ti-email"></i></a></li> --}}
                                <li role="separator" class="divider"></li>
                                {{-- <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li> --}}
                                <li>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                        <div class="dropdown-menu  dropdown-menu-right animated bounceInDown"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </header>