@extends('website.header')
@section('metatitle', "Discover Recommended Properties with Genuine Plots")
@section('metadescription', "Explore top-notch recommended properties curated by Genuine Plots. Find your ideal residential, Commercial, Agricultural, NA or Industrial plot today!")

@section('content')
<!-- Filter Bar -->
@extends('website.filterbar')
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
                                    <div>
                                        @if($featured_properties->property_categoryids->isNotEmpty())
                                        <div class="feature_box box_default">
                                            @foreach($featured_properties->property_categoryids as $category)
                                            @if($category->property_categories->id == 1)
                                            FEATURED
                                            @endif
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    <div class="d-flex">
                                        <div class="for_sale_box box_default me-1">FOR SALE</div>
                                        <div class="hot_offer_box box_default ">HOT OFFER -
                                            {{$featured_properties->offer}}% GST</div>
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
                                            class="d-block w-100 imageslidecorrosalheight" alt="$featured_properties->images[1]->aux1">
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
                            <a href="{{ route('property', ['propertySlug' => $featured_properties->slug]) }}" class="link_default">
                                <h6 class="item_title">{{$featured_properties->title}}</h6>
                            </a>
                            <address class="item-address">
                                {{$featured_properties->short_address}}
                            </address>
                            <div class="d-flex justify-content-between">
                                <p class="m-0 fw-400 uppercase">{{$featured_properties->property_type->name}}</p>
                                <a href="{{ route('property', ['propertySlug' => $featured_properties->slug]) }}" class="link_default text-white btn_details bg-primaryLight">Details</a>
                            </div>
                        </div>
                        <hr>
                        <div class="p-3 pt-0">
                            <div class="d-flex justify-content-between">
                                <div class="fs-tiny">
                                    <i class="bi bi-person"></i>
                                    {{$featured_properties->user->name}}
                                </div>
                                <div class="fs-tiny">
                                    <i class="bi bi-paperclip"></i>
                                    months ago
                                </div>
                            </div>
                        </div>
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
<section class="py-5 plots_collection ">
    <div class="container">
        <div class="title_wrapper">
            <div class="section_title text-center mb-5">
                <h2 class="h2">
                    Read From Our Blog
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
                        @foreach($blog as $blog)
                        <div class="card swiper-slide my-auto rounded-0 overflow-hidden latest_articles_slide">
                            <div class="banner_box">
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}">
                                    <img src="{{ asset('images/blog/'.$blog->image)}}" class="w-100" alt="">
                                </a>
                            </div>
                            <div class="p-3">
                                <div class="mb-2">
                                    <div class="latest_article_date fs-tiny">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}
                                    </div>
                                    <div class="latest_article_tags fs-tiny">
                                        <i class="bi bi-tag me-1"></i>
                                        @foreach ($blog->blogcategories as $blogcategory)
                                        @if ($blogcategory->categories)
                                        <a href="/category/{{ strtolower(str_replace(' ', '-', $blogcategory->categories->name)) }}"
                                            class="link_default article_tags">{{ $blogcategory->categories->name }}</a>
                                        ,
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}"
                                    class="link_default">
                                    <h6 class="article_heading fw-normal">
                                        {{ $blog->title }}
                                    </h6>
                                </a>
                                <p class="mb-2">
                                    {{ substr($blog->short_description, 0, 100) }}
                                </p>
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}"
                                    class="link_default text_primary_light fw-bold fs-12 ">Continue Reading</a>
                                <hr>
                                <div class="fs-tiny">
                                    <i class="bi bi-person"></i>
                                    {{$blog->user->name}}
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