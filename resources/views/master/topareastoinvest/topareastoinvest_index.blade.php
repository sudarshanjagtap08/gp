@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Top Areas To Invest</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <a data-toggle="modal" data-target="#myModalTopArea" class="btn btn-sm btn-success "> <i
                            class="fa fa-plus"></i></a>
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
                                            <th>Name</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($toparea as $toparea)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Country Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaledittoparea"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_TopArea({{$toparea->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $i; $i++; ?></td>
                                            <td>{{$toparea->name}}</td>
                                            <td>{{$toparea->link}}</td>
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
<div id="myModalTopArea" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Add TopArea</h5>
            </div>
            <form action="{{url('topareastoinvest/save')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Link</label>
                                <input id="link" name="link" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="myModaledittoparea" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit TopArea</h5>
            </div>
            <form action="{{url('topareastoinvest/update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="topareaId">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Name:</label>
                                <input id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Link</label>
                                <input id="link" name="link" class="form-control">
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
    function Edit_TopArea(topareaId) { 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('topareastoinvest.edit') }}",
            method: "POST",
            data: {
                'id': topareaId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#myModaledittoparea').find('input[name="name"]').val(data.name);
                $('#myModaledittoparea').find('input[name="link"]').val(data.link);
                $('#topareaId').val(data.id);
                $('#myModaledittoparea').modal('show');
            }
        });
        return false;
    }
</script>

@endsection