@extends('admin.index')
@section('title', ' :: View blog details')
@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <h2>{{ $blog_view->title }}</h2>
            <br>
            @if($blog_view->img_bg)
                <img src="" alt="">
            @endif
            <br>
            {!! $blog_view->short !!}
            <br>
            {!! $blog_view->full !!}
        </div>
        <div class="col-md-12">
            <a href="{{route('admin.blog.dashboard')}}" class="btn btn-default">back</a>
        </div>
    </div>
@endsection