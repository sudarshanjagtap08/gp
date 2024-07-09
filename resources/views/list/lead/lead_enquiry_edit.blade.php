@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Edit Subscribe Enquiry</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default card-view">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-wrap">
                                                    <form action="{{ url('list/other/lead/update/'.$otherlead->id) }}" method="POST">
                                                        @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <h6 class="txt-dark capitalize-font"><i
                                                                                class="zmdi zmdi-account mr-10"></i>Edit Other Lead</h6>
                                                                        <hr class="light-grey-hr" />
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Name</label>
                                                                                <input type="text" name="name" class="form-control" value="{{ $otherlead->name }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Phone</label>
                                                                                <input type="number" name="mobilenumber" class="form-control" value="{{ $otherlead->mobilenumber }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Email</label>
                                                                                <input type="email" name="email" class="form-control" value="{{ $otherlead->email }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Comment</label>
                                                                                <textarea type="comment" name="comment" class="form-control" readonly>{{ $otherlead->comment }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Update Status</h6>
                                                                        <hr class="light-grey-hr" />
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10">Status</label>
                                                                                    <select class="form-control" name="status" id="status" aria-label="Floating label select example">
                                                                                        <option value="New" <?php if($otherlead->status == "New") echo "selected"; ?>>New</option>
                                                                                        <option value="Lost" <?php if($otherlead->status == "Lost") echo "selected"; ?>>Lost</option>
                                                                                        <option value="Follow Ups" <?php if($otherlead->status == "Follow Ups") echo "selected"; ?>>Follow Ups</option>
                                                                                        <option value="Site Visit Done" <?php if($otherlead->status == "Site Visit Done") echo "selected"; ?>>Site Visit Done</option>
                                                                                        <option value="Booked" <?php if($otherlead->status == "Booked") echo "selected"; ?>>Booked</option>
                                                                                        <option value="Cancelled" <?php if($otherlead->status == "Cancelled") echo "selected"; ?>>Cancelled</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12" id="reasonField" style="display: <?php echo ($otherlead->status == "Cancelled") ? 'block' : 'none'; ?>">
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10">Reason</label>
                                                                                    <select class="form-control" name="reason" id="reason" aria-label="Floating label select example">
                                                                                        <option value="" <?php if($otherlead->reason == "") echo "selected"; ?>>Not Selected</option>
                                                                                        <option value="Loan issue" <?php if($otherlead->reason == "Loan Issue") echo "selected"; ?>>Loan Issue</option>
                                                                                        <option value="Budget issue" <?php if($otherlead->reason == "Budget issue") echo "selected"; ?>>Budget issue</option>
                                                                                        <option value="Customer postponed property buying" <?php if($otherlead->reason == "Customer postponed property buying") echo "selected"; ?>>Customer postponed property buying</option>
                                                                                        <option value="Budget does not match" <?php if($otherlead->reason == "Budget does not match") echo "selected"; ?>>Budget does not match</option>
                                                                                        <option value="Location mismatch" <?php if($otherlead->reason == "Location mismatch") echo "selected"; ?>>Location mismatch</option>
                                                                                        <option value="Looking for a small apartment" <?php if($otherlead->reason == "Looking for a small apartment") echo "selected"; ?>>Looking for a small apartment</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10">Remark</label>
                                                                                    <textarea type="remark" name="remark" class="form-control" ></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-actions mt-10">
                                                                            <button type="submit" class="btn btn-success  mr-10">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i> Other Lead History</h6>
                                            <hr class="light-grey-hr" />
                                            <div class="table-wrap">
                                                <div class="table-responsive">
                                                    <table id="cityTable" class="table table-hover display  pb-30">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No</th>
                                                                <th>Remark</th>
                                                                <th>Status</th>
                                                                <th>Username</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i="1"?>
                                                            @foreach($otherleadhistory as $otherleadhistory)
                                                                <tr>
                                                                    <td><?php echo"$i"; $i++; ?></td>
                                                                    <td>{{$otherleadhistory->remark}}</td>
                                                                    <td>{{$otherleadhistory->status}}</td>
                                                                    <td>{{$otherleadhistory->users->name}}</td>
                                                                    <td>{{$otherleadhistory->created_at->format('Y-m-d H:i:s')}}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#status').change(function() {
            var selectedStatus = $(this).val();
            if (selectedStatus == 'Cancelled') {
                $('#reasonField').show();
            } else {
                $('#reasonField').hide();
            }
        });
    });
</script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection