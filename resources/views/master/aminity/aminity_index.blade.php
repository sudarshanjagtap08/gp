@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Aminity List</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">                    
                    <a data-toggle="modal" data-target="#myModalaminity" class="btn btn-sm btn-success "> <i
                            class="fa fa-plus"></i></a>
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
                                            <th>Title</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($aminity as $aminity)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Country Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaleditaminity"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_aminity({{$aminity->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$aminity->id}}</td>
                                            <td>{{$aminity->name}}</td>
                                            <td>
                                                @if($aminity->image != "")
                                                <img src="{{ asset('images/aminity/'.$aminity->image)}}"
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
<div id="myModalaminity" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add Aminity</h5>
            </div>
            <form action="{{url('aminity/save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModaleditaminity" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit About Us</h5>
            </div>
            <form action="{{ route('aminity.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id" id="aminityId">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Icon</label>
                            <img id="edit_image_preview" src="{{ asset('images/aminity/') }}" class="img-fluid"
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
function Edit_aminity(aminityId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('aminity.edit') }}",
        method: "POST",
        data: {
            'id': aminityId,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            $('#myModaleditaminity').find('input[name="name"]').val(data.name);
            $('#aminityId').val(data.id);
             if (data.image) {
                $('#edit_image_preview').attr('src', "{{ asset('images/aminity/') }}" + '/' + data
                    .image);
            } else {
                $('#edit_image_preview').attr('src', ''); // Clear the image preview
            }
            $('#myModaleditaminity').modal('show');
        }
    });
    return false;
}
</script>
@endsection