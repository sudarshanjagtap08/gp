@extends('website.header')
@section('metatitle', $property_city->metatitle)
@section('metadescription', $property_city->metadescription)
@section('content')
<!-- Filter Bar -->
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
                                <a href="{{ route('property', ['propertySlug' => $property->slug ]) }}">
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
                                    <a href="{{ route('property', ['propertySlug' => $property->slug ]) }}"
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
               @include('website.searchsidebar')
            </div>
        </div>
    </div>
</section>

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
                    <!-- <div class="d-inline-block">
                        <a href="#" class="link_default">
                            <div class=" me-1 fs-6 d-flex justify-content-center align-items-center" title="Favourite">
                                <i class="bi bi-heart me-2 fs-6"></i>
                                Favourite
                            </div>
                        </a>
                    </div> -->
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
@endsection