@extends('website.header')
@section('metatitle', "Essential Checklist Before Buying Land | Genuine Plots")
@section('metadescription', "Discover the crucial checklist before buying land. Genuine Plots provides insights to ensure a smooth land purchase process. Don't miss these vital steps!")
@section('content')

<section class="inner_page_banner_about inner_page_mt overlay">
    <div class="background_overlay"></div>
</section>
<section class="py-5 bg_light">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2 class="h2">
               Checklist Before Buying Land
            </h2>
        </div>
        <div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 justify-content-center">
                @foreach($checklist as $checklist)
                <div class="col">
                    <div class="h-100 p-3 text-center bg-white shadow">
                        <!--<div class="icon mb-4">-->
                        <!--   <i class="bi bi-file-earmark-text-fill fs-1 text_primary_light fw-bold"></i>-->
                        <!--</div>-->
                        <h5>{{$checklist->title}}</h5>
                        <p class="mb-0">{{$checklist->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg_light">
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
                <div class="prev_article me-2 swiper-button-disabled" tabindex="-1" role="button"
                    aria-label="Previous slide" aria-controls="swiper-wrapper-a9dd658c24fc1351" aria-disabled="true">
                    Prev</div>
                <div class="next_article" tabindex="0" role="button" aria-label="Next slide"
                    aria-controls="swiper-wrapper-a9dd658c24fc1351" aria-disabled="false">Next</div>
            </div>
            <div class="slide-container swiper">
                <div
                    class="slide-content-latest-articles p-2 swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="card-wrapper swiper-wrapper  " id="swiper-wrapper-a9dd658c24fc1351" aria-live="off"
                        style="transform: translate3d(0px, 0px, 0px);">
                        @foreach($blog as $blog)
                        <div class="card swiper-slide my-auto rounded-0 overflow-hidden latest_articles_slide swiper-slide-active"
                            role="group" aria-label="1 / 7" style="width: 260px; margin-right: 20px;">
                            <div class="banner_box">
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}">
                                    <img src="{{ asset('images/blog/'.$blog->image)}}" class="w-100" alt="">
                                    <!-- <img src="{{asset('website/images/blog-11-592x444.png')}}" class="w-100" alt=""> -->
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
                                                class="link_default article_tags">{{ $blogcategory->categories->name }}</a>,
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}" class="link_default">
                                    <h6 class="article_heading fw-normal">
                                        {{ $blog->title }}
                                    </h6>
                                </a>
                                <p class="mb-2">
                                    {{ substr($blog->short_description, 0, 100) }}
                                </p>
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}" class="link_default text_primary_light fw-bold fs-12 ">Continue
                                    Reading</a>
                                <hr>
                                <div class="fs-tiny">
                                    <i class="bi bi-person"></i>
                                    {{$blog->user->name}}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
            <div class="position-relative articles_pagination_box mt-5">
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal swiper-pagination-bullets-dynamic"
                    style="width: 80px;"><span
                        class="swiper-pagination-bullet swiper-pagination-bullet-active swiper-pagination-bullet-active-main"
                        tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"
                        style="left: 24px;"></span><span
                        class="swiper-pagination-bullet swiper-pagination-bullet-active-next" tabindex="0" role="button"
                        aria-label="Go to slide 2" style="left: 24px;"></span><span
                        class="swiper-pagination-bullet swiper-pagination-bullet-active-next-next" tabindex="0"
                        role="button" aria-label="Go to slide 3" style="left: 24px;"></span><span
                        class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"
                        style="left: 24px;"></span></div>
            </div>
        </div>
    </div>
</section>


@endsection