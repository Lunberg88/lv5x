@extends('admin.index')
@section('title', ' :: View blog details')
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-10">
            {{ $blog_view->title }}
            <br>
            {!! $blog_view->short !!}
            <br>
            {!! $blog_view->full !!}
        </div>
    </div>
@endsection