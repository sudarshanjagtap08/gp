@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <!-- <h5 class="txt-dark">All Property</h5> -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    <form action="{{ url('blog/seo/save')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i
                                                    class="zmdi zmdi-account mr-10"></i>Add SEO</h6>
                                            <hr class="light-grey-hr" />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label class="control-label mb-10">Blog Title</label>
                                                        <input type="text" name="title" class="form-control" value="{{$blogdata->title}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <input type="hidden" name="blog_id" value="{{$blogid}}">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label mb-10">Meta Title</label>
                                                                <textarea name="metatitle" id="" class="form-control"
                                                                    rows="3">{{optional($blogdata->blogseos->first())->metatitle}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Meta
                                                                    Description</label>
                                                                <textarea name="metadescription" id=""
                                                                    class="form-control"
                                                                    rows="3">{{optional($blogdata->blogseos->first())->metadescription}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Meta Keywords</label>
                                                                <textarea name="metakeyword" id="" class="form-control"
                                                                    rows="3">{{optional($blogdata->blogseos->first())->metakeyword}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Canonical</label>
                                                                <textarea name="canonical" id="" class="form-control"
                                                                    rows="3">{{optional($blogdata->blogseos->first())->canonical}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Schema Code</label>
                                                                <textarea name="schemacode" id="" class="form-control"
                                                                    rows="5">{{optional($blogdata->blogseos->first())->schemacode}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10">Update</button>
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
@endsection