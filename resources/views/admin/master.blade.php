<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Genuine Plots Admin Panel</title>
	<meta name="description" content="Snoopy is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Snoopy Admin, Snoopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<!-- Data table CSS -->
	<link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
	<!-- bootstrap-tagsinput CSS -->
	<link href="{{ asset('vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css"/>
	<!-- bootstrap-select CSS -->
	<link href="{{ asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>
	<!-- switchery CSS -->
	<link href="{{ asset('vendors/bower_components/switchery/dist/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
	<!-- vector map CSS -->
	<link href="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" type="text/css"/>
	<!-- Custom CSS -->
	<link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper  theme-2-active pimary-color-blue">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="{{url('/')}}">
							<img class="brand-img" src="{{ asset('img/logo.png')}}" alt="brand"/>
							<span class="brand-text" >
							    <img src="{{ asset('website/images/genuineplots-logo-200x50.png') }}" class="img-fluid rounded-4" alt="Genuine Plot Overview">
							</span>
							<p class="brand-text" style="font-size: 15px; text-align: center; display: block; color: #28a745;">(back to website)</p>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown alert-drp">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="zmdi zmdi-notifications top-nav-icon"></i>
                            <span class="top-nav-icon-badge">{{ count($notifications) }}</span>
                        </a>
                        <ul class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                            <li>
                                <div class="notification-box-head-wrap">
                                    <span class="notification-box-head pull-left inline-block">notifications</span>
                                    <a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
                                    <div class="clearfix"></div>
                                    <hr class="light-grey-hr ma-0"/>
                                </div>
                            </li>
                            <li>
                                <div class="streamline message-nicescroll-bar">
                                    @foreach($notifications as $notification)
                                    <div class="sl-item">
                                        <a href="{{ route('list.enquiry.seen')}}">
                                            <div class="icon bg-green">
                                                <i class="zmdi zmdi-flag"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span class="inline-block capitalize-font pull-left truncate head-notifications">
                                                    New Enquiry Recieved:- {{ $notification['enquiry_name'] }}
                                                </span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">{{ $notification['property_name'] }}</p>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <div class="notification-box-bottom-wrap">
                                    <hr class="light-grey-hr ma-0"/>
                                    <a class="block text-center read-all" href="javascript:void(0)"> read all </a>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                        </ul>
                    </li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{ asset('img/user1.png') }}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li class="divider"></li>
							<li>
								<a href="{{ route('profile') }}"><i class="zmdi zmdi-group-work"></i><span>Profile</span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				@if(Auth::user()->role == "seller")
				    <li>
						<a href="{{url('properties/add_properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Post New Property</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">My Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Lead">
                            <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                    class="right-nav-text">Leads
                                </span></div>
                            <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Lead" class="collapse collapse-level-1">
                            <li>
                                <a href="{{url('list/enquiry')}}">Project Leads</a>
                            </li>
                        </ul>
                    </li>
					<li>
						<a href="{{ url('profile')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">My Profile</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">My Subscription</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Inbox</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('list/all/propertywisedetails')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Property Wise Details</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Settings</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('shortlisted_properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Shortlisted Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('contacted_properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Contacted Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('viewed_properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Viewed Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('list/all/propertywisedetails')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Property Wise Details</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
				@endif
				@if(Auth::user()->role == "buyer")
					
					<li>
						<a href="{{ url('profile')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">My Profile</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">My Subscription</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('list/requirement')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Requirement</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('shortlisted_properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Shortlisted Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('contacted_properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Contacted Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="{{url('viewed_properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Viewed Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					
				@endif
				@if(Auth::user()->role == "admin")
					<li>
						<a href="{{url('properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Leadd">
                            <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                    class="right-nav-text">Leads
                                </span></div>
                            <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Leadd" class="collapse collapse-level-1">
                            <li>
                                <a href="{{url('website_enquiry')}}">Website Leads</a>
                            </li>
                            <li>
                                <a href="{{url('list/subscription')}}">Subscribers</a>
                            </li>
                            <li>
                                <a href="{{url('list/enquiry')}}">Project Leads</a>
                            </li>
                            <li>
                                <a href="{{url('list.other.lead')}}">Other Leads</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('list/blog')}}">
                            <div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span
                                    class="right-nav-text">Blog</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
    				<li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr">
                            <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                    class="right-nav-text">Admin
                                </span></div>
                            <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="app_dr" class="collapse collapse-level-1">
                            <li>
                                <a href="{{url('list/requirement')}}">Requirement</a>
                            </li>
                            <li>
                                <a href="{{url('list/about')}}">About Us</a>
                            </li>
                            <li>
                                <a href="{{url('country')}}">Country</a>
                            </li>
                            <li>
                                <a href="{{url('types_of_land')}}">Types of Land</a>
                            </li>
                            <li>
                                <a href="{{url('property_categories')}}">Property Category</a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="{{url('pincode')}}">Pincode</a>-->
                            <!--</li>-->
                            <li>
                                <a href="{{url('checklist')}}">Checklist</a>
                            </li>
                            <li>
                                <a href="{{url('benefits')}}">Benefits</a>
                            </li>
                            <li>
                                <a href="{{url('what_do_we_do')}}">What do we do</a>
                            </li>
                            <li>
                                <a href="{{url('key_services')}}">Key Services</a>
                            </li>
                            <li>
                                <a href="{{url('disclaimer')}}">Disclaimer</a>
                            </li>
                            <li>
                                <a href="{{url('aminities')}}">Aminities</a>
                            </li>
                            <li>
                                <a href="{{url('list/registeruserinfo')}}">Register Information</a>
                            </li>
                            <li>
                                <a href="{{url('popup/image')}}">Popup Image</a>
                            </li>
                            <li>
                                <a href="{{url('propertywise_enquiry')}}">Propertywise Leads</a>
                            </li>
                            <li>
                                <a href="{{url('list/lsi_keyword')}}">LSI Keyword</a>
                            </li>
                            <li>
                                <a href="{{url('blog/comments')}}">Blog Comments</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#primium_listing_feature">
                            <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                    class="right-nav-text">primium listing feature
                                </span></div>
                            <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="primium_listing_feature" class="collapse collapse-level-1">
                            <li>
                                <a href="{{url('top_areas_to_invest')}}">Top Areas</a>
                            </li>
                            <li>
                                <a href="{{url('list/exclusive_projects')}}">Exclusive Projects</a>
                            </li>
                            <li>
                                <a href="{{url('list/new_launch_projects')}}">New Launch Projects</a>
                            </li>
                            <li>
                                <a href="{{url('list/property_view')}}">Property View</a>
                            </li>
                        </ul>
                    </li>
    				<li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#regS">
                            <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                    class="right-nav-text">Register
                                </span></div>
                            <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="regS" class="collapse collapse-level-1">
                            <li>
                                <a href="{{url('list/register/buyer')}}">Buyer List</a>
                            </li>
                            <li>
                                <a href="{{url('list/register/seller')}}">Seller List</a>
                            </li>
                            <li>
                                <a href="{{url('list/all/buyer')}}">Buyer Wise Details</a>
                            </li>
                            <li>
                                <a href="{{url('list/all/propertywisedetails')}}">Property Wise Details</a>
                            </li>
                            <li>
                                <a href="{{url('list/all/user')}}">All User List</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('list/landingpage')}}">
                            <div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span
                                    class="right-nav-text">LandingPage</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
				@endif
				@if(Auth::user()->role == "businessdevelopment")
					<li>
						<a href="{{url('properties')}}">
							<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span
									class="right-nav-text">Properties</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Leadd">
                            <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                    class="right-nav-text">Leads
                                </span></div>
                            <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Leadd" class="collapse collapse-level-1">
                            <li>
                                <a href="{{url('website_enquiry')}}">Website Leads</a>
                            </li>
                            <li>
                                <a href="{{url('list/subscription')}}">Subscribers</a>
                            </li>
                            <li>
                                <a href="{{url('list/enquiry')}}">Project Leads</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('list/blog')}}">
                            <div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span
                                    class="right-nav-text">Blog</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
    				<li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr">
                            <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                    class="right-nav-text">Admin
                                </span></div>
                            <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="app_dr" class="collapse collapse-level-1">
                            <li>
                                <a href="{{url('list/requirement')}}">Requirement</a>
                            </li>
                            <li>
                                <a href="{{url('types_of_land')}}">Types of Land</a>
                            </li>
                            <li>
                                <a href="{{url('property_categories')}}">Property Category</a>
                            </li>
                            <li>
                                <a href="{{url('aminities')}}">Aminities</a>
                            </li>
                            <li>
                                <a href="{{url('list/registeruserinfo')}}">Register Information</a>
                            </li>
                            <li>
                                <a href="{{url('propertywise_enquiry')}}">Propertywise Leads</a>
                            </li>
                            <li>
                                <a href="{{url('top_areas_to_invest')}}">Top Areas</a>
                            </li>
                        </ul>
                    </li>
    				<li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#regS">
                            <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                    class="right-nav-text">Register
                                </span></div>
                            <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="regS" class="collapse collapse-level-1">
                            <li>
                                <a href="{{url('list/register/buyer')}}">Buyer List</a>
                            </li>
                            <li>
                                <a href="{{url('list/register/seller')}}">Seller List</a>
                            </li>
                            <li>
                                <a href="{{url('list/all/buyer')}}">Buyer Wise Details</a>
                            </li>
                            <li>
                                <a href="{{url('list/all/propertywisedetails')}}">Property Wise Details</a>
                            </li>
                            <li>
                                <a href="{{url('list/all/user')}}">All User List</a>
                            </li>
                        </ul>
                    </li>
				@endif
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
        <!-- Main Content -->
		<div class="page-wrapper">
            <main>
                @yield('content')
            </main>    
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2023 &copy; Volar Media House</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->			
		</div>
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->	
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[required]').each(function() {
                var label = $(this).closest('.form-group').find('label');
                label.append('<span class="required-asterisk">*</span>');
            });
        });
    </script>
    <!-- JavaScript -->	
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>    
	<!-- Vector Maps JavaScript -->
    <script src="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('dist/js/vectormap-data.js') }}"></script>	
	<!-- Data table JavaScript -->
	<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
	
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
	<!-- Flot Charts JavaScript -->
	<script src="{{ asset('vendors/bower_components/Flot/excanvas.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/Flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/Flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/Flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/Flot/jquery.flot.time.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/Flot/jquery.flot.stack.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/Flot/jquery.flot.crosshair.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>	
    <script src="{{ asset('dist/js/flot-data.js') }}"></script>
	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>	
	<!-- simpleWeather JavaScript -->
	<script src="{{ asset('vendors/bower_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
	<script src="{{ asset('dist/js/simpleweather-data.js') }}"></script>	
	<!-- Progressbar Animation JavaScript -->
	<script src="{{ asset('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>	
	<!-- Fancy Dropdown JS -->
	<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>	
	<!-- Sparkline JavaScript -->
	<script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>	
	<!-- Owl JavaScript -->
	<script src="{{ asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>	
	<!-- EChartJS JavaScript -->
	<script src="{{ asset('vendors/bower_components/echarts/dist/echarts-en.min.js') }}"></script>
	<script src="{{ asset('vendors/echarts-liquidfill.min.js') }}"></script>	
	<!-- Toast JavaScript -->
	<script src="{{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
	<!-- Switchery JavaScript -->
	<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>	
	<!-- Bootstrap Select JavaScript -->
	<script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<!-- Init JavaScript -->
	<script src="{{ asset('dist/js/init.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
	<!-- <script src="{{ asset('dist/js/dashboard2-data.js') }}"></script> -->
	<!-- Tinymce JavaScript -->
	<script src="{{ asset('vendors/bower_components/tinymce/tinymce.min.js') }}"></script>
	<!-- Tinymce Wysuhtml5 Init JavaScript -->
	<script src="{{ asset('dist/js/tinymce-data.js') }}"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <!-- datatables -->
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dist/js/export-table-data.js') }}"></script>
    
	<script type="text/javascript">
		$(document).ready(function() {
			$('#countryTable').DataTable();
		});
		$(document).ready(function() {
			$('#stateTable').DataTable();
		});
		$(document).ready(function() {
			$('#cityTable').DataTable();
		});
		$(document).ready(function() {
			$('#distTable').DataTable();
		});
		$(document).ready(function() {
			$('#areaTable').DataTable();
		});
		$(document).ready(function() {
			$('#example').DataTable();
		});
    </script>
    
</body>

</html>