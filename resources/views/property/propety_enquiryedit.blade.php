@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Edit Property Enquiry</h5>
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
                                                    <form action="{{ url('list/enquiry/update/'.$propertyenquiry->id) }}" method="POST">
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
                                                                                <input type="text" name="name" class="form-control" value="{{ $propertyenquiry->name }}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Phone</label>
                                                                                <input type="number" name="number" class="form-control" value="{{ $propertyenquiry->mobilenumber }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Email</label>
                                                                                <input type="email" name="email" class="form-control" value="{{ $propertyenquiry->email }}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Source</label>
                                                                                <input type="text" name="source" class="form-control" value="{{ $propertyenquiry->source }}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Comment</label>
                                                                                <textarea type="comment" name="comment" class="form-control" >{{ $propertyenquiry->comment }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h6 class="txt-dark capitalize-font"><i
                                                                                class="zmdi zmdi-account mr-10"></i>Update Status</h6>
                                                                        <hr class="light-grey-hr" />
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10">Status</label>
                                                                                    <select class="form-control" name="status" id="status" aria-label="Floating label select example">
                                                                                        <option value="New" <?php if($propertyenquiry->status == "New") echo "selected"; ?>>New</option>
                                                                                        <option value="Lost" <?php if($propertyenquiry->status == "Lost") echo "selected"; ?>>Lost</option>
                                                                                        <option value="Follow Ups" <?php if($propertyenquiry->status == "Follow Ups") echo "selected"; ?>>Follow Ups</option>
                                                                                        <option value="Site Visit Done" <?php if($propertyenquiry->status == "Site Visit Done") echo "selected"; ?>>Site Visit Done</option>
                                                                                        <option value="Booked" <?php if($propertyenquiry->status == "Booked") echo "selected"; ?>>Booked</option>
                                                                                        <option value="Cancelled" <?php if($propertyenquiry->status == "Cancelled") echo "selected"; ?>>Cancelled</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12" id="reasonField" style="display: <?php echo ($propertyenquiry->status == "Cancelled") ? 'block' : 'none'; ?>">
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10">Reason</label>
                                                                                    <select class="form-control" name="reason" id="reason" aria-label="Floating label select example">
                                                                                        <option value="" <?php if($propertyenquiry->reason == "") echo "selected"; ?>>Not Selected</option>
                                                                                        <option value="Loan issue" <?php if($propertyenquiry->reason == "Loan Issue") echo "selected"; ?>>Loan Issue</option>
                                                                                        <option value="Budget issue" <?php if($propertyenquiry->reason == "Budget issue") echo "selected"; ?>>Budget issue</option>
                                                                                        <option value="Customer postponed property buying" <?php if($propertyenquiry->reason == "Customer postponed property buying") echo "selected"; ?>>Customer postponed property buying</option>
                                                                                        <option value="Budget does not match" <?php if($propertyenquiry->reason == "Budget does not match") echo "selected"; ?>>Budget does not match</option>
                                                                                        <option value="Location mismatch" <?php if($propertyenquiry->reason == "Location mismatch") echo "selected"; ?>>Location mismatch</option>
                                                                                        <option value="Looking for a small apartment" <?php if($propertyenquiry->reason == "Looking for a small apartment") echo "selected"; ?>>Looking for a small apartment</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10">Comment</label>
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
                                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i> Enquiry History</h6>
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
                                                            @foreach($enquiryhistory as $enquiryhistory)
                                                            <tr>
                                                                <td><?php echo"$i"; $i++; ?></td>
                                                                <td>{{$enquiryhistory->remark}}</td>
                                                                <td>{{$enquiryhistory->status}}</td>
                                                                <td>{{$enquiryhistory->users->name}}</td>
                                                                <td>{{ $enquiryhistory->created_at->format('Y-m-d H:i:s') }}</td>
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