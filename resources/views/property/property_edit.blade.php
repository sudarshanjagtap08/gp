@extends('admin.master')
@section('content')

@php
    $priceParts = explode(' ', $property->price);
    $selectedLac = (count($priceParts) > 1 && $priceParts[1] == 'Lakh') ? 'selected' : '';
    $selectedCr = (count($priceParts) > 1 && $priceParts[1] == 'Cr') ? 'selected' : '';
    $selectedThousand = (count($priceParts) > 1 && $priceParts[1] == 'Thousand') ? 'selected' : '';
    
    $areaParts = explode(' ', $property->area);
    $selectedGunta = (count($areaParts) > 1 && $areaParts[1] == 'Gunta') ? 'selected' : '';
    $selectedAcr = (count($areaParts) > 1 && $areaParts[1] == 'Acre') ? 'selected' : '';
    $selectedSqft = (count($areaParts) > 1 && $areaParts[1] == 'Sqft') ? 'selected' : '';
    $selectedSqm = (count($areaParts) > 1 && $areaParts[1] == 'Sqm') ? 'selected' : '';

    $openspaceParts = explode(' ', $property->openspace);
    $selectedopenspaceGunta = (count($openspaceParts) > 1 && $openspaceParts[1] == 'Gunta') ? 'selected' : '';
    $selectedopenspaceAcr = (count($openspaceParts) > 1 && $openspaceParts[1] == 'Acre') ? 'selected' : '';
    $selectedopenspaceSqft = (count($openspaceParts) > 1 && $openspaceParts[1] == 'Sqft') ? 'selected' : '';
    $selectedopenspaceSqm = (count($openspaceParts) > 1 && $openspaceParts[1] == 'Sqm') ? 'selected' : '';

    $plot_size_toParts = explode(' ', $property->plot_size_to);
    $selectedplot_size_toGunta = (count($plot_size_toParts) > 1 && $plot_size_toParts[1] == 'Gunta') ? 'selected' : '';
    $selectedplot_size_toAcr = (count($plot_size_toParts) > 1 && $plot_size_toParts[1] == 'Acre') ? 'selected' : '';
    $selectedplot_size_toSqft = (count($plot_size_toParts) > 1 && $plot_size_toParts[1] == 'Sqft') ? 'selected' : '';
    $selectedplot_size_toSqm = (count($plot_size_toParts) > 1 && $plot_size_toParts[1] == 'Sqm') ? 'selected' : '';

    $plot_size_fromParts = explode(' ', $property->plot_size_from);
    $selectedplot_size_fromGunta = (count($plot_size_fromParts) > 1 && $plot_size_fromParts[1] == 'Gunta') ? 'selected' : '';
    $selectedplot_size_fromAcr = (count($plot_size_fromParts) > 1 && $plot_size_fromParts[1] == 'Acre') ? 'selected' : '';
    $selectedplot_size_fromSqft = (count($plot_size_fromParts) > 1 && $plot_size_fromParts[1] == 'Sqft') ? 'selected' : '';
    $selectedplot_size_fromSqm = (count($plot_size_fromParts) > 1 && $plot_size_fromParts[1] == 'Sqm') ? 'selected' : '';
    
@endphp
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
                                    <form action="{{ url('properties/update/'.$property->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i
                                                    class="zmdi zmdi-account mr-10"></i>Update Property</h6>
                                            <hr class="light-grey-hr" />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    value="{{ $property->title }}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Price</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 pr-0">
                                                                        <input type="text" name="onward_price" class="form-control" value="{{ explode(' ', $property->price)[0] }}">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="price_unit" class="form-control" aria-label="Default select example">
                                                                            <option value="Thousand" {{ $selectedThousand }}>Thousand</option>
                                                                            <option value="Lakh" {{ $selectedLac }}>Lakh</option>
                                                                            <option value="Cr" {{ $selectedCr }}>Cr</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Offer (%)</label>
                                                                <input type="text" name="offer" class="form-control"
                                                                    placeholder="" value="{{ $property->offer }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Loan Available</label>
                                                                <input type="text" name="loan" class="form-control"
                                                                    value="{{ $property->loan }}">
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
                                                                        <option value="{{ $country->id }}"
                                                                            {{$property->country_id == $country->id ? 'selected' : ''}}>
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
                                                                        @foreach($states as $state)
                                                                        <option value="{{ $state->id }}"
                                                                            {{ $property->state_id == $state->id ? 'selected' : '' }}>
                                                                            {{ $state->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Dist</label>
                                                                    <select name="dist_id" id="dist" class="form-control" required>
                                                                        <option value="">Not Selected</option>
                                                                        @foreach($districts as $dist)
                                                                        <option value="{{ $dist->id }}"
                                                                            {{ $property->dist_id == $dist->id ? 'selected' : '' }}>
                                                                            {{ $dist->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">City</label>
                                                                    <select name="city_id" id="city" class="form-control" required>
                                                                        <option value="">Not Selected</option>
                                                                        @foreach($cities as $city)
                                                                        <option value="{{ $city->id }}"
                                                                            {{ $property->city_id == $city->id ? 'selected' : '' }}>
                                                                            {{ $city->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Area</label>
                                                                    <select name="area_id" id="area" class="form-control" required>
                                                                        <option value="">Not Selected</option>
                                                                        @foreach($areas as $area)
                                                                        <option value="{{ $area->id }}"
                                                                            {{ $property->area_id == $area->id ? 'selected' : '' }}>
                                                                            {{ $area->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Landmark</label>
                                                                    <input type="text" name="landmark" class="form-control"
                                                                        placeholder="" value="{{ $property->landmark }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Latitude</label>
                                                                    <input type="text" name="latitude" class="form-control"
                                                                        placeholder="" value="{{ $property->lat }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Longitude</label>
                                                                    <input type="text" name="longitude" class="form-control"
                                                                        placeholder="" value="{{ $property->lng }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Short
                                                                        Address</label>
                                                                    <textarea class="form-control" name="short_address"
                                                                        id=""
                                                                        rows="2">{{ $property->short_address }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Address</label>
                                                                    <textarea class="form-control" name="address" id=""
                                                                        rows="2">{{ $property->address }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">location Connectivity</label>
                                                                <div id="locationconnectivityContainer">
                                                                    <div class="location-container">
                                                                    </div>
                                                                </div>
                                                            <button type="button" id="addlocationconnectivity" class="btn btn-primary btn-sm" style="padding: 2px 7px;">+</button>
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
                                                                    <option value="{{$landtype->id}}"
                                                                        {{$property->property_type_id == $landtype->id ? 'selected' : ''}}>
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
                                                                    <option value="{{$propertystatus->id}}"
                                                                        {{$property->property_status_id == $propertystatus->id ? 'selected' : ''}}>
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
                                                                    <option value="{{$propertyview->id}}"
                                                                        {{$property->property_view_id == $propertyview->id ? 'selected' : ''}}>
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
                                                                        <input type="text" name="area" class="form-control" value="{{ explode(' ', $property->area)[0] }}">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="area_unit" class="form-control" aria-label="Default select example" >
                                                                            <!--<option value="Gunta" {{ $selectedGunta }}>Gunta</option>-->
                                                                            <option value="Acre" {{ $selectedAcr }}>Acre</option>
                                                                            <option value="Sqft" {{ $selectedSqft }}>Sq.ft</option>
                                                                            <option value="Sqm" {{ $selectedSqft }}>Sq.m</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Plot Size From</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 pr-0">
                                                                        <input type="number" name="plot_size_from" class="form-control" value="{{ explode(' ', $property->plot_size_from)[0] }}">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="plot_size_from_unit" class="form-control" aria-label="Default select example">
                                                                            <!--<option value="Gunta" {{ $selectedplot_size_fromGunta }}>Gunta</option>-->
                                                                            <option value="Acre" {{ $selectedplot_size_fromAcr }}>Acre</option>
                                                                            <option value="Sqft" {{ $selectedplot_size_fromSqft }}>Sqft</option>
                                                                            <option value="Sqm" {{ $selectedplot_size_fromSqm }}>Sqm</option>
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
                                                                        <input type="number" name="plot_size_to" class="form-control" value="{{ explode(' ', $property->plot_size_to)[0] }}">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="plot_size_to_unit" class="form-control" aria-label="Default select example">
                                                                            <!--<option value="Gunta" {{ $selectedplot_size_toGunta }}>Gunta</option>-->
                                                                            <option value="Acre" {{ $selectedplot_size_toAcr }}>Acre</option>
                                                                            <option value="Sqft" {{ $selectedplot_size_toSqft }}>Sqft</option>
                                                                            <option value="Sqm" {{ $selectedplot_size_toSqm }}>Sqm</option>
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
                                                                        <input type="text" name="openspace" class="form-control" value="{{ explode(' ', $property->openspace)[0] }}">
                                                                    </div>
                                                                    <div class="col-md-6 pl-0">
                                                                        <select name="openspace_unit" class="form-control" aria-label="Default select example">
                                                                            <!--<option value="Gunta" {{ $selectedGunta }}>Gunta</option>-->
                                                                            <!--<option value="Sqft" {{ $selectedSqft }}>Sqft</option>-->
                                                                            <option value="Acre" {{ $selectedopenspaceAcr }}>Acre</option>selectedopenspaceAcr
                                                                            <option value="Sqft" {{ $selectedopenspaceSqft }}>Sqft</option>
                                                                            <option value="Sqm" {{ $selectedopenspaceSqm }}>Sqm</option>
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
                                                                    class="form-control" placeholder="" value="{{ $property->possession }}">
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
                                                                    <input type="file" name="images[]" id="imageInput"
                                                                        accept="image/*" class="form-control" multiple />
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
                                                                <label class="control-label mb-10">You Tube Link <span style="color: red;">(Max 3)</span></label>
                                                                <div id="youtubesContainer">
                                                                    <div class="youtube-container">
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
                                                                    id="description"
                                                                    rows="5">{{ $property->description }}</textarea>
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
                                                                        <input class="form-control" name="investment_benifittitle" value="{{ $property->investment_benifittitle }}" id="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10">Description</label>
                                                                        <textarea class="form-control" name="investment_benifitdescription"
                                                                            rows="2">{{ $property->investment_benifitdescription }}</textarea>
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
                                                                        <div id="propertyfeaturesContainer">
                                                                            <div class="propertyfeature-container">
                                                                                <!--<input class="form-control" name="propertyfeature[]" />-->
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
                                                                class="zmdi zmdi-account mr-10"></i>Project Aminities
                                                        </h6>
                                                        <hr class="light-grey-hr" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                @foreach($aminities as $aminitie)
                                                                <div class="checkbox checkbox-success checkbox-circle">
                                                                    <input type="checkbox"
                                                                        id="aminitie_{{ $aminitie->id }}"
                                                                        name="aminities[]"
                                                                        value="{{ $aminitie->id }}"
                                                                        @if (in_array($aminitie->id, $property->aminityids->pluck('aminity_id')->toArray())) checked @endif >

                                                                    <label for="aminitie_{{ $aminitie->id }}">{{ $aminitie->name }}</label>
                                                                </div>
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                        <!--<h6 class="txt-dark capitalize-font"><i-->
                                                        <!--        class="zmdi zmdi-account mr-10"></i>Property Category-->
                                                        <!--</h6>-->
                                                        <!--<hr class="light-grey-hr" />-->
                                                        <!--<div class="col-md-12">-->
                                                        <!--    <div class="form-group">-->
                                                        <!--       @foreach($propertycategory as $category)-->
                                                        <!--            <div-->
                                                        <!--                class="checkbox checkbox-success checkbox-circle">-->
                                                        <!--                <input type="checkbox"-->
                                                        <!--                    id="category_{{ $category->id }}"-->
                                                        <!--                    name="propertycategory_id[]"-->
                                                        <!--                    value="{{ $category->id }}"-->
                                                        <!--                    @if (in_array($category->id, $property->property_categoryids->pluck('property_category_id')->toArray())) checked @endif >-->
                                                        <!--                <label-->
                                                        <!--                    for="category_{{ $category->id }}">{{ $category->name }}</label>-->
                                                        <!--            </div>-->
                                                        <!--            @endforeach-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        <!--<h6 class="txt-dark capitalize-font"><i-->
                                                        <!--        class="zmdi zmdi-account mr-10"></i>Localities Details-->
                                                        <!--</h6>-->
                                                        <!--<hr class="light-grey-hr" />-->
                                                        <!--<div class="col-md-12">-->
                                                        <!--    <div class="form-group">-->
                                                        <!--        <input type="checkbox" id="top_localities" name="top_localities" -->
                                                        <!--            {{ $property->top_localities ? 'checked' : '' }} />-->
                                                        <!--        <label>Top Localities</label><br>-->
                                                        <!--        <input type="checkbox" id="emerging_localities"-->
                                                        <!--            name="emerging_localities" -->
                                                        <!--            {{ $property->emerging_localities ? 'checked' : '' }} />-->
                                                        <!--        <label>Emerging Localities</label><br>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10"> Update</button>
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
                    $('#dist').empty().append('<option value="">Not Selected</option>');
                    $.each(data, function(key, value) {
                        $('#dist').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });
        } else {
            $('#dist').empty().append('<option value="">Not Selected</option>');
        }
    });
    $('#dist').on('change', function() {
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

<script>
    $(document).ready(function() {
        // Add existing features to the feature container
        @foreach($property->investmentbenifits as $feature)
            var existingFeatureInput = '<div class="feature-container"><input class="form-control" name="feature[]" value="{{ $feature->name }}" /></div>';
            $("#featuresContainer").append(existingFeatureInput);
        @endforeach

        // Add new feature input box when clicking the plus button
        $("#addFeature").click(function() {
            var newFeatureInput = '<div class="feature-container"><input class="form-control" name="feature[]" /></div>';
            $("#featuresContainer").append(newFeatureInput);
        });
    });
</script>
<script>
    $(document).ready(function() {
        @foreach($property->youtubes as $youtube)
            var existingYoutubeInput = '<div class="youtube-container"><input class="form-control" name="youtube[]" value="{{ $youtube->name }}" /></div>';
            $("#youtubesContainer").append(existingYoutubeInput);
        @endforeach

        $("#addYoutube").click(function() {
            var newYoutubeInput = '<div class="youtube-container"><input class="form-control" name="youtube[]" /></div>';
            $("#youtubesContainer").append(newYoutubeInput);
        });
    });
</script>
<script>
    $(document).ready(function() {
        @foreach($property->propertyfeatures as $propertyfeature)
            var existingPropertyfeatureInput = '<div class="propertyfeature-container"><input class="form-control" name="propertyfeature[]" value="{{ $propertyfeature->feature }}" /></div>';
            $("#propertyfeaturesContainer").append(existingPropertyfeatureInput);
        @endforeach

        $("#addPropertyfeature").click(function() {
            var newPropertyfeatureInput = '<div class="propertyfeature-container"><input class="form-control" name="propertyfeature[]" /></div>';
            $("#propertyfeaturesContainer").append(newPropertyfeatureInput);
        });
    });
</script>
<script>
    $(document).ready(function() {
        @foreach($property->locationconnectivities as $locationconnectivity)
            var existinglocationInput = '<div class="location-container"><input class="form-control" name="locationconnectivity[]" value="{{ $locationconnectivity->name }}" /></div>';
            $("#locationconnectivityContainer").append(existinglocationInput);
        @endforeach

        $("#addlocationconnectivity").click(function() {
            var newLocationInput = '<div class="location-container"><input class="form-control" name="locationconnectivity[]" /></div>';
            $("#locationconnectivityContainer").append(newLocationInput);
        });
    });
</script>

@endsection