@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Primium List Features</h5>
        </div>
    </div>
    <div class="row">
        
        <div class="col-sm-3">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">                    
                    <div class="panel-body">
                        <h5 class="txt-dark">Exclusive Project</h5>
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
                                            <th>Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exclusive_project as $exclusive_project)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Country Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaleditproperty"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_ExclusiveProperty({{$exclusive_project->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$exclusive_project->id}}</td>
                                            <td>{{$exclusive_project->property->title}}</td>
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
        
        <div class="col-sm-9">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <h5 class="txt-dark">All View</h5>
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="areaTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Title</th>
                                            <th>Property Category Name</th>
                                            <th>Property Localities Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($property as $property)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="{{url('properties/view/edit/'.$property->id)}}"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                                class="fa fa-pencil"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo"$i"; $i++; ?></td>
                                            <td>{{ $property->title}}</td>
                                            <td>
                                                @foreach ($property->property_categoryids as $propertyCategory)
                                                    {{ $propertyCategory->property_categories->name }},
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($property->emerging_localities == "1")
                                                    Emerging Localities,
                                                @endif
                                                @if($property->top_localities == "1")
                                                    Top Localities
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
<div id="myModaleditproperty" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Exclusive Project</h5>
            </div>
            <form action="{{ route('exclusive_project.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id" id="exclusiveId">
                            <label for="property_name">Property Name:</label>
                            <select class="form-control" id="property_name" name="property_name">
                                <option value="">Not Selected</option>
                                @foreach($allproperty as $prop)
                                    <option value="{{ $prop->id }}">{{ $prop->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Edit_ExclusiveProperty(exclusive_propertyId) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('exclusive_project.edit') }}",
            method: "POST",
            data: {
                'id': exclusive_propertyId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                $('#myModaleditproperty').find('select[name="property_name"]').val(data.property_id);
                $('#exclusiveId').val(data.id);
                $('#myModaleditproperty').modal('show');
            }
        });

        return false;
    }
</script>
@endsection