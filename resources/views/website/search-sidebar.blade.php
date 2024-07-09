@extends('website.header')
@section('content')
@extends('website.filterbar')
<section class="pt-5 pb-4 mt-3 mt-md-0 bg_light">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
            <div class="section_title text-start text-md-start">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-tiny"><a href="/" class="link_default text_primary_light">Home</a>
                        </li>
                        <li class="breadcrumb-item active fs-tiny capitalize" aria-current="page">{{$propertycityname}}
                        </li>
                    </ol>
                </nav>
                <h3 class="capitalize">{{$propertycityname}}</h3>
            </div>
            <div class="d-none d-md-block">
                <a href="#" class="link_default">
                    <i class="fa-solid fa-list fs-5 me-2"></i>
                </a>
                <a href="#" class="link_default ">
                    <i class="bi bi-microsoft fs-5"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="search_result_seaction pb-5 bg_light overflow-hidden">
    <div class="container">
        <div class="col-md-8 mb-3">
            <div class="">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 fw-bold">{{$propertycount}} Results Found</div>
                </div>
            </div>
        </div>
        <div class="row position-relative">
            <div class="col-md-9">
                @foreach($properties as $property)
                <div class="bg-white mb-4">
                    <div class="d-md-flex">
                        <div class="img_box image_swiper_box">
                            <div id="carouselItem_{{$property->id}}" class="carousel slide carousel-fade">
                                <a href="{{ route('property', ['propertySlug' => $property->slug]) }}">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            @if($property->images && count($property->images) > 0)
                                            <img src="{{ asset('images/property_images/'.$property->images[0]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[0]->aux1}}">
                                            @endif
                                        </div>
                                        @if($property->images && count($property->images) > 1)
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[1]->aux1}}">
                                        </div>
                                        @endif
                                        @if($property->images && count($property->images) > 2)
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/property_images/'.$property->images[2]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[2]->aux1}}">
                                        </div>
                                        @endif
                                    </div>
                                </a>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselItem_{{$property->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselItem_{{$property->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
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
                                            <i class="bi bi-arrows-angle-expand fs-"></i>
                                        </div>
                                    </a>
                                </div>
                                <!-- favourite -->
                                <div class="d-inline-block">
                                    <a href="#" class="favorite-button" data-property-id="{{ $property->id }}">
                                        <div class="box_default me-1" title="Favourite">
                                            @auth
                                            <i
                                                class="fs- @if(in_array($property->id, $userFavoritePropertyIds->toArray())) bi bi-heart-fill @else bi bi-heart @endif favorite-icon fs-10"></i>
                                            @else
                                            <i
                                                class="fs- @if(in_array($property->id, $userFavoritePropertyIds)) bi bi-heart-fill @else bi bi-heart @endif favorite-icon fs-10"></i>

                                            @endauth
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="content_box flex-grow-1 px-3 py-2">
                            <div class="d-flex justify-content-end ">
                                <h6 id="top_properties_price" class="mb-2">₹{{$property->price}}</h6>
                            </div>
                            <div class="overflow-hidden">
                                <a href="{{ route('property', ['propertySlug' => $property->slug]) }}"
                                    class="link_default">
                                    <h6 class="item_title mb-2">{{$property->title}}</h6>
                                </a>
                                <p class="item_title mb-2">{{$property->address}}</p>
                                <div class="mb-2 d-flex">
                                    <div class="fs-tiny me-3"> <i class="bi bi-rulers"></i> {{$property->area}}</div>
                                    <p class="fw-400 uppercase mb-2">{{$property->property_type->name}}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <!--<div class="d-flex">-->
                                    <!--    <div class="fs-tiny me-2">-->
                                    <!--        <i class="bi bi-person"></i>-->
                                    <!--        {{$property->user->name}}-->
                                    <!--    </div>-->
                                    <!--    <div class="fs-tiny">-->
                                    <!--        <i-->
                                    <!--            class="bi bi-paperclip"></i>{{ $property->created_at->diffInMonths(now()) }}-->
                                    <!--        months ago-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <a href="{{ route('property', ['propertySlug' => $property->slug]) }}"
                                        class="link_default text-white btn_details bg-primaryLight">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-3">
               @include('website.searchsidebar')
            </div>
        </div>
    </div>
</section>

@endsection