@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Subscribe List</h5>
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
                                            <th>City</th>
                                            <th>Url</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach($subscribe as $subscribe)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Enquiry">
                                                        <a href="{{url('list/subscribe/edit/'.$subscribe->id)}}"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                            class="fa fa-pencil"></i></a>
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Delete Enquiry">
                                                        <a href="{{url('/list/subscribe/delete/'.$subscribe->id)}}" class="btn btn-danger btn-sm"
                                                            style="padding: 2px 7px;"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo"$i"; $i++;?></td>
                                            <td>{{$subscribe->created_at->format('Y-m-d H:i:s')}}</td>
                                            <td>{{$subscribe->name}}</td>
                                            <td>{{$subscribe->mobilenumber}}</td>
                                            <td>{{$subscribe->email}}</td>
                                            <td>{{$subscribe->city}}</td>
                                            <td>{{$subscribe->url}}</td>
                                            <td>{{$subscribe->status}}</td>
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