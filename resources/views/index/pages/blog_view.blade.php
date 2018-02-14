@extends('index')
@section('content')
    <section id="home" class="home-2">
        <div class="container">
            @include('index.section.home')
        </div>
    </section>
    <section class="blogs_lists">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2>{{$news->title}}</h2>
                    <br>
                    {{$news->slug}}
                    <br>
                    {!! $news->short !!}
                    <br>
                    {!! $news->full !!}
                </div>
            </div>
        </div>
    </section>
@endsection