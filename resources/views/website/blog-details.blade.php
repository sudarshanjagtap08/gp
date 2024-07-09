@extends('website.header')
@section('content')
<section class="bg_light inner_page_mt py-4">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
            <div class="section_title text-start text-md-start">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-tiny"><a href="/" class="link_default text_primary_light">Home</a>
                        </li>
                        <li class="breadcrumb-item fs-tiny"><a href="{{route('blog')}}" class="link_default text_primary_light">Blog</a></li>
                        <li class="breadcrumb-item active fs-tiny capitalize" aria-current="page">{{$blog->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="mt-4">
            <div class="row g-4">
                <div class="col-lg-9">
                    <div class="bg-white shadow p-3 p-md-4 ">
                        <div class="section_title mb-4">
                            <h3 class="capitalize">{{$blog->title}}</h3>
                        </div>
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="latest_article_date fs-tiny me-2">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}
                                </div>
                                <div class="latest_article_tags fs-tiny me-2">
                                    <i class="bi bi-tag me-1"></i>
                                    @foreach ($blog->blogcategories as $blogcategory)
                                        @if ($blogcategory->categories)
                                            <a href="/category/{{ strtolower(str_replace(' ', '-', $blogcategory->categories->name)) }}"
                                                class="link_default article_tags">{{ $blogcategory->categories->name }}</a> ,
                                        @endif
                                    @endforeach
                                </div>
                                <div class="blog_comments fs-tiny">
                                    <i class="bi bi-watch me-1"></i>Read Time:-{{$readTimeMinutes}} Min
                                </div>
                            </div>
                            <a href="#" class="link_default" onclick="sharePage()">
                                <div class="share_print_btn d-flex justify-content-center align-items-center text-center">
                                    <i class="bi bi-share fs-6"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="banner_box">
                        <img src="{{ asset('images/blog/'.$blog->image)}}" class="w-100" alt="Blog Banner">
                    </div>
                    <div class="blog_content_box bg-white shadow p-3 p-md-4 text-justify">
                        <!--{{ strip_tags($blog->description) }}-->
                        {!! $blog->description !!}
                    </div>
                    <hr class="m-0">
                    <div class="blog_footer_box bg-white shadow p-3 p-md-4">
                        <h6>Tags</h6>
                        <div class="">
                            @foreach ($blog->blogtags as $blogtag)
                            @if ($blogtag->tags)
                            <a href="/tag/{{ strtolower(str_replace(' ', '-', $blogtag->tags->name)) }}"
                                class="btn_blog_tags btn btn-sm me-1 mb-2">{{ $blogtag->tags->name }}</a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="blog_footer_box bg-white shadow p-3 p-md-4">
                        <h6>Comments</h6>
                        <div class="">
                            @foreach($comments as $commentname)
                            <span class=" me-1 mb-2"><i class="fa fa-comment" aria-hidden="true"></i>{{ $commentname->comment }}</span><br>
                            @endforeach
                        </div>
                    </div>
                    <div class="py-5">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-6">
                                <div class="post">
                                    <p class="mb-2">Prev Post</p>
                                    @if ($previousBlog)
                                    <a href="/blog-details/{{strtolower(str_replace(' ', '-', $previousBlog->title))}}"
                                        class="fw-bold link_default text_primary_light">{{ $previousBlog->title }}</a>
                                    @else
                                    <p>No previous post available</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="post">
                                    <p class="mb-2 text-end">Next Post</p>
                                    @if ($nextBlog)
                                    <a href="/blog-details/{{strtolower(str_replace(' ', '-', $nextBlog->title))}}"
                                        class="fw-bold link_default text_primary_light">{{ $nextBlog->title }}</a>
                                    @else
                                    <p>No previous post available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow mt-4 p-3 p-md-4">
                        <div class="">
                            <h3 class="mb-4">Join The Discussion</h3>
                        </div>
                        @auth
                            <form action="{{url('blog/logincomment/save')}}" method="post" class="row contact_us_form">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                <div class="form-group col-sm-12 mb-3">
                                    <textarea name="comment_message" id="" class="contact_us_input" rows="3"></textarea>
                                </div>
                                <div class="form-group col-sm-12 mb-3">
                                    <input type="checkbox" id="comment_saveCheckBox" name="comment_saveCheckBox" class="">
                                    <label for="comment_saveCheckBox">Save my name, email, and website in this browser for
                                        the next time I comment.</label>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn_submit  w-auto">Submit</button>
                                </div>
                            </form>
                        @else
                            <form action="{{url('blog/comment/save')}}" method="post" class="row contact_us_form">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                <input type="hidden" name="status" value="2">
                                <div class="form-group col-sm-4 mb-3">
                                    <input type="text" name="comment_name" class="contact_us_input" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group col-sm-4 mb-3">
                                    <input type="text" name="comment_number" class="contact_us_input" placeholder="Enter Your Contact Number">
                                </div>
                                <div class="form-group col-sm-4 mb-3">
                                    <input type="email" name="comment_email" class="contact_us_input"
                                        placeholder="Enter Your Email">
                                </div>
                                <div class="form-group col-sm-12 mb-3">
                                    <textarea name="comment_message" id="" class="contact_us_input" rows="3"></textarea>
                                </div>
                                <div class="form-group col-sm-12 mb-3">
                                    <input type="checkbox" id="comment_saveCheckBox" name="comment_saveCheckBox" class="">
                                    <label for="comment_saveCheckBox">Save my name, email, and website in this browser for
                                        the next time I comment.</label>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn_submit  w-auto">Submit</button>
                                </div>
                            </form>
                        @endauth
                    </div>
                    <!-- <div class="bg-white shadow p-3 p-md-4">
                        <div class="d-flex align-items-center">
                            <img src="{{asset('website/images/no-profile-image.png')}}" width="60px"
                                class="rounded-circle me-3" alt="">
                            <h6 class="m-0">Genuine Plot</h6>
                        </div>
                    </div> -->
                    <div class="py-4">
                        <div class="col-md-5">
                            <h5 class="m-0">Related posts</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="slide-container swiper">
                            <div class="slide-content-recent-posts p-2">
                                <div class="card-wrapper swiper-wrapper  ">
                                    @foreach($related_post as $related_post)
                                    <div
                                        class="card  swiper-slide my-auto rounded-0 overflow-hidden latest_articles_slide">
                                        <div class="banner_box">
                                            <img src="{{ asset('images/blog/'.$related_post->image)}}" class="w-100"
                                                alt="">
                                        </div>
                                        <div class="p-3">
                                            <div class="mb-2">
                                                <div class="latest_article_date fs-tiny">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    {{ \Carbon\Carbon::parse($related_post->date)->format('F j, Y') }}
                                                </div>
                                                <div class="latest_article_tags fs-tiny">
                                                    <i class="bi bi-tag me-1"></i>
                                                    @foreach ($related_post->blogcategories as $blogcategory)
                                                    @if ($blogcategory->categories)
                                                    <a href="#"
                                                        class="link_default article_tags">{{ $blogcategory->categories->name }}</a>
                                                    ,
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <a href="/blog-details/{{strtolower(str_replace(' ', '-', $related_post->title))}}"
                                                class="link_default">
                                                <h6 class="article_heading fw-normal">
                                                    {{$related_post->title}}
                                                </h6>
                                            </a>
                                            <p class="mb-2">
                                                {{$related_post->short_description}}
                                            </p>
                                            <a href="/blog-details/{{strtolower(str_replace(' ', '-', $related_post->title))}}"
                                                class="link_default text_primary_light fw-bold fs-12 ">Continue
                                                Reading</a>
                                            <hr>
                                            <div class="fs-tiny">
                                                <i class="bi bi-person"></i>
                                                {{$related_post->user->name}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Bar  -->
                <div class="col-lg-3">
                    <div class=" mb-4 ">
                        <div class="mb-4 bg-white shadow p-3 p-md-4">
                            <div class="">
                                <label for="blogs_search_bar" class="mb-2 fw-bold">Search</label>
                                <form class="d-flex search_form" role="search" id="blogs_search_form">
                                    <input class="form-control me-2" id="blogs_search_bar" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success btn_search" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        <div class="bg-white shadow p-3 p-lg-4 mb-4 ">
                            <div class="section_title mb-4">
                                <h5 class="mb-4">Recent Posts</h5>
                                <div class="property_type_wrapper">
                                    @foreach($recent_post_titles as $recent_post_title)
                                    <div class="mb-2 fs-14">
                                        <a href="/blog-details/{{strtolower(str_replace(' ', '-', $recent_post_title))}}"
                                            class="before_arrow_left link_default text_primary_light fw-400">
                                            {{$recent_post_title}}
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mb-4 bg-white shadow p-3 p-md-4">
                            <h5 class="capitalize mb-4">Recent Comments</h5>
                            <p class="m-0">No comments to show.</p>
                        </div> -->
                        <!-- <div class="mb-4 bg-white shadow p-3 p-md-4">
                            <div class="">
                                <label for="blogs_search_bar" class="mb-2 fw-bold">Blog Search</label>
                                <form class="d-flex search_form" role="search">
                                    <input class="form-control me-2" id="blogs_search_bar" type="search"
                                        placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success btn_search" type="submit">Search</button>
                                </form>
                            </div>
                        </div> -->
                        <div class="mb-4 bg-white shadow p-3 p-md-4">
                            <h5 class="capitalize mb-4">Topics</h5>
                            <div>
                                @foreach($categoriesWithCounts as $category)
                                <div class="mb-2 fs-14">
                                    <a href="/category/{{ strtolower(str_replace(' ', '-', $category->name)) }}"
                                        class="before_arrow_left link_default text_primary_light fw-400">
                                        {{ $category->name }} ({{ $category->blogcategories_count }})
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="top_sticky_box ">
                        <div class="mb-4 bg-white shadow p-3 p-md-4">
                            <h5 class="capitalize mb-4">Tags</h5>
                            <div>
                                @foreach($tags as $tag)
                                <a href="/tag/{{strtolower(str_replace(' ', '-', $tag))}}"
                                    class="fs-12 link_default text_primary_light">{{$tag}}</a>,
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                // Show the modal after 15 seconds
                $('#myModalSubscribe').modal('show');
            }, 15000); // 15 seconds in milliseconds
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Reference to the search form and input
            const searchForm = document.getElementById('blogs_search_form');
            const searchInput = document.getElementById('blogs_search_bar');
    
            // Add an event listener to the search form
            searchForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission
    
                // Get the search query
                const searchQuery = searchInput.value.toLowerCase();
    
                // Filter the blogs based on the search query
                const blogCards = document.querySelectorAll('.latest_articles_slide');
                blogCards.forEach(function (blogCard) {
                    const blogTitle = blogCard.querySelector('.article_heading').textContent.toLowerCase();
                    const blogDescription = blogCard.querySelector('.mb-2').textContent.toLowerCase();
    
                    // Show or hide the blog card based on the search query
                    if (blogTitle.includes(searchQuery) || blogDescription.includes(searchQuery)) {
                        blogCard.style.display = 'block';
                    } else {
                        blogCard.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection