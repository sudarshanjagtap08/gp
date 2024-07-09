@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Add Other Lead</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default card-view">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-wrap">
                                                        <form action="{{ route('list.other.lead.save') }}" method="POST">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="txt-dark capitalize-font"><i
                                                                                class="zmdi zmdi-account mr-10"></i>Add Lead</h6>
                                                                        <hr class="light-grey-hr" />
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Name</label>
                                                                                <input type="text" name="name" class="form-control"  >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Phone</label>
                                                                                <input type="number" name="mobilenumber" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Email</label>
                                                                                <input type="email" name="email" class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10">Comment</label>
                                                                                <textarea type="comment" name="comment" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-actions mt-10">
                                                                            <button type="submit" class="btn btn-success  mr-10">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection