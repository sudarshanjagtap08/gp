@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Property</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <a href="{{ url('properties/add_properties')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                    <div class="panel-body">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="areaTable" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Area</th>
                                            <th>Address</th>
                                            <th>Property Category Name</th>
                                            <th>Status</th>
                                            <th>SEO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($property as $property)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="{{url('properties/edit/'.$property->id)}}"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                                class="fa fa-pencil"></i></a>
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="addMore" title="View property">
                                                        <a href="javascript:void(0)" class="btn btn-success btn-sm" style="padding: 2px 6px;" onclick="openInNewTab('property/{{ $property->slug }}')">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo"$i"; $i++; ?></td>
                                            <td>{{ $property->title}}</td>
                                            <td>{{ $property->price}}</td>
                                            <td>{{ $property->area}}</td>
                                            <td>{{ $property->short_address}}</td>
                                            <td>
                                                @foreach ($property->property_categoryids as $propertyCategory)
                                                    {{ $propertyCategory->property_categories->name }},
                                                @endforeach
                                            </td>
                                            <td>
                                                <!--<div onclick="togglePropertyStatus()">-->
                                                <!--    <input id="statusCheckbox_" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" >-->
                                                <!--</div>-->
                                                <div onclick="togglePropertyStatus({{ $property->id }})">
                                                    <input id="statusCheckbox_{{$property->id}}" type="checkbox" {{ $property->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success" data-offstyle="danger" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="{{url('properties/seo/'.$property->id)}}"
                                                            class="btn btn-success btn-sm" style="padding: 2px 7px;">SEO <i
                                                                class="fa fa-share"></i></a>
                                                    </div>
                                                </div>
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

<script type="text/javascript">
    function togglePropertyStatus(propertyId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/update-property-status',
            method: 'POST',
            data: { propertyId: propertyId },
            success: function(response) {
                if (response.success) {
                    $('#statusCheckbox_' + propertyId).prop('checked', !$('#statusCheckbox_' + propertyId).prop('checked'));
                } else {
                    alert('Failed to update property status');
                }
            },
            error: function() {
                alert('Failed to communicate with the server');
            }
        });
    }
</script>
<script>
        function openInNewTab(url) {
            const newTab = window.open(url, '_blank');
            newTab.focus();
        }
    </script>
@endsection
