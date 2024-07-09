@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Types Of Property Category</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                <a data-toggle="modal" data-target="#myModalCategory" class="btn btn-sm btn-success "> <i class="fa fa-plus"></i></a>
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
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($propertycategory as $propertycategory)
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="addMore" title="Edit Country Data">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#myModaleditcategory"
                                                                class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                                onclick="Edit_Category({{$propertycategory->id}});">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$propertycategory->id}}</td>
                                                <td>{{$propertycategory->name}}</td>
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
<div id="myModalCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add Property Category Name</h5>
            </div>
            <form action="{{url('property_category/save')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="myModaleditcategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Property Category Name</h5>
            </div>
            <form action="{{url('property_category/update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="categoryId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
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
    function Edit_Category(categoryId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ route('property_category.edit') }}",
            method: "POST",
            data: {
                'id': categoryId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#myModaleditcategory').find('input[name="name"]').val(data.name);
                $('#categoryId').val(data.id);
                $('#myModaleditcategory').modal('show');
            }
        });
        return false;
    }
</script>
@endsection