@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Primium List Features</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="txt-dark">New Launch Project</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a data-toggle="modal" data-target="#myModalNewLaunchProject" class="btn btn-sm btn-success "> <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="countryTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($new_launch_projects as $new_launch_project)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Country Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaleditproperty"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_NewLaunchProperty({{$new_launch_project->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$new_launch_project->id}}</td>
                                            <td>{{$new_launch_project->property->title}}</td>
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
        <div class="col-sm-6">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="txt-dark">Ready Possession Project</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a data-toggle="modal" data-target="#myModalReadyPossionProject" class="btn btn-sm btn-success "> <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="stateTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($readypossessionprojects as $readypossessionproject)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Country Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaleditReadypossessionproperty"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_ReadyPossionProperty({{$readypossessionproject->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$readypossessionproject->id}}</td>
                                            <td>{{$readypossessionproject->property->title}}</td>
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
<div id="myModalReadyPossionProject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add New Ready Possession Project</h5>
            </div>
            <form action="{{ route('ready_possession_project.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="property_name">Property Name:</label>
                            <select class="form-control" id="property_name" name="property_name">
                                <option value="">Not Selected</option>
                                @foreach($property as $prop)
                                    <option value="{{ $prop->id }}">{{ $prop->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModalNewLaunchProject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add New Launch Project</h5>
            </div>
            <form action="{{ route('new_launch_project.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="property_name">Property Name:</label>
                            <select class="form-control" id="property_name" name="property_name">
                                <option value="">Not Selected</option>
                                @foreach($property as $prop)
                                    <option value="{{ $prop->id }}">{{ $prop->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal for Editing -->
<div id="myModaleditproperty" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit New Launch Project</h5>
            </div>
            <form action="{{ route('new_launch_project.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id" id="exclusiveId">
                            <label for="property_name">Property Name:</label>
                            <select class="form-control" id="property_name" name="property_name">
                                <option value="">Not Selected</option>
                                @foreach($property as $prop)
                                    <option value="{{ $prop->id }}">{{ $prop->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal for Editing -->
<div id="myModaleditReadypossessionproperty" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit New Launch Project</h5>
            </div>
            <form action="{{ route('ready_possession_projects.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id" id="readyId">
                            <label for="property_name">Property Name:</label>
                            <select class="form-control" id="property_name" name="property_name">
                                <option value="">Not Selected</option>
                                @foreach($property as $prop)
                                    <option value="{{ $prop->id }}">{{ $prop->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function Edit_NewLaunchProperty(newlaunch_propertyId) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('newlaunch_project.edit') }}",
            method: "POST",
            data: {
                'id': newlaunch_propertyId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                $('#myModaleditproperty').find('select[name="property_name"]').val(data.property_id);
                $('#exclusiveId').val(data.id);
                $('#myModaleditproperty').modal('show');
            }
        });

        return false;
    }
</script>
<script type="text/javascript">
    function Edit_ReadyPossionProperty(ReadyPossion_propertyId) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('readypossession_project.edit') }}",
            method: "POST",
            data: {
                'id': ReadyPossion_propertyId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                $('#myModaleditReadypossessionproperty').find('select[name="property_name"]').val(data.property_id);
                $('#readyId').val(data.id);
                $('#myModaleditReadypossessionproperty').modal('show');
            }
        });

        return false;
    }
</script>


@endsection