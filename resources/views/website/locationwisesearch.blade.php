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
                                    @if($property->property_categoryids->isNotEmpty())
                                        <div class="feature_box box_default">
                                            @foreach($property->property_categoryids as $category)
                                                @if($category->property_categories->id == 1)
                                                    FEATURED
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="d-flex">
                                        <div class="for_sale_box box_default me-1">{{$property->property_statuses->name}}</div>
                                        <div class="hot_offer_box box_default">{{$property->offer}}</div>
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
                                <a href="property/{{$property->slug))}}">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            @if($property->images && count($property->images) > 0)
                                            <img src="{{ asset('images/property_images/'.$property->images[0]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[0]->aux1}}">
                                            @endif
                                        </div>
                                        @if($property->images && count($property->images) > 1)
                                        <div class="carousel-item ">
                                            <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[1]->aux1}}">
                                        </div>
                                        @endif
                                        @if($property->images && count($property->images) > 2)
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[1]->aux1}}">
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
                            <a href="property/{{$property->slug}}"
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

@endsection