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
                                    <form action="{{ url('properties/seo/save')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i
                                                    class="zmdi zmdi-account mr-10"></i>Add SEO</h6>
                                            <hr class="light-grey-hr" />
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label mb-10">Property Title</label>
                                                        <input type="text" name="title" class="form-control" value="{{$propertydata->title}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label mb-10">Property Url</label>
                                                        <input type="text" name="slug" class="form-control" value="{{$propertydata->slug}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <input type="hidden" name="property_id" value="{{$propertyid}}">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label mb-10">Meta Title</label>
                                                                <textarea name="metatitle" id="" class="form-control"
                                                                    rows="3">{{optional($propertydata->seos->first())->metatitle}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Meta
                                                                    Description</label>
                                                                <textarea name="metadescription" id=""
                                                                    class="form-control"
                                                                    rows="3">{{optional($propertydata->seos->first())->metadescription}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Meta Keywords</label>
                                                                <textarea name="metakeyword" id="" class="form-control"
                                                                    rows="3">{{optional($propertydata->seos->first())->metakeyword}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Canonical</label>
                                                                <textarea name="canonical" id="" class="form-control"
                                                                    rows="3">{{optional($propertydata->seos->first())->canonical}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Schema Code</label>
                                                                <textarea name="schemacode" id="" class="form-control"
                                                                    rows="5">{{optional($propertydata->seos->first())->schemacode}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Heading Tag</label>
                                                                <textarea name="headingtag" id="" class="form-control"
                                                                    rows="5">{{$propertydata->headingtag}}</textarea>
                                                            </div>
                                                        </div>
                                                        <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Images</h6>
                                                        @foreach($images as $image)
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="alt_tag_{{ $image->id }}">Alt Tag</label>
                                                                <img src="{{ asset('images/property_images/'.$image->name) }}" class="img-fluid" width="50" height="50">
                                                                <input type="text" class="form-control" id="alt_tag_{{ $image->id }}" name="alt_tags[{{ $image->id }}]" value="{{ $image->aux1 }}">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Actual Images</h6>
                                                         @foreach($actualimages as $image)
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="actualalt_tags{{ $image->id }}">Alt Tag</label>
                                                                <img src="{{ asset('images/actualimages/'.$image->name) }}" class="img-fluid" width="50" height="50">
                                                                <input type="text" class="form-control" id="actualalt_tags{{ $image->id }}" name="actualalt_tags[{{ $image->id }}]" value="{{ $image->aux2 }}">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Layout Images</h6>
                                                         @foreach($layoutimages as $image)
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="actualalt_tags{{ $image->id }}">Alt Tag</label>
                                                                <img src="{{ asset('images/layoutimages/'.$image->name) }}" class="img-fluid" width="50" height="50">
                                                                <input type="text" class="form-control" id="layoutalt_tags{{ $image->id }}" name="layoutalt_tags[{{ $image->id }}]" value="{{ $image->aux2 }}">
                                                            </div>
                                                        </div>
                                                        @endforeach
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