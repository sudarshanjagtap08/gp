@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Edit About Us</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                       <form action="{{ route('about.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id" id="" value="{{$aboutusdata->id}}">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="edit_title" name="title" required value="{{$aboutusdata->title}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Short Description:</label>
                            <input type="text" class="form-control" id="edit_short_description" name="short_description" required value="{{$aboutusdata->short_description}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="tinymce" id="edit_description" name="description" required>{{$aboutusdata->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <img id="edit_image_preview" src="{{ asset('images/about/'.$aboutusdata->image) }}" class="img-fluid"
                                width="50" height="50">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection