@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">About List</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <!-- <a data-toggle="modal" data-target="#myModalaboutus" class="btn btn-sm btn-success "> <i
                            class="fa fa-plus"></i></a> -->
                    <div class="panel-body">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="cityTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>For Page</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($aboutus as $aboutus)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Country Data">
                                                        <a href="{{url('aboutus/edit/'.$aboutus->id)}}" class="btn btn-primary btn-sm" style="padding: 2px 7px;">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$aboutus->id}}</td>
                                            <td>{{$aboutus->for_page}}</td>
                                            <td>{{$aboutus->title}}</td>
                                            <td>{{$aboutus->short_description}}</td>
                                            <td>{{ strip_tags($aboutus->description)}}</td>
                                            <td>
                                                @if($aboutus->image != "")
                                                <img src="{{ asset('images/about/'.$aboutus->image)}}"
                                                    class="img-fluid image-popup" width="50" height="50">
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModalaboutus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add About Us</h5>
            </div>
            <form action="{{url('aboutus/save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Short Description</label>
                                <input type="text" class="form-control" id="short_description" name="short_description" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModaleditaboutus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit About Us</h5>
            </div>
            <form action="{{ route('about.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id" id="aboutId">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Short Description:</label>
                            <input type="text" class="form-control" id="edit_short_description" name="short_description" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="edit_description" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <img id="edit_image_preview" src="{{ asset('images/about/') }}" class="img-fluid"
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

<script type="text/javascript">
function Edit_aboutus(aboutId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ url('about.edit') }}",
        method: "POST",
        data: {
            'id': aboutId,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            $('#myModaleditaboutus').find('input[name="title"]').val(data.title);
            $('#myModaleditaboutus').find('input[name="short_description"]').val(data.short_description);
            $('#myModaleditaboutus').find('textarea[name="description"]').val(data.description);
            $('#aboutId').val(data.id);
            // Set the image preview
            if (data.image) {
                $('#edit_image_preview').attr('src', "{{ asset('images/about/') }}" + '/' + data
                    .image);
            } else {
                $('#edit_image_preview').attr('src', ''); // Clear the image preview
            }

            $('#myModaleditaboutus').modal('show');
        }
    });
    return false;
}
</script>

@endsection