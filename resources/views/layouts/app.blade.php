<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <meta http-equiv="X-UA-Compatible" content="ie=edge">

            <title>BlogTest</title>

            {{-- Css + icon --}}

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/favicon.ico')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/themify-icons.css')}}">


                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/vendor/animate/animate.css')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/vendor/owl-carousel/owl.carousel.css')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/vendor/nice-select/css/nice-select.css')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/vendor/fancybox/css/jquery.fancybox.min.css')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/virtual.css')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/minibar.virtual.css')}}">

                <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/Dashboard_style.css')}}">

                <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
            {{-- Css + icon --}}
        </head>
        <body class="theme-blue">

            <div id="app">

                <div class="topbar-nav fixed-top">
                    <div class="brand">
                    <img src="{{URL::asset('assets/favicon.ico')}}" alt="" width="30" height="30">
                    </div>
                    <h3 class="ml-1">BlogTest</h3>
                    <button class="btn-fab toggle-menu mr-3"><span class="ti-menu"></span></button>
                </div>

                <!-- Back to top button -->
                <div class="btn-back_to_top ">
                    <span class="ti-arrow-up"></span>
                </div>

                @guest
                    <!-- Minibar -->
                    <div class="minibar">
                        <div class="content">
                            <ul class="main-menu">
                                <li class="menu-item active">
                                    <a class="menu-link">
                                    <span class="icon ti-menu-alt"></span>
                                    <span class="caption">Menu</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('login') }}" class="menu-link">

                                    <span class="icon ti-crown"></span>
                                    <span class="caption">{{ __('Login') }}</span>
                                    </a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="menu-item">
                                        <a href="{{ route('register') }}" class="menu-link">
                                            <span class="icon ti-user"></span>
                                        <span class="caption">{{ __('Register') }}</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div> <!-- Minibar -->

                @else
                    @if (Auth::user()->level == 1)
                                <!-- Setting button -->
                        <div class="config main-menu">
                            <div class="template-config  menu-item">
                                    <!-- Options -->
                                <div class=" d-block ">
                                    <a class="btn btn-fab bg-light text-light  btn-sm" id="sideel" title="Options"data-toggle="tooltip" data-placement="left"><span class=" icon ti-settings"></span></a>
                                </div>
                                    <!-- Dashboard -->
                                <div class="d-block">
                                    <a href="{{route('user.dashboard')}}" class=" btn btn-fab bg-light text-light btn-sm" title="Dashboard" data-toggle="tooltip" data-placement="left"><i class="  uil uil-tachometer-fast-alt"></i></a>
                                </div>
                            </div>
                            <div class="set-menu ">
                                Select Color <div class="spinner-border bg-theme text-light" style="float: right" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="color-bar" data-toggle="selected">
                                    <span class="color-item bg-theme-blue selected" data-class="theme-blue"></span>
                                    <span class="color-item bg-theme-red" data-class="theme-red"></span>
                                    <span class="color-item bg-theme-green" data-class="theme-green"></span>
                                    <span class="color-item bg-theme-orange" data-class="theme-orange"></span>
                                    <span class="color-item bg-theme-purple" data-class="theme-purple"></span>
                                </div><hr>

                                <form class="form-inline my-2 my-lg-0"  action="{{ route('search') }}" method="GET">
                                    <input type="search" name="keyword" class="form-control" style="width:100%"  placeholder="Search">
                                </form><hr>

                                <div style="text-align: center;">
                                    <a href="{{ route('posts.trashed') }}" class="btn btn-fab btn-sm" title="My trashed" data-toggle="tooltip" data-placement="top"><span class="icon ti-archive"></span></a>
                                    <a href="{{ route('profile') }}" class="btn btn-fab btn-sm" title="My Profile" data-toggle="tooltip" data-placement="top"><span class="icon ti-clipboard"></span></a>
                                    <a href="{{ route('post.create') }}" class="btn btn-fab btn-sm" title="New Post" data-toggle="tooltip" data-placement="top"><span class="icon ti-file"></span></a>
                                    <a href="{{route('user.show',['id'=>Auth::user()->id])}}"  class="btn btn-fab btn-sm"title=" {{ Auth::user()->name }}" data-toggle="tooltip" data-placement="top"> <img src="{{URL::asset(Auth::user()->profile->photo)}}" alt="{{Auth::user()->profile->photo}}" class="border-dark rounded-circle" width="100%" height="100%" ><br></a>
                                </div>

                            </div>
                        </div>  <!-- Setting button -->

                    @else
                                <!-- Setting button -->
                        <div class="config">
                            <div class="template-config ">
                                    <!-- Options -->
                                <div class=" d-block ">
                                    <a class="btn btn-fab bg-light text-light  btn-sm" id="sideel" title="Options"data-toggle="tooltip" data-placement="left"><span class=" icon ti-settings"></span></a>
                                </div>
                                <div class="d-block">
                                    <br>
                                </div>

                            </div>
                            <div class="set-menu ">
                                Select Color <div class="spinner-border bg-theme text-light" style="float: right" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="color-bar" data-toggle="selected">
                                    <span class="color-item bg-theme-blue selected" data-class="theme-blue"></span>
                                    <span class="color-item bg-theme-red" data-class="theme-red"></span>
                                    <span class="color-item bg-theme-green" data-class="theme-green"></span>
                                    <span class="color-item bg-theme-orange" data-class="theme-orange"></span>
                                    <span class="color-item bg-theme-purple" data-class="theme-purple"></span>
                                </div>

                                    <hr>
                                <form class="form-inline my-2 my-lg-0"  action="{{ route('search') }}" method="GET">
                                    <input type="search" name="keyword" class="form-control" style="width:100%"  placeholder="Search">
                                </form>
                                    <hr>
                                <div style="text-align: center; padding: 0% 1%">

                                    <a href="{{ route('posts.trashed') }}" class="btn btn-fab btn-sm" title="My trashed" data-toggle="tooltip" data-placement="top"><span class="icon ti-archive"></span></a>
                                    <a href="{{ route('profile') }}" class="btn btn-fab btn-sm" title="My Profile" data-toggle="tooltip" data-placement="top"><span class="icon ti-clipboard"></span></a>
                                    <a href="{{ route('post.create') }}" class="btn btn-fab btn-sm" title="New Post" data-toggle="tooltip" data-placement="top"><span class="icon ti-file"></span></a>


                                    <a href="{{route('user.show',['id'=>Auth::user()->id])}}"  class="btn btn-fab btn-sm"title=" {{ Auth::user()->name }}" data-toggle="tooltip" data-placement="top">
                                        @if (isset(Auth::user()->profile->photo))
                                        <img  src="{{URL::asset(Auth::user()->profile->photo)}}"  class="border-dark rounded-circle" width="100%" height="100%" >
                                    @endif
                                    <br>
                                        {{-- <p style="font-size:x-small"><strong></strong></p> --}}
                                    </a>
                                </div>
                            </div>
                        </div>  <!-- Setting button -->

                    @endif
                    <!-- Minibar -->
                    <div class="minibar">
                        <div class="content">
                            <ul class="main-menu">
                                <li class="menu-item ">
                                    <a href="{{route('user.show',['id'=>Auth::user()->id])}}" style="height:100%"  class="menu-link">
                                        @if (isset(Auth::user()->profile->photo))
                                        <img src="{{URL::asset(Auth::user()->profile->photo)}}" class="rounded-circle" width="40px" height="40px" >
                                        @endif
                                        <br>
                                        <p style="font-size:x-small"><strong> {{ Auth::user()->name }}</strong></p>
                                    </a>
                                </li>
                                <li class="menu-item active">
                                    <a href="{{route('home')}}" class="menu-link">
                                        <span class="icon ti-home"></span>
                                        <span class="caption">Home</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('profile')}}" class="menu-link">
                                    <span class="icon uil uil-files-landscapes"></span>
                                    <span class="caption">My Profile</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('posts')}}" class="menu-link">
                                    <span class="icon uil uil-comments"></span>
                                    <span class="caption">Posts</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="#contact" class="menu-link">
                                    <span class="icon ti-location-pin"></span>
                                    <span class="caption">Contact</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-fab bg-theme btn-sm">
                                        <span class="icon uil uil-signout"></span>
                                        <span class="caption">Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                                </li>
                                <li class="menu-item mode">
                                    <a class="mode-toggle menu-link" >
                                        <span class=" switch" >
                                            <i class="text-dark uil uil-sun"></i>
                                            <i class="text-dark uil uil-moon"></i></span>
                                            <br>
                                        <span class="caption">Dark Mode</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Minibar -->
                @endguest

                <main >
                    @yield('content')

                    <!-- Footer -->
                    <div class="vg-footer" id="contact">
                        <h1 class="text-center">Virtual Folio</h1>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 py-3">
                                    <div class="footer-info">
                                        <p>Where to find me</p>
                                        <hr class="divider">
                                        <p class="fs-large fg-white">1600 Amphitheatre Parkway Mountain View, California 94043 US</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 py-3">
                                    <div class="float-lg-right">
                                        <p>Follow me</p>
                                        <hr class="divider">
                                        <ul class="list-unstyled">
                                        <li><a href="#">Instagram</a></li>
                                        <li><a href="#">Facebook</a></li>
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="#">Youtube</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 py-3">
                                    <div class="float-lg-right">
                                        <p>Contact me</p>
                                        <hr class="divider">
                                        <ul class="list-unstyled">
                                        <li>info@virtual.com</li>
                                        <li>+8890234</li>
                                        <li>+813023</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-12">
                                    <p class="text-center mb-0 mt-4">Copyright &copy;2020. All right reserved | This template is made with <span class="ti-heart fg-theme-red"></span> </p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End footer -->

                </main>
            </div>


            {{-- JAVASCRIPT --}}
                    <script src="{{URL::asset('assets/js/jquery-3.5.1.min.js')}}"></script>

                    <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>

                    <script src="{{URL::asset('assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>

                    <script src="{{URL::asset('assets/vendor/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>

                    <script src="{{URL::asset('assets/vendor/isotope/isotope.pkgd.min.js')}}"></script>

                    <script src="{{URL::asset('assets/vendor/nice-select/js/jquery.nice-select.min.js')}}"></script>

                    <script src="{{URL::asset('assets/vendor/fancybox/js/jquery.fancybox.min.js')}}"></script>

                    <script src="{{URL::asset('assets/vendor/wow/wow.min.js')}}"></script>

                    <script src="{{URL::asset('assets/vendor/animateNumber/jquery.animateNumber.min.js')}}"></script>

                    <script src="{{URL::asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>

                    <script src="{{URL::asset('assets/js/google-maps.js')}}"></script>

                    <script src="{{URL::asset('assets/js/minibar-virtual.js')}}"></script>

                    <script src="{{URL::asset('assets/js/Dashboard_script.js')}}"></script>



                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>




            {{-- JAVASCRIPT --}}

        </body>
    </html>
