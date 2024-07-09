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
                        <li class="breadcrumb-item fs-tiny"><a href="/"
                                class="link_default text_primary_light">{{$catname}}</a>
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
        <div class="mt-4">
            <div class="row g-4">
                <div class="col-lg-9">
                    @foreach($blogs as $blog)
                    <div class=" bg-white blog_page_item mb-3">
                        <div class="banner_box p-2">
                            <img src="{{ asset('images/images/'.$blog->image)}}" class="w-100"
                                                alt="">
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
                                    <a href="#"
                                        class="link_default article_tags">{{ $blogcategory->categories->name }}</a> ,
                                    @endif
                                    @endforeach

                                </div>
                            </div>
                            <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}" class="link_default">
                                <h6 class="article_heading fw-normal">
                                    {{$blog->title}}
                                </h6>
                            </a>
                            <p class="mb-2">
                                {{$blog->short_description}}
                            </p>
                            <a href="/blog-details/{{strtolower(str_replace(' ', '-', $blog->title))}}" class="link_default text_primary_light fw-bold fs-12 ">Continue Reading</a>
                            <hr>
                            <div class="fs-tiny">
                                <i class="bi bi-person"></i>
                                By {{$blog->user->name}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                <!-- Right Bar  -->
                <div class="col-lg-3">
                    <div class=" mb-4 ">
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

                        <div class="bg-white shadow p-3 p-lg-4 mb-4 ">
                            <div class="section_title mb-4">
                                <h5 class="mb-4">Recent Posts</h5>
                                <div class="property_type_wrapper">
                                    @foreach($recent_post_titles as $recent_post_title)
                                    <div class="mb-2 fs-14">
                                        <a href="/blog-details/{{strtolower(str_replace(' ', '-', $recent_post_title))}}" class="before_arrow_left link_default text_primary_light fw-400">
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
                        <div class="mb-4 bg-white shadow p-3 p-md-4">
                            <div class="">
                                <label for="blogs_search_bar" class="mb-2 fw-bold">Blog Search</label>
                                <form class="d-flex search_form" role="search">
                                    <input class="form-control me-2" id="blogs_search_bar" type="search"
                                        placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success btn_search" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
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
                                <a href="/tag/{{strtolower(str_replace(' ', '-', $tag))}}" class="fs-12 link_default text_primary_light">{{$tag}}</a>,
                                @endforeach
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>

                </div>
            </div>
            <!-- <div class="col_lg_left">
            </div>
            <div class="col_lg_right">
            </div> -->
        </div>
        <!-- </div> -->
    </div>
</section>

@endsection