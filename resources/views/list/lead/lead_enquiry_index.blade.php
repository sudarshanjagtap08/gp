@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Other Lead List</h5>
        </div>
    </div>
    <div class="row">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    <a href="{{ route('list.other.lead.add') }}" class="btn btn-warning">Add Lead</a>
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
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($otherleads as $otherlead)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Enquiry">
                                                        <a href="{{url('list/other/lead/edit/'.$otherlead->id)}}"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                            class="fa fa-pencil"></i></a>
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Delete Enquiry">
                                                        <a href="{{url('list/other/lead/delete/'.$otherlead->id)}}" class="btn btn-danger btn-sm"
                                                            style="padding: 2px 7px;"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td>{{$otherlead->created_at->format('Y-m-d H:i:s')}}</td>
                                            <td>{{$otherlead->name}}</td>
                                            <td>{{$otherlead->mobilenumber}}</td>
                                            <td>{{$otherlead->email}}</td>
                                            <td>{{$otherlead->comment}}</td>
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

@endsection