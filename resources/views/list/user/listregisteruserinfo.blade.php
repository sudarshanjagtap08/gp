@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Register Information</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="countryTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Register As</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <?php $i=1;?>
                                        @foreach($registeruserinfos as $registeruserinfo)
                                            <tr>
                                                <td><?php echo $i; $i++?></td>
                                                <td>{{ $registeruserinfo->name }}</td>
                                                <td>{{ $registeruserinfo->email }}</td>
                                                <td>{{ $registeruserinfo->mobilenumber }}</td>
                                                <td>{{ $registeruserinfo->registeras }}</td>
                                                <td>{{ $registeruserinfo->remark }}</td>
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