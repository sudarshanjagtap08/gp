<section class="inner_page_mt bg-green d-none d-md-block">
    <div class="container py-4">
        <form action="{{ route('search') }}" method="post" class="mb-0" name="filter_form">
            @csrf
            <div class="d-flex">
                <div class="flex-search flex-grow-1 position-relative">
                    <label class="search_icon" for="filter_search_bar">
                        <i class="bi bi-search"></i>
                    </label>                    
                    <input type="text" class="filter_item ps-5" name="keyword" placeholder="Search Name City, State or Area">
                </div>
                <div class="flex-search fields-width dropdown filter_dropdown">
                    <div class="tt-select filter_item text_nowrap_item">
                        <select name="landCity">
                            <option value="All Cities">All Cities</option>
                            @foreach($city_typemenu as $citytypemenu)
                            <option value="{{ $citytypemenu->id }}">{{ $citytypemenu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex-search fields-width ">
                    <div class="tt-select filter_item text_nowrap_item">
                        <select name="landArea">
                            <option value="All Areas">All Areas</option>
                            @foreach($area as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex-search">
                    <a class="btn advanced-search-btn btn-full-width filter_item px-2" data-bs-toggle="collapse"
                        href="#advanced-search-filters">
                        <i class="bi bi-gear mr-1"></i> Advanced</a>
                </div>

                <div class="flex-search btn-no-right-padding">
                    <button type="submit" class="btn btn-search">Search</button>
                </div>
            </div>
            <div class="collapse mt-3" id="advanced-search-filters">
                <div>
                    <div class="row row-cols-md-5 col-12 m-0 p-0">
                        <!-- Item 1 -->
                        <div class="col mb-2 p-0">
                            <div class="flex-search fields-width dropdown filter_dropdown">
                                <div class="tt-select filter_item text_nowrap_item no_filter_input_box">
                                    <select name="landStatus">
                                        <option value="landStatus">Status</option>
                                        @foreach($property_status as $property_status)
                                        <option value="{{$property_status->id}}">{{$property_status->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="col mb-2 p-0">
                            <div class="flex-search fields-width dropdown filter_dropdown">
                                <div class="tt-select filter_item text_nowrap_item">
                                    <select name="landType">
                                        <option value="landType">Type</option>
                                        @foreach($property_typemenu as $propertymenu)
                                        <option value="{{ $propertymenu->id }}"> {{ $propertymenu->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Item 11 -->
                        <div class="col mb-2 p-0">
                            <div class="flex-search fields-width dropdown filter_dropdown">
                                <div class="tt-select filter_item text_nowrap_item no_filter_input_box">
                                    <select name="landView">
                                        <option value="landView">View</option>
                                        @foreach($property_view as $property_view)
                                        <option value="{{$property_view->id}}">{{$property_view->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Item 5 -->
                        <div class="col mb-2 p-0">
                            <div class="flex-search fields-width dropdown filter_dropdown">
                                <input type="text" class="filter_item" name="minArea" placeholder="Min. Area (Sq.ft)">
                            </div>
                        </div>
                        <!-- Item 6 -->
                        <div class="col mb-2 p-0">
                            <div class="flex-search fields-width dropdown filter_dropdown">
                                <input type="text" class="filter_item" name="maxArea" placeholder="Max. Area (Sq.ft)">
                            </div>
                        </div>
                        <!--Item 7-->
                        <div class="col mb-2 p-0">
                            <div class="flex-search fields-width dropdown filter_dropdown">
                                <div class="tt-select filter_item text_nowrap_item">
                                    <select name="min_price">
                                        <option value="">Select a Min Price</option>
                                        <option value="10 Lakh">10 Lakh</option>
                                        <option value="20 Lakh">20 Lakh</option>
                                        <option value="30 Lakh">30 Lakh</option>
                                        <option value="40 Lakh">40 Lakh</option>
                                        <option value="50 Lakh">50 Lakh</option>
                                        <option value="60 Lakh">60 Lakh</option>
                                        <option value="70 Lakh">70 Lakh</option>
                                        <option value="80 Lakh">80 Lakh</option>
                                        <option value="90 Lakh">90 Lakh</option>
                                        <option value="1 Cr">1 Cr</option>
                                        <option value="1.2 Cr">1.2 Cr</option>
                                        <option value="1.3 Cr">1.3 Cr</option>
                                        <option value="1.4 Cr">1.4 Cr</option>
                                        <option value="1.5 Cr">1.5 Cr</option>
                                        <option value="1.6 Cr">1.6 Cr</option>
                                        <option value="1.7 Cr">1.7 Cr</option>
                                        <option value="1.8 Cr">1.8 Cr</option>
                                        <option value="1.9 Cr">1.9 Cr</option>
                                        <option value="2 Cr">2 Cr</option>
                                        <option value="2.1 Cr">2.1 Cr</option>
                                        <option value="2.2 Cr">2.2 Cr</option>
                                        <option value="2.3 Cr">2.3 Cr</option>
                                        <option value="2.4 Cr">2.4 Cr</option>
                                        <option value="2.5 Cr">2.5 Cr</option>
                                        <option value="2.6 Cr">2.6 Cr</option>
                                        <option value="2.7 Cr">2.7 Cr</option>
                                        <option value="2.8 Cr">2.8 Cr</option>
                                        <option value="2.9 Cr">2.9 Cr</option>
                                        <option value="3 Cr">3 Cr</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Item 8 -->
                        <div class="col mb-2 p-0">
                            <div class="flex-search fields-width dropdown filter_dropdown">
                                <div class="tt-select filter_item text_nowrap_item">
                                    <select name="max_price">
                                        <option value="">Select a Max Price</option>
                                        <option value="10 Lakh">10 Lakh</option>
                                        <option value="20 Lakh">20 Lakh</option>
                                        <option value="30 Lakh">30 Lakh</option>
                                        <option value="40 Lakh">40 Lakh</option>
                                        <option value="50 Lakh">50 Lakh</option>
                                        <option value="60 Lakh">60 Lakh</option>
                                        <option value="70 Lakh">70 Lakh</option>
                                        <option value="80 Lakh">80 Lakh</option>
                                        <option value="90 Lakh">90 Lakh</option>
                                        <option value="1 Cr">1 Cr</option>
                                        <option value="1.2 Cr">1.2 Cr</option>
                                        <option value="1.3 Cr">1.3 Cr</option>
                                        <option value="1.4 Cr">1.4 Cr</option>
                                        <option value="1.5 Cr">1.5 Cr</option>
                                        <option value="1.6 Cr">1.6 Cr</option>
                                        <option value="1.7 Cr">1.7 Cr</option>
                                        <option value="1.8 Cr">1.8 Cr</option>
                                        <option value="1.9 Cr">1.9 Cr</option>
                                        <option value="2 Cr">2 Cr</option>
                                        <option value="2.1 Cr">2.1 Cr</option>
                                        <option value="2.2 Cr">2.2 Cr</option>
                                        <option value="2.3 Cr">2.3 Cr</option>
                                        <option value="2.4 Cr">2.4 Cr</option>
                                        <option value="2.5 Cr">2.5 Cr</option>
                                        <option value="2.6 Cr">2.6 Cr</option>
                                        <option value="2.7 Cr">2.7 Cr</option>
                                        <option value="2.8 Cr">2.8 Cr</option>
                                        <option value="2.9 Cr">2.9 Cr</option>
                                        <option value="3 Cr">3 Cr</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Item 9 -->
                        <div class="col mb-2 p-0">
                            <div class="flex-search fields-width dropdown filter_dropdown">
                                <input type="text" class="filter_item" name="propertyID" placeholder="Property ID">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>