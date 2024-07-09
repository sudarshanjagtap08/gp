@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Lsi Keyword</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <a data-toggle="modal" data-target="#myModalLsikeyword" class="btn btn-sm btn-success "> <i
                            class="fa fa-plus"></i></a>
                    <div class="panel-body">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($lsikeyword as $lsikeyword)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaleditlsikeyword"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_Lsikeyword({{$lsikeyword->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Delete Data">
                                                        <a href="{{url('lsi_keyword/delete/'.$lsikeyword->id)}}" class="btn btn-danger btn-sm" style="padding: 2px 7px;">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $i; $i++; ?></td>
                                            <td>{{$lsikeyword->name}}</td>
                                            <td>{{$lsikeyword->link}}</td>
                                            <td>{{$lsikeyword->type}}</td>
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
<div id="myModalLsikeyword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add Lsi Keyword</h5>
            </div>
            <form action="{{url('lsi_keyword/save')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="1">Section 1</option>
                                    <option value="2">Section 2</option>
                                    <option value="3">Section 3</option>
                                    <option value="4">Section 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Link</label>
                                <input id="link" name="link" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="myModaleditlsikeyword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Lsi Keyword</h5>
            </div>
            <form action="{{url('lsi_keyword/update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="lsikeywordId">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Name:</label>
                                <input id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="1">Section 1</option>
                                    <option value="2">Section 2</option>
                                    <option value="3">Section 3</option>
                                    <option value="4">Section 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Link</label>
                                <input id="link" name="link" class="form-control">
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
    function Edit_Lsikeyword(lsikeywordId) { 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('lsi_keyword.edit') }}",
            method: "POST",
            data: {
                'id': lsikeywordId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#myModaleditlsikeyword').find('input[name="name"]').val(data.name);
                $('#myModaleditlsikeyword').find('select[name="type"]').val(data.type);
                $('#myModaleditlsikeyword').find('input[name="link"]').val(data.link);
                $('#lsikeywordId').val(data.id);
                $('#myModaleditlsikeyword').modal('show');
            }
        });
        return false;
    }
</script>

@endsection