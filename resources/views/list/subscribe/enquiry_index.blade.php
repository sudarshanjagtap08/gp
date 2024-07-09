@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Popup Enquiry List</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Size</th>
                                            <th>Budget</th>
                                            <th>Area</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach($enquiry as $enquiry)
                                        <tr>
                                            <td><?php echo"$i"; $i++;?></td>
                                            <td>{{$enquiry->name}}</td>
                                            <td>{{$enquiry->mobilenumber}}</td>
                                            <td>{{$enquiry->email}}</td>
                                            <td>{{$enquiry->city}}</td>
                                            <td>{{$enquiry->size}}</td>
                                            <td>{{$enquiry->budget}}</td>
                                            <td>{{$enquiry->area}}</td>
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