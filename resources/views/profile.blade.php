@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Profile</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                       <div class="row">
        					<div class="col-lg-3 col-xs-12">
        						<div class="panel panel-default card-view  pa-0">
        							<div class="panel-wrapper collapse in">
        								<div class="panel-body  pa-0">
        									<div class="profile-box">
        										<div class="profile-cover-pic">
        											<div class="fileupload btn btn-default">
        												<!--<span class="btn-text">edit</span>-->
        												<input class="upload" type="file">
        											</div>
        											<div class="profile-image-overlay"></div>
        										</div>
        										<div class="profile-info text-center">
        											<div class="profile-img-wrap">
        												<img class="inline-block mb-10" src="{{ asset('images/userinfo/'.Auth::user()->image)}}" alt="user"/>
        												<div class="fileupload btn btn-default">
        													<!--<span class="btn-text">edit</span>-->
        													<input class="upload" type="file">
        												</div>
        											</div>	
        											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-orange">{{Auth::user()->name}}</h5>
        											<h6 class="block capitalize-font pb-20">{{$userinfo->address}}</h6>
        										</div>	
        										<div class="social-info">
        											<div class="row">
        												<div class="col-xs-4 text-center">
        													<span class="counts block head-font"><span class="counter-anim">{{$shortlistedCount}}</span></span>
        													<span class="counts-text block">Shortlisted Property</span>
        												</div>
        												<div class="col-xs-4 text-center">
        													<span class="counts block head-font"><span class="counter-anim">{{$propertyseenCount}}</span></span>
        													<span class="counts-text block">Viewed Property</span>
        												</div>
        												<div class="col-xs-4 text-center">
        													<span class="counts block head-font"><span class="counter-anim">{{$propertyenquiryCount}}</span></span>
        													<span class="counts-text block">Contacted Property</span>
        												</div>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        					<div class="col-lg-9 col-xs-12">
        					    <!-- Row -->
        							<div class="row">
        								<div class="col-lg-12">
        									<div class="">
        										<div class="panel-wrapper collapse in">
        											<div class="panel-body pa-0">
        												<div class="col-sm-12 col-xs-12">
        													<div class="form-wrap">
        														<form method="post" action="{{url('submit_profile')}}" enctype="multipart/form-data">
        														    @csrf
        															<div class="form-body overflow-hide">
        																<div class="form-group">
        																    <label class="control-label mb-10" >Full Name</label>
        																	<div class="input-group">
        																		<div class="input-group-addon"><i class="icon-user"></i></div>
        																	    	<input type="text" class="form-control" name ="name" placeholder="Enter Full Name" value="{{Auth::user()->name}}">
        																	</div>
        																</div>
        																<div class="form-group">
        																    <label class="control-label mb-10">Company Name</label>
        																	<div class="input-group">
        																		<div class="input-group-addon"><i class="icon-user"></i></div>
        																	    	<input type="text" class="form-control" id="" name="company_name" placeholder="Enter Company Name" value="{{$userinfo->company_name}}">
        																	</div>
        																</div>
        																<div class="form-group">
        																    <label class="control-label mb-10" for="">Address</label>
        																	<div class="input-group">
        																		<div class="input-group-addon"><i class="icon-user"></i></div>
        																	    	<input type="text" class="form-control" id="" name="address" placeholder="Enter Address" value="{{$userinfo->address}}">
        																	</div>
        																</div>
            															<div class="col-md-6">
                														    <div class="form-group">
                															    <label class="control-label mb-10" for="">Contact number</label>
                																<div class="input-group">
                															    	<div class="input-group-addon"><i class="icon-phone"></i></div>
                																    <input type="number" class="form-control" id="" name="contact_number" placeholder="" value="{{$userinfo->contact_number}}">
                																</div>
                															</div>
                														</div>
                														<div class="col-md-6">
            															    <div class="form-group">
                														        <label class="control-label mb-10" for="">Whatsap number</label>
                																<div class="input-group">
                																	<div class="input-group-addon"><i class="icon-phone"></i></div>
                														    		<input type="number" class="form-control" id="" name="whatsapp_number" value="{{$userinfo->whatsapp_number}}">
                																</div>
                															</div>
            														    </div>
            														    <div class="col-md-6">
            																<div class="form-group">
            																	<label class="control-label mb-10" for="">Email address</label>
            																	<div class="input-group">
            																		<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
            																    	<input type="email" class="form-control" id="" name="email" placeholder="" value="{{Auth::user()->email}}">
            																	</div>
            																</div>
            															</div>
            															<div class="col-md-6">
            																<div class="form-group">
            																	<label class="control-label mb-10" for="">Password</label>
            																    <div class="input-group">
            																		<div class="input-group-addon"><i class="icon-lock"></i></div>
            																       	<input type="password" class="form-control" id="" name="password" placeholder="Enter pwd" >
            																	</div>
            																</div>
            															</div>
            															<div class="col-md-6">
            																<div class="form-group">
            																	<label class="control-label mb-10" for="">Password Confirm</label>
            																    <div class="input-group">
            																		<div class="input-group-addon"><i class="icon-lock"></i></div>
            																       	<input type="password" class="form-control" id="" name="passwordconfirm" placeholder="Enter pwd" >
            																	</div>
            																</div>
            															</div>
            															<div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <!--<select class="form-control" style="display:hidden">-->
                                                                                <!--    <option value="Developer">Developer</option>-->
                                                                                <!--    <option value="Channel Partner">Channel Partner</option>-->
                                                                                <!--    <option value="Owner">Owner</option>-->
                                                                                <!--    <option value="Others">Others</option>-->
                                                                                <!--</select>-->
                                                                                <label class="control-label mb-10">Type</label>
                                                                                <select name="area_unit" class="form-control" aria-label="Default select example">
                                                                                    <option value="Developer">Developer</option>
                                                                                    <option value="Channel Partner">Channel Partner</option>
                                                                                    <option value="Owner">Owner</option>
                                                                                    <option value="Others">Others</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

            														    <div class="col-md-6">
                    														<div class="form-group">
                															    <label class="control-label mb-10" for="">City</label>
                																<div class="input-group">
                																	<div class="input-group-addon"><i class="icon-phone"></i></div>
                																	<input type="text" class="form-control" name="city" id="" placeholder="Enter Your City Name" value="{{$userinfo->city}}">
                																</div>
                															</div>
                														</div>
                														<div class="col-md-6">
                														    <div class="form-group">
            																    <label class="control-label mb-10" for="">Occupation</label>
            																	<div class="input-group">
            																		<div class="input-group-addon"><i class="icon-user"></i></div>
            																	    	<input type="text" class="form-control" id="" name="occupation" placeholder="Enter Occupation" value="{{$userinfo->occupation}}">
            																	</div>
            																</div>
                														</div>
                														<div class="col-md-6">
            															    <div class="form-group">
                															    <label class="control-label mb-10" for="">PinCode</label>
                																<div class="input-group">
                																	<div class="input-group-addon"><i class="icon-phone"></i></div>
                																	<input type="text" class="form-control" id="" name="pincode" value="{{$userinfo->pincode}}">
                																</div>
                															</div>
                														</div>
                														<div class="col-md-6">
            															    <div class="form-group">
                															    <label class="control-label mb-10" for="">Profile Photo</label>
                																<div class="input-group">
                																	<div class="input-group-addon"><i class="icon-user"></i></div>
                																	<input type="file" class="form-control" id="" name="image">
                																</div>
                															</div>
                														</div>
        															</div>
        														</div>
        														<div class="form-actions mt-10">			
        															<button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
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
        				</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection