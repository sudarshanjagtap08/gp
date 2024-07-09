@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Edit Properties View</h5>
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
                                            <form action="{{ url('properties/view/update/'.$property->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Property Category</h6>
                                                    <hr class="light-grey-hr" />
                                                        <div class="form-group">
                                                            @foreach($propertycategory as $category)
                                                                <div class="checkbox checkbox-success checkbox-circle">
                                                                    <input type="checkbox" id="category_{{ $category->id }}" name="propertycategory_id[]" value="{{ $category->id }}"
                                                                        @if (in_array($category->id, $property->property_categoryids->pluck('property_category_id')->toArray())) checked @endif >
                                                                    <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Localities Details</h6>
                                                    <hr class="light-grey-hr" />
                                                        <div class="form-group">
                                                            <input type="checkbox" id="top_localities" name="top_localities" 
                                                                        {{ $property->top_localities ? 'checked' : '' }} />
                                                                    <label>Top Localities</label><br>
                                                                    <input type="checkbox" id="emerging_localities"
                                                                        name="emerging_localities" 
                                                                        {{ $property->emerging_localities ? 'checked' : '' }} />
                                                                    <label>Emerging Localities</label><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions mt-10">
                                                    <button type="submit" class="btn btn-success  mr-10"> Update</button>
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
@endsection