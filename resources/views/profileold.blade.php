<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Hoarding & Inventary Management</title>
    <meta name="description" content="Snoopy is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords"
        content="admin, admin dashboard, admin template, cms, crm, Snoopy Admin, Snoopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- vector map CSS -->
    <link href="../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <div class="wrapper  pa-0">
        <div class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container-fluid">
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form  ml-auto mr-auto no-float">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="mb-30">
                                        <h3 class="text-center txt-dark mb-10">Update Profile Details</h3>
                                        <!-- <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6> -->
                                    </div>
                                    @if (session('status'))
                                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                                    @endif
                                    <div class="form-wrap">
                                        <form action="{{ url('submit_profile') }}" method="post" enctype= multipart/form-data>
                                            @csrf  
                                            <div class="form-group">
                                                <label class="control-label mb-10"
                                                    for="exampleInputName_1">{{ __('Name') }}</label>
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                     required value="{{Auth::user()->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10"
                                                    for="exampleInputEmail_2">{{ __('Email Address') }}</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" required value="{{Auth::user()->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-10"
                                                    for="exampleInputpwd_3">Role</label>
                                                <input id="role" type="text"
                                                    class="form-control @error('role') is-invalid @enderror"
                                                    name="role" readonly value="{{Auth::user()->role}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-10"
                                                    for="exampleInputpwd_2">Password</label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" >
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-10"
                                                    for="exampleInputpwd_3">Confirm Password</label>
                                                <input id="passwordconfirm @error('passwordconfirm') is-invalid @enderror" type="password" class="form-control"
                                                    name="passwordconfirm" >
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-warning btn-rounded">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
    <!-- JavaScript -->
    <!-- jQuery -->
    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>
    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
</body>

</html>