@extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row">
                @if($showgroup)
                    @foreach($showgroup as $group)
                <div class="col-md-6">
                    {{$group->title}}
                </div>
                <div class="col-md-6">
                    {{$group->about}}
                </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endsection