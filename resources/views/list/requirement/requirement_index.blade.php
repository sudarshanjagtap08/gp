@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Requirement</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <a data-toggle="modal" data-target="#myModalRequirement" class="btn btn-sm btn-success "> <i
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
                                            <th>Date & Time</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>City</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach($requirement as $requirement)
                                        <tr>
                                            <td> 
                                            <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="#" data-toggle="modal" data-target="#myModaleditRequirement"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_Requirement({{$requirement->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo "$i"; $i++; ?></td>
                                            <td>{{ $requirement->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $requirement->name}}</td>
                                            <td>{{ $requirement->email}}</td>
                                            <td>{{ $requirement->mobilenumber}}</td>
                                            <td>{{ $requirement->city}}</td>
                                            <td>{{ $requirement->status}}</td>
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
<div id="myModalRequirement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add Requirement</h5>
            </div>
            <form method="POST" action="{{url('list/requirement/add')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Name</label>
                                <input id="name" type="text" class="form-control " name="name"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Mobile Number</label>
                                <input id="mobilenumber" type="number" class="form-control " name="mobilenumber"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Email Id</label>
                                <input id="email" type="text" class="form-control " name="email"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">City</label>
                                <input id="city" type="text" class="form-control " name="city"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Size</label>
                                <input id="size" type="text" class="form-control " name="size"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Budget</label>
                                <input id="budget" type="text" class="form-control " name="budget"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Area</label>
                                <input id="area" type="text" class="form-control " name="area"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Comment</label>
                                <textarea  type="text" class="form-control " name="comment"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="myModaleditRequirement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Requirement</h5>
            </div>
            <form action="{{url('list/requirement/update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="requirementId" id="requirementId">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Name</label>
                                <input id="name" type="text" class="form-control " name="name"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Mobile Number</label>
                                <input id="mobilenumber" type="number" class="form-control " name="mobilenumber"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Email Id</label>
                                <input id="email" type="text" class="form-control " name="email"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">City</label>
                                <input id="city" type="text" class="form-control " name="city"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Size</label>
                                <input id="size" type="text" class="form-control " name="size"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Budget</label>
                                <input id="budget" type="text" class="form-control " name="budget"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Area</label>
                                <input id="area" type="text" class="form-control " name="area"  required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Comment</label>
                                <textarea  type="text" class="form-control " name="comment"></textarea>
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
    function Edit_Requirement(requirementId) { 
        // alert(requirementId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('requirement.edit') }}",
            method: "POST",
            data: {
                'id': requirementId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#myModaleditRequirement').find('input[name="name"]').val(data.name);
                $('#myModaleditRequirement').find('input[name="mobilenumber"]').val(data.mobilenumber);
                $('#myModaleditRequirement').find('input[name="email"]').val(data.email);
                $('#myModaleditRequirement').find('input[name="city"]').val(data.city);
                $('#myModaleditRequirement').find('input[name="size"]').val(data.size);
                $('#myModaleditRequirement').find('input[name="budget"]').val(data.budget);
                $('#myModaleditRequirement').find('input[name="area"]').val(data.area);
                $('#myModaleditRequirement').find('textarea[name="comment"]').val(data.comment);
                $('#requirementId').val(data.id);
                $('#myModaleditRequirement').modal('show');
            }
        });
        return false;
    }
</script>

@endsection