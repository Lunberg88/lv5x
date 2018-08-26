@extends('admin.index')
@section('content')
        <div class="row">
            <div class="col-md-8">
                <form action="{{route('admin.blog.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="blog_title" class="col-md-2 control-label">Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" placeholder="News title">
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse&hellip; <input type="file" name="img" style="display: none;" multiple>
                        </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="blog_short" class="col-md-2 control-label">Short story</label>
                        <div class="col-md-10">
                            <textarea cols="8" rows="7" class="form-control blog-field" name="short" placeholder="News short story"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="blog_full" class="col-md-2 control-label">Full story</label>
                        <div class="col-md-10">
                            <textarea cols="8" rows="7" class="form-control blog-field" name="full" placeholder="News full story"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{route('admin.blog.dashboard')}}" class="btn btn-default pull-left">Back</a>
                        <button class="col-md-offset-4 col-md-4 btn btn-primary">Create News</button>
                    </div>
                </form>
            </div>
        </div>
@endsection