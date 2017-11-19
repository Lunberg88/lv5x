@extends('admin.index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <div class="select-tags">
                    <a href="/admin/search?search=PHP" class="op-tags">PHP</a> <a href="/admin/search?search=JS" class="op-tags">JS</a>
                    <a href="/admin/search?search=HTML" class="op-tags">HTML</a> <a href="/admin/search?search=ReactJS" class="op-tags">ReactJS</a>
                </div>
            </div>
            <div class="col-xs-8">
                @foreach($openings as $open)
                    <div class="opening_box">
                        <ul class="controls">
                            <li><button class="btn btn-success">Edit</button></li>
                            <li><button class="btn btn-danger">Delete</button></li>
                        </ul>
                        <div class="opening-title">{{$open->title}}</div>
                        <div class="opening-body">{{$open->description}}</div>
                        <div class="opening-location">{{$open->location}}</div>
                        <div class="opening-salary">{{$open->salary}}</div>
                        <div class="opening-status">
                            @if($open->status == 1)
                                <span class="op-active">open</span>
                            @else
                                <span class="op-disabled">closed</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection