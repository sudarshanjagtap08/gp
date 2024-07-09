<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Video Example</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet" type="text/css">
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }
    .fullscreen-video {
      width: 100%;
      height: 100vh;
      object-fit: cover;
    }
    .logo-container {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px;
      z-index: 1000; /* Ensure the logo is above the video */
    }
     .vertical-line {
      border-left: 1px solid black; /* Change to black */
      height: 100%; /* Adjust as needed */
    }
  </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="logo-container">
            <img src="website/images/genuineplots-logo-200x50.png" alt="Logo" height="50">
        </div>
        <div class="row m-0">
            <div class="col-md-12 p-0">
                <video class="fullscreen-video" autoplay muted loop>
                    <source src="images/homepagevideo.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        
        <div class="row p-4" id="RegisteruserInfo">
            <div class="col-md-5">
                <div class="p-4">
                    <form method="POST" action="{{ route('registeruserinfo') }}">
                        <h2>Buyer</h2>
                        @csrf
                        <input type="hidden" class="form-control" name="registeras" required value="Buyer">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="nan" placeholder="Enter Your Name" required>
                        
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Your Email Id" required>
                    
                        <label class="col-md-4 col-form-label text-md-end">Mobile Number</label>
                        <input type="number" class="form-control" name="mobilenumber" required>
                        
                        <label class="col-md-4 col-form-label text-md-end">Remark</label>
                        <textarea class="form-control" name="remark" ></textarea><br>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
            <!--<div class="col-md-1 vertical-line"></div>-->
            <div class="col-md-5">
                <div class="p-4">
                    <form method="POST" action="{{ route('registeruserinfo') }}">
                        <h2>Seller</h2>
                        @csrf
                        <input type="hidden" class="form-control" name="registeras" required value="Seller">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                        
                        <label for="email_0" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email_0" type="email" class="form-control" name="email" placeholder="Enter Your Email Id" required>
                    
                        <label for="password_0" class="col-md-4 col-form-label text-md-end">Mobile Number</label>
                        <input id="password_0" type="number" class="form-control" name="mobilenumber" required>
                        
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Remark</label>
                        <textarea class="form-control" name="remark"></textarea><br>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                <h2 class="text-center">List Your Property</h2>
                <form method="POST" action="{{ route('registeruserinfo') }}">
                    @csrf
                    <input type="hidden" class="form-control" name="registeras" value="Property" required>
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                        
                    <label for="email_0" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <input id="email_0" type="email" class="form-control" name="email" placeholder="Enter Your Email Id" required>
                
                    <label for="password_0" class="col-md-4 col-form-label text-md-end">Mobile Number</label>
                    <input id="password_0" type="number" class="form-control" name="mobilenumber" required>
                        
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Remark</label>
                    <textarea class="form-control"></textarea><br>
                        
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <section class="py-2 cta">
            <div class="container">
                <div class="d-md-flex justify-content-center justify-content-md-around text-center">
                    <!--<a  class="link_default text_primary_light btn_register">Register</a>-->
                    <a href="#RegisteruserInfo" class="link_default btn btn_cta">Enquire Now</a>
                </div>
            </div>
        </section>
        
    </div>
  <!-- Bootstrap JS (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
