@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All {{$value}} List</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
            <!--<h5 class="txt-dark">All {{$value}} List</h5>-->
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <form action="{{url('user/status/update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-actions" style="text-align-last: end;">
                                       <button type="submit" class="btn btn-success btn-sm" onclick="changeStatus('active')">Activate</button>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="changeStatus('inactive')">Deactivate</button>
                                    </div>
                                    <table id="example" class="table table-hover display pb-30 mt-2">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Sr. No</th>
                                                <th>Name</th>
                                                <!--<th>Seller Type</th>-->
                                                <th>Email Id</th>
                                                <th>Last Login Ip</th>
                                                <th>Last Login Details</th>
                                                <th>Last Login Date Time</th>
                                                <th>Status</th>
                                                <th>Register Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="check1"
                                                                name="selected_ids[]" value="{{ $user->id }}">
                                                        </div>
                                                        <div class="btn-group">
                                                            <div class="addMore" title="Edit Data">
                                                                <a href="#" data-toggle="modal" data-target="#myModaledit"
                                                                   class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                                   onclick="Edit_User({{$user->id}});">
                                                                   <i class="fa fa-pencil"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                         @if($user->shortlistedCount + $user->propertyseenCount + $user->propertyenquiryCount == 0 )
                                                            <div class="btn-group">
                                                                <div class="addMore" title="Delete Data">
                                                                    <a href="{{url('user/delete/'.$user->id)}}" class="btn btn-danger btn-sm" style="padding: 2px 7px;">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td><?php echo"$i"; $i++?></td>
                                                    <td>{{$user->name}}</td>
                                                    <!--<td>{{$user->seller_type}}</td>-->
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->last_login_ip}}</td>
                                                    <td>{{$user->last_login_details}}</td>
                                                    <td>{{$user->last_login_date_time}}</td>
                                                    <td>
                                                        <div onclick="toggleUserStatus({{ $user->id }})">
                                                            <input id="statusCheckbox_{{$user->id}}" type="checkbox" <?php echo ($user->status == 1) ? 'checked' : ''; ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" >
                                                        </div>
                                                    </td>
                                                    <td><?php echo date('d-m-y', strtotime($user->created_at)); ?></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModaledit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!--<h4 class="modal-title">Edit User</h4>-->
            </div>
            <div class="modal-body">
                <form action="{{ url('user/update') }}" method="post">
                    @csrf
                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Edit User</h6>
                        <hr class="light-grey-hr" />
                        <div class="row">
                            <div class="col-md-12">
                            <input type="hidden" name="id" id="editUserId" class="form-control">
                                <div class="form-group">
                                    <label class="control-label mb-10">Name</label>
                                    <input name="name" id="editUserName" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label mb-10">Status</label>
                                    <select name="status" id="editUserStatus" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="2">In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions mt-10">
                        <button type="submit" class="btn btn-success mr-10">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function toggleUserStatus(userId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/update-user-status',
            method: 'POST',
            data: { userId: userId },
            success: function(response) {
                if (response.success) {
                    // Toggle the checkbox state
                    $('#statusCheckbox_' + userId).prop('checked', !$('#statusCheckbox_' + userId).prop('checked'));
                } else {
                    alert('Failed to update user status');
                }
            },
            error: function() {
                alert('Failed to communicate with the server');
            }
        });
    }
</script>
<script type="text/javascript">
    function Edit_User(userId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/user_edit/') }}/" + userId,
            method: "GET",
            dataType: 'json',
            success: function(data) {
                $('#editUserId').val(data.id);
                $('#editUserName').val(data.name);
                $('#editUserStatus').val(data.status);
                $('#myModaledit').modal('show');
            }
        });
        return false;
    }
</script>
<script>
    function changeStatus(action) 
    {
        $("<input />").attr("type", "hidden")
            .attr("name", "action")
            .attr("value", action)
            .appendTo("form");
        $("form").submit();
    }
</script>

@endsection