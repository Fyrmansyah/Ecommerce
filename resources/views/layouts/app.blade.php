<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href=" {{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href=" {{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- =============================================================================== -->
     <!-- Favicon -->
     <link href=" {{ asset('admin/images/icon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('halamanUser/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('halamanUser/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('halamanUser/css/style.css') }}" rel="stylesheet">
    

 @livewireStyles

     <!-- Scripts -->
     <script src="{{ asset('assets/js/jquery-3.6.1.min.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
    <div id="app">
        <!-- punyakuuuu reno -->
        <!-- topbar -->
        <div class="container-fluid">
            <div class="d-flex align-items-center bg-light py-3 px-xl-5 ">
                <div class="col-4">
                    <a href="/home" class="text-decoration-none">
                        <span class="h1 text-uppercase text-primary bg-dark px-2">koperasi</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">ku</span>
                    </a>
                </div>
                @auth
                <div class="text-left w-25 mx-auto">
                    <form action="">
                        <div class="input-group">
                            <input onkeyup="search(this.value)" type="text" class="form-control" placeholder="Search for products">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                @endauth
                <div class="d-flex align-items-center ml-auto">
                
                
                    </button> 
                    <!-- Authentication Links -->

                    @if(Route::has('login') && Route::has('register'))
                    <p></p>
                    @endif
                    
                    @guest
                        <!-- @if(Route::has('login')) -->
                                <a class="btn btn-warning rounded-pill mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <!-- @endif -->

                        <!-- @if(Route::has('register')) -->
                                <a class="btn btn-outline-warning rounded-pill" href="{{ route('register') }}">{{ __('Register') }}</a>
                        <!-- @endif -->
                    @endguest
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); 
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
        <!-- end topbar -->
         <!-- Navbar Start -->
         @auth
         @include('layouts.topbar')
         @endauth
        <!-- Navbar End -->
        <main class="py-4" id="main">
            @yield('content')
        </main>
    </div>
    

     <!-- Bootstrap core JavaScript-->

    <!-- Core plugin JavaScript-->
    {{-- <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}
    @livewireScripts

   


    <!-- ======================================= -->
    

    <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('halamanUser/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('halamanUser/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('halamanUser/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('halamanUser/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('halamanUser/js/main.js') }}"></script>
</body>
</html>
<script>
    function search(val){
        $.ajax({
            url: "/category/search",
            type:"GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{ val },
            success: function(res){
                // if(res.success){
                //     alert(res.message)
                // }
                $("#main").html(res.html)
                // console.log(res)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }
</script>
