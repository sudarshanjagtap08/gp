@extends('website.header')
@section('content')
<!-- Filter Bar -->
@extends('website.filterbar')
<section class="py-2 bg_light inner_page_mt">
    <div class="container">
        <h5 class="fw-normal">Your Shortlisted Properties</h5>
        <div class="mt-3">
            <div class="row ">
                <!-- Left list bar  -->
                <div class="col-lg-12 ">
                    
                    <!-- Item 1  -->
                    <div class="property_list_item  mb-3">
                        <!-- Desktop View  -->
                        @foreach($property as $property)
                        <div class="card overflow-hidden shadow-sm d-none d-lg-block bg-white">
                            <div class="d-md-flex ">
                                <a href="#" class="link_default">
                                    <div class="col-md-3 p-2 list_page_item_width">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="position-relative rounded-3 overflow-hidden">
                                            <img src="{{ asset('images/property_images/'.$property->property->images[0]->name)}}"
                                                class="d-block w-100" alt="{{$property->property->images[0]->aux1}}">
                                                <!-- <img src="{{ asset('website/images/aqua-woods-view-1.jpg') }}" class="w-100 " alt=""> -->
                                                <div class="bg-dark text-white text-center position-absolute bottom-0 start-0 w-100 fs-10">
                                                    Updated {{ $property->property->created_at->diffInMonths(now()) }} Month ago
                                                </div>
                                                <div class="p-2 text-center position-absolute top-0 start-0 fs-10">
                                                <div class=" bg-dark text-white px-1 rounded-1"><i class="bi bi-images"></i></div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="fs-12 m-0">Owner: {{$property->property->user->name}}</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="flex-grow-1 col-md-6 p-2 px-4">
                                    <div class="mb-3">
                                        <a href="#" class="link_default text_nowrap"><p class="fw-normal mb-1">{{$property->property->title}}</p></a>
                                    </div>
                                    <div class="bg_light rounded-3 p-2 mb-3">
                                        <div class="row justify-content-center">
                                            <div class="col d-flex justify-content-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <!-- <div><i class="bi bi-textarea fs-2"></i></div> -->
                                                    <div class="ms-2">
                                                        <p class="m-0 fs-12 uppercase">Property Type</p>
                                                        <p class="m-0 fs-12 fw-bold">{{$property->property->property_type->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center before_verticle_line position-relative">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <!-- <div><i class="fa-regular fa-building fs-3"></i></div> -->
                                                    <div class="ms-2">
                                                        <p class="m-0 fs-14 uppercase">Property Size</p>
                                                        <p class="m-0 fs-12 fw-bold">{{$property->property->area}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-center before_verticle_line position-relative">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <!-- <div><i class="bi bi-house fs-2"></i></div> -->
                                                    <div class="ms-2">
                                                        <p class="m-0 fs-14 uppercase">Property View</p>
                                                        <p class="m-0 fs-12 fw-bold">{{$property->property->property_view->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text_nowrap mb-0">{{$property->property->short_address}}, for {{$property->property->price}}</p>
                                </div>            
                                <div class="list_page_item_width p-2 bg_light d-flex justify-content-center align-items-center">
                                    <div class="text-center">
                                        <h5 class="mb-4">₹ {{$property->property->price}}</h5>
                                        <div class="mb-3">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-get-contact-details" class="btn_theme fs-14 link_default bg-primary text-white rounded-5">Contact Owner</a>
                                        </div>
                                        <div class="mb-3">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-get-contact-details" class="btn_theme fs-14 link_default rounded-5">Get Phone No.</a>
                                        </div>
                                        <a href="#" class="link_default fs-12 fw-normal">Get Home Loan</a>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        @endforeach

                        <!-- Mobile View  -->
                        <div class="d-flex bg-white d-lg-none shadow rounded-3">
                            <div class=" p-2 list_page_item_width">
                                    <a href="#" class="link_default">
                                        <div class="d-flex align-items-center mb-2 mb-sm-0">
                                            <div class="col-5 position-relative rounded-3 overflow-hidden">
                                                <img src="{{ asset('securedseller/images/slider-img.jpg') }}" class="w-100"  alt="">
                                                <div class="bg-dark text-white text-center position-absolute bottom-0 start-0 w-100 fs-8">
                                                    Updated 1 week ago
                                                </div>
                                                <div class="p-2 text-center position-absolute top-0 start-0 fs-10">
                                                    <div class=" bg-dark text-white px-1 rounded-1"><i class="bi bi-images"></i> 4 +</div> 
                                                </div>
                                            </div>
                                            <div class="col-7 px-2 px-sm-3">
                                                <div>
                                                    <h6 class="mb-2">₹ 90.9 Lac</h6>
                                                </div>
                                                <div class="mb-3">
                                                    <p class="fw-normal text_nowrap fs-12 mb-0">1 BHK Apartment for sale in sus, baner, Pune</p>
                                                    <p class="fw-normal text_nowrap fs-12 mb-0 fs-12">Codename Horizon</p>
                                                </div>
                                                <div class="row text-start px-sm-3 d-none mb-3 d-sm-flex">
                                                    <div class="col rounded-3 bg_light p-2">
                                                        <p class="mb-0 fs-10 fw-normal">Super Area</p>
                                                        <p class="mb-0 fs-10">374 sqft</p>
                                                    </div>
                                                    <div class="col rounded-3 bg_light before_verticle_line p-2">
                                                        <p class="mb-0 fs-10 fw-normal">Status</p>
                                                        <p class="mb-0 fs-10">Ready To Move</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="row text-center px-2 d-sm-none mb-2">
                                        <div class="col bg_light p-2">
                                            <p class="mb-0 fs-10 fw-normal">Super Area</p>
                                            <p class="mb-0 fs-10">374 sqft</p>
                                        </div>
                                        <div class="col bg_light before_verticle_line p-2">
                                            <p class="mb-0 fs-10 fw-normal">Status</p>
                                            <p class="mb-0 fs-10">Ready To Move</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center justify-content-sm-end  d-sm-none">
                                        <a role="button" data-bs-toggle="modal" data-bs-target="#modal-get-contact-details" class="btn_theme fs-12 py-1 mx-1 link_default bg-primary text-white rounded-5 fs-10">Contact</a>
                                        <a role="button" data-bs-toggle="modal" data-bs-target="#modal-get-contact-details" class="btn_theme fs-12 py-1 mx-1 link_default rounded-5 fs-10">Owner Contact No</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>


@endsection