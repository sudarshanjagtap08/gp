@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="txt-dark">Country List</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <a data-toggle="modal" data-target="#myModalCountry" class="btn btn-sm btn-success "> <i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="countryTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Country</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($countries as $country)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Country Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaleditcountry"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_Country({{$country->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo"$i"; $i++;?></td>
                                            <td>{{$country->name}}</td>
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
        <div class="col-md-6">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="txt-dark">State List</h5>
                        </div>
                        <div class="col-md-6 text-right">
                        <a data-toggle="modal" data-target="#myModalState" class="btn btn-sm btn-success "> <i
                                class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="stateTable" class="table table-hover display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Country Name</th>
                                            <th>State Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($states as $state)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="#" data-toggle="modal" data-target="#myModaleditstate"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_State({{$state->id}}, '{{$state->country->name}}');">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo "$i"; $i++;?></td>
                                            <td>{{$state->country->name}}</td>
                                            <td>{{$state->name}}</td>
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
        <div class="col-md-6">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="txt-dark">District List</h5>
                        </div>
                        <div class="col-md-6 text-right">
                        <a data-toggle="modal" data-target="#myModalDist" class="btn btn-sm btn-success "> <i
                                class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="cityTable" class="table table-hover display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>State Name</th>
                                            <th>Dist Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($districts as $dist)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="#" data-toggle="modal" data-target="#myModaleditdist"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_Dist({{$dist->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$dist->state->name}}</td>
                                            <td>{{$dist->name}}</td>
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
        <div class="col-md-6">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="txt-dark">City List</h5>
                        </div>
                        <div class="col-md-6 text-right">
                        <a data-toggle="modal" data-target="#myModalCity" class="btn btn-sm btn-success "> <i
                                class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="distTable" class="table table-hover display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>District Name</th>
                                            <th>City Name</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($cities as $city)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="#" data-toggle="modal" data-target="#myModaleditcity"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_City({{$city->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ optional($city->dist)->name }}</td>
                                            <td>{{$city->name}}</td>
                                            <td><img src="{{ asset('images/city/'.$city->image) }}" alt="" width="50px"> </td>
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
        <div class="col-md-6">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="txt-dark">Area List</h5>
                        </div>
                        <div class="col-md-6 text-right">
                        <a data-toggle="modal" data-target="#myModalArea" class="btn btn-sm btn-success "> <i
                                class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="areaTable" class="table table-hover display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>City Name</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($areas as $area)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="#" data-toggle="modal" data-target="#myModaleditarea"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_Area({{$area->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ optional($area->city)->name }}</td>
                                            <td>{{$area->name}}</td>
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
<div id="myModalCountry" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add Country </h5>
            </div>
            <form action="{{ route('country.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModaleditcountry" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Country Name</h5>
            </div>
            <form action="{{url('country/update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="countryId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModalState" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add State </h5>
            </div>
            <form action="{{ route('state.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Country Name:</label>
                                <select class="form-control" id="country_id" name="country_id">
                                    <option value="">Not Selected</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModaleditstate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit State </h5>
            </div>
            <form action="{{ route('states.update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="stateId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country_name">Country Name:</label>
                                <select class="form-control" id="country_name" name="country_name">
                                    <option value="">Not Selected</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->name}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="state_name">State Name:</label>
                                <input type="text" class="form-control" id="state_name" name="state_name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModalDist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add Dist </h5>
            </div>
            <form action="{{ route('dist.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">State Name:</label>
                                <select class="form-control" id="state_id" name="state_id">
                                    <option value="">Not Selected</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModaleditdist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Dist</h5>
            </div>
            <form action="{{ route('dist.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="distId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">State Name:</label>
                                <select class="form-control" id="state_id" name="state_id">
                                    <option value="">Not Selected</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="dist_name" name="dist_name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModalCity" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add City </h5>
            </div>
            <form action="{{ route('city.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Dist Name:</label>
                                <select class="form-control" id="state_id" name="state_id">
                                    <option value="">Not Selected</option>
                                    @foreach($districts as $dist)
                                    <option value="{{$dist->id}}">{{$dist->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModaleditcity" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit City</h5>
            </div>
            <form action="{{ route('city.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="cityId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Dist Name:</label>
                                <select class="form-control" id="dist_id" name="dist_id">
                                    <option value="">Not Selected</option>
                                    @foreach($districts as $districts)
                                    <option value="{{$districts->id}}">{{$districts->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="city_name" name="city_name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <img src="" width="100px" alt="City Image">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModalArea" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add Area </h5>
            </div>
            <form action="{{ route('area.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">City Name:</label>
                                <select class="form-control" id="city_id" name="city_id">
                                    <option value="">Not Selected</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModaleditarea" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Area</h5>
            </div>
            <form action="{{ route('area.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="areaId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">City Name:</label>
                                <select class="form-control" id="city_id" name="city_id">
                                    <option value="">Not Selected</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="area_name" name="area_name" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
function Edit_Country(countryId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('countries.edit') }}",
        method: "POST",
        data: {
            'id': countryId,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            $('#myModaleditcountry').find('input[name="name"]').val(data.name);
            $('#countryId').val(data.id);
            $('#myModaleditcountry').modal('show');
        }
    });
    return false;
}
</script>
<script type="text/javascript">
function Edit_State(stateId, countryName) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('states.edit') }}",
        method: "POST",
        data: {
            'id': stateId,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            $('#myModaleditstate').find('input[name="state_name"]').val(data.name);
            $('#myModaleditstate').find('select[name="country_name"]').val(countryName);
            $('#stateId').val(data.id);
            $('#myModaleditstate').modal('show');
        }
    });
    return false;
}
</script>
<script type="text/javascript">
function Edit_Dist(distId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('district.edit') }}",
        method: "POST",
        data: {
            'id': distId,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data) 
        {
            $('#myModaleditdist').find('select[name="state_id"]').val(data.state_id);
            $('#myModaleditdist').find('input[name="dist_name"]').val(data.name);
            $('#distId').val(data.id);
            $('#myModaleditdist').modal('show');
        }
    });
    return false;
}
</script>
<script type="text/javascript">
function Edit_City(cityId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('cities.edit') }}",
        method: "POST",
        data: {
            'id': cityId,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data) 
        {
            $('#myModaleditcity').find('select[name="dist_id"]').val(data.dist_id);
            $('#myModaleditcity').find('input[name="city_name"]').val(data.name);
            $('#cityId').val(data.id);
             // Display the image in the modal
            var imagePath = "{{ asset('images/city/') }}/" + data.image;
            $('#myModaleditcity').find('img').attr('src', imagePath);
            $('#myModaleditcity').modal('show');
        }
    });
    return false;
}
</script>

<script type="text/javascript">
function Edit_Area(areaId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('area.edit') }}",
        method: "POST",
        data: {
            'id': areaId,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data) 
        {
            $('#myModaleditarea').find('select[name="city_id"]').val(data.city_id);
            $('#myModaleditarea').find('input[name="area_name"]').val(data.name);
            $('#areaId').val(data.id);
            $('#myModaleditarea').modal('show');
        }
    });
    return false;
}
</script>


@endsection