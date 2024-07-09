@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Edit Website Enquiry</h5>
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
                                                    <form action="{{ url('website_enquiry/update/'.$websiteenquiry->id) }}" method="POST">
                                                        @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <h6 class="txt-dark capitalize-font"><i
                                                                                class="zmdi zmdi-account mr-10"></i>Update Lead to Router</h6>
                                                                        <hr class="light-grey-hr" />
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Name</label>
                                                                                <input type="text" name="name" class="form-control" value="{{$websiteenquiry->name}}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Phone</label>
                                                                                <input type="number" name="mobilenumber" class="form-control" value="{{$websiteenquiry->mobilenumber}}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Email</label>
                                                                                <input type="email" name="email" class="form-control" value="{{$websiteenquiry->email}}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">City</label>
                                                                                <input type="text" name="city" class="form-control" value="{{$websiteenquiry->city}}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Size</label>
                                                                                <input type="text" name="size" class="form-control" value="{{$websiteenquiry->size}}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Area</label>
                                                                                <input type="text" name="area" class="form-control" value="{{$websiteenquiry->area}}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Budget</label>
                                                                                <input type="text" name="budget" class="form-control" value="{{$websiteenquiry->budget}}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Source</label>
                                                                                <input type="text" name="source" class="form-control" value="{{$websiteenquiry->source}}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Comment</label>
                                                                                <textarea type="comment" name="comment" class="form-control" >{{$websiteenquiry->comment}}</textarea>
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
                                                                                        <option value="New" <?php if($websiteenquiry->status == "New") echo "selected"; ?>>New</option>
                                                                                        <option value="Lost" <?php if($websiteenquiry->status == "Lost") echo "selected"; ?>>Lost</option>
                                                                                        <option value="Follow Ups" <?php if($websiteenquiry->status == "Follow Ups") echo "selected"; ?>>Follow Ups</option>
                                                                                        <option value="Site Visit Done" <?php if($websiteenquiry->status == "Site Visit Done") echo "selected"; ?>>Site Visit Done</option>
                                                                                        <option value="Booked" <?php if($websiteenquiry->status == "Booked") echo "selected"; ?>>Booked</option>
                                                                                        <option value="Cancelled" <?php if($websiteenquiry->status == "Cancelled") echo "selected"; ?>>Cancelled</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12" id="reasonField" style="display: <?php echo ($websiteenquiry->status == "Cancelled") ? 'block' : 'none'; ?>">
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10">Reason</label>
                                                                                    <select class="form-control" name="reason" id="reason" aria-label="Floating label select example">
                                                                                        <option value="" <?php if($websiteenquiry->reason == "") echo "selected"; ?>>Not Selected</option>
                                                                                        <option value="Loan issue" <?php if($websiteenquiry->reason == "Loan Issue") echo "selected"; ?>>Loan Issue</option>
                                                                                        <option value="Budget issue" <?php if($websiteenquiry->reason == "Budget issue") echo "selected"; ?>>Budget issue</option>
                                                                                        <option value="Customer postponed property buying" <?php if($websiteenquiry->reason == "Customer postponed property buying") echo "selected"; ?>>Customer postponed property buying</option>
                                                                                        <option value="Budget does not match" <?php if($websiteenquiry->reason == "Budget does not match") echo "selected"; ?>>Budget does not match</option>
                                                                                        <option value="Location mismatch" <?php if($websiteenquiry->reason == "Location mismatch") echo "selected"; ?>>Location mismatch</option>
                                                                                        <option value="Looking for a small apartment" <?php if($websiteenquiry->reason == "Looking for a small apartment") echo "selected"; ?>>Looking for a small apartment</option>
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
                                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Website History</h6>
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
                                                                <th>Date & Time</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i="1"?>
                                                            @foreach($Websitehistory as $Websitehistory)
                                                            <tr>
                                                                <td><?php echo"$i"; $i++; ?></td>
                                                                <td>{{$Websitehistory->remark}}</td>
                                                                <td>{{$Websitehistory->status}}</td>
                                                                <td>{{$Websitehistory->users->name}}</td>
                                                                <td>{{$Websitehistory->created_at->format('Y-m-d H:i:s')}}</td>
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