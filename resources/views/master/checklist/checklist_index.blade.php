@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Checklist Before Buying Land</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <a data-toggle="modal" data-target="#myModalChecklist" class="btn btn-sm btn-success "> <i
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
                                            <th>Description</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($checklist as $checklist)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Country Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaleditchecklist"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_Checklist({{$checklist->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$checklist->id}}</td>
                                            <td>{{$checklist->title}}</td>
                                            <td>{{$checklist->description}}</td>
                                            <td></td>
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
<div id="myModalChecklist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add Checklist Before Buying Land</h5>
            </div>
            <form action="{{url('checklist/save')}}" method="post">
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
                                <label for="name">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" id="image" name="image" >
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="myModaleditchecklist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Checklist Item</h5>
            </div>
            <form action="{{url('checklist/update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="checklistId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" id="image" name="image" >
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
    function Edit_Checklist(checklistId) { // Pass the checklist ID to the function
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('checklist.edit') }}",
            method: "POST",
            data: {
                'id': checklistId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#myModaleditchecklist').find('input[name="title"]').val(data.title);
                $('#myModaleditchecklist').find('textarea[name="description"]').val(data.description);
                $('#checklistId').val(data.id);
                $('#myModaleditchecklist').modal('show');
            }
        });
        return false;
    }
</script>

@endsection