@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Property Wise Details</h5>
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
                                            <th>Property Name</th>
                                            <th>Shortlisted Propertywise User Count</th>
                                            <th>Seen Propertywise User Count</th>
                                            <th>Contacted Propertywise User Count</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <?php $i=1;?>
                                        @foreach($properties as $property)
                                            <tr>
                                                <td><?php echo $i; $i++?></td>
                                                <td>{{ $property->title }}</td>
                                                <td><a href="{{ url('list/propertywise/shortlistedproperty/'.$property->id.'/'.$property->title) }}" class="label label-success">{{$property->shortlistedCount}}</a></td>
                                                <td><a href="{{ url('list/propertywise/seenproperty/'.$property->id.'/'.$property->title) }}" class="label label-danger">{{$property->propertyseenCount}}</a></td>
                                                <td><a href="{{ url('list/propertywise/enquiryproperty/'.$property->id.'/'.$property->title) }}" class="label label-primary">{{$property->propertyenquiryCount}}</a></td>
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