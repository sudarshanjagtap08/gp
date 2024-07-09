@extends('website.header')

@section('metatitle', "Find Your Perfect Land with Genuine Plots | Residenatial, Agricultural and NA Land")
@section('metadescription', "Experience a hassle-free land buying process with Genuine Plots. Our transparent process covers residential, agricultural, commercial, industrial, and NA land/plots for sale. Visit Now!")
@section('metakeyword', "Genuine Plots | Residential Lands for Sale | Agricultural Land for Sale | NA Plots for Sale | Land for Sale Near Me | Commercial Plots Near me | Industrial Land For Sale | Non- agricultural Land For Sale Near me")
@section('content')
@if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
@extends('website.homepagebanner')
<!--<section class="overview mt-3 mt-md-0 py-5">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center align-items-center">-->
<!--            <div class="col-md-6 d-md-none mb-3 mb-md-0">-->
<!--                <div class="">-->
<!--                    <img src="{{ asset('website/images/overview-genuine-plot-300x300.jpg') }}"-->
<!--                        class="img-fluid rounded-4" alt="Genuine Plot Overview">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6">-->
<!--                <div class="section_title text-center text-md-start">-->
<!--                    <h1 class="h2">-->
<!--                        {{$about->title}}-->
<!--                    </h1>-->
<!--                    <p>{{$about->short_description}}</p>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <p class="m-0 text-justify">-->
<!--                        {{$about->description}}-->
<!--                    </p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 d-none d-md-block">-->
<!--                <div class="">-->
<!--                    <img src="{{ asset('images/about/'.$about->image)}}"-->
<!--                        class="img-fluid rounded-4" alt="Genuine Plot Overview">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="py-2 plots_collection">
    <div class="container">
        <div class="title_wrapper">
            <div class="section_title text-center">
                <h2 class="h2">
                    New Launch Projects
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white p-3 p-md-4 rounded shadow text-justify">
                    <section id="gallery" class="overflow-hidden" data-aos="zoom-in" data-aos-duration="1200">
                        <div class="container">
                            <div class="row p-2">
                                <div class="slide-container swiper ">
                                    <div class="slide-content-gallery">
                                        <div class="card-wrapper swiper-wrapper d-flex align-items-center">
                                            @foreach($newlaunchprojects as $project)
                                                <div class="card swiper-slide">
                                                    <div class="gallery-img">
                                                        <a
                                                            href="{{ route('property', ['propertySlug' => $project->property->slug]) }}">
                                                            <!-- Image -->
                                                            <img src="{{ asset('images/property_images/'.$project->property->images[0]->name) }}"
                                                                class="d-block w-100" alt="{{$project->property->images[0]->aux1}}">
                                                            <!-- Content -->
                                                            <div class="box_wrapper z-2 position-absolute">
                                                                <div class="d-flex justify-content-between">
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="price_wrapper z-2 px-4 py-2 position-absolute bottom-0 start-0 end-0">
                                                                <div>
                                                                    <h6 id="top_properties_price" class="mb-1">₹ {{ $project->property->price }}
                                                                    </h6>
                                                                    <p class="item_title fs-tiny w-100">{{ $project->property->title }}
                                                                    </p>
                                                                    <p class="item_title fs-tiny w-100">{{ $project->property->short_address }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="pt-3 text-center">
                <a href="{{ route('property.newlaunchprojects') }}" class="btn_load_more link_default">Read More <span class="loader-icon"></span></a>
            </div>
        </div>
    </div>
</section>
<section class="py-2 plots_collection">
    <div class="container">
        <div class="title_wrapper">
            <div class="section_title text-center">
                <h2 class="h2">
                    Ready Possession Projects
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white p-3 p-md-4 rounded shadow text-justify">
                    <section id="gallery" class="overflow-hidden" data-aos="zoom-in" data-aos-duration="1200">
                        <div class="container">
                            <div class="row p-2">
                                <div class="slide-container swiper ">
                                    <div class="slide-content-gallery">
                                        <div class="card-wrapper swiper-wrapper d-flex align-items-center">
                                            @foreach($readypossessionprojects as $project)
                                                <div class="card swiper-slide">
                                                    <div class="gallery-img">
                                                        <a
                                                            href="{{ route('property', ['propertySlug' => $project->property->slug]) }}">
                                                            <!-- Image -->
                                                            <img src="{{ asset('images/property_images/'.$project->property->images[0]->name) }}"
                                                                class="d-block w-100" alt="{{$project->property->images[0]->aux1}}">
                                                            <!-- Content -->
                                                            <div class="box_wrapper z-2 position-absolute">
                                                                <div class="d-flex justify-content-between">
                                                                    <!--<div>-->
                                                                    <!--    <div class="feature_box box_default">-->
                                                                    <!--        FEATURED-->
                                                                    <!--    </div>-->
                                                                    <!--</div>-->
                                                                    <div class="d-flex">
                                                                        <!-- <div class="for_sale_box box_default me-1">FOR SALE</div> -->
                                                                        <!-- <div class="hot_offer_box box_default ">HOT OFFER - 0% GST</div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="price_wrapper z-2 px-4 py-2 position-absolute bottom-0 start-0 end-0">
                                                                <div>
                                                                    <h6 id="top_properties_price" class="mb-1">₹ {{ $project->property->price }}
                                                                    </h6>
                                                                    <p class="item_title fs-tiny w-100">{{ $project->property->title }}
                                                                    </p>
                                                                    <p class="item_title fs-tiny w-100">{{ $project->property->short_address }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            
            <div class="pt-3 text-center">
                <a href="{{ route('property.readypossessionprojects') }}" class="btn_load_more link_default">Read More <span class="loader-icon"></span></a>
            </div>
        </div>
    </div>
</section>
<section class="py-5 top_properties">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2 class="h2">
                Top Properties
            </h2>
        </div>
        <div>
            <div id="top-properties-list" class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                @foreach($property as $property)
                <div class="col mb-3">
                    <div class="bg-white shadow-sm">
                        <div class="image_swiper_box">
                            <div class="box_wrapper z-2 position-absolute ">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        
                                        <div class="feature_box box_default me-1">{{$property->property_statuses->name}}</div>
                                        
                                        @if($property->offer != "")
                                        <div class="hot_offer_box box_default">{{$property->offer}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Price Details -->
                            <div class="price_wrapper z-2 px-4 py-2 position-absolute bottom-0 start-0 end-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 id="top_properties_price" class="mb-1">₹ {{$property->price}}</h6>
                                    </div>
                                    <div class="action_buttons">
                                        <!-- fullview -->
                                        <div class="d-inline-block">
                                            <a href="#" data-property-id="{{ $property->id }}">
                                                @auth
                                                    @if(in_array($property->id, $userPropertyseenIds->toArray()))
                                                        <div class="box_default me-1" title="Seen Property">
                                                            <i class="bi bi-eye-fill fs-10"></i>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </a>
                                        </div>
                                        <div class="d-inline-block">
                                            <a href="#" data-property-id="{{ $property->id }}">
                                                @auth
                                                    @if(in_array($property->id, $userPropertyEnquiryIds->toArray()))
                                                        <div class="box_default me-1" title="Already Contacted">
                                                            <i class="bi bi-check-all fs-10"></i>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </a>
                                        </div>
                                        <div class="d-inline-block">
                                            <a href="#" class="preview-property-button"
                                                data-property="{{ json_encode($property) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalTopProperties">
                                                <div class="box_default me-1" title="Preview">
                                                    <i class="bi bi-arrows-angle-expand fs-10"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- <div class="d-inline-block">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalTopProperties">
                                                <div class="box_default me-1" title="Preview">
                                                    <i class="bi bi-arrows-angle-expand fs-"></i>
                                                </div>
                                            </a>
                                        </div> -->
                                        <!-- favourite -->
                                        <!-- <div class="d-inline-block">
                                            <a href="#" class="favorite-button" data-property-id="{{ $property->id }}">
                                                <div class="box_default me-1" title="Favourite">
                                                    <i class="bi bi-heart fs-"></i>
                                                </div>
                                            </a>
                                        </div> -->                                        
                                        <div class="d-inline-block">
                                            <a href="#" class="favorite-button" data-property-id="{{ $property->id }}">
                                                <div class="box_default me-1" title="Favourite">
                                                    @auth
                                                    <i class="fs- @if(in_array($property->id, $userFavoritePropertyIds->toArray())) bi bi-heart-fill @else bi bi-heart @endif favorite-icon fs-10"></i>
                                                    @else
                                                    <i class="fs- @if(in_array($property->id, $userFavoritePropertyIds)) bi bi-heart-fill @else bi bi-heart @endif favorite-icon fs-10"></i>
                                                    @endauth
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Image slider -->
                            <div id="carouselproperty_{{$property->id}}" class="carousel slide carousel-fade">
                                <a href="property/{{$property->slug}}">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            @if($property->images && count($property->images) > 0)
                                            <img src="{{ asset('images/property_images/'.$property->images[0]->name)}}"
                                                class="d-block w-100 imageslidecorrosalheight" alt="{{$property->images[0]->aux1}}">
                                            @endif
                                        </div>
                                        @if($property->images && count($property->images) > 1)
                                        <div class="carousel-item ">
                                            <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}"
                                                class="d-block w-100 imageslidecorrosalheight" alt="{{$property->images[1]->aux1}}">
                                        </div>
                                        @endif
                                        @if($property->images && count($property->images) > 2)
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}"
                                                class="d-block w-100 imageslidecorrosalheight" alt="{{$property->images[2]->aux1}}">
                                        </div>
                                        @endif
                                    </div>
                                </a>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselproperty_{{$property->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselproperty_{{$property->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <!-- Bottom Content -->
                        <div class="p-3">
                            <a href="property/{{ $property->slug}}"
                                class="link_default">
                                <h6 class="item_title">{{$property->title}}</h6>
                            </a>
                            <p class="item_title">{{$property->short_address}}</p>
                            <div class="mb-2">
                                <div class="fs-tiny"> <i class="bi bi-rulers"></i> {{$property->area}}</div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-sm-12 ">
                                    <span class="m-0 fw-400 uppercase">{{$property->property_type->name}}</span>
                                </div>
                                <div class="col-xl-6 col-md-12 col-sm-12  p-0">
                                    <span>
                                        @auth
                                         @if(in_array($property->id, $userPropertyEnquiryIds->toArray()))
                                            <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" ><i class="bi bi-check-all fs-16"></i>Contacted</a>
                                        @else
                                            <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal" data-bs-target="#myModalss" data-property-id="{{$property->id}}">Contact</a>
                                        @endif
                                        @else
                                            <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal" data-bs-target="#myModalNowdd" data-property-id="{{$property->id}}">Enquiry</a>
                                        @endauth
                                        <a href="property/{{$property->slug}}" class="link_default text-white btn_details bg-primaryLight">Details</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--<hr>-->
                        <!--<div class="p-3 pt-0">-->
                        <!--    <div class="d-flex justify-content-between">-->
                        <!--        <div class="fs-tiny">-->
                        <!--            <i class="bi bi-person"></i>-->
                        <!--            {{$property->user->name}}-->
                        <!--        </div>-->
                        <!--        <div class="fs-tiny">-->
                        <!--            <i class="bi bi-paperclip"></i>-->
                        <!--            {{ $property->created_at->diffInMonths(now()) }} months ago-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pt-5 text-center">
                <a id="btn-top-properties" role="button" onclick="loadMore(this.id,'top-properties-list')"
                    class="btn_load_more link_default">Load More <span class="loader-icon"></span></a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 cta">
    <div class="container">
        <div class="d-md-flex justify-content-center justify-content-md-around text-center">
            <h2 class="mb-md-0">Apna sapna poora karein! Plot kharidne ke liye sampark karein</h2>
            <a href="/contact/" class="link_default btn btn_cta">Contact Now</a>
        </div>
    </div>
</section>

<section class="py-5 our_key_services bg_light">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2 class="h2">Our Key Services</h2>
        </div>
        <div class="col-md-6 mx-auto mb-5">
            <p class="mb-0 text-center">
                We guide you in every facet of the land buying process. From determining the circle rate of the area to
                ROI calculation, we help you buy legally safe properties at the right price.
            </p>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @foreach($key_service as $key_service)
                <div class="col shadow p-2 bg-white">
                    <div class="p-3 text-center key_service_box">
                        <div class="icon mb-3">
                            <img src="{{ asset('images/key_service/'.$key_service->image)}}" width="60px" alt="">
                        </div>
                        <h5>{{$key_service->title}}</h5>
                        <p class="mb-0">
                        {{$key_service->description}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-5 types_of_land bg_light">
    <div class="container">
        <div class="section_title text-center mb-3">
            <h2 class="h2">
                Types of Land
            </h2>
        </div>
        <div class="col-md-6 mx-auto mb-5">
            <p class="mb-0 text-center">
                Exclusive showcase of Deals
            </p>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
            <!-- item 1 -->
            @foreach($propertytype as $propertytype)
            <a href="{{ route('property-type', ['propertySlug' => strtolower(str_replace(' ', '-', $propertytype->name))]) }}" class="link_default">
                <div class="col mb-3 types_of_land_item">
                    <div class="">
                        <img src="{{ asset('images/propertytype/'.$propertytype->image)}}" class="img-fluid" alt="">
                        <h5 class="mb-0 py-3 text-center">{{$propertytype->name}}</h5>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <!-- <div class="text-center mt-5">
            <a href="#" class="link_default btn_lg_theme btn_primary_light text-white">Explore All</a>
        </div> -->
    </div>
</section>

<section class="py-5 top_localities emerging_localities">
    <div class="container">
        
    <div class="title_wrapper">
            <div class="section_title text-center mb-3">
                <h2 class="h2">
                Top Localities
                </h2>
            </div>
            <div class="col-md-6 mx-auto mb-5">
                <p class="mb-0 text-center">
                Explore Land in Popular Indian Cities
                </p>
            </div>
        </div>
        <div class="">
            <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 justify-content-center">
                <!-- item -->
                @foreach($top_localities as $top_localitie)
                <div class="col mb-4 ">
                    <a href="{{ route('city.top_localities', ['citySlug' => strtolower(str_replace(' ', '-', $top_localitie->name))]) }}">
                        <div class="emerging_localities_item">
                            @if($top_localitie->image != "")
                            <img src="{{ asset('images/city/'.$top_localitie->image) }}" class="w-100" height="200px" alt="">
                            @else
                            <img src="{{ asset('website/images/banda-img.jpg') }}" class="w-100" height="200px" alt="">
                            @endif
                            <div class="overlay d-flex justify-content-center align-items-center">
                                <h5 class="mb-0 py-3 text-center text-white">{{$top_localitie->name}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- item -->          
            </div>
        </div>
        <div class="locations">
            <div class="text-center mt-5">
                <a href="/city/" class="link_default btn_lg_theme btn_primary_light text-white">Explore All
                    Locations</a>
            </div>
        </div>
    </div>
</section>
<section class="py-5 emerging_localities bg_light">
    <div class="container">
        <div class="title_wrapper">
            <div class="section_title text-center mb-3">
                <h2 class="h2">
                    Emerging Localities
                </h2>
            </div>
            <div class="col-md-6 mx-auto mb-5">
                <p class="mb-0 text-center">
                    Localities with recent development
                </p>
            </div>
        </div>
        <div class="">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 justify-content-center">
            @foreach($emerging_localities as $emerging_localitie)
                <div class="col mb-4 ">
                    <a href="{{ route('city.emerging_localities', ['citySlug' => strtolower(str_replace(' ', '-', $emerging_localitie->name))]) }}">
                        <div class="emerging_localities_item h-100">
                            @if($emerging_localitie->image != "")
                                <img src="{{ asset('images/city/'.$emerging_localitie->image) }}" class="img-fluid w-100 h-100" alt="">
                            @else
                            <img src="{{ asset('website/images/banda-img.jpg') }}" class="img-fluid w-100" alt="">
                            @endif
                            <div class="overlay d-flex justify-content-center align-items-center">
                                <h5 class="mb-0 py-3 text-center text-white">{{$emerging_localitie->name}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-5 plots_collection">
    <div class="container">
        <div class="title_wrapper">
            <div class="section_title text-center mb-3">
                <h2 class="h2">
                    Plots Collection
                </h2>
            </div>
            <div class="col-md-6 mx-auto mb-5">
                <p class="mb-0 text-center">
                    Exclusive showcase of categorized plots
                </p>
            </div>
        </div>
        <div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 justify-content-center">
                <!-- item -->
                <a href="{{ url('below-plots/'.'30/'.'Lakh') }}" >
                    <div class="col mb-4 ">
                        <div class="plots_collection_item">
                            <img src="{{ asset('website/images/plots_collection-img-1.jpg') }}"
                                class="img-fluid w-100 shadow rounded-5" alt="">
                        </div>
                    </div>
                </a>
                <!-- item -->
                <a href="{{ url('plots_collection/lake view') }}" >
                    <div class="col mb-4 ">
                        <div class="plots_collection_item">
                            <img src="{{ asset('website/images/lake view plots.jpg') }}"
                                class="img-fluid w-100 shadow rounded-5" alt="">
                        </div>
                    </div>
                </a>
                <!-- item -->
                <a href="{{ url('plots_collection/River') }}" >
                    <div class="col mb-4 ">
                        <div class="plots_collection_item">
                            <img src="{{ asset('website/images/river view plots.jpg') }}"
                                class="img-fluid w-100 shadow rounded-5" alt="">
                        </div>
                    </div>
                </a>
                <!-- item -->
                <a href="{{ url('plots_collection/Mountains') }}" >
                    <div class="col mb-4 ">
                        <div class="plots_collection_item">
                            <img src="{{ asset('website/images/mountainsplots.jpg') }}"
                                class="img-fluid w-100 shadow rounded-5" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <!--<div class="text-center mt-5">-->
            <!--    <a href="/city/" class="link_default btn_lg_theme btn_primary_light text-white">Explore All</a>-->
            <!--</div>-->
        </div>
    </div>
</section>

<section class="py-5 cta">
    <div class="container">
        <div class="d-md-flex justify-content-center justify-content-md-around text-center">
            <h2 class="mb-md-0">Make Buying Process Hassle-Free!</h2>
            <a href="/contact/" class="link_default btn btn_cta">Enquire Now</a>
        </div>
    </div>
</section>

<section class="py-5 top_properties">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2 class="h2">
                Featured Properties
            </h2>
        </div>
        <div>
            <div id="featured-properties-list"
                class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
                <!-- Item  -->
                @foreach($featured_properties as $featured_properties)
                <div class="col mb-3">
                    <div class="bg-white shadow-sm">
                        <div class="image_swiper_box">
                            <div class="box_wrapper z-2 position-absolute ">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <div class="feature_box box_default me-1">{{$featured_properties->property_statuses->name}}</div>
                                        @if($featured_properties->offer != "")
                                            <div class="hot_offer_box box_default ">{{$featured_properties->offer}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Price Details -->
                            <div class="price_wrapper z-2 px-4 py-3 position-absolute bottom-0 start-0 end-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <!-- <h6 id="top_properties_price" class="mb-1">₹ 409 / Sq.ft</h6> -->
                                        <h6 id="top_properties_price" class="mb-1">₹ {{$featured_properties->price}}
                                        </h6>
                                        <!-- <p id="top_properties_area" class="fw-bold fs-tiny">₹ 4,000 / sqft</p> -->
                                    </div>
                                    <div class="action_buttons">
                                        <!-- fullview -->
                                        <div class="d-inline-block">
                                            <a href="#" data-property-id="{{ $featured_properties->id }}">
                                                @auth
                                                    @if(in_array($featured_properties->id, $userPropertyseenIds->toArray()))
                                                        <div class="box_default me-1" title="Seen Property">
                                                            <i class="bi bi-eye-fill fs-10"></i>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </a>
                                        </div>
                                        <div class="d-inline-block">
                                            <a href="#" data-property-id="{{ $featured_properties->id }}">
                                                @auth
                                                    @if(in_array($featured_properties->id, $userPropertyEnquiryIds->toArray()))
                                                        <div class="box_default me-1" title="Already Contacted">
                                                            <i class="bi bi-check-all fs-10"></i>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </a>
                                        </div>
                                        <div class="d-inline-block">
                                            <a href="#" class="preview-property-button"
                                                data-property="{{ json_encode($featured_properties) }}"
                                                data-bs-toggle="modal" data-bs-target="#modalTopProperties">
                                                <div class="box_default me-1" title="Preview">
                                                    <i class="bi bi-arrows-angle-expand fs-"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- favourite -->
                                        <!-- <div class="d-inline-block">
                                            <a href="#">
                                                <div class="box_default me-1" title="Favourite">
                                                    <i class="bi bi-heart fs-"></i>
                                                </div>
                                            </a>
                                        </div> -->
                                        <div class="d-inline-block">
                                            <a href="#" class="favorite-button" data-property-id="{{ $featured_properties->id }}">
                                                <div class="box_default me-1" title="Favourite">
                                                    @auth
                                                    <i class="fs- @if(in_array($featured_properties->id, $userFavoritePropertyIds->toArray())) bi bi-heart-fill @else bi bi-heart @endif favorite-icon"></i>
                                                    @else
                                                    <i class="fs- @if(in_array($featured_properties->id, $userFavoritePropertyIds)) bi bi-heart-fill @else bi bi-heart @endif favorite-icon"></i>
                                                    @endauth
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Image slider -->
                            <div id="carouselAquaWoods_{{$featured_properties->id}}"
                                class="carousel slide carousel-fade">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        @if($featured_properties->images && count($featured_properties->images) > 0)
                                        <img src="{{ asset('images/property_images/'.$featured_properties->images[0]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$featured_properties->images[0]->aux1}}">
                                        @endif
                                    </div>
                                    @if($featured_properties->images && count($featured_properties->images) > 1)
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/property_images/'.$featured_properties->images[1]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$featured_properties->images[1]->aux1}}">
                                    </div>
                                    @endif
                                    @if($featured_properties->images && count($featured_properties->images) > 1)
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/property_images/'.$featured_properties->images[1]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$featured_properties->images[1]->aux1}}">
                                    </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselAquaWoods_{{$featured_properties->id}}"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselAquaWoods_{{$featured_properties->id}}"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                        <!-- Bottom Content -->
                        <div class="p-3">
                            <a href="property/{{$featured_properties->slug}}" class="link_default">
                                <h6 class="item_title">{{$featured_properties->title}}</h6>
                            </a>
                            <address class="item-address">
                                {{$featured_properties->short_address}}
                            </address>
                            <div class="d-flex justify-content-between">
                                <p class="m-0 fw-400 uppercase">{{$featured_properties->property_type->name}}</p>
                                @auth
                                     @if(in_array($featured_properties->id, $userPropertyEnquiryIds->toArray()))
                                        <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" ><i class="bi bi-check-all fs-16"></i>Contacted</a>
                                    @else
                                        <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal" data-bs-target="#myModalss" data-property-id="{{$property->id}}">Contact</a>
                                    @endif
                                @else
                                    <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal" data-bs-target="#myModalNowdd" data-property-id="{{$property->id}}">Enquiry</a>
                                @endauth
                                <a href="property/{{ $featured_properties->slug}}" class="link_default text-white btn_details bg-primaryLight">Details</a>
                            </div>
                        </div>
                        <hr>
                        <!--<div class="p-3 pt-0">-->
                        <!--    <div class="d-flex justify-content-between">-->
                        <!--        <div class="fs-tiny">-->
                        <!--            <i class="bi bi-person"></i>-->
                        <!--            {{$featured_properties->user->name}}-->
                        <!--        </div>-->
                        <!--        <div class="fs-tiny">-->
                        <!--            <i class="bi bi-paperclip"></i>-->
                        <!--            {{ $property->created_at->diffInMonths(now()) }} months ago-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pt-5 text-center">
                <a id="btn-featured-properties" role="button" onclick="loadMore(this.id,'featured-properties-list')"
                    class="btn_load_more link_default">Load More <span class="loader-icon"></span></a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 handpicked_properties">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2 class="h2">
                Handpicked Properties
            </h2>
        </div>
        <div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
                @foreach($handpickedproperty as $handpickedproperty)
                <!-- Item  -->
                <div class="col mb-3">
                    <div class="bg_light shadow-sm">
                        <div class="image_swiper_box">
                            <div class="box_wrapper z-2 position-absolute ">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <div class="feature_box box_default me-1">{{$handpickedproperty->property_statuses->name}}</div>
                                        @if($featured_properties->offer != "")
                                            <div class="hot_offer_box box_default ">{{$handpickedproperty->offer}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Price Details -->
                            <div class="price_wrapper z-2 px-4 py-3 position-absolute bottom-0 start-0 end-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <!-- <h6 id="top_properties_price" class="mb-1">₹ 409 / Sq.ft</h6> -->
                                        <h6 id="top_properties_price" class="mb-1">₹ {{$handpickedproperty->price}}
                                        </h6>
                                        <!-- <p id="top_properties_area" class="fw-bold fs-tiny">₹ 4,000 / sqft</p> -->
                                    </div>
                                    <div class="action_buttons">
                                        <div class="d-inline-block">
                                            <a href="#" data-property-id="{{ $handpickedproperty->id }}">
                                                @auth
                                                    @if(in_array($handpickedproperty->id, $userPropertyseenIds->toArray()))
                                                        <div class="box_default me-1" title="Seen Property">
                                                            <i class="bi bi-eye-fill fs-10"></i>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </a>
                                        </div>
                                        <div class="d-inline-block">
                                            <a href="#" data-property-id="{{ $handpickedproperty->id }}">
                                                @auth
                                                    @if(in_array($handpickedproperty->id, $userPropertyEnquiryIds->toArray()))
                                                        <div class="box_default me-1" title="Already Contacted">
                                                            <i class="bi bi-check-all fs-10"></i>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </a>
                                        </div>
                                        <!-- fullview -->
                                        <div class="d-inline-block">
                                            <a href="#" class="preview-property-button"
                                                data-property="{{ json_encode($property) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalTopProperties">
                                                <div class="box_default me-1" title="Preview">
                                                    <i class="bi bi-arrows-angle-expand fs-"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- favourite -->
                                        <div class="d-inline-block">
                                            <a href="#" class="favorite-button" data-property-id="{{ $handpickedproperty->id }}">
                                                <div class="box_default me-1" title="Favourite">
                                                    @auth
                                                    <i class="fs- @if(in_array($handpickedproperty->id, $userFavoritePropertyIds->toArray())) bi bi-heart-fill @else bi bi-heart @endif favorite-icon"></i>
                                                    @else
                                                    <i class="fs- @if(in_array($handpickedproperty->id, $userFavoritePropertyIds)) bi bi-heart-fill @else bi bi-heart @endif favorite-icon"></i>
               
                                                    @endauth
                                                </div>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Image slider -->
                            <div id="carouselHandpickedProperties_{{$handpickedproperty->id}}"
                                class="carousel slide carousel-fade">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        @if($handpickedproperty->images && count($handpickedproperty->images) > 0)
                                        <img src="{{ asset('images/property_images/'.$handpickedproperty->images[0]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$handpickedproperty->images[0]->aux1}}">
                                        @endif
                                    </div>
                                    @if($handpickedproperty->images && count($handpickedproperty->images) > 1)
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/property_images/'.$handpickedproperty->images[1]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$handpickedproperty->images[1]->aux1}}">
                                    </div>
                                    @endif
                                    @if($handpickedproperty->images && count($handpickedproperty->images) > 2)
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/property_images/'.$handpickedproperty->images[2]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$handpickedproperty->images[2]->aux1}}">
                                    </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselHandpickedProperties_{{$handpickedproperty->id}}"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselHandpickedProperties_{{$handpickedproperty->id}}"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                        <!-- Bottom Content -->
                        <div class="p-3">
                            <a href="property/{{ $handpickedproperty->slug}}"
                                class="link_default">
                                <h6 class="item_title">{{$handpickedproperty->title}} </h6>
                            </a>
                            <address class="item-address">
                                {{$handpickedproperty->short_address}}
                            </address>
                            <div class="d-flex justify-content-between">
                                <p class="m-0 fw-400 uppercase">{{$handpickedproperty->property_type->name}}</p>
                                @auth
                                     @if(in_array($handpickedproperty->id, $userPropertyEnquiryIds->toArray()))
                                        <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" ><i class="bi bi-check-all fs-16"></i>Contacted</a>
                                    @else
                                        <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal" data-bs-target="#myModalss" data-property-id="{{$property->id}}">Contact</a>
                                    @endif
                                @else
                                    <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal" data-bs-target="#myModalNowdd" data-property-id="{{$property->id}}">Enquiry</a>
                                @endauth
                                <a href="property/{{$handpickedproperty->slug}}"
                                    class="link_default text-white btn_details bg-primaryLight">Details</a>
                            </div>
                        </div>
                        <hr>
                        <!--<div class="p-3 pt-0">-->
                        <!--    <div class="d-flex justify-content-between">-->
                        <!--        <div class="fs-tiny">-->
                        <!--            <i class="bi bi-person"></i>-->
                        <!--            {{$handpickedproperty->user->name}}-->
                        <!--        </div>-->
                        <!--        <div class="fs-tiny">-->
                        <!--            <i class="bi bi-paperclip"></i>-->
                        <!--            {{ $property->created_at->diffInMonths(now()) }} months ago-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-5 cta">
    <div class="container">
        <div class="d-md-flex justify-content-center justify-content-md-around text-center">
            <h2 class="mb-md-0">Invest in Land , Invest in Future</h2>
            <a href="/contact/" class="link_default btn btn_cta">Enquire Now</a>
        </div>
    </div>
</section>

<section class="py-5 plots_collection bg_light">
    <div class="container">
        <div class="title_wrapper">
            <div class="section_title text-center mb-3">
                <h2 class="h2">
                    Explore the Deal Market
                </h2>
            </div>
            <div class="col-md-6 mx-auto mb-5">
                <p class="mb-0 text-center">
                    Exclusive showcase of Deals
                </p>
            </div>
        </div>
        <div>
            <div id="explore-the-deal-market" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
                <!-- Item  -->
                @foreach($deal_market as $deal_market)
                <div class="col mb-3">
                    <div class="bg-white hover_shado shadow-smw">
                        <div class="image_swiper_box">
                            <div class="box_wrapper z-2 position-absolute ">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <!-- <div class="feature_box box_default ">FEATURED</div> -->
                                    </div>
                                    <div class="d-flex">
                                        <!-- <div class="for_sale_box box_default me-1">FOR SALE</div> -->
                                        <div class="hot_offer_box box_default ">HOT OFFER - {{$deal_market->offer}}% GST</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Price Details -->
                            <div class="price_wrapper z-2 px-4 py-2 position-absolute bottom-0 start-0 end-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 id="top_properties_price" class="mb-1">Rs.{{$deal_market->price}}</h6>
                                        <!-- <p id="top_properties_area" class="fw-bold fs-tiny">Rs.2,200,000/guntha</p> -->
                                    </div>
                                    <div class="action_buttons">
                                        <!-- fullview -->
                                        <div class="d-inline-block">
                                            <a href="#" data-property-id="{{ $deal_market->id }}">
                                                @auth
                                                    @if(in_array($deal_market->id, $userPropertyseenIds->toArray()))
                                                        <div class="box_default me-1" title="Seen Property">
                                                            <i class="bi bi-eye-fill fs-10"></i>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </a>
                                        </div>
                                        <div class="d-inline-block">
                                            <a href="#" data-property-id="{{ $deal_market->id }}">
                                                @auth
                                                    @if(in_array($deal_market->id, $userPropertyEnquiryIds->toArray()))
                                                        <div class="box_default me-1" title="Already Contacted">
                                                            <i class="bi bi-check-all fs-10"></i>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </a>
                                        </div>
                                        <div class="d-inline-block">
                                            <a href="#" class="preview-property-button"
                                                data-property="{{ json_encode($deal_market) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalTopProperties">
                                                <div class="box_default me-1" title="Preview">
                                                    <i class="bi bi-arrows-angle-expand fs-"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- <div class="d-inline-block">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalTopProperties">
                                                    <div class="box_default me-1" title="Preview">
                                                        <i class="bi bi-arrows-angle-expand fs-"></i>
                                                    </div>
                                                </a>
                                            </div> -->
                                        <!-- favourite -->
                                        <div class="d-inline-block">
                                            <a href="#" class="favorite-button" data-property-id="{{ $deal_market->id }}">
                                                <div class="box_default me-1" title="Favourite">
                                                    @auth
                                                    <i class="fs- @if(in_array($deal_market->id, $userFavoritePropertyIds->toArray())) bi bi-heart-fill @else bi bi-heart @endif favorite-icon"></i>
                                                    @else
                                                    <i class="fs- @if(in_array($deal_market->id, $userFavoritePropertyIds)) bi bi-heart-fill @else bi bi-heart @endif favorite-icon"></i>
               
                                                    @endauth
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Image slider -->
                            <div id="carouselDealMarket_{{$deal_market->id}}" class="carousel slide carousel-fade">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        @if($deal_market->images && count($deal_market->images) > 0)
                                        <img src="{{ asset('images/property_images/'.$deal_market->images[0]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$deal_market->images[0]->aux1}}">
                                        @endif
                                    </div>
                                    @if($deal_market->images && count($deal_market->images) > 1)
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/property_images/'.$deal_market->images[1]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$deal_market->images[1]->aux1}}">
                                    </div>
                                    @endif
                                    @if($deal_market->images && count($deal_market->images) > 1)
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/property_images/'.$deal_market->images[1]->name)}}"
                                            class="d-block w-100 imageslidecorrosalheight" alt="{{$deal_market->images[1]->aux1}}">
                                    </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselDealMarket_{{$deal_market->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselDealMarket_{{$deal_market->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <!-- Bottom Content -->
                        <div class="p-3">
                            <a href="property/{{$deal_market->slug}}"
                                class="link_default">
                                <h6 class="item_title">{{$deal_market->title}}</h6>
                            </a>
                            <address class="item-address">
                                {{$deal_market->short_address}}
                            </address>
                            <div class="mb-2">
                                <div class="fs-tiny"> <i class="bi bi-rulers"></i> {{$deal_market->area}}</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="m-0 fw-400 uppercase">{{$deal_market->property_type->name}}</p>
                                @auth
                                     @if(in_array($deal_market->id, $userPropertyEnquiryIds->toArray()))
                                        <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" ><i class="bi bi-check-all fs-16"></i>Contacted</a>
                                    @else
                                        <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal" data-bs-target="#myModalss" data-property-id="{{$property->id}}">Contact</a>
                                    @endif
                                @else
                                    <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal" data-bs-target="#myModalNowdd" data-property-id="{{$property->id}}">Enquiry</a>
                                @endauth
                                <a href="property/{{$deal_market->title}}"
                                    class="link_default text-white btn_details bg-primaryLight">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Item  -->
            </div>
        </div>
        <div class="pt-5 text-center">
            <a id="btn-explore-the-deal-market" role="button"
                onclick="ExploretheDealMarketloadMore(this.id,'explore-the-deal-market')"
                class="btn_load_more link_default">Load More <span class="loader-icon"></span></a>
        </div>
    </div>
    </div>
</section>
<section class="py-5 plots_collection ">
    <div class="container">
        <div class="title_wrapper">
            <div class="section_title text-center mb-5">
                <h2 class="h2">
                    Latest Articles
                </h2>
            </div>
        </div>
        <div>
            <div class="latest_articles_swiper_button_box d-flex justify-content-end mb-3">
                <div class="prev_article me-2">Prev</div>
                <div class="next_article">Next</div>
            </div>
            <div class="slide-container swiper">
                <div class="slide-content-latest-articles p-2">
                    <div class="card-wrapper swiper-wrapper  ">
                        @foreach($related_post as $related_post)
                        <div class="card swiper-slide rounded-0 overflow-hidden latest_articles_slide">
                            <div class="banner_box">
                                <a href="/blog-details/{{$related_post->slug}}">
                                    <img src="{{ asset('images/blog/'.$related_post->image)}}" class="w-100" alt="">
                                </a>
                            </div>
                            <div class="p-3">
                                <div class="mb-2">
                                    <div class="latest_article_date fs-tiny">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ \Carbon\Carbon::parse($related_post->date)->format('F j, Y') }}
                                    </div>
                                    <div class="latest_article_tags fs-tiny">
                                        <i class="bi bi-tag me-1"></i>
                                        @foreach ($related_post->blogcategories as $blogcategory)
                                        @if ($blogcategory->categories)
                                        <a href="/category/{{ strtolower(str_replace(' ', '-', $blogcategory->categories->name)) }}"
                                            class="link_default article_tags">{{ $blogcategory->categories->name }}</a>
                                        ,
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $related_post->title))}}"
                                    class="link_default">
                                    <h6 class="article_heading fw-normal">
                                        {{ $related_post->title }}
                                    </h6>
                                </a>
                                <p class="mb-2">
                                   {{ substr($related_post->short_description, 0, 100) }}
                                </p>
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $related_post->title))}}"
                                    class="link_default text_primary_light fw-bold fs-12 ">Continue Reading</a>
                                <hr>
                                <div class="fs-tiny">
                                    <i class="bi bi-person"></i>
                                    {{$related_post->user->name}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="position-relative articles_pagination_box mt-5">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<section class="plots_collection">
    <div class="container">
        <div class="title_wrapper">
            <div class="section_title text-center">
                <h2 class="h2">
                    Exclusive Projects
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white p-3 p-md-4 rounded shadow text-justify">
                    <section id="gallery" class="overflow-hidden" data-aos="zoom-in" data-aos-duration="1200">
                        <div class="container">
                            <div class="row p-2">
                                <div class="slide-container swiper ">
                                    <div class="slide-content-gallery">
                                        <div class="card-wrapper swiper-wrapper d-flex align-items-center">
                                            @foreach($exclusive_project as $project)
                                                <div class="card swiper-slide">
                                                    <div class="gallery-img">
                                                        <a
                                                            href="{{ route('property', ['propertySlug' => strtolower(str_replace(' ', '-', $project->property->title))]) }}">
                                                            <!-- Image -->
                                                            <img src="{{ asset('images/property_images/'.$project->property->images[0]->name) }}"
                                                                class="d-block w-100" alt="{{$project->property->images[0]->aux1}}">
                                                            <!-- Content -->
                                                            <div class="box_wrapper z-2 position-absolute">
                                                                <div class="d-flex justify-content-between">
                                                                    <!--<div>-->
                                                                    <!--    <div class="feature_box box_default">-->
                                                                    <!--        FEATURED-->
                                                                    <!--    </div>-->
                                                                    <!--</div>-->
                                                                    <div class="d-flex">
                                                                        <!-- <div class="for_sale_box box_default me-1">FOR SALE</div> -->
                                                                        <!-- <div class="hot_offer_box box_default ">HOT OFFER - 0% GST</div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="price_wrapper z-2 px-4 py-2 position-absolute bottom-0 start-0 end-0">
                                                                <div>
                                                                    <h6 id="top_properties_price" class="mb-1">₹ {{ $project->property->price }}
                                                                    </h6>
                                                                    <p class="item_title fs-tiny w-100">{{ $project->property->title }}
                                                                    </p>
                                                                    <p class="item_title fs-tiny w-100">{{ $project->property->short_address }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ===================================== -->
<!-- ===================================== -->
<!-- ===================================== -->

<!-- Modal Top Properties -->
<div class="modal fade" id="modalTopProperties" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content rounded-5">
            <div class="modal-header">
                <!-- <h1 class="modal-title fs-5" id="modalTopPropertiesLabel"></h1> -->
                <img src="{{ asset('website/images/genuineplots-logo-200x50.png') }}" width="170px" alt="">
                <div class="d-flex">
                    <!-- favourite -->
                    <div class="d-inline-block">
                        <a href="#" class="link_default">
                            <!-- <div class=" me-1 fs-6 d-flex justify-content-center align-items-center" title="Favourite">
                                <i class="bi bi-heart me-2 fs-6"></i>
                                Favourite
                            </div> -->
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="px-md-0">
                            <!-- Image slider -->
                            <div id="modalcarouselExampleFade" class="carousel slide carousel-fade ">
                                <div class="carousel-inner">

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#modalcarouselExampleFade" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#modalcarouselExampleFade" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="p-3">
                            <div class="for_sale_box box_default d-inline-block mb-3">FOR SALE</div>
                            <div class="hot_offer_box box_default d-inline-block mb-3">HOT OFFER - 0% GST</div>
                            <a href="#" class="link_default">
                                <h6 class="modal-title"></h6>
                            </a>
                            <p class="model-address"></p>
                            <hr>
                            <div>
                                <h6 id="" class="model-price mb-1"></h6>
                                <p id="top_properties_area" class="model-area fw-bold fs-tiny"></p>
                            </div>
                            <hr>
                            <p class="modal-description"></p>
                            <hr>
                            <!-- <div class="mb-2">
                                <div class="fs-tiny d-inline-block me-3"> <i class="bi bi-bounding-box me-1"></i> 1 <br>
                                    Acre</div>
                                <div class="fs-tiny d-inline-block me-3"> <i class="bi bi-rulers me-1"></i> 1000 <br>
                                    Sqft</div>
                            </div> -->
                            <!-- <hr> -->
                            <!-- <div class="text-center">
                                <a href=""
                                    class="btn btn-lg link_default text-white btn_details d-block bg-primaryLight">Details</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal" id="myModalss" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enquire About This Property</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('property/enquiry/save')}}" method="post" class="row contact_us_form"  id="popUpEnqForm">
                        @csrf
                        <input type="hidden" name="url" value="{{ url()->current() }}">
                        <div class="col-md-6 mb-md-3">
                            <input type="hidden" name="property_id" class="contact_us_input" id="property_id"
                                 required>
                            <label for="fullName" class="form-label">Name <span
                                    class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="nan" class="contact_us_input" id="fullName"
                                placeholder="" required>
                        </div>
                        <div class="col-md-6 mb-md-3">
                            <label class="form-label">Phone <span class="text-danger"><sup>*</sup></span></label>
                            <input type="tel" name="num" pattern="[0-9]{10}" class="contact_us_input" id=""
                                placeholder="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="eoe" class="contact_us_input" id="" placeholder=""
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Comment<span class="text-danger"><sup>*</sup></span></label>
                            <textarea type="text" name="coc" class="contact_us_input"  ></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="g-recaptcha" data-sitekey="6LdNsoEpAAAAAPedAyDW8WnfhdcrR49_DIyP70fX"></div>
                        </div>
                        <div class="col-md-12 form-group mb-2">
                            <label class="control control--checkbox m-0 fs-14">
                                <input type="checkbox" name="privacy_policy"> By submitting this form I agree to
                                <a target="_blank" href="#" class="link_default text_primary_light">Terms of Use</a>
                                <span class="control__indicator"></span>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn_submit w-auto"   onclick="submitFormWithCaptchaEnqForm()">Request Information</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" id="myModalNowdd" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enquire About This Property</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('property/newenquiry/save')}}" method="post" class="row contact_us_form" >
                        @csrf
                        <input type="hidden" name="url" value="{{ url()->current() }}">
                        <div class="col-md-6 mb-md-3">
                            <input type="hidden" name="property_id" class="contact_us_input" id="propertysid" required>
                            <label class="form-label">Name <span class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="nan" class="contact_us_input" id=""
                                placeholder="" required>
                        </div>
                        <div class="col-md-6 mb-md-3">
                            <label for="" class="form-label">Phone <span
                                    class="text-danger"><sup>*</sup></span></label>
                            <input type="tel" name="num" pattern="[0-9]{10}" class="contact_us_input" id="mobileNumber"
                                placeholder="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Email<span
                                    class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="eoe" class="contact_us_input" id="" placeholder=""
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Comment<span
                                    class="text-danger"><sup>*</sup></span></label>
                            <textarea type="text" name="coc" class="contact_us_input"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="g-recaptcha" data-sitekey="6LdNsoEpAAAAAPedAyDW8WnfhdcrR49_DIyP70fX"></div>
                        </div>
                        <div class="col-md-12 form-group mb-2">
                            <label class="control control--checkbox m-0 fs-14">
                                <input type="checkbox" name="privacy_policy"> By submitting this form I agree to
                                <a target="_blank" href="#" class="link_default text_primary_light">Terms of Use</a>
                                <span class="control__indicator"></span>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn_submit w-auto" >Request Information</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add this modal element to your HTML -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-body p-4">
                <div class="position-absolute top-0 end-0 z-1 p-2">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-center">
                    <h6 class="mb-4">Login to Add your shortlisted Properties</h6>
                    <a data-bs-toggle="modal" data-bs-target="#myModalLogggin" class="link_default text-white btn_details bg-primaryLight">Log In</a>
                    <!--<a data-bs-toggle="modal" data-bs-target="#myModalRegisterr" class="link_default text-white btn_details bg-primaryLight">Register</a>-->
                    
                    <!--<a href="{{ route('login') }}" class="btn btn-sm btn-primary">Log In</a>-->
                    <!--<a href="{{ route('register') }}" class="btn btn-sm btn-primary">Register</a>                -->
                </div>
            </div>
            <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>
<script>
function stripTags(input) {
    return input.replace(/<[^>]*>/g, '');
}
document.addEventListener('DOMContentLoaded', function() {
    const previewButtons = document.querySelectorAll('.preview-property-button');
    const modalTitle = document.querySelector('#modalTopProperties .modal-title');
    const modalAddress = document.querySelector('#modalTopProperties .model-address');
    const modalImages = document.querySelector('#modalTopProperties .carousel-inner');
    const modalDescription = document.querySelector('#modalTopProperties .modal-description');
    const modalPrice = document.querySelector('#modalTopProperties .model-price');
    const modalArea = document.querySelector('#modalTopProperties .model-area');

    previewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const propertyData = JSON.parse(this.getAttribute('data-property'));

            modalTitle.textContent = propertyData.title;
            modalAddress.textContent = propertyData.address;

            propertyData.images.forEach((image, index) => {
                const img = document.createElement('img');
                img.src = "{{ asset('images/property_images/') }}/" + image.name;
                img.className = 'd-block w-100 rounded-5';
                const carouselItem = document.createElement('div');
                carouselItem.className = 'carousel-item' + (index === 0 ? ' active' :
                    '');
                carouselItem.appendChild(img);
                modalImages.appendChild(carouselItem);
            });
            // Add new images
            modalDescription.textContent = stripTags(propertyData.description);
            modalPrice.textContent = "₹ " + propertyData.price;
            modalArea.textContent = "₹ " + (propertyData.price / propertyData.area) + "/sqft";
        });
    });
});
</script>

<!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<!-- gallery swiper -->
    <script>
        var swiper = new Swiper(".slide-content-gallery", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            centerSlide: true,
            fade: true,
            grabCursor: false,
            allowTouchMove: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination-amenity",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".ame-next",
                prevEl: ".ame-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                570: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#myModalss').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); 
                var propertyId = button.data('property-id');
                // alert(propertyId);
                $('#property_id').val(propertyId); 
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#myModalNowdd').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); 
                var propertyId = button.data('property-id');
                $('#propertysid').val(propertyId); 
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                // Show the modal after 15 seconds
                $('#myModalHomepopup').modal('show');
            }, 3000); // 3 seconds in milliseconds
        });
    </script>
@endsection