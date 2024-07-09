
<div class="">
    <div class="bg-white search_results_right_bar p-3 p-lg-4 mb-4">
        <div class="section_title mb-4">
            <h5>Filter</h5>
        </div>
        <div class="img_box image_swiper_box w-100">
            <form action="{{ url('filter/sidebar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label mb-10">City</label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="">Not Selected</option>
                        @foreach($city_name as $city)
                            <option value="{{ $city->id }}" data-url="{{ route('city.city', ['citySlug' => strtolower(str_replace(' ', '-', $city->name))]) }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label mb-10">Property Type</label>
                    <select name="property_type_id" id="property_type_id" class="form-control" >
                        <option value="">Not Selected</option>
                        @foreach($property_types as $property_type)
                            <option value="{{ $property_type->id }}">{{ $property_type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label mb-10">Property View</label>
                    <select name="property_view_id" id="property_view_id" class="form-control" >
                        <option value="">Not Selected</option>
                        @foreach($property_views as $property_view)
                            <option value="{{ $property_view->id }}">{{ $property_view->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="price-input">
                        <div class="row">
                            <div class="col-12">
                                <span>Min Price</span>
                                <div class="row">
                                    <div class="col-md-6 pr-0">
                                        <input type="number" name="min_price" class="form-control" placeholder="Enter price" >
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        <select class="form-control" name="price_unit" aria-label="Default select example">
                                            <option value="Thousand">Thousand</option>
                                            <option value="Lakh">Lakh</option>
                                            <option value="Cr">Cr</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <span>Max Price</span>
                                <div class="row">
                                    <div class="col-md-6 pr-0">
                                        <input type="number" name="max_price" class="form-control" placeholder="Enter price" >
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        <select class="form-control" name="maxprice_unit" aria-label="Default select example">
                                            <option value="Thousand">Thousand</option>
                                            <option value="Lakh">Lakh</option>
                                            <option value="Cr">Cr</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="col-12">
                                <span>Area</span>
                                <div class="row">
                                    <div class="col-md-6 pr-0">
                                        <input type="number" name="area" class="form-control" placeholder="Enter Area" >
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        <select class="form-control" name="area_unit" aria-label="Default select example">
                                            <option value="Acre">Acre</option>
                                            <option value="Sqft">Sq.ft</option>
                                            <option value="Sq.m">Sq.m</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions mt-2">
                    <button type="submit" class="btn bg-primaryLight">Save</button>
                </div>
            </form>

        </div>
    </div>
    <div class="bg-white search_results_right_bar p-3 p-lg-4 mb-4">
        <div class="section_title mb-4">
            <h5>Featured Properties</h5>
        </div>
        <div class="img_box image_swiper_box w-100">
            <div id="carouselSidebar" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($featured_properties as $property)
                    <div class="carousel-item position-relative @if($loop->first) active @endif">
                        <a
                            href="{{ route('property', ['propertySlug' => $property->slug]) }}">
                            <!-- Image -->
                            <img src="{{ asset('images/property_images/'.$property->images[0]->name) }}"
                                class="d-block w-100" alt="{{$property->images[0]->aux1}}">
                            <!-- Content -->
                            <div class="box_wrapper z-2 position-absolute">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div class="feature_box box_default">
                                            FEATURED
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <!-- <div class="for_sale_box box_default me-1">FOR SALE</div> -->
                                        <!-- <div class="hot_offer_box box_default ">HOT OFFER - 0% GST</div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="price_wrapper z-2 px-4 py-2 position-absolute bottom-0 start-0 end-0">
                                <div>
                                    <h6 id="top_properties_price" class="mb-1">₹ {{ $property->price }}
                                    </h6>
                                    <p class="item_title fs-tiny w-100">{{ $property->short_address }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselSidebar"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon sidebar-carousel" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselSidebar"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon sidebar-carousel" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <div class="carousel-indicators sidebar-carousel mb-0">
                    @foreach($featured_properties as $property)
                    <button type="button" data-bs-target="#carouselSidebar" data-bs-slide-to="{{ $loop->index }}"
                        @if($loop->first) class="active"
                        aria-current="true" @endif aria-label="Slide {{ $loop->iteration }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white p-3 p-lg-4 mb-4 ">
        <div class="section_title mb-4">
            <h5>Property Type</h5>
        </div>
        <div class="property_type_wrapper">
            @foreach($propertytypecounts as $propertyTypeCount)
            <div class="d-flex justify-content-between mb-2 fs-14">
                <a href="{{ route('property-type', ['propertySlug' => strtolower(str_replace(' ', '-', $propertyTypeCount->name))]) }}"
                    class="before_arrow_left link_default text_primary_light fw-400">
                    {{ $propertyTypeCount->name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
//     $(document).ready(function() {
//         $('#city').change(function() {
//             var cityId = $(this).val();
//             console.log("Selected City ID: " + cityId);
//             $.ajax({
//                 url: '/filter-properties',
//                 type: 'GET',
//                 data: { city_id: cityId },
//                 success: function(response) {
//                     console.log("AJAX Success Response: ", response);
//                     $('#properties-list').html(response);
//                 },
//                 error: function(xhr) {
//                     console.error("AJAX Error Response: ", xhr.responseText);
//                 }
//             });
//         });
//     });
</script>
<script>
    document.getElementById('citynee').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var url = selectedOption.getAttribute('data-url');
        if (url) {
            window.location.href = url;
        }
    });
</script>
