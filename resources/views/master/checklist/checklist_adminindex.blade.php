@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">{{$title}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="cityTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Area</th>
                                            <th>Address</th>
                                            <th>Property Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($property as $property)
                                        <tr>
                                            <td><?php echo "$i"; $i++;?></td>
                                            <td>{{$property->property->title}}</td>
                                            <td>{{$property->property->price}}</td>
                                            <td>{{ $property->property->area}}</td>
                                            <td>{{ $property->property->short_address}}</td>
                                            <td>{{$property->property->property_type->name}}</td>
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