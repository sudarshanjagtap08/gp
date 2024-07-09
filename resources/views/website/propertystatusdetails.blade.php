@extends('website.header')
@section('content')
<!-- Filter Bar -->
@extends('website.filterbar')
<section class="py-5 bg_light">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
            <div class="section_title text-center text-md-start">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-tiny"><a href="/" class="link_default text_primary_light">Home</a>
                        </li>
                        <li class="breadcrumb-item active fs-tiny" aria-current="page">{{$propertystatusname}}</li>
                    </ol>
                </nav>
                <h3>{{$propertystatusname}}</h3>
            </div>
        </div>
    </div>
</section>
<section class="search_result_seaction pb-5 bg_light overflow-hidden">
    <div class="container">
        <div class="row position-relative">
            <div class="col-md-9">
                @foreach($properties as $property)
                <div class="bg-white mb-4">
                    <div class="d-md-flex">
                        <div class="img_box image_swiper_box">
                            <div id="carouselItem_{{$property->id}}" class="carousel slide carousel-fade">
                                <a href="/search-results">
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
                                            <img src="{{ asset('images/property_images/'.$property->images[1]->name)}}"
                                                class="d-block w-100" alt="{{$property->images[1]->aux1}}">
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
                        <div class="content_box d-flex flex-column justify-content-between flex-grow-1 px-3 py-2">
                            <div class="box_wrapper">
                                <div class="d-flex justify-content-start">
                                    <div>
                                        <!-- <div class="feature_box box_default ">FEATURED</div> -->
                                    </div>
                                    <div class="d-flex">
                                        <a href="#" class="link_default">
                                            <div class="for_sale_box box_default me-1">
                                                {{$property->property_statuses->name}}</div>
                                        </a>
                                        <a href="#" class="link_default">
                                            <div class="hot_offer_box box_default">{{$property->offer}}%
                                                GST</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end ">
                                <h6 id="top_properties_price" class="mb-1">₹ {{$property->price}}</h6>
                            </div>
                            <div class=" overflow-hidden">
                                <a href="{{ route('property', ['propertySlug' => $property->slug]) }}"
                                    class="link_default">
                                    <h6 class="item_title">{{$property->title}}</h6>
                                </a>
                                <p class="item_title mb-2">{{$property->short_address}}</p>
                                <p class="fw-400 uppercase mb-2">{{$property->property_type->name}}</p>
                                <!-- <div class="">
                                </div> -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <div class="fs-tiny me-2">
                                            <i class="bi bi-person"></i>
                                            {{$property->user->name}}
                                        </div>
                                        <div class="fs-tiny">
                                            <i class="bi bi-paperclip"></i>
                                            {{ $property->created_at->diffInMonths(now()) }} months ago
                                        </div>
                                    </div>
                                    <a href="{{ route('property', ['propertySlug' => $property->slug]) }}"
                                        class="link_default text-white btn_details bg-primaryLight">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="mt-5">
                    {{ $properties->links() }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <div class="bg-white search_results_right_bar p-3 p-lg-4 mb-4">
                        <div class="section_title mb-4 ">
                            <h3>Property Status</h3>
                        </div>
                        <ul class="archive_list ps-4">
                            @foreach($propertystatuscounts as $propertyTypeStatus)
                            <li> <a href="{{ route('status', ['propertytypeSlug' => strtolower(str_replace(' ', '-', $propertyTypeStatus->name))]) }}"
                                    class="archive_list_item link_default text_primary_light">
                                    {{ $propertyTypeStatus->name }} ({{ $propertyTypeStatus->properties_count }} )</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-white p-3 p-lg-4 mb-4">
                        <div class="section_title mb-4">
                            <h3>Property Type</h3>
                        </div>
                        <ul class="archive_list ps-4">
                            @foreach($propertytypecounts as $propertyTypeCount)
                            <li>
                                <a href="{{ route('property-type', ['propertySlug' => strtolower(str_replace(' ', '-', $propertyTypeCount->name))]) }}"
                                    class="archive_list_item link_default text_primary_light">
                                    {{ $propertyTypeCount->name }} ({{ $propertyTypeCount->properties_count }} )
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection