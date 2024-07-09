<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('metatitle')</title>
    <meta content="@yield('metadescription')" name="description">
    <meta content="@yield('metakeyword')" name="metakeyword">
    <link rel="canonical" href="@yield('canonical')">
    
    <!-- Add the favicon link -->
    <!--<img src="" alt="">-->
    <link rel="icon" href="{{ asset('website/images/favicon.jpg') }}" type="image/x-icon">
    <!-- end the favicon link -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7302910310991084"
     crossorigin="anonymous"></script>
     <!-- Add the Google Site Verification code -->
    <meta name="google-site-verification" content="SzEYinOOeTLPjrRfk-R1FUjLQwfOyYwJwholyrFEaVs">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&family=Roboto:wght@100;300;400;500;700&family=Volkhov:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- Custom CSS -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('website/css/stylenew.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-/4QvJfRG+WcF6i4D/UXIthf7TDByvcf4F5S9R1toRbO5c9QrBThA6d/bz5PXtXJ6fJn6ei7UuDe8f5b4fegRQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <script>
       function onSubmit(token) {
         document.getElementById("demo-form").submit();
       }
     </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7302910310991084"
     crossorigin="anonymous"></script>
     <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5R2FZX4');</script>
    <!-- End Google Tag Manager -->
    <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
    <script>
      window.OneSignalDeferred = window.OneSignalDeferred || [];
      OneSignalDeferred.push(async function(OneSignal) {
        await OneSignal.init({
          appId: "a7d8d4cc-5f49-4d92-af2f-a4a1d2ec3ceb",
        });
      });
    </script>
    
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5R2FZX4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="menuButtons" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center">
                @if (Route::has('login'))
                            @auth
                            <li class="nav-item not_hover d-flex align-items-center text-center justify-content-center mb-2 mb-md-0">
                                <div class="btn-group">
                                    <a href="#" class="link_default text_primary_light btn_register dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Hii, {{ strlen(Auth::user()->name) > 10 ? substr(Auth::user()->name, 0, 10) . '...' : Auth::user()->name }}</a>
                                    <ul class="dropdown-menu">
                                        <a href="{{ route('profile')}}" class="nav-link fw-normal" >
                                            My Profile
                                        </a>
                                        <li class="w-100">
                                            @if(Auth::user()->role == "admin" || Auth::user()->role == "seller" || Auth::user()->role == "businessdevelopment")
                                                <a href="{{ route('home')}}" class="nav-link fw-normal" >
                                                    Dashboard
                                                </a>
                                                <a href="{{ route('shortlist')}}" class="nav-link fw-normal" >
                                                    Shortlist Property
                                                </a>
                                                <a href="{{ route('contacted_property')}}" class="nav-link fw-normal">
                                                    Contacted Property
                                                </a>
                                                <a href="{{ route('viewed_property')}}" class="nav-link fw-normal">
                                                    Viewed Property
                                                </a>
                                                <a href="{{ route('similar_property')}}" class="nav-link fw-normal">
                                                    Similar Property
                                                </a>
                                            @endif
                                            @if(Auth::user()->role == "buyer")
                                                <a href="{{ route('home')}}" class="nav-link fw-normal" >
                                                    Dashboard
                                                </a>
                                                <a href="{{ route('shortlist')}}" class="nav-link fw-normal" >
                                                    Shortlist Property
                                                </a>
                                                <a href="{{ route('contacted_property')}}" class="nav-link fw-normal">
                                                    Contacted Property
                                                </a>
                                                <a href="{{ route('viewed_property')}}" class="nav-link fw-normal">
                                                    Viewed Property
                                                </a>
                                                <a href="{{ route('similar_property')}}" class="nav-link fw-normal">
                                                    Similar Property
                                                </a>
                                            @endif
                                            <a href="{{ route('logout') }}" class="nav-link fw-normal"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @else
                            <li class="nav-item not_hover d-flex align-items-center text-center justify-content-center mb-3 mb-md-0">
                                <a data-bs-toggle="modal" data-bs-target="#myModalLogggin" class="link_default text_primary_light btn_register">Login</a>
                            </li>
                                @if (Route::has('register'))
                                <li
                                    class="nav-item not_hover d-flex align-items-center text-center justify-content-center mb-2 mb-md-0">
                                    <a data-bs-toggle="modal" data-bs-target="#myModalRegisterr" class="link_default text_primary_light btn_register">Register</a>
                                </li>
                                @endif
                            @endauth
                        @endif
            </div>
        </div>
    </div>
    <header class="p-0">
        <nav class="navbar navbar-expand-lg bg-white p-0">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('website/images/genuineplots-logo-200x50.png') }}" alt="">
                </a>
                <a href="#" class="link_default d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#menuButtons">
                    <i class="bi bi-person-circle fs-4"></i>
                </a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">ABOUT US</a>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                PROPERTIES
                            </button>
                            <ul class="dropdown-menu first">
                                <li class="btn-group dropend w-100">
                                    <a type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        SEARCH BY REGION
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($city_typemenu as $citytypemenu)
                                        <a class="nav-link" href="{{ route('city.city', ['citySlug' => strtolower(str_replace(' ', '-', $citytypemenu->name))]) }}">{{ $citytypemenu->name }}</a>
                                    @endforeach
                                    </ul>
                                </li>
                                
                                <li class="btn-group dropend w-100">
                                    <a type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        SEARCH IN LAND
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($property_typemenu as $propertymenu)
                                            <a class="nav-link" href="{{ route('property-type', ['propertySlug' => strtolower(str_replace(' ', '-', $propertymenu->name))]) }}">
                                                {{ $propertymenu->name }}
                                            </a>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                BUYER'S GUIDE
                            </button>
                            <ul class="dropdown-menu first">
                                <li class="w-100">
                                    <a href="{{ route('recomended_property')}}" class="nav-link">
                                        Recommended Properties
                                    </a>
                                </li>
                                <li class="w-100">
                                    <a href="{{ route('benefits.of.investing.in.a.land.genuine.plot')}}" class="nav-link">
                                        Benefits of investing in land
                                    </a>
                                </li>
                                <li class="w-100">
                                    <a href="{{ route('checklist.before.buying.land')}}" class="nav-link">
                                        checklist before buying land
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">CONTACT</a>
                        </li>
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item dropdown d-flex align-items-center text-center justify-content-center mb-2 mb-md-0 d-none d-lg-flex">
                            <div>
                                <button class="btn btn_register dropdown-toggle rounded-1 my-auto d-flex justify-content-center align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-1 fs-6"></i> Hii, {{ strlen(Auth::user()->name) > 10 ? substr(Auth::user()->name, 0, 10) . '...' : Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu first">
                                    <li class="w-100">
                                        <a href="{{ route('profile')}}" class="nav-link fw-normal" >
                                            My Profile
                                        </a>
                                        @if(Auth::user()->role == "admin" || Auth::user()->role == "seller")
                                            <a href="{{ route('home')}}" class="nav-link fw-normal" >
                                                Dashboard
                                            </a>
                                            <a href="{{ route('shortlist')}}" class="nav-link fw-normal" >
                                                Shortlist Property
                                            </a>
                                            <a href="{{ route('contacted_property')}}" class="nav-link fw-normal">
                                                Contacted Property
                                            </a>
                                            <a href="{{ route('viewed_property')}}" class="nav-link fw-normal">
                                                Viewed Property
                                            </a>
                                            <a href="{{ route('similar_property')}}" class="nav-link fw-normal">
                                                Similar Property
                                            </a>
                                        @endif
                                        @if(Auth::user()->role == "buyer")
                                            <a href="{{ route('home')}}" class="nav-link fw-normal" >
                                                Dashboard
                                            </a>
                                            <a href="{{ route('shortlist')}}" class="nav-link fw-normal" >
                                                Shortlist Property
                                            </a>
                                            <a href="{{ route('contacted_property')}}" class="nav-link fw-normal">
                                                Contacted Property
                                            </a>
                                            <a href="{{ route('viewed_property')}}" class="nav-link fw-normal">
                                                Viewed Property
                                            </a>
                                            <a href="{{ route('similar_property')}}" class="nav-link fw-normal">
                                                Similar Property
                                            </a>
                                        @endif
                                        <a href="{{ route('logout') }}" class="nav-link fw-normal"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @else
                        <li
                            class="nav-item not_hover d-flex align-items-center text-center justify-content-center mb-2 mb-md-0 d-none d-lg-flex">
                             <a data-bs-toggle="modal" data-bs-target="#myModalLogggin" class="link_default text_primary_light btn_register">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li
                            class="nav-item not_hover d-flex align-items-center text-center justify-content-center mb-2 mb-md-0 d-none d-lg-flex">
                            <a data-bs-toggle="modal" data-bs-target="#myModalRegisterr" class="link_default text_primary_light btn_register">Register</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                        <!--<li class="nav-item dropdown">-->
                        <!--    <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">-->
                        <!--        <i class="fa-solid fa-location-dot" style="font-size: 25px; color: #28a745"></i>-->
                        <!--    </button>-->
                        <!--    <ul class="dropdown-menu first">-->
                        <!--        <li class="w-100">-->
                        <!--            <a href="#" class="" id="location">-->
                        <!--                Loading...-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <div id="myModalLogggin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                            <h5 class="modal-title" id="myModalLabel">{{ __('Login') }}</h5>
                        </div>
                        <form method="POST" action="{{ route('login') }}" id="popupFormLogin">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <div class="g-recaptcha" data-sitekey="6LdNsoEpAAAAAPedAyDW8WnfhdcrR49_DIyP70fX"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 justify-content-center">
                                <div class="col-md-8 text-center">
                                    <button type="submit" class="btn btn-primary" onclick="submitFormWithCaptchaLogin()">
                                        {{ __('Login') }}
                                    </button>
                                   <p>New to Genuine Plots?
                                        <a data-bs-toggle="modal" data-bs-target="#myModalRegisterr" class="btn btn-link"> Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6" style="background-image: url('{{ asset('/images/about/about.jpg') }}'); background-size: cover; background-position: center;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModalRegisterr" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                            <h5 class="modal-title" id="myModalLabel">{{ __('Register') }}</h5>
                        </div>
                        <form method="POST" action="{{ route('register') }}"  id="popupFormRegister">
                            @csrf
                            <input type="hidden" name="url" value="{{ url()->current() }}">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Mobile Number</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('mobilenumber') is-invalid @enderror" name="mobilenumber" required autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Role</label>
                                <div class="col-md-6">
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="">Not Selected</option>
                                        <option value="seller">Seller</option>
                                        <option value="buyer">Buyer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3" id="seller-types-container" style="display: none;">
                                <label class="col-md-4 col-form-label text-md-end">Types of Seller</label>
                                <div class="col-md-6">
                                    <select name="seller_type" id="seller_type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="Land Owner">Land Owner</option>
                                        <option value="Developer">Developer</option>
                                        <option value="Channel Partner">Channel Partner</option>
                                        <option value="Strategic Partner">Strategic Partner</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <div class="g-recaptcha" data-sitekey="6LdNsoEpAAAAAPedAyDW8WnfhdcrR49_DIyP70fX"></div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" onclick="submitFormWithCaptchaRegister()">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6" style="background-image: url('{{ asset('/images/about/about.jpg') }}'); background-size: cover; background-position: center;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModalEnquiry" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Enquiry Now</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" action="{{ route('popup.enquiry') }}" id="popupFormEnquiry">
                    @csrf
                    <input type="hidden" name="url" value="{{ url()->current() }}">
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }} <span style="color:red" >*</span> </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="enq_n"  required >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Mobile Number <span style="color:red" >*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="enq_m"  required >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="enq_e"  >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">City</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="enq_c" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Size</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="enq_s">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Budget</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="enq_b">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Area</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="enq_a">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Comment</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="enq_c"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="g-recaptcha" data-sitekey="6LdNsoEpAAAAAPedAyDW8WnfhdcrR49_DIyP70fX"></div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" onclick="submitFormWithCaptchaPopup()">
                                Submit 1
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="myModalSubscribe" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Subscribe Now</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" action="{{ route('subscribe') }}" id="subscribeForm">
                    @csrf
                    <input type="hidden" name="url" value="{{ url()->current() }}">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="sub_n"  required >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Mobile Number</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control " name="sub_m"  required >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email_0" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="sub_e"  required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="city" class="col-md-4 col-form-label text-md-end">City</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="sub_c" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="area" class="col-md-4 col-form-label text-md-end">Comment</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="sub_c" ></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="g-recaptcha" data-sitekey="6LdNsoEpAAAAAPedAyDW8WnfhdcrR49_DIyP70fX"></div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" onclick="submitFormWithCaptcha()">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="myModalHomepopup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                    <div>
                        <button id="closeButton" style="position:absolute; top:10px; right:10px; z-index:99" type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                            <a href="{{$popupdata->link}}" id="" target="_blank">
                                <img src="{{ asset('images/popup/'.$popupdata->image)}}" class="img-fluid" alt="Genuine Plot Overview" style="position:relative;">
                            </a>
                    </div>
            </div>
        </div>
    </div>
    <footer class="py-5">
        <div class="container py-md-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <h5 class="footer_hading">
                        Recent Posts
                    </h5>
                    @foreach($recentBlogPosts as $recentPost)
                        <div class="d-flex">
                            <div class="col-4">
                                <div class="img_box">
                                <img src="{{ asset('images/blog/'.$recentPost->image)}}" width="150px" alt="">
                                    <!-- <img src="{{ asset('website/images/blog-img-150x150.png') }}" alt=""> -->
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="{{ route('blog.details', ['blogSlug' => strtolower(str_replace(' ', '-', $recentPost->title))]) }}" class="blog_link">
                                    <p class="blog_title">
                                    {{ $recentPost->title }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <h5 class="footer_hading">
                        Top Localities
                    </h5>
                    <div>
                        <ul class="footer_list ps-2 ps-md-3">
                            @foreach($cityNames as $cityNames)
                            <li class="mb-3"><a href="{{ route('city.top_localities', ['citySlug' => strtolower(str_replace(' ', '-', $cityNames))]) }}" class="footer_link">> {{$cityNames}} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <h5 class="footer_hading">
                        Contact Us
                    </h5>
                    <div class="mb-3">
                        <a href="#" class="footer_link">
                            <i class="bi bi-geo-alt me-1"></i>
                            Genuine Plots, <br>
                            2 Nisarg Vihar, Ashtavinayak Rd, near MITCON International School, Balewadi, Pune,
                            Maharashtra 411045
                        </a>
                    </div>
                    <div class="mb-3">
                        <a href="tel:+917507151321" class="footer_link">
                            <i class="bi bi-telephone me-1"></i>
                            Call us +91-7507151321
                        </a>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-envelope me-1"></i><br>
                        <a href="mailto:support@genuineplots.com" class="footer_link">
                            support@genuineplots.com
                        </a>
                        <a href="mailto:sell@genuineplots.com" class="footer_link">
                            sell@genuineplots.com
                        </a>
                        <a href="mailto:buy@genuineplots.com" class="footer_link">
                            buy@genuineplots.com
                        </a>
                        <a href="mailto:advertise@genuineplots.com" class="footer_link">
                            advertise@genuineplots.com
                        </a>
                        <a href="mailto:legal@genuineplots.com" class="footer_link">
                            legal@genuineplots.com
                        </a>
                    </div>
                </div>
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <h5 class="footer_hading">
                        Disclaimer
                    </h5>
                    <div>
                        <p class="m-0 text-justify">
                        {{ $disclaimer->description }}
                        </p>
                    </div><br>
                    <div class="social_links d-flex justify-content ">
                        <div class="social_box social_box_fb d-flex justify-content-center align-items-center p-2 m-1">
                            <a href="https://www.facebook.com/GenuinePlotsTM" class="facebook" target="_blank"><i class="fa-brands fa-facebook fs-4"></i></i></a>
                        </div>
                        <div class="social_box social_box_twitter d-flex justify-content-center align-items-center p-2 m-1">
                            <a href="https://twitter.com/GenuinePlotsTM" class="twitter" target="_blank"><i class="fa-brands fa-twitter fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_yt d-flex justify-content-center align-items-center p-2 m-1">
                            <a href="https://www.youtube.com/@GenuinePlotsTM" class="youtube" target="_blank"><i class="fa-brands fa-youtube fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_linkedin d-flex justify-content-center align-items-center p-2 m-1">
                            <a href="https://www.linkedin.com/company/96464047/admin/feed/posts/" class="linkedin" target="_blank"><i class="fa-brands fa-linkedin fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_instagram d-flex justify-content-center align-items-center p-2 m-1">
                            <a href="https://www.instagram.com/genuineplotstm/" class="instagram" target="_blank"><i class="fa-brands fa-instagram fs-4"></i></a>
                        </div>
                    </div>
                </div>
            </div><br>
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <h5 class="footer_hading">
                       NA Plots In Pune
                    </h5>
                    <div>
                        <ul class="footer_list ps-2 ps-md-3">
                            @foreach($lsikeywordsectionone as $lsikeywordsectionone)
                            <li class="mb-3"><a href="{{$lsikeywordsectionone->link}}" class="footer_link">{{$lsikeywordsectionone->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <h5 class="footer_hading">
                        FarmHouse Plots In Pune
                    </h5>
                    <div>
                        <ul class="footer_list ps-2 ps-md-3">
                            @foreach($lsikeywordsectiontwo as $lsikeywordsectiontwo)
                            <li class="mb-3"><a href="{{$lsikeywordsectiontwo->link}}" class="footer_link">{{$lsikeywordsectiontwo->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <h5 class="footer_hading">
                        NA Plots In Maharashtra
                    </h5>
                    <div>
                        <ul class="footer_list ps-2 ps-md-3">
                            @foreach($lsikeywordsectionthree as $lsikeywordsectionthree)
                            <li class="mb-3"><a href="{{$lsikeywordsectionthree->link}}" class="footer_link">{{$lsikeywordsectionthree->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <h5 class="footer_hading">
                        Farm House Plots In Maharashtra
                    </h5>
                    <div>
                        <ul class="footer_list ps-2 ps-md-3">
                            @foreach($lsikeywordsectionfour as $lsikeywordsectionfour)
                            <li class="mb-3"><a href="{{$lsikeywordsectionfour->link}}" class="footer_link">{{$lsikeywordsectionfour->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <br>
            <h5 class="footer_hading text-center">
                All Properties
            </h5>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                @foreach($footerproperty as $footerproperty )
                <div class="col mb-3 mb-sm-3 mb-md-0">
                    <div>
                        <a href="{{ url('/property/' . $footerproperty->slug) }}" class="footer_link">
                            <ul class="footer_list ps-2 ps-md-3">
                                > {{$footerproperty->title}}
                            </ul>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </footer>
    <section class="py-4 footer_copyrights">
        <div class="container">
            <p class="mb-0 text-white">© Genuine Plots - All rights reserved</p>
        </div>
    </section>
        <script>
            function submitFormWithCaptcha() {
                var response = grecaptcha.getResponse();
        
                if (response.length === 0) {
                    document.getElementById('subscribeForm').submit();
                    // alert('Please complete the reCAPTCHA verification.');
                    // return false;
                    // event.preventDefault();
                } else {
                    document.getElementById('subscribeForm').submit();
                }
            }
        </script>
        <script>
            function submitFormWithCaptchaPopup() {
                var response = grecaptcha.getResponse();
        
                if (response.length === 0) {
                    document.getElementById('popupFormEnquiry').submit();
                    // alert('Please complete the reCAPTCHA verification.');
                    // return false;
                    event.preventDefault();
                } else {
                    document.getElementById('popupFormEnquiry').submit();
                }
            }
        </script>
        <script>
            function submitFormWithCaptchaRegister() {
                var response = grecaptcha.getResponse();
                if (response.length === 0) {
                    document.getElementById('popupFormRegister').submit();
                    // alert('Please complete the reCAPTCHA verification.');
                    // return false;
                    // event.preventDefault();
                } else {
                    document.getElementById('popupFormRegister').submit();
                }
            }
        </script>
        <script>
            function submitFormWithCaptchaLogin() {
                var response = grecaptcha.getResponse();
                if (response.length === 0) {
                    document.getElementById('popupFormLogin').submit();
                    // alert('Please complete the reCAPTCHA verification.');
                    // return false;
                    // event.preventDefault();
                } else {
                    document.getElementById('popupFormLogin').submit();
                }
            }
        </script>
        <script>
            function submitFormWithCaptchaNewEnqForm() {
                var response = grecaptcha.getResponse();
                    if (response.length === 0) {
                        document.getElementById('popUpNewEnqForm').submit();
                        // alert('Please complete the reCAPTCHA verification.');
                        // return false;
                        // event.preventDefault();
                    } else {
                        document.getElementById('popUpNewEnqForm').submit();
                    }
                }
        </script>
        <script>
            function submitFormWithCaptchaEnqForm() {
                var response = grecaptcha.getResponse();
                    if (response.length === 0) {
                        document.getElementById('popUpEnqForm').submit();
                        // alert('Please complete the reCAPTCHA verification.');
                        // return false;
                        // event.preventDefault();
                    } else {
                        document.getElementById('popUpEnqForm').submit();
                    }
                }
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".favorite-button").click(function (e) {
                e.preventDefault();
                const propertyId = $(this).data("property-id");
                const heartIcon = $(this).find(".favorite-icon");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                @auth
                    $.ajax({
                        type: "POST",
                        url: "/add-to-favorites",
                        data: {
                            propertyId: propertyId,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            if (response.success) {
                                if (response.isFavorite) {
                                    heartIcon.removeClass("bi-heart");
                                    heartIcon.addClass("bi-heart-fill");
                                } else {
                                    heartIcon.removeClass("bi-heart-fill");
                                    heartIcon.addClass("bi-heart");
                                }
                            } else {
                                // Handle any failure scenarios
                            }
                        }
                    });
                @else
                    $('#loginModal').modal('show');
                @endauth
            });
        });
    </script>
    <div id="popup" style="display: none; background-color: #fff; padding: 20px; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); z-index: 1000;">
        <p>This is your popup content.</p>
        <button onclick="closePopup()">Close</button>
    </div>
    <a href="#" class="back_to_top">
        <div>
            <i class="bi bi-caret-up-fill"></i>
        </div>
    </a>
    <div id="whatsapp-sticky-btn" class="whatsapp-btn" onmouseover="showWhatsAppText()" onmouseout="hideWhatsAppText()">
        <a id="whatsapp-link" href="#" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp Icon" id="whatsapp-icon">
        </a>
        <div id="whatsapp-text" class="whatsapp-text">WhatsApp</div>
    </div>
    <div id="enquiry-sticky-btn" class="enquiry-btn" onmouseover="showEnquiryText()" onmouseout="hideEnquiryText()">
        <a data-bs-toggle="modal" data-bs-target="#myModalEnquiry" class="link_default text_primary_light btn_register">
            <img src="{{ asset('images/enquiry.png') }}" alt="enquiry Icon" id="enquiry-icon">
        </a>
        <div id="enquiry-text" class="enquiry-text">Enquiry Now</div>
    </div>
    <div id="subscribe-sticky-btn" class="subscribe-btn" onmouseover="showSubscribeText()" onmouseout="hideSubscribeText()">
        <a data-bs-toggle="modal" data-bs-target="#myModalSubscribe" class="link_default text_primary_light btn_register">
            <img src="{{ asset('images/add-friend.png') }}" alt="subscribe Icon" id="subscribe-icon">
        </a>
        <div id="subscribe-text" class="subscribe-text">Subscribe Now</div>
    </div>
    <script>
        function showSubscribeText() {
            document.getElementById('subscribe-text').style.opacity = '1';
        }
    
        function hideEnquiryText() {
            document.getElementById('subscribe-text').style.opacity = '0';
        }
    </script>
    <script>
        function showEnquiryText() {
            document.getElementById('enquiry-text').style.opacity = '1';
        }
    
        function hideEnquiryText() {
            document.getElementById('enquiry-text').style.opacity = '0';
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var whatsappLink = document.getElementById('whatsapp-link');
            var message = "I am inquiring through website page -  ";
            var currentUrl = window.location.href;
            whatsappLink.href = "https://wa.me/7507151321?text=" + encodeURIComponent(message + currentUrl);
        });
    
        function showWhatsAppText() {
            document.getElementById('whatsapp-text').style.display = 'block';
        }
    
        function hideWhatsAppText() {
            document.getElementById('whatsapp-text').style.display = 'none';
        }
    </script>
    <!-- Your website content goes here -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
        integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>
    <script>
            function sharePage() {
                // Replace 'YourPageURL' with the actual URL you want to share
                const pageUrl = window.location.href;
                // Using the Web Share API if available (works on mobile devices)
                if (navigator.share) {
                    navigator.share({
                        title: document.title,
                        text: 'Check out this page!',
                        url: pageUrl,
                    })
                    .then(() => console.log('Page shared successfully'))
                    .catch((error) => console.error('Error sharing page:', error));
                } else {
                    // Fallback for browsers that do not support the Web Share API
                    alert('Sharing not supported on this browser. You can manually share the page using the URL: ' + pageUrl);
                }
            }
    </script>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const emailInput = document.querySelector('input[name="eoe"]');
            const emailError = document.getElementById('emailError');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
            if (!emailRegex.test(emailInput.value)) {
                emailError.textContent = 'Please enter a valid email address.';
                event.preventDefault();
            } else {
                emailError.textContent = '';
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const locationElement = document.getElementById('location');
            
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
                
                // latlong session start
                    navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
    
                    // Send the latitude and longitude to the server
                    fetch('/save-location', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ latitude: latitude, longitude: longitude })
                    });
                }, function(error) {
                    console.error('Error occurred while retrieving location:', error);
                });
                // latlong session end
                
            } else {
                locationElement.innerText = "Geolocation is not supported by this browser.";
            }
            function showPosition(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                // Call the OpenCage API to get the city name
                const apiKey = 'bb7917b590364ae2ab57d801b49c862a';
                const url = `https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=${apiKey}`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        const city = data.results[0].components.city || data.results[0].components.town || data.results[0].components.village;
                        locationElement.innerText = city ? city : "City not found";
                    })
                    .catch(error => {
                        locationElement.innerText = "Unable to retrieve city information";
                        console.error('Error fetching city information:', error);
                    });
                }
            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        locationElement.innerText = "User denied the request for Geolocation.";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        locationElement.innerText = "Location information is unavailable.";
                        break;
                    case error.TIMEOUT:
                        locationElement.innerText = "The request to get user location timed out.";
                        break;
                    case error.UNKNOWN_ERROR:
                        locationElement.innerText = "An unknown error occurred.";
                        break;
                }
            }
        });

    </script>
    <script>
        document.getElementById('role').addEventListener('change', function() {
            var sellerTypesContainer = document.getElementById('seller-types-container');
            if (this.value === 'seller') {
                sellerTypesContainer.style.display = 'flex';
            } else {
                sellerTypesContainer.style.display = 'none';
            }
        });
    </script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>-->
    <!-- Swiper JS -->
    <!--<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>-->

    <!-- Initialize Swiper -->
    <!--<script>-->
    <!--    var swiper = new Swiper(".mySwiper", {-->
    <!--        slidesPerView: "auto",-->
    <!--        centeredSlides: true,-->
    <!--        spaceBetween: 50,-->
    <!--        pagination: {-->
    <!--            el: ".swiper-pagination",-->
    <!--            clickable: true,-->
    <!--        },-->
    <!--        navigation: {-->
    <!--            nextEl: ".swiper-button-next",-->
    <!--            prevEl: ".swiper-button-prev",-->
    <!--        },-->
    <!--    });-->
    <!--</script>-->
</body>
</html>