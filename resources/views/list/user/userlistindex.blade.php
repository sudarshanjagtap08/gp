@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All User List</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="countryTable" class="table table-hover display pb-30 mt-2">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Email Id</th>
                                            <th>Last Login Ip</th>
                                            <th>Last Login Details</th>
                                            <th>Last Login Date Time</th>
                                            <th>Status</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach($users as $user)
                                            <tr>
                                                <td><?php echo"$i"; $i++?></td>
                                                <td>{{ strtoupper($user->role) }}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->last_login_ip}}</td>
                                                <td>{{$user->last_login_details}}</td>
                                                <td>{{$user->last_login_date_time}}</td>
                                                <td>
                                                    <div onclick="toggleUserStatus({{ $user->id }})">
                                                        <input id="statusCheckbox_{{$user->id}}" type="checkbox" <?php echo ($user->status == 1) ? 'checked' : ''; ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="addMore" title="Show Enquiry">
                                                            <a href="#" class="btn btn-primary btn-sm show-loginmodel"
                                                                data-toggle="modal" data-target="#userloginModal"
                                                                data-user-id="{{ $user->id }}"
                                                                style="padding: 2px 7px;">{{ $user->userloginhistories->count() }}</a>
                                                        </div>
                                                    </div>
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
<div class="modal fade" id="userloginModal" tabindex="-1" role="dialog" aria-labelledby="userloginListModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enquiryModalLabel">User Login History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive"> <!-- Use the table-responsive class for responsiveness -->
                    <table id="cityTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th> 
                                <th>Last Login Ip</th>
                                <th>Last Login Details</th>
                                <th>Last Login Date Time</th>
                            </tr>
                        </thead>
                        <tbody id="userhistoryList">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Handle the "Show Enquiry" button click
        $('.show-loginmodel').click(function() 
        {
            var userId = $(this).data('user-id');
            $.get('/user_login_history/' + userId, function(userhistories) {
                var userhistoryList = $('#userhistoryList');
                userhistoryList.empty();
                userhistories.forEach(function(userhistory) 
                {
                    var row = '<tr>';
                    row += '<td>' + userhistory.id + '</td>';
                    row += '<td>' + userhistory.last_login_ip + '</td>';
                    row += '<td>' + userhistory.last_login_details + '</td>';
                    row += '<td>' + userhistory.last_login_date_time + '</td>';
                    row += '</tr>';
                    userhistoryList.append(row);
                });
            });
        });
    });
</script>

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
@endsection