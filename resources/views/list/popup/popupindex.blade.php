@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Popup Image </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="cityTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr.No</th>
                                            <th>Link</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($popup as $popup)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="#" data-toggle="modal" data-target="#myModaleditpopup"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_Popup({{$popup->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$popup->id}}</td>
                                            <td>{{$popup->link}}</td>
                                            <td> 
                                                @if($popup->image != "")
                                                    <img src="{{ asset('images/popup/'.$popup->image)}}"  width="100px;">
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
<div id="myModaleditpopup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Popup</h5>
            </div>
            <form action="{{ route('popup.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="popupId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="text"></label>
                                <input type="text" class="form-control" id="link" name="link">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <img src="" width="100px" alt="Pop Up Image">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
function Edit_Popup(popupId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('popup.edit') }}",
            method: "POST",
            data: {
                'id': popupId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#popupId').val(data.id);
                var imagePath = "{{ asset('images/popup/') }}/" + data.image;
                $('#myModaleditpopup').find('img').attr('src', imagePath);
                $('#myModaleditpopup').modal('show');
                $('#myModaleditpopup').find('input[name="link"]').val(data.link);
            }
        });
        return false;
    }
</script>
@endsection