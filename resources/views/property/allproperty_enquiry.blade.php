@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Property Enquiry</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
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
                                            <th>Date & Time</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Property Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($propertyenquiry as $property)
                                            @foreach ($property->propertyenquiries as $enquiry)
                                                <tr>
                                                    <td>
                                                        <div class="btn-group">
                                                            <div class="addMore" title="Edit Data">
                                                                <a href="{{url('list/enquiry/edit/'.$enquiry->id)}}"
                                                                    class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                                        class="fa fa-pencil"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="btn-group">
                                                            <div class="addMore" title="Delete Enquiry">
                                                                <a href="{{url('/list/enquiry/delete/'.$enquiry->id)}}" class="btn btn-danger btn-sm"
                                                                    style="padding: 2px 7px;"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                        @if($enquiry->user_id != "")
                                                        <span class="btn btn-success btn-sm" style="padding: 2px 8px;">R</span>
                                                        @else
                                                        <span class="btn btn-info btn-sm" style="padding: 2px 8px;">U</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $enquiry->created_at->format('Y-m-d H:i:s') }}</td>
                                                    <td>{{ $enquiry->name }}</td>
                                                    <td>{{ $enquiry->mobilenumber }}</td>
                                                    <td>{{ $enquiry->email }}</td>
                                                    <td>{{ $property->title }}</td>
                                                    <td>{{ $enquiry->status }}</td>
                                                </tr>
                                                <?php $i++; ?>
                                            @endforeach
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

@endsection