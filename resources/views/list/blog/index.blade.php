@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Blog</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <a href="{{ url('list/blog/add')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
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
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Date</th>
                                            <th>Tags</th>
                                            <th>Category's Name</th>
                                            <th>SEO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="{{url('list/blog/edit/'.$blog->id)}}"
                                                            class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i
                                                                class="fa fa-pencil"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$blog->id}}</td>
                                            <td>{{$blog->title}}</td>
                                            <td>{{$blog->short_description}}</td>
                                            <td>{{$blog->date}}</td>
                                            <td>
                                                @foreach ($blog->blogtags as $blogtag)
                                                    @if ($blogtag->tags)
                                                    {{ $blogtag->tags->name }} ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($blog->blogcategories as $blogcategory)
                                                @if ($blogcategory->categories)
                                                {{ $blogcategory->categories->name }} ,
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Edit Data">
                                                        <a href="{{url('blog/seo/'.$blog->id)}}"
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

@endsection