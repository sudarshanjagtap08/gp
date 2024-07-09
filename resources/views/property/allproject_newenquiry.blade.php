@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Property Enquiry Without Login</h5>
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
                                            <th>Sr. No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Property Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($propertynewenquiry as $propertynewenquiry)
                                        <tr>
                                            <td>{{ $propertynewenquiry->id }}</td>
                                            <td>{{ $propertynewenquiry->name }}</td>
                                            <td>{{ $propertynewenquiry->email }}</td>
                                            <td>{{ $propertynewenquiry->mobilenumber }}</td>
                                            <td>{{ $propertynewenquiry->properties->title }}</td>
                                            <td>{{ $propertynewenquiry->status }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="{{url('list/project/enquiry/edit/'.$propertynewenquiry->id)}}"
                                                        class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                        class="fa fa-pencil"></i></a>
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

@endsection