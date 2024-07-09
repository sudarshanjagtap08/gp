@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Add Types Of Land</h5>
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
                        <div class="form-wrap">
                            <form action="{{ url('/types_of_land/save_type_of_land')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Add
                                        Type Of Land</h6>
                                    <hr class="light-grey-hr" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="">
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Select Images:</label>
                                                        <input type="file" name="image" id="name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions mt-10">
                                    <button type="submit" class="btn btn-success  mr-10"> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection