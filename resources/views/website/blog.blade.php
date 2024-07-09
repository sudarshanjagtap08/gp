@extends('website.header')
@section('metatitle', "Find Latest Article On Residential, Agricultural & NA Land Updates")
@section('metadescription', "Check out our latest articles on Residential Land, Agricultural, Non-Agricultural Land and many more on Genuine plot. Visit Our website for latest update! ")
@section('metakeyword', "Residential land I Agricultural land I Non-Agricultural Land")
@section('content')
<!-- Filter Bar -->
@extends('website.filterbar')
<section class="py-5 bg_light">
    <div class="container">
        <div class="section_title text-center text-md-start mb-5">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item fs-tiny"><a href="/" class="link_default text_primary_light">Home</a>
                    </li>
                    <li class="breadcrumb-item active fs-tiny" aria-current="page">Blog</li>
                </ol>
            </nav>
            <h3>Blog </h3>
        </div>
        <div>
            <div class="row" >
                <div class="col-md-9">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 justify-content-center">
                        @foreach($blogs as $blog)
                        <div class="col">
                            <div class="h-100 bg-white blog_page_item">
                                <div class="banner_box p-2">
                                    <img src="{{ asset('images/blog/'.$blog->image)}}" class="w-100" alt="">
                                </div>
                                <div class="p-3">
                                    <div class="mb-2 d-flex">
                                        <div class="latest_article_date fs-tiny me-2">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            {{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}
                                        </div>
                                        <div class="latest_article_tags fs-tiny">
                                            <i class="bi bi-tag me-1"></i>
                                            @foreach ($blog->blogcategories as $blogcategory)
                                            @if ($blogcategory->categories)
                                            <a href="/category/{{ strtolower(str_replace(' ', '-', $blogcategory->categories->name)) }}"
                                                class="link_default article_tags">{{ $blogcategory->categories->name }}</a> ,
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
                                        {{$blog->short_description}}
                                    </p>
                                    <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}"
                                        class="link_default text_primary_light fw-bold fs-12 ">Continue Reading</a>
                                    <hr>
                                    <div class="fs-tiny">
                                        <i class="bi bi-person"></i>
                                        By geneuineplot
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-5">
                        {{ $blogs->links() }} <!-- Add this line to display pagination links -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-4 ">
                        <div class="mb-4 bg-white shadow p-3 p-md-4">
                            <div class="">
                                <label for="blogs_search_bar" class="mb-2 fw-bold">Search</label>
                                <form class="d-flex search_form" role="search">
                                    <input class="form-control me-2" id="blogs_search_bar" type="search"
                                        placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success btn_search" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 bg-white shadow p-3 p-md-4">
                        <h5 class="capitalize mb-4">Subscribe</h5>
                        <div>
                            <div class="mb-2 fs-14">
                                <form action="{{ route('subscribe') }}"  method="post" class="row contact_us_form" >
                                    @csrf
                                    <input type="hidden" name="url" value="{{ url()->current() }}">
                                    <input type="hidden" name="utm_source" class="contact_us_input" id="utm_source" value="Website" required>
                                    <input type="hidden" name="subsource" class="contact_us_input" id="subsource" value="Conatct Us Page" required>
                                    <div class="col-md-12 mb-md-3">
                                        <label for="fullName" class="form-label">Full Name <span class="text-danger"><sup>*</sup></span></label>
                                        <input type="text" name="name" class="contact_us_input" id="fullName" placeholder="Enter your name" required>
                                    </div>
                                    <div class="col-md-12 mb-md-3">
                                        <label for="mobileNumber" class="form-label">Mobile Number <span class="text-danger"><sup>*</sup></span></label>
                                        <input type="tel" name="number" pattern="[0-9]{10}" class="contact_us_input" id="mobileNumber" placeholder="Mobile" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger"><sup>*</sup></span></label>
                                        <input type="email" name="email" class="contact_us_input" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" id="message" rows="4" class="contact_us_input" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn_submit" >Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 bg-white shadow p-3 p-md-4">
                        <h5 class="capitalize mb-4">Top Areas to Invest</h5>
                        <div>
                            <div class="mb-2 fs-14">
                                @foreach($topareas as $toparea)
                                <a href="{{$toparea->link}}" class="before_arrow_left link_default text_primary_light fw-400">{{$toparea->name}}
                                </a><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 bg-white shadow p-3 p-md-4">
                        <h5 class="capitalize mb-4">Latest Articles</h5>
                        <div>
                            @foreach($recent_post_titles as $recent_post_title)
                            <div class="mb-2 fs-14">
                                <a href="/blog-details/{{strtolower(str_replace(' ', '-', $recent_post_title))}}" class="before_arrow_left link_default text_primary_light fw-400">
                                    {{$recent_post_title}}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4 bg-white shadow p-3 p-md-4">
                        <h5 class="capitalize mb-4">Social Icon</h5>
                        <div>
                            <div class="mb-2 fs-14">
                                <div class="social_links d-flex justify-content ">
                        <div class="social_box social_box_fb d-flex justify-content-center align-items-center p-2">
                            <a href="https://www.facebook.com/GenuinePlotsTM" class="facebook" target="_blank" style="color:#fff;" ><i class="fa-brands fa-facebook fs-4"></i></i></a>
                        </div>
                        <div class="social_box social_box_twitter d-flex justify-content-center align-items-center p-2">
                            <a href="https://twitter.com/GenuinePlotsTM" class="twitter"  style="color:#fff;" target="_blank"><i class="fa-brands fa-twitter fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_yt d-flex justify-content-center align-items-center p-2">
                            <a href="#" class="youtube" target="_blank"  style="color:#fff;" ><i class="fa-brands fa-youtube fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_linkedin d-flex justify-content-center align-items-center p-2">
                            <a href="https://www.linkedin.com/company/96464047/admin/feed/posts/" class="linkedin" target="_blank"  style="color:#fff;" ><i class="fa-brands fa-linkedin fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_instagram d-flex justify-content-center align-items-center p-2">
                            <a href="https://www.instagram.com/genuineplotstm/" class="instagram" target="_blank"  style="color:#fff;" ><i class="fa-brands fa-instagram fs-4"></i></a>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="mt-5">-->
            <!--    <nav aria-label="Page navigation example">-->
            <!--        <ul class="pagination justify-content-center">-->
            <!--            <li class="page-item">-->
            <!--                <a class="page-link fs-6" href="#" aria-label="Previous">-->
            <!--                    <span aria-hidden="true">&lt;</span>-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li class="page-item ms-1 active"><a class="page-link" href="#">1</a></li>-->
            <!--            <li class="page-item ms-1"><a class="page-link" href="#">2</a></li>-->
            <!--            <li class="page-item ms-1"><a class="page-link" href="#">3</a></li>-->
            <!--            <li class="page-item ms-1">-->
            <!--                <a class="page-link fs-6" href="#" aria-label="Next">-->
            <!--                    <span aria-hidden="true">&gt;</span>-->
            <!--                </a>-->
            <!--            </li>-->
            <!--        </ul>-->
            <!--    </nav>-->
            <!--</div> -->
        </div>
    </div>
</section>

@endsection