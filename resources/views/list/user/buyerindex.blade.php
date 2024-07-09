@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Buyer  List</h5>
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
                                            <th>Shortlisted Property Count</th>
                                            <th>Seen Property Count</th>
                                            <th>Contacted Property Count</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <?php $i=1;?>
                                        @foreach($buyers as $buyer)
                                            <tr>
                                                <td><?php echo $i; $i++?></td>
                                                <td>{{$buyer->name}}</td>
                                                <td><a href="{{ url('list/shortlistedproperty/'.$buyer->id.'/'.$buyer->name) }}" class="label label-success">{{$buyer->shortlistedCount}}</a></td>
                                                <td><a href="{{ url('list/seenproperty/'.$buyer->id.'/'.$buyer->name) }}" class="label label-danger">{{$buyer->propertyseenCount}}</a></td>
                                                <td><a href="{{ url('list/enquiryproperty/'.$buyer->id.'/'.$buyer->name) }}" class="label label-primary">{{$buyer->propertyenquiryCount}}</a></td>
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