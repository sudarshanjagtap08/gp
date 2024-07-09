@extends('admin.master')
@section('content')
<div class="container-fluid">
    <!-- <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Property</h5>
        </div>
    </div> -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    <form action="{{ url('list/landingpage/save')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i
                                                    class="zmdi zmdi-account mr-10"></i>Add Landing Page</h6>
                                            <hr class="light-grey-hr" />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Landing Page Title</label>
                                                                <input type="text" name="landing_page_title"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Landing Page Template</label>
                                                                <input type="text" name="landing_page_template"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Slider Section
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <!-- Accordation -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body">
                                                                        <div class="panel-group accordion-struct accordion-style-1"
                                                                            id="accordion_1" role="tablist"
                                                                            aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading activestate"
                                                                                    role="tab" id="heading_10">
                                                                                    <a role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_1"
                                                                                        href="#SliderSectionone"
                                                                                        aria-expanded="true">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Slider Section one
                                                                                    </a>
                                                                                </div>
                                                                                <div id="SliderSectionone"
                                                                                    class="panel-collapse collapse in"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Images:</label>
                                                                                                    <input type="file"
                                                                                                        name="sliderimageone"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="slidertitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="slidersubtitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Shortdescription</label>
                                                                                                    <input type="text"
                                                                                                        name="slidershortdescriptionone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_11">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_1"
                                                                                        href="#SliderSectiontwo"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Slider Section two
                                                                                    </a>
                                                                                </div>
                                                                                <div id="SliderSectiontwo"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="sliderimagetwo"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="slidertitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="slidersubtitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Shortdescription</label>
                                                                                                    <input type="text"
                                                                                                        name="slidershortdescriptiontwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_12">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_1"
                                                                                        href="#SliderSectionthree"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Slider Section three
                                                                                    </a>
                                                                                </div>
                                                                                <div id="SliderSectionthree"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="sliderimagethree"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="slidertitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="slidersubtitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Shortdescription</label>
                                                                                                    <input type="text"
                                                                                                        name="slidershortdescriptionthree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_13">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_1"
                                                                                        href="#SliderSectionfour"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Slider Section four
                                                                                    </a>
                                                                                </div>
                                                                                <div id="SliderSectionfour"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="sliderimagefour"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="slidertitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="slidersubtitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Shortdescription</label>
                                                                                                    <input type="text"
                                                                                                        name="slidershortdescriptionfour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Accordation end-->
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Overview
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <!-- Accordation -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body">
                                                                        <div class="panel-group accordion-struct accordion-style-1"
                                                                            id="accordion_2" role="tablist"
                                                                            aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading activestate"
                                                                                    role="tab" id="heading_10">
                                                                                    <a role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Overviewone"
                                                                                        aria-expanded="true">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Overview one
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Overviewone"
                                                                                    class="panel-collapse collapse in"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="overviewimageone"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="overviewtitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="overviewdescriptionone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_11">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Overviewtwo"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Overview two
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Overviewtwo"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="overviewimagetwo"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="overviewtitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="overviewdescriptiontwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_12">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Overviewthree"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Overview three
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Overviewthree"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="overviewimagethree"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="overviewtitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="overviewdescriptionthree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_13">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Overviewfour"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Overview four
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Overviewfour"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="overviewimagefour"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="overviewtitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="overviewdescriptionfour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Accordation end-->
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>About
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Image</label>
                                                                <input type="file" name="aboutimage" id=""
                                                                    accept="image/*" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Title</label>
                                                                <input type="text" name="abouttitle"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">description</label>
                                                                <textarea name="aboutdescription" id=""
                                                                    class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Conatct
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Contact
                                                                    Number</label>
                                                                <input type="text" name="contact_number"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Email Id</label>
                                                                <input type="text" name="contact_email" class="form-control"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Address</label>
                                                                <textarea name="contact_address" id="" rows="3"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>CTA
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Logo</label>
                                                                <input type="file" name="ctaimage" id=""
                                                                    accept="image/*" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Title</label>
                                                                <input type="text" name="ctatitle" class="form-control"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Sub Title</label>
                                                                <input type="text" name="ctadescription"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Near By Location
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <!-- Accordation -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body">
                                                                        <div class="panel-group accordion-struct accordion-style-1"
                                                                            id="accordion_2" role="tablist"
                                                                            aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading activestate"
                                                                                    role="tab" id="heading_10">
                                                                                    <a role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Locationone"
                                                                                        aria-expanded="true">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Location one
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Locationone"
                                                                                    class="panel-collapse collapse in"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="locationtitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Sub
                                                                                                        Title</label>
                                                                                                    <input type="text"
                                                                                                        name="locationssubtitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_11">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Locationtwo"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Location two
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Locationtwo"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="locationtitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Sub
                                                                                                        Title</label>
                                                                                                    <input type="text"
                                                                                                        name="locationssubtitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_12">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Locationthree"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Location three
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Locationthree"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="locationtitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Sub
                                                                                                        Title</label>
                                                                                                    <input type="text"
                                                                                                        name="locationssubtitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_13">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Locationfour"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Location four
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Locationfour"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="locationtitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Sub
                                                                                                        Title</label>
                                                                                                    <input type="text"
                                                                                                        name="locationssubtitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Features
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <!-- Accordation -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body">
                                                                        <div class="panel-group accordion-struct accordion-style-1"
                                                                            id="accordion_2" role="tablist"
                                                                            aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading activestate"
                                                                                    role="tab" id="heading_10">
                                                                                    <a role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Featureone"
                                                                                        aria-expanded="true">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Features one
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Featureone"
                                                                                    class="panel-collapse collapse in"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="featureimageone"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="featuretitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="featuredescriptionone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_11">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Featuretwo"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Features two
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Featuretwo"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="featureimagetwo"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="featuretitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="featuredescriptiontwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_12">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Featurethree"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Features three
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Featurethree"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="featureimagethree"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="featuretitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="featuredescriptionthree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_13">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Featurefour"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Features four
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Featurefour"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="featureimagefour"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="featuretitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="featuredescriptionfour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Plans
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <!-- Accordation -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body">
                                                                        <div class="panel-group accordion-struct accordion-style-1"
                                                                            id="accordion_2" role="tablist"
                                                                            aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading activestate"
                                                                                    role="tab" id="heading_10">
                                                                                    <a role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Plansone"
                                                                                        aria-expanded="true">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Plans one
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Plansone"
                                                                                    class="panel-collapse collapse in"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="planimageone"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="plantitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="plansubtitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_11">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Plantwo"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Plans two
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Plantwo"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="planimage"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="plantitle"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="plansubtitle"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_12">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Planthree"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Plans three
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Planthree"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="planimage"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="plantitle"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="plansubtitle"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_13">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Planfour"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Plans four
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Planfour"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="planimage"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="plantitle"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="plansubtitle"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Videos
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <!-- Accordation -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body">
                                                                        <div class="panel-group accordion-struct accordion-style-1"
                                                                            id="accordion_2" role="tablist"
                                                                            aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading activestate"
                                                                                    role="tab" id="heading_10">
                                                                                    <a role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Videosone"
                                                                                        aria-expanded="true">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Videos one
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Videosone"
                                                                                    class="panel-collapse collapse in"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Video</label>
                                                                                                    <input type="file"
                                                                                                        name="videoone"
                                                                                                        id=""
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="videotitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="videosubtitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_11">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Videostwo"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Videos two
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Videostwo"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="videotwo"
                                                                                                        id=""
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="videotitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="videosubtitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_12">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Videosthree"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Videos three
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Videosthree"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="videothree"
                                                                                                        id=""
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="videotitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="videosubtitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_13">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#Videosfour"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Videos four
                                                                                    </a>
                                                                                </div>
                                                                                <div id="Videosfour"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="videofour"
                                                                                                        id=""
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="videotitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="videosubtitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Active Images
                                                    </h6>
                                                    <hr class="light-grey-hr" />
                                                    <!-- Accordation -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body">
                                                                        <div class="panel-group accordion-struct accordion-style-1"
                                                                            id="accordion_2" role="tablist"
                                                                            aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading activestate"
                                                                                    role="tab" id="heading_10">
                                                                                    <a role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#ActiveImagesone"
                                                                                        aria-expanded="true">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>ActiveImages one
                                                                                    </a>
                                                                                </div>
                                                                                <div id="ActiveImagesone"
                                                                                    class="panel-collapse collapse in"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="activeimageone"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="activetitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="activesubtitleone"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_11">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#ActiveImagestwo"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>ActiveImages two
                                                                                    </a>
                                                                                </div>
                                                                                <div id="ActiveImagestwo"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="activeimagetwo"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="activetitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="activesubtitletwo"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_12">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#ActiveImagesthree"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>ActiveImages three
                                                                                    </a>
                                                                                </div>
                                                                                <div id="ActiveImagesthree"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="activeimagethree"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="activetitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="activesubtitlethree"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading" role="tab"
                                                                                    id="heading_13">
                                                                                    <a class="collapsed" role="button"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion_2"
                                                                                        href="#ActiveImagesfour"
                                                                                        aria-expanded="false">
                                                                                        <div class="icon-ac-wrap pr-20">
                                                                                            <span class="plus-ac"><i
                                                                                                    class="ti-plus"></i></span><span
                                                                                                class="minus-ac"><i
                                                                                                    class="ti-minus"></i></span>
                                                                                        </div>Active Images four
                                                                                    </a>
                                                                                </div>
                                                                                <div id="ActiveImagesfour"
                                                                                    class="panel-collapse collapse"
                                                                                    role="tabpanel">
                                                                                    <div class="panel-body pa-15">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Image</label>
                                                                                                    <input type="file"
                                                                                                        name="activeimagefour"
                                                                                                        id=""
                                                                                                        accept="image/*"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Title</label>
                                                                                                    <input type="text"
                                                                                                        name="activetitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="control-label mb-10">Subtitle</label>
                                                                                                    <input type="text"
                                                                                                        name="activesubtitlefour"
                                                                                                        class="form-control"
                                                                                                        placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i
                                                            class="zmdi zmdi-account mr-10"></i>Gallary Images</h6>
                                                    <hr class="light-grey-hr" />
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Number of
                                                                    Images</label>
                                                                <input type="number" id="imageCount"
                                                                    class="form-control" min="1" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="dynamicInputs"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10"> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// jQuery script
$(document).ready(function() {
    // Handle input change event
    $("#imageCount").on("input", function() {
        var count = $(this).val();
        generateDynamicInputs(count);
    });

    // Function to generate dynamic input fields
    function generateDynamicInputs(count) {
        var dynamicInputs = $("#dynamicInputs");
        dynamicInputs.empty(); // Clear existing dynamic inputs

        for (var i = 0; i < count; i++) {
            var inputGroup = $("<div class='row'></div>");

            var imageInput = $("<div class='col-md-6'><div class='form-group'>" +
                "<label class='control-label mb-10'>Image</label>" +
                "<input type='file' name='galleryimage' accept='image/*' class='form-control' /></div></div>"
            );

            var titleInput = $("<div class='col-md-6'><div class='form-group'>" +
                "<label class='control-label mb-10'>Title</label>" +
                "<input type='text' name='gallerytitle' class='form-control' placeholder=''></div></div>");

            var subtitleInput = $("<div class='col-md-12'><div class='form-group'>" +
                "<label class='control-label mb-10'>Sub Title</label>" +
                "<textarea name='gallerysubtitle' class='form-control' rows='2'></textarea></div></div>");

            inputGroup.append(imageInput);
            inputGroup.append(titleInput);
            inputGroup.append(subtitleInput);

            dynamicInputs.append(inputGroup);
        }
    }
});
</script>
@endsection