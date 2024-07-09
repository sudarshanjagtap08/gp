
@extends('website.header')
@section('metatitle', "Genuine Plots | About Us")
@section('metadescription', "At Genuine Plots, we prioritize transparency in paperwork, documentation, and every land transaction. Trust our genuine guidance for a seamless buying experience.")
@section('metakeyword', "")
@section('content')
<section class="inner_page_mt overlay position-relative">
    <div class="p-0 d-sm-none">
        <img src="{{ asset('website/images/about-page-slider-banner-min.png') }}" class="w-100 mt-3" alt="">
    </div>
    <div class="p-0 d-none d-sm-block">
        <img src="{{ asset('website/images/about-page-slider-banner-min.png') }}" alt="" class="w-100">
    </div>
</section>
<section class="py-5">
    <div class="container my-md-5">
    <div class="row justify-content-center align-items-center">
            <!-- <div class="col-md-6 d-md-none mb-3 mb-md-0">
                <div class="">
                    <img src="{{ asset('website/images/about/location-symbol-land-sale_23-2149764136-1-1024x768.jpg') }}"
                        class="img-fluid rounded-4" alt="Genuine Plot Overview">
                </div>
            </div> -->
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="section_title text-center text-md-start">
                    <h1 class="h2">
                    {{$about->title}}
                    </h1>
                    <p class="">{{$about->short_description}}</p>
                </div>
                <div>
                    <p class="m-0 text-justify">
                    {!! $about->description !!}
                    </p>
                    <!-- <div class="pt-4 pt-md-5 text-center text-md-start">
                        <a href="#" class="btn_load_more link_default">Know More</a>
                    </div> -->
                </div>
            </div>
            <!-- <div class="col-md-6 d-none d-md-block"> -->
            <div class="col-md-6">
                <div class="">
                    <img src="{{ asset('images/about/'.$about->image)}}"
                        class="img-fluid rounded-4" alt="Genuine Plot Overview">
                </div>
            </div>
        </div>
    </div>
</section>

    
<section class="py-5 bg_light">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2 class="h2">
                What do we do?
            </h2>
        </div>
        <div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 justify-content-center">
                @foreach($what_do_we_do as $what_do_we_do)
                <div class="col">
                    <div class="h-100 p-3 text-center bg-white shadow">
                        <!--<div class="icon mb-4">-->
                        <!--   <i class="bi bi-file-earmark-text-fill fs-1 text_primary_light fw-bold"></i>-->
                        <!--</div>-->
                        <h5>{{$what_do_we_do->title}}</h5>
                        <p class="mb-0">{{$what_do_we_do->description}}</p>
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
            <h2 class="mb-md-0">Adhik jaankari ke liye blog padhein</h2>
            <a href="/contact/" class="link_default btn btn_cta">Contact Now</a>
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

@endsection