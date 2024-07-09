@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Types Of Land</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <a href="{{ url('types_of_land/add_type_of_land')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
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
                                            <th>Type</th>
                                            <th>image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($property_type as $property_type)
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="addMore" title="Edit Data">
                                                            <a href="{{url('types_of_land/edit_type_of_land/'.$property_type->id)}}"
                                                                class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$property_type->id}}</td>
                                                <td>{{$property_type->name}}</td>
                                                <td>
                                                    @if($property_type->image != "")
                                                        <img src="{{ asset('images/propertytype/'.$property_type->image)}}"  width="100px;">
                                                    @endif
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