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
                <div class="col-md-offset-4 col-md-8">
                    {{$news->title}}
                    <br>
                    {{$news->slug}}
                    <br>
                    {{$news->full}}
                </div>
            </div>
        </div>
    </section>
@endsection