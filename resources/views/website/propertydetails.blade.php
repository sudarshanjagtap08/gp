@extends('website.header')
@section('metatitle', $metatitle)
@section('metadescription', $metadescription)
@section('metakeyword', $metakeyword)
@section('canonical', $canonical)

@section('content')
<section class="pt-3 pb-5 py-md-5 poroperty_details_page inner_page_mt">
    <div class="container">
        <div class="row">
            <div class="d-none d-md-block">
                    <div class="d-md-flex justify-content-between align-items-center mb-3">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item fs-tiny"><a href="/" class="link_default text_primary_light">Home</a>
                                </li>
                                <li class="breadcrumb-item fs-tiny"><a
                                        href="{{ route('property-type', ['propertySlug' => strtolower(str_replace(' ', '-', $property->property_type->name))]) }}"
                                        class="link_default text_primary_light">{{$property->property_type->name}}</a></li>
                                <li class="breadcrumb-item active fs-tiny" aria-current="page">{{$property->title}}</li>
                            </ol>
                        </nav>
                        <div class="d-none d-md-flex">
                            @auth
                                @if(in_array($property->id, $userPropertyEnquiryIds->toArray()))
                                    <div class="link_default text-white btn_details bg-primaryLight me-2" title="Contacted">
                                        <i class="bi bi-check-all fs-16"></i>Contacted
                                    </div>
                                @else
                                    <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal"
                                        data-bs-target="#myModal">
                                        <i class="bi bi-telephone fs-6"></i> Contact
                                    </a>
                                @endif
                            @else
                                <a href="#" class="link_default text-white btn_details bg-primaryLight me-2" data-bs-toggle="modal"
                                            data-bs-target="#myModalNow">
                                            <i class="bi bi-telephone fs-6"></i> Enquire Now
                                </a>
                            @endauth
                            <a href="#" class="link_default" onclick="sharePage()">
                                <div class="share_print_btn d-flex justify-content-center align-items-center text-center me-2">
                                    <i class="bi bi-share fs-6"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="col-md-9">
                <div class="d-none d-md-block">
                    <div class="section_title text-center text-md-start">
                        <div class="d-flex justify-content-between">
                            <h3 class="heading mb-4">{{$property->title}}</h3>
                            <h3>Rs.{{$property->price}} <span style="color: green">*</span></h3>
                        </div>
                    </div>
                    <div class="box_wrapper mb-3">
                        <div class="">
                            <div class="d-flex">
                                <a href="#" class="link_default">
                                    <div class="for_sale_box box_default fs-12 me-1">{{$property->property_statuses->name}}</div>
                                </a>
                                <a href="#" class="link_default">
                                    <div class="hot_offer_box box_default fs-12 ">{{$property->offer}}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <address class="item_title mb-3 fs-14">
                        <i class="bi bi-geo-alt"></i>{{$property->address}}
                    </address>
                </div>
                <div>
                    <div class="row col-12 m-0 d-none d-md-flex">
                        <div class="col-md-8 px-1">
                            <a role="button" data-bs-toggle="modal" data-bs-target="#modalPropertyFullView"
                                class="carousel-link" data-slide-index="0">
                                @if($property->images && count($property->images) > 0)
                                    <a role="button" data-bs-toggle="modal" data-bs-target="#modalPropertyFullView"
                                        class="carousel-link" data-slide-index="0">
                                        <img src="{{ asset('images/property_images/'.$property->images[0]->name)}}"
                                            class="img-fluid w-100" alt="{{$property->images[0]->aux1}}">
                                    </a>
                                @endif
                            </a>
                        </div>
                        <div class="col-md-4 px-1 d-flex flex-column justify-content-between">
                            @if($property->images && $property->images->count() > 1)
                                <a role="button" data-bs-toggle="modal" data-bs-target="#modalPropertyFullView"
                                    class="carousel-link" data-slide-index="1">
                                    <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}"
                                        class="img-fluid w-100" alt="{{$property->images[1]->aux1}}">
                                </a>
                            @endif
                            @if($property->images && $property->images->count() > 2)
                                <a role="button" data-bs-toggle="modal" data-bs-target="#modalPropertyFullView"
                                    class="carousel-link" data-slide-index="2">
                                    <img src="{{ asset('images/property_images/'.$property->images[2]->name)}}"
                                        class="img-fluid w-100" alt="{{$property->images[2]->aux1}}">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div id="carouselpropertyPageslider" class="carousel slide carousel-fade d-md-none" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if($property->images && count($property->images) > 0)
                                <div class="carousel-item propertydetailsmodal active">
                                    <a role="button" data-bs-toggle="modal" data-bs-target="#modalPropertyFullView"
                                        class="carousel-link" data-slide-index="0">
                                        <!--<img src="{{asset('website/images/aqua-woods-view-1.jpg')}}" class="img-fluid w-100" alt="">-->
                                        <img src="{{ asset('images/property_images/'.$property->images[0]->name)}}"
                                        class="img-fluid w-100" alt="{{$property->images[0]->aux1}}">
                                    </a>
                                </div>
                            @endif
                             @if($property->images && $property->images->count() > 1)
                                <div class="carousel-item propertydetailsmodal">
                                    <a role="button" data-bs-toggle="modal" data-bs-target="#modalPropertyFullView"
                                        class="carousel-link" data-slide-index="1">
                                        <!--<img src="{{asset('website/images/aqua-woods-view-3.jpg')}}" class="img-fluid w-100" alt="">-->
                                        <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}"
                                        class="img-fluid w-100" alt="{{$property->images[1]->aux1}}">
                                    </a>
                                </div>
                             @endif
                             @if($property->images && $property->images->count() > 2)
                                <div class="carousel-item propertydetailsmodal">
                                    <a role="button" data-bs-toggle="modal" data-bs-target="#modalPropertyFullView"
                                        class="carousel-link" data-slide-index="2">
                                        <!--<img src="{{asset('website/images/aqua-woods-view-4.jpg')}}" class="img-fluid w-100" alt="">-->
                                        <img src="{{ asset('images/property_images/'.$property->images[2]->name)}}"
                                        class="img-fluid w-100" alt="{{$property->images[2]->aux1}}">
                                    </a>
                                </div>
                            @endif
                        </div>
                        <button class="carousel-control-prev " type="button" data-bs-target="#carouselpropertyPageslider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next " type="button" data-bs-target="#carouselpropertyPageslider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- Mobile View Content -->
                <div class="heading mt-3 d-md-none">
                    <div class="d-flex justify-content-between mb-3">
                        <!--<a href="#" class="link_default">-->
                        <!--    <div class="share_print_btn d-flex justify-content-center align-items-center text-center me-2">-->
                        <!--        <i class="bi bi-share fs-6"></i>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <a href="#" class="link_default" onclick="sharePage()">
                            <div class="share_print_btn d-flex justify-content-center align-items-center text-center me-2">
                                <i class="bi bi-share fs-6"></i>
                            </div>
                        </a>
                    </div>
                    <div class="box_wrapper mb-3">
                        <div class="">
                            <div class="d-flex">
                                <a href="#" class="link_default">
                                    <div class="for_sale_box box_default fs_tiny me-1">FOR SALE</div>
                                </a>
                                <a href="#" class="link_default">
                                    <div class="hot_offer_box box_default fs_tiny ">HOT OFFER - 0% GST</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="section_title text-center text-md-start">
                        <div class="d-flex justify-content-between">
                            <h3>{{$property->title}}</h3>
                            <h3>Rs.{{$property->price}}</h3>
                        </div>
                    </div>
                    <address class="item_title mb-3 fs-14">
                        <i class="bi bi-geo-alt"></i>{{$property->address}}
                    </address>
                </div>
                <div class="text-start text-md-center pt-3 pt-md-4">
                    <!--<div class="property_type h6 mb-2">{{$property->property_type->name}}</div>-->
                    <h1 class="h3">{{$property->headingtag}}</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-white p-3 p-md-4 rounded shadow">
                            <div class="row">
                                <h6 class="fs-6 mb-4">Details</h6>
                                <div class="p-2 p-md-4 bg_light shadow-sm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Price :</div>
                                                <div class="px-2">Rs.{{$property->price }} <span style="color: green">*</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Property Type :</div>
                                                <div class="px-2">{{$property->property_type->name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Open Space :</div>
                                                <div class="px-2">{{$property->openspace}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Property Status :</div>
                                                <div  class="px-2">{{$property->property_statuses->name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">View :</div>
                                                <div class="px-2">{{$property->property_view->name}}</div>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-6">-->
                                        <!--    <div class="d-flex fs-14 mb-2 mb-md-3">-->
                                        <!--        <div class="fw-bold">FSI :</div>-->
                                        <!--        <div class="px-2">{{$property->fsi}}</div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Property Size :</div>
                                                <div class="px-2">{{ $property->area}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Possession Date :</div>
                                                <div class="px-2">{{ $property->possession}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Plot Size To:</div>
                                                <div class="px-2">{{ $property->plot_size_to}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Plot Size From :</div>
                                                <div class="px-2">{{ $property->plot_size_from}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex fs-14 mb-2 mb-md-3">
                                                <div class="fw-bold">Offer :</div>
                                                <div class="px-2">{{ $property->offer}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    @if($propertyfeatures && count($propertyfeatures) > 0)
                        <div class="col-md-6">
                            <div class="bg-white p-3 p-md-4 rounded shadow">
                                <div class="row">
                                    <h6 class="fs-6 mb-4">Property Features</h6>
                                    <div class="p-2 p-md-4 bg_light shadow-sm">
                                        <div class="">
                                            <div class="row" id="propertyfeaturesContainer">
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach($propertyfeatures as $propertyfeature)
                                                    @if($count < 6)
                                                        <div class="col-md-12">
                                                            <div class="d-flex fs-10 mb-2 mb-md-3">
                                                                <div class="fw-bold px-3">
                                                                    > {{ $propertyfeature->feature }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        @if(count($propertyfeatures) > 6)
                                            <button id="showMoreBtnFeature" class="btn btn-primary btn-sm">Show More</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($aminities && count($aminities) > 0)
                        <div class="col-md-6">
                            <div class="bg-white p-3 p-md-4 rounded shadow">
                                <div class="row">
                                    <h6 class="fs-6 mb-4">Amenities</h6>
                                    <div class="p-2 p-md-4 bg_light shadow-sm">
                                        <div class="">
                                            <div class="row" id="amenitiesContainer">
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach($aminities as $aminity)
                                                    @if($count < 8)
                                                        <div class="col-md-6">
                                                            <div class="d-flex fs-10 mb-2 mb-md-3">
                                                                <img src="{{ asset('images/aminity/'.$aminity->aminitys->image) }}" class="img-fluid" width="30" height="30">
                                                                <div class="fw-bold px-3">
                                                                    {{ $aminity->aminitys->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                            @if(count($aminities) > 8)
                                                <button id="showMoreBtn" class="btn btn-primary btn-sm">Show More</button>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!--gallery images start-->
                <section class="py-5">
                    <div class="container">
                        <div class="row ">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"
                                style="display: flex; justify-content: center;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Actual Images</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Layout and Plans Images</button>
                                </li>
                                <!--<li class="nav-item" role="presentation">-->
                                <!--    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"-->
                                <!--        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"-->
                                <!--        aria-selected="false">Videos</button>-->
                                <!--</li>-->
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach($actualimages as $actualimage)
                                                <div class="card swiper-slide my-auto overflow-hidden" >
                                                    <a href="{{asset('images/actualimages/'.$actualimage->name)}}" data-lightbox="gallery">
                                                        <img src="{{asset('images/actualimages/'.$actualimage->name)}}" class="w-100 card-img" alt="{{$actualimage->aux2}}" />
                
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- <div class="swiper-pagination"></div> -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                                    tabindex="0">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach($layoutimages as $layoutimage)
                                                <div class="card swiper-slide my-auto overflow-hidden">
                                                    <a href="{{asset('images/layoutimages/'.$layoutimage->name)}}" data-lightbox="gallery">
                                                        <img src="{{asset('images/layoutimages/'.$layoutimage->name)}}" alt="{{$layoutimage->aux2}}" />
                
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- <div class="swiper-pagination"></div> -->
                                    </div>
                                </div>
                                <!--<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"-->
                                <!--    tabindex="0">-->
                                <!--    <div class="swiper mySwiper">-->
                                <!--        <div class="swiper-wrapper">-->
                                <!--            <div class="card swiper-slide my-auto overflow-hidden">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </section>
                <!--<section class="py-5">-->
                <!--    <div class="container">-->
                <!--        <div class="row ">-->
                <!--            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"-->
                <!--                style="display: flex; justify-content: center;">-->
                <!--                <li class="nav-item" role="presentation">-->
                <!--                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"-->
                <!--                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"-->
                <!--                        aria-selected="true">Actual Images</button>-->
                <!--                </li>-->
                <!--                <li class="nav-item" role="presentation">-->
                <!--                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"-->
                <!--                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"-->
                <!--                        aria-selected="false">Layout and Plans Images</button>-->
                <!--                </li>-->
                <!--                <li class="nav-item" role="presentation">-->
                <!--                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"-->
                <!--                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"-->
                <!--                        aria-selected="false">Videos</button>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--            <div class="tab-content" id="pills-tabContent">-->
                <!--                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"-->
                <!--                    aria-labelledby="pills-home-tab" tabindex="0">-->
                <!--                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">-->
                <!--                        <div class="carousel-inner">-->
                <!--                            <div class="carousel-item active">-->
                <!--                                <div class="row">-->
                <!--                                    @foreach($actualimages as $actualimage)-->
                <!--                                        <div class="col-4">-->
                <!--                                            <div class="card" style="width: 20rem;">-->
                <!--                                                <a href="{{asset('images/actualimages/'.$actualimage->name)}}" class="link_reset" data-lightbox="gallery">-->
                <!--                                                    <img src="{{asset('images/actualimages/'.$actualimage->name)}}" class=" w-100" alt="...">-->
                <!--                                                </a>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    @endforeach-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                                
                <!--                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"-->
                <!--                    tabindex="0">-->
                <!--                    <div id="carouselExampleSlidesOnly1" class="carousel slide" data-bs-ride="carousel">-->
                <!--                        <div class="carousel-inner">-->
                <!--                            <div class="carousel-item active">-->
                <!--                                <div class="row">-->
                <!--                                    @foreach($layoutimages as $layoutimage)-->
                <!--                                        <div class="col-4">-->
                <!--                                            <div class="card" style="width: 20rem;">-->
                <!--                                                <a href="{{asset('images/layoutimages/'.$layoutimage->name)}}" class="link_reset" data-lightbox="gallery">-->
                <!--                                                    <img src="{{asset('images/layoutimages/'.$layoutimage->name)}}" class=" w-100" alt="...">-->
                <!--                                                </a>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    @endforeach-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"-->
                <!--                    tabindex="0">-->
                <!--                    <div id="carouselExampleSlidesOnly2" class="carousel slide" data-bs-ride="carousel">-->
                <!--                        <div class="carousel-inner">-->
                <!--                            <div class="carousel-item active">-->
                <!--                                <div class="row">-->
                <!--                                    <div class="col-4"><img src="{{asset('images\images\gallery-07.jpg')}}" class=" w-100" alt="..."></div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</section>-->
                <!--gallery images end-->
                
                
                <!--<div class="bg-white p-3 p-md-4 mt-4 mt-md-5 rounded shadow text-justify">-->
                <!--    <h6 class="fs-6 my-3 my-md-4">Videos</h6>-->
                <!--    <section id="gallery" class="overflow-hidden" data-aos="zoom-in" data-aos-duration="1200">-->
                <!--        <div class="container">-->
                <!--            <div class="row p-2">-->
                <!--               @if($youtube && count($youtube) > 0)-->
                <!--                    <div class="col-md-6">-->
                <!--                        <div class="slide-container swiper">-->
                <!--                            <div class="slide-content-gallery">-->
                <!--                                <div class="card-wrapper swiper-wrapper d-flex align-items-center">-->
                <!--                                    @foreach($youtube as $youtube)-->
                <!--                                        <div class="card swiper-slide">-->
                <!--                                            <div class="">-->
                                                                
                <!--                                                <iframe width="500" height="350" src="{{$youtube->name}}" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    @endforeach-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                @endif-->
                                
                <!--            </div>-->
                <!--        </div>-->
                <!--    </section>-->
                <!--</div>-->
                @if($property->description != "")
                    <div class="bg-white p-3 p-md-4 mt-4 mt-md-5 rounded shadow text-justify">
                        <h6 class="fs-6 my-3 my-md-4">Description</h6>
                        <div id="propertyDescription" style="overflow: hidden">
                            <p id="initialText">{!! $property->description !!}</p>
                        </div>
                    </div>
                @endif
                <section class="py-4 mt-5 cta">
                    <div class="container-fluid">
                        <div class="d-md-flex justify-content-center justify-content-md-around text-center">
                            <h5 class="mb-md-0">"Unlock your dream plot – perfect space, ideal investment awaits!"</h5>
                            @if($property->brochure != "Null")
                                <a href="{{ url('/brochures/' . $property->brochure) }}" class="link_default btn btn_cta btn-sm" target="_blank" download>Download Brochure</a>
                            @endif
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="bg-white p-3 p-md-4 mt-4 mt-md-5 rounded shadow">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between my-4">
                                    <h6 class="fs-6 m-0">Address</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex fs-14 mb-2 mb-md-3">
                                            <div class="fw-bold">Address:</div>
                                            <div class="px-2">{{$property->address}} </div>
                                        </div>
                                        <div class="d-flex fs-14 mb-2 mb-md-3">
                                            <div class="fw-bold">City :</div>
                                            <div class="px-2">{{$property->city->name}}</div>
                                        </div>
                                        <div class="d-flex fs-14 mb-2 mb-md-3">
                                            <div class="fw-bold">State :</div>
                                            <div class="px-2">{{$property->state->name}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex fs-14 mb-2 mb-md-3">
                                            <div class="fw-bold">Area :</div>
                                            <div class="px-2">{{$property->city->name}}</div>
                                        </div>
                                        <div class="d-flex fs-14 mb-2 mb-md-3">
                                            <div class="fw-bold">Country :</div>
                                            <div class="px-2">{{$property->country->name}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($locationadvantage && count($locationadvantage) > 0)
                                <div class="col-md-6">
                                    <div class="bg-white p-3 p-md-4 rounded shadow">
                                        <div class="row">
                                            <h6 class="fs-6 mb-4">Location Connectivity</h6>
                                            <div class="p-2 p-md-4 bg_light shadow-sm">
                                                <div class="">
                                                    <div class="row" id="locationadvantageContainer">
                                                        @php
                                                            $count = 0;
                                                        @endphp
                                                        @foreach($locationadvantage as $advantage)
                                                            @if($count < 8)
                                                                <div class="col-md-6">
                                                                    <div class="d-flex fs-10 mb-2 mb-md-3">
                                                                        <img src="{{ asset('images/locationadvantage/mosquelocation.png') }}" class="img-fluid" width="30" height="30">
                                                                        <div class="fw-bold px-3">
                                                                            {{ $advantage->name }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @php
                                                                    $count++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @if(count($locationadvantage) > 8)
                                                    <button id="showMorelocationadvantage" class="btn btn-primary btn-sm">Show More</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <!--<div class="bg-white p-3 p-md-4 mt-4 mt-md-5 rounded shadow">-->
                            <!--<div class="col-md-6">-->
                                <div class="bg-white p-3 p-md-4 mt-4 mt-md-5 rounded shadow text-justify">
                                    <h6 class="fs-6 my-3 my-md-4">Activity On this Property</h6>
                                    <section id="gallery" class="overflow-hidden" data-aos="zoom-in" data-aos-duration="1200">
                                        <div class="container">
                                            <div class="row">
                                                <div class="d-flex fs-14 mb-2 mb-md-3 col-md-4">
                                                    <i class="fas fa-eye mr-2" style="font-size: 40px;" ></i> 
                                                    <div class="fw-bold px-3">
                                                        {{$propertyseenCount}}
                                                        <p>Unique Views</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex fs-14 mb-2 mb-md-3 col-md-4">
                                                    <i class="fas fa-heart mr-2" style="font-size: 40px;"></i>
                                                    <div class="fw-bold px-3">
                                                        {{$shortlistedCount}}
                                                        <p>Shortlisted</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex fs-14 mb-2 mb-md-3 col-md-4">
                                                    <i class="fas fa-envelope mr-2" style="font-size: 40px;"></i>
                                                    <div class="fw-bold px-3">
                                                        {{$propertyenquiryCount}}
                                                        <p>Contacted</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            <!--</div>-->
                        <!--</div>-->
                    </div>
                    @if($property->investment_benifittitle != "" OR $property->investment_benifitdescription != "" )
                        <div class="bg-white p-3 p-md-4 mt-4 mt-md-5 rounded shadow">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <img src="{{asset('images/investment_benifit/'. $property->investment_benifitimage) }}" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="property_details_map">
                                        <h2>{{$property->investment_benifittitle}}</h2>
                                        <p style="text-align:justify;">{{$property->investment_benifitdescription}}</p>
                                    </div>
                                    <div class="row">
                                        <ul style="list-style-type: none; font-weight:400; font-size:15px;">
                                            @foreach($property->investmentbenifits as $feature)
                                                <li>
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md-1 text-center">
                                                            <i class="fa-solid fa-circle" style="width:8px"></i>
                                                        </div>
                                                        <div class="col-md-11 px-0">
                                                            {{ $feature->name }}
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="sticky-form mt-5">
                    <form action="{{ url('property/newenquiry/save')}}" method="post" class="form-sticky bg-light p-3 rounded shadow">
                            @csrf
                        <h6 class="mb-3">Contact Us</h6>
                        <input type="hidden" name="url" value="{{ url()->current() }}">
                        <input type="hidden" name="property_id" class="contact_us_input" id="property_id" value="{{$property->id}}" required>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span style="color:red" >*</span></label>
                                <input type="text" class="form-control" name="nan" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="name" class="form-label">Number <span style="color:red" >*</span></label>
                                <input type="number" class="form-control" name="num" placeholder="Your Number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="eoe" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" name="coc" rows="3" placeholder="Your Message"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="bg-white p-3 p-md-4 rounded shadow text-justify">
                            <section id="gallery" class="overflow-hidden" data-aos="zoom-in" data-aos-duration="1200">
                                <div class="section_title text-center mb-2 mt-3">
                                    <h2 class="h2">
                                        Recommended Properties
                                    </h2>
                                </div>
                                <div class="container">
                                    <div class="row p-2">
                                        <div class="slide-container swiper ">
                                            <div class="slide-content-gallery">
                                                <div class="card-wrapper swiper-wrapper d-flex align-items-center">
                                                    @foreach($featured_properties as $project)
                                                        <div class="card swiper-slide">
                                                            <div class="gallery-img">
                                                                <a href="{{ route('property', ['propertySlug' => $project->slug]) }}">
                                                                    <!-- Image -->
                                                                    <img src="{{ asset('images/property_images/'.$project->images[0]->name) }}"
                                                                        class="d-block w-100" alt="{{$project->images[0]->aux1}}">
                                                                    <!-- Content -->
                                                                    <div class="box_wrapper z-2 position-absolute">
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                            <!--<div class="feature_box box_default">-->
                                                                            <!--        FEATURED-->
                                                                            <!--</div>-->
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <!-- <div class="for_sale_box box_default me-1">FOR SALE</div> -->
                                                                            <!-- <div class="hot_offer_box box_default ">HOT OFFER - 0% GST</div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="price_wrapper z-2 px-4 py-2 position-absolute bottom-0 start-0 end-0">
                                                                     <div>
                                                                        <h6 id="top_properties_price" class="mb-1">₹ {{ $project->price }}
                                                                        </h6>
                                                                        <p class="item_title fs-tiny w-100">{{ $project->title }}
                                                                        </p>
                                                                        <p class="item_title fs-tiny w-100">{{ $project->short_address }}
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
    </div>
</section>

<div class="modal fade" id="modalPropertyFullView" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content rounded-5">
            <div class="modal-header">
                <img src="{{ asset('website/images/genuineplots-logo-200x50.png') }}" width="170px" alt="">
                <div class="d-flex">
                    <!--<div class="d-inline-block">-->
                    <!--    <a href="#" class="link_default">-->
                    <!--        <div class=" me-1 fs-6 d-flex justify-content-center align-items-center" title="Favourite">-->
                    <!--            <i class="bi bi-share me-2 fs-6"></i>Share-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-lg-12 pe-lg-0">
                        <div class="p-lg-3 position-relative">
                            <a href="#" class="link_default">
                                <div class="position-absolute btn_expand_contract p-2 z-3">
                                    <i class="bi bi-arrows-angle-expand fs-5"></i>
                                </div>
                            </a>
                            <!-- Image slider -->
                            <div id="carouselpropertydetails" class="carousel slide carousel-fade "
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if($property->images && $property->images->count() > 0)
                                        <div class="carousel-item propertydetailsmodal active">
                                            <img src="{{ asset('images/property_images/'.$property->images[0]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[0]->aux1}}">
                                        </div>
                                    @endif
                                    @if($property->images && $property->images->count() > 1)
                                        <div class="carousel-item propertydetailsmodal">
                                            <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}" class="d-block w-100" alt="{{$property->images[1]->aux1}}">
                                        </div>
                                    @endif
                                    @if($property->images && $property->images->count() > 2)
                                        <div class="carousel-item propertydetailsmodal">
                                            <img src="{{ asset('images/property_images/'.$property->images[2]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[2]->aux1}}">
                                        </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev opacity_1" type="button"
                                    data-bs-target="#carouselpropertydetails" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next opacity_1" type="button"
                                    data-bs-target="#carouselpropertydetails" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModalNow" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enquire About This Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('property/newenquiry/save')}}" method="post" class="row contact_us_form" id="popUpNewEnqForm">
                    @csrf
                    <div class="col-md-6 mb-md-3">
                        <input type="hidden" name="url" value="{{ url()->current() }}">
                        <input type="hidden" name="property_id" class="contact_us_input" id="property_id" value="{{$property->id}}" required>
                        <label for="" class="form-label">Name <span class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="nan" class="contact_us_input" id="" placeholder="" required>
                    </div>
                    <div class="col-md-6 mb-md-3">
                        <label for="" class="form-label">Phone <span class="text-danger"><sup>*</sup></span></label>
                        <input type="tel" name="num" pattern="[0-9]{10}" class="contact_us_input" id="" placeholder="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Email<span class="text-danger"><sup>*</sup></span></label>
                        <input type="text" name="eoe" class="contact_us_input" id="" placeholder="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Comment<span class="text-danger"><sup>*</sup></span></label>
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
                        <button type="submit" class="btn_submit w-auto"  onclick="submitFormWithCaptchaNewEnqForm()">Request Information</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal" tabindex="-1">
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
                        <input type="hidden" name="property_id" class="contact_us_input" id="property_id" value="{{$property->id}}" required>
                        <label for="" class="form-label">Name <span class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="nan" class="contact_us_input" id="" placeholder="" required>
                    </div>
                    <div class="col-md-6 mb-md-3">
                        <label for="" class="form-label">Phone <span class="text-danger"><sup>*</sup></span></label>
                        <input type="tel" name="num" pattern="[0-9]{10}" class="contact_us_input" id="" placeholder="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Email <span class="text-danger"><sup>*</sup></span></label>
                        <input type="text" name="eoe" class="contact_us_input" id="" placeholder="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Comment<span class="text-danger"><sup>*</sup></span></label>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyD9EFfHplQG6wmFYIvAVS7CmmZNM5WS5kQ&callback=initMap"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var showMoreBtn = document.getElementById("showMoreBtn");
        var amenitiesContainer = document.getElementById("amenitiesContainer");
        var amenities = @json($aminities); // Assuming $aminities is an array
        showMoreBtn.addEventListener("click", function() {
            for (var i = 8; i < amenities.length; i++) {
                var amenity = amenities[i];
                var amenityElement = document.createElement("div");
                amenityElement.classList.add("col-md-6");
                amenityElement.innerHTML = `
                    <div class="d-flex fs-10 mb-2 mb-md-3">
                        <img src="{{ asset('images/aminity/') }}/${amenity.aminitys.image}" class="img-fluid" width="40" height="40">
                        <div class="fw-bold px-3">
                            ${amenity.aminitys.name}
                        </div>
                    </div>
                `;
                amenitiesContainer.appendChild(amenityElement);
            }
            showMoreBtn.style.display = "none";
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var showMoreBtnFeature = document.getElementById("showMoreBtnFeature");
        var propertyfeaturesContainer = document.getElementById("propertyfeaturesContainer");
        var propertyfeatures = @json($propertyfeatures); // Assuming $propertyfeatures is an array

        showMoreBtnFeature.addEventListener("click", function() {
            for (var i = 6; i < propertyfeatures.length; i++) {
                var propertyfeature = propertyfeatures[i];
                var propertyfeatureElement = document.createElement("div");
                propertyfeatureElement.classList.add("col-md-12");
                propertyfeatureElement.innerHTML = `
                    <div class="d-flex fs-10 mb-2 mb-md-3">
                        <div class="fw-bold px-3">
                            > ${propertyfeature.feature}
                        </div>
                    </div>
                `;
                propertyfeaturesContainer.appendChild(propertyfeatureElement);
            }
            showMoreBtnFeature.style.display = "none";
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var showMoreBtnlocationadvantage = document.getElementById("showMorelocationadvantage");
        var locationadvantageContainer = document.getElementById("locationadvantageContainer");
        var locationadvantage = @json($locationadvantage); // Assuming $locationadvantage is an array

        showMoreBtnlocationadvantage.addEventListener("click", function() {
            for (var i = 8; i < locationadvantage.length; i++) {
                var advantage = locationadvantage[i];
                var locationadvantageElement = document.createElement("div");
                locationadvantageElement.classList.add("col-md-6");
                locationadvantageElement.innerHTML = `
                    <div class="d-flex fs-10 mb-2 mb-md-3">
                        <img src="{{ asset('images/locationadvantage/mosquelocation.png') }}" class="img-fluid" width="30" height="30">
                        <div class="fw-bold px-3">
                            ${advantage.name}
                        </div>
                    </div>
                `;
                locationadvantageContainer.appendChild(locationadvantageElement);
            }
            showMoreBtnlocationadvantage.style.display = "none";
        });
    });
</script>
<script>
    function initMap() {
        var propertyLat = {{$property->lat}};
        var propertyLng = {{$property->lng}};
        var jsonProperties = {!! $jsonProperties !!};
        try {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {
                    lat: propertyLat,
                    lng: propertyLng
                }
            });
              jsonProperties.forEach(function(property) {
                var markerColor = (property.lat === {{$property->lat}} && property.lng === {{$property->lng}}) ? 'green' : 'red';
    
                var marker = new google.maps.Marker({
                    position: {
                        lat: property.lat,
                        lng: property.lng
                    },
                    map: map,
                    title: property.title,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/' + markerColor + '-dot.png'
                });
            });
            
        } catch (error) {
            console.error('Error initializing Google Map:', error);
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
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
                    slidesPerView: 2,
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
     <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() 
            {
                $('#myModalEnquiry').modal('show');
            }, 15000);
        });
    </script>
    <script>
        function toggleDescription() {
            var initialText = document.getElementById("initialText");
            var remainingText = document.getElementById("remainingText");
            var btn = document.getElementById("readMoreBtn");
        
            if (remainingText.style.display === "none") {
                remainingText.style.display = "inline";
                btn.innerText = "Read Less";
            } else {
                remainingText.style.display = "none";
                btn.innerText = "Read More";
            }
        }
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
@endsection