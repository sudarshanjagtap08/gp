@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Blog Comment</h5>
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
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Sr. No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($blogcomment as $blogcomment)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModaleditBlogcomment"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"
                                                            onclick="Edit_BlogComment({{$blogcomment->id}});">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $i; $i++; ?></td>
                                            <td>{{$blogcomment->name}}</td>
                                            <td>{{$blogcomment->email}}</td>
                                            <td>{{$blogcomment->mobilenumber}}</td>
                                            <td>{{$blogcomment->comment}}</td>
                                            @if($blogcomment->status == 1)
                                            <td><span class="btn btn-success btn-sm">Active</span></td>
                                            @elseif($blogcomment->status == 2)
                                            <td><span class="btn btn-danger btn-sm">InActive</span></td>
                                            @else
                                            @endif
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
<div id="myModaleditBlogcomment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Edit Blog Comment</h5>
            </div>
            <form action="{{url('blogcomment/update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="blogcommentId">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input id="name" name="name" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Email</label>
                                <input id="email" name="email" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input id="mobilenumber" name="mobilenumber" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="2">InActive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Comments</label>
                                <textarea id="comment" name="comment" class="form-control"></textarea>
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
    function Edit_BlogComment(blogcommentId) { 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('blog_comment.edit') }}",
            method: "POST",
            data: {
                'id': blogcommentId,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#myModaleditBlogcomment').find('input[name="name"]').val(data.name);
                $('#myModaleditBlogcomment').find('input[name="email"]').val(data.email);
                $('#myModaleditBlogcomment').find('input[name="mobilenumber"]').val(data.mobilenumber);
                $('#myModaleditBlogcomment').find('textarea[name="comment"]').val(data.comment); // Fix here
                $('#myModaleditBlogcomment').find('textarea[name="status"]').val(data.status);
                $('#blogcommentId').val(data.id);
                $('#myModaleditBlogcomment').modal('show');
            }
        });
        return false;
    }
</script>

@endsection