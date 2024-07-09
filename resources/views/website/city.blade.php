@extends('website.header')
@section('content')

<!-- Filter Bar -->
@extends('website.filterbar')

<section class="py-5">
    <div class="container mt-5 mt-md-0">
        <div class="section_title text-center text-md-start mb-5">
            <h3>Top Localities</h3>
            <p>Explore Plots/Land in Popular Indian Cities </p>
        </div>
        <div>
            <div class="row">
                @foreach($top_localities as $top_localitie)
                <div class="col-sm-6 col-lg-3 mb-3 px-2">
                    <a href="{{ route('city.top_localities', ['citySlug' => strtolower(str_replace(' ', '-', $top_localitie->name))]) }}"
                        class="link_default">
                        <div class="max_height_img_box" style="background: url('{{ asset('images/city/'.$top_localitie->image) }}') no-repeat center center;
                        background-size: cover;">
                            <div class="heading">
                                <h5 class="fw-normal">{{$top_localitie->name}}</h5>
                                <!-- <p class="mb-0 fs-6">1 Property</p> -->
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg_light city_page">
    <div class="container">
        <div class="section_title text-center text-md-start mb-5">
            <h3>Properties From Top Localities</h3>
            <p>Explore Plots/Land in Popular Indian Cities</p>
        </div>
        <div>
            <div class="row">
                <div class="col-12 mt-4">
                    <div id="paginated-list-all" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
                        @foreach($topproperty as $property)
                        <!-- Item  -->
                        <div class="col mb-3 mb-md-0">
                            <div class="bg-white">
                                <div class="image_swiper_box">
                                    <div class="box_wrapper z-2 position-absolute ">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                @if($property->property_categoryids->isNotEmpty())
                                                <div class="feature_box box_default">
                                                    @foreach($property->property_categoryids as $category)
                                                    @if($category->property_categories->id == 1)
                                                    FEATURED
                                                    @endif
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            <div class="d-flex">
                                                <div class="for_sale_box box_default me-1">
                                                    {{$property->property_statuses->name}}</div>
                                                <div class="hot_offer_box box_default ">HOT OFFER -
                                                    {{$property->offer}}% GST</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Price Details -->
                                    <div class="price_wrapper z-2 px-4 py-2 position-absolute bottom-0 start-0 end-0">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 id="top_properties_price" class="mb-1">₹
                                                    {{$property->price}}</h6>
                                            </div>
                                            <div class="action_buttons">
                                                <!-- fullview -->
                                                <div class="d-inline-block">
                                                    <a href="#" class="preview-property-button"
                                                        data-property="{{ json_encode($property) }}"
                                                        data-bs-toggle="modal" data-bs-target="#modalTopProperties">
                                                        <div class="box_default me-1" title="Preview">
                                                            <i class="bi bi-arrows-angle-expand fs-"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!-- <div class="d-inline-block">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#modalTopProperties">
                                                                <div class="box_default me-1" title="Preview">
                                                                    <i class="bi bi-arrows-angle-expand fs-"></i>
                                                                </div>
                                                            </a>
                                                        </div> -->
                                                <!-- favourite -->
                                                <!--<div class="d-inline-block">-->
                                                <!--    <a href="#">-->
                                                <!--        <div class="box_default me-1" title="Favourite">-->
                                                <!--            <i class="bi bi-heart fs-"></i>-->
                                                <!--        </div>-->
                                                <!--    </a>-->
                                                <!--</div>-->
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
                                                <!-- compare -->
                                                <!--<div class="d-inline-block">-->
                                                <!--    <a href="#">-->
                                                <!--        <div class="box_default me-1" title="Add to Compare">-->
                                                <!--            <i class="bi bi-plus-circle fs-"></i>-->
                                                <!--        </div>-->
                                                <!--    </a>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Image slider -->
                                    <div id="carouselExampleFade_{{$property->id}}"
                                        class="carousel slide carousel-fade">
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
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleFade_{{$property->id}}"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleFade_{{$property->id}}"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>

                                </div>
                                <!-- Bottom Content -->
                                <div class="p-3">
                                    <a href="{{ route('property', ['propertySlug' => $property->slug]) }}" class="link_default">
                                        <h6 class="item_title">{{$property->title}}</h6>
                                    </a>
                                    <p class="item_title">{{$property->short_address}}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <p class="m-0 fw-bold uppercase fs-12">
                                            {{$property->property_type->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                            <div class=" me-1 fs-6 d-flex justify-content-center align-items-center" title="Favourite">
                                <i class="bi bi-heart me-2 fs-6"></i>
                                Favourite
                            </div>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    // JavaScript to activate the Bootstrap tab functionality
    const tabTriggerList = document.getElementById('list-tab');
    const tabContent = document.getElementById('nav-tabContent');

    tabTriggerList.addEventListener('click', (e) => {
        e.preventDefault();
        const targetTab = e.target.getAttribute('href');
        const tab = tabContent.querySelector(targetTab);
        if (tab) {
            tabContent.querySelectorAll('.tab-pane').forEach((pane) => {
                pane.classList.remove('show', 'active');
            });
            tab.classList.add('show', 'active');
        }
    });
});
</script>

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