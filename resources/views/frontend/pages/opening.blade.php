@extends('frontend.main')
@section('title', '::'.$opening->title)
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-info">
                <div class="panel-heading">{!! $opening->title !!}</div>
                <div class="panel-body">{!! $opening->description !!}</div>
            </div>
        </div>
    </div>
@endsection