@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Property Details</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    <form action="{{ url('list/property/save')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i
                                                    class="zmdi zmdi-account mr-10"></i>Add Property</h6>
                                            <hr class="light-grey-hr" />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Price</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 pr-0">
                                                                        <input type="text" name="onward_price"
                                                                            class="form-control"
                                                                            placeholder="Enter price and select unit" required>
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select class="form-control" name="price_unit"
                                                                            aria-label="Default select example">
                                                                            <option value="Thousand">Thousand</option>
                                                                            <option value="Lakh">Lakh</option>
                                                                            <option value="Cr">Cr</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Offer</label>
                                                                <input type="text" name="offer" class="form-control"
                                                                    placeholder="" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Loan Available</label>
                                                                <input type="text" name="loan" class="form-control"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--new section start-->
                                                <div class="col-md-12">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                                class="zmdi zmdi-account mr-10"></i>Location  Details</h6>
                                                        <hr class="light-grey-hr" />
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Country Name</label>
                                                                    <select name="country_id" id="country"
                                                                        class="form-control" required>
                                                                        <option value="">Not Selected</option>
                                                                        @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}">
                                                                            {{ $country->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">State</label>
                                                                    <select name="state_id" id="state" class="form-control" required>
                                                                        <option value="">Not Selected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">District</label>
                                                                    <select name="dist_id" id="district" class="form-control" required>
                                                                        <option value="">Not Selected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">City</label>
                                                                    <select name="city_id" id="city" class="form-control" required>
                                                                        <option value="">Not Selected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Area</label>
                                                                    <select name="area_id" id="area" class="form-control" required>
                                                                        <option value="">Not Selected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Landmark</label>
                                                                    <input type="text" name="landmark" class="form-control"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Latitude</label>
                                                                    <input type="text" name="latitude" class="form-control"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Longitude</label>
                                                                    <input type="text" name="longitude" class="form-control"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Short
                                                                        Address</label>
                                                                    <textarea class="form-control" name="short_address"
                                                                        id="" rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Address</label>
                                                                    <textarea class="form-control" name="address" id=""
                                                                        rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">location Connectivity</label>
                                                                <div id="LocationConnectivityContainer">
                                                                    <div class="locationconnectivity-container">
                                                                        <input class="form-control" name="locationconnectivity[]" />
                                                                    </div>
                                                                </div>
                                                                <button type="button" id="addLocationConnectivity" class="btn btn-primary btn-sm" style="padding: 2px 7px;">+</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!--new section start-->
                                                <div class="col-md-12">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                                class="zmdi zmdi-account mr-10"></i>Property Sizes & Details</h6>
                                                        <hr class="light-grey-hr" />
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label class="control-label mb-10">Property Type</label>
                                                                <select name="property_type_id" id="property_type_id"
                                                                    class="form-control">
                                                                    <option value="">Select</option>
                                                                    @foreach($landtype as $landtype)
                                                                    <option value="{{$landtype->id}}">
                                                                        {{$landtype->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Property
                                                                    Status</label>
                                                                <select name="property_status_id"
                                                                    id="property_status_id" class="form-control">
                                                                    <option value="">Not Selected</option>
                                                                    @foreach($propertystatus as $propertystatus)
                                                                    <option value="{{$propertystatus->id}}">
                                                                        {{$propertystatus->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Property
                                                                    View</label>
                                                                <select name="property_view_id" id="property_view_id"
                                                                    class="form-control">
                                                                    <option value="">Not Selected</option>
                                                                    @foreach($propertyview as $propertyview)
                                                                    <option value="{{$propertyview->id}}">
                                                                        {{$propertyview->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label class="control-label mb-10">Total Project Size</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 pr-0">
                                                                        <input type="text" name="area" class="form-control" placeholder="Enter Total Project Size and select unit">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="area_unit" class="form-control" aria-label="Default select example">
                                                                            <option value="Acre">Acre</option>
                                                                            <option value="Sqft">Sq.ft</option>
                                                                            <option value="Sq.m">Sq.m</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label class="control-label mb-10">Plot Size From</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 pr-0">
                                                                        <input type="text" name="plot_size_from"
                                                                            class="form-control"
                                                                            placeholder="Enter Open Space and select unit">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="plot_size_from_unit" class="form-control"
                                                                            aria-label="Default select example">
                                                                            <option value="Acre">Acre</option>
                                                                            <option value="Sqft">Sq.ft</option>
                                                                            <option value="Sqm">Sq.m</option>
                                                                            <!--<option value="Gunta">Gunta</option>-->
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label class="control-label mb-10">Plot Size To</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 pr-0">
                                                                        <input type="text" name="plot_size_to"
                                                                            class="form-control"
                                                                            placeholder="Enter Open Space and select unit">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="plot_size_from_to" class="form-control"
                                                                            aria-label="Default select example">
                                                                            <option value="Acre">Acre</option>
                                                                            <option value="Sqft">Sq.ft</option>
                                                                            <option value="Sqft">Sq.m</option>
                                                                            <!--<option value="Gunta">Gunta</option>-->
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label class="control-label mb-10">Open Space</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 pr-0">
                                                                        <input type="text" name="openspace"
                                                                            class="form-control"
                                                                            placeholder="Enter Open Space and select unit">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="openspace_unit" class="form-control"
                                                                            aria-label="Default select example">
                                                                            <!--<option value="Gunta">Gunta</option>-->
                                                                            <option value="Acre">Acre</option>
                                                                            <option value="Sqft">Sq.ft</option>
                                                                            <option value="Sqm">Sq.m</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Possession
                                                                    date</label>
                                                                <input type="text" name="possession"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--new section start-->
                                                <div class="col-md-12">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                                class="zmdi zmdi-account mr-10"></i>Property Images</h6>
                                                        <hr class="light-grey-hr" />
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Select Header Images<span style="color: red;">(Only 3 & Max file size is 2MB)</span></label>
                                                                    <input type="file" name="images[]" id="imageInput" accept="image/*" class="form-control" multiple required />
                                                                    <div id="error-message" class="error"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Select Layout & Plans Images <span style="color: red;">(Max file size is 2MB)</span></label>
                                                                    <input type="file" name="layoutimages[]" id="imageInput"
                                                                        accept="image/*" class="form-control" multiple />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Select Actual Images <span style="color: red;">(Max file size is 2MB)</span></label>
                                                                    <input type="file" name="actualimages[]" id="imageInput"
                                                                        accept="image/*" class="form-control" multiple />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Brochure</label>
                                                                    <input type="file" name="brochure" id="imageInput"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">You Tube Link<span style="color: red;">(Max 3)</span></label>
                                                                <div id="youtubeContainer">
                                                                    <div class="youtube-container">
                                                                        <input class="form-control" name="youtube[]" />
                                                                    </div>
                                                                </div>
                                                                <button type="button" id="addYoutube" class="btn btn-primary btn-sm" style="padding: 2px 7px;">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <label class="control-label mb-10">Description</label>
                                                                <textarea class="tinymce" name="description"
                                                                    id="description" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="txt-dark capitalize-font"><i
                                                                    class="zmdi zmdi-account mr-10"></i>Investment
                                                                Benifits / About Developer</h6>
                                                            <hr class="light-grey-hr" />
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10">Titile</label>
                                                                        <input class="form-control" name="investment_benifittitle" id="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10">Description</label>
                                                                        <textarea class="form-control" name="investment_benifitdescription" id=""
                                                                            rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label mb-10">Image</label>
                                                                        <input type="file" name="investment_benifitimage"
                                                                            id="" class="form-control" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10">Feature</label>
                                                                        <div id="featuresContainer">
                                                                            <div class="feature-container">
                                                                                <input class="form-control" name="feature[]" />
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" id="addFeature" class="btn btn-primary btn-sm" style="padding: 2px 7px;">+</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="txt-dark capitalize-font"><i
                                                                    class="zmdi zmdi-account mr-10"></i>Feature</h6>
                                                            <hr class="light-grey-hr" />
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div id="propertyfeatureContainer">
                                                                            <div class="propertyfeature-container">
                                                                                <input class="form-control" name="propertyfeature[]" />
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" id="addPropertyfeature" class="btn btn-primary btn-sm" style="padding: 2px 7px;">+</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <h6 class="txt-dark capitalize-font"><i
                                                                    class="zmdi zmdi-account mr-10"></i>Aminities</h6>
                                                            <hr class="light-grey-hr" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                @foreach($aminities as $aminitie) 
                                                                    <input type="checkbox" id="aminities_{{$aminitie->id}}"
                                                                        name="aminities[]" value="{{ $aminitie->id }}"/>
                                                                    <label>{{$aminitie->name}}</label><br>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <!--<h6 class="txt-dark capitalize-font"><i-->
                                                        <!--        class="zmdi zmdi-account mr-10"></i>Property Category-->
                                                        <!--</h6>-->
                                                        <!--<hr class="light-grey-hr" />-->
                                                        <!--<div class="col-md-12">-->
                                                        <!--    <div class="form-group">-->
                                                        <!--        @foreach($propertycategory as $propertycategory)-->
                                                        <!--        <input type="checkbox"-->
                                                        <!--            id="category_{{ $propertycategory->id }}"-->
                                                        <!--            name="propertycategory_id[]"-->
                                                        <!--            value="{{ $propertycategory->id }}">-->
                                                        <!--        <label>{{$propertycategory->name}}</label><br>-->
                                                        <!--        @endforeach-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        <!--<h6 class="txt-dark capitalize-font"><i-->
                                                        <!--        class="zmdi zmdi-account mr-10"></i>Localities Details-->
                                                        <!--</h6>-->
                                                        <!--<hr class="light-grey-hr" />-->
                                                        <!--<div class="col-md-12">-->
                                                        <!--    <div class="form-group">-->
                                                        <!--        <input type="checkbox" id="top_localities" name="top_localities" />-->
                                                        <!--        <label>Top Localities</label><br>-->
                                                        <!--        <input type="checkbox" id="emerging_localities"-->
                                                        <!--            name="emerging_localities" />-->
                                                        <!--        <label>Emerging Localities</label><br>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10"> Save</button>
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
<script>
  $(document).ready(function() 
  {
    $("#addLocationConnectivity").click(function() {
      var newLocationConnectivityInput = '<div class="locationconnectivity-container"><input class="form-control" name="locationconnectivity[]" /></div>';
      $("#LocationConnectivityContainer").append(newLocationConnectivityInput);
    });
  });
</script>
<script>
  $(document).ready(function() 
  {
    $("#addYoutube").click(function() {
      var newYoutubeInput = '<div class="youtube-container"><input class="form-control" name="youtube[]" /></div>';
      $("#youtubeContainer").append(newYoutubeInput);
    });
  });
</script>
<script>
  $(document).ready(function() 
  {
    $("#addPropertyfeature").click(function() {
      var newpropertyfeatureInput = '<div class="propertyfeature-container"><input class="form-control" name="propertyfeature[]" /></div>';
      $("#propertyfeatureContainer").append(newpropertyfeatureInput);
    });
  });
</script>
<script>
  $(document).ready(function() 
  {
    $("#addFeature").click(function() {
      var newFeatureInput = '<div class="feature-container"><input class="form-control" name="feature[]" /></div>';
      $("#featuresContainer").append(newFeatureInput);
    });
  });
</script>
<script>
$(document).ready(function() {
    $('#country').on('change', function() {
        var countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: "{{ route('get.states') }}",
                type: "GET",
                data: {
                    country_id: countryId
                },
                success: function(data) {
                    $('#state').empty().append('<option value="">Not Selected</option>');
                    $.each(data, function(key, value) {
                        $('#state').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });
        } else {
            $('#state').empty().append('<option value="">Not Selected</option>');
            $('#city').empty().append('<option value="">Not Selected</option>');
        }
    });
    $('#state').on('change', function() {
        var stateId = $(this).val();
        if (stateId) {
            $.ajax({
                url: "{{ route('get.district') }}",
                type: "GET",
                data: {
                    state_id: stateId
                },
                success: function(data) {
                    $('#district').empty().append('<option value="">Not Selected</option>');
                    $.each(data, function(key, value) {
                        $('#district').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });
        } else {
            $('#district').empty().append('<option value="">Not Selected</option>');
        }
    });
    $('#district').on('change', function() {
        var distId = $(this).val();
        if (distId) {
            $.ajax({
                url: "{{ route('get.cities') }}",
                type: "GET",
                data: {
                    dist_id: distId
                },
                success: function(data) {
                    $('#city').empty().append('<option value="">Not Selected</option>');
                    $.each(data, function(key, value) {
                        $('#city').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });
        } else {
            $('#city').empty().append('<option value="">Not Selected</option>');
        }
    });
    $('#city').on('change', function() {
        var cityId = $(this).val();
        if (cityId) {
            $.ajax({
                url: "{{ route('get.areas') }}",
                type: "GET",
                data: {
                    city_id: cityId
                },
                success: function(data) {
                    $('#area').empty().append('<option value="">Not Selected</option>');
                    $.each(data, function(key, value) {
                        $('#area').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });
        } else {
            $('#area').empty().append('<option value="">Not Selected</option>');
        }
    });
});
</script>
<!--<script>-->
<!--    document.getElementById('imageInput').addEventListener('change', function(event) {-->
        const maxSize = 2 * 1024 * 1024; // 2MB in bytes
<!--        const files = event.target.files;-->
<!--        let errorMessage = '';-->
        
<!--        for (const file of files) {-->
<!--            if (file.size > maxSize) {-->
<!--                errorMessage += `The file ${file.name} is too large. Size: ${(file.size / (1024 * 1024)).toFixed(2)} MB.<br>`;-->
<!--            }-->
<!--        }-->

<!--        const errorDiv = document.getElementById('error-message');-->
<!--        if (errorMessage) {-->
<!--            errorDiv.innerHTML = errorMessage;-->
            event.target.value = ''; // Clear the input if any file is too large
<!--        } else {-->
<!--            errorDiv.innerHTML = '';-->
<!--        }-->
<!--    });-->
<!--</script>-->
@endsection