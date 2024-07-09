@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All LandingPages</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <a href="{{ url('list/landingpage/add')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                    <div class="panel-body">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Landing Page Title</th>
                                            <th>Landing Page Template</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($landingpage as $landingpage)
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="addMore" title="Edit Landing Data">
                                                            <a href="{{url('list/landingpage/'.$landingpage->id)}}"
                                                                class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$landingpage->id}}</td>
                                                <td>{{$landingpage->landing_page_title}}</td>
                                                <td>{{$landingpage->landing_page_template}}</td>
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