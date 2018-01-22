@extends('index')
@section('content')
    <section id="home" class="home-2">
        <div class="container">
            @include('index.section.home')
        </div>
    </section>
    <section class="my-favourites">
        <div align="center">
            <h3>My Favourites Openings...</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(isset($myfavs) && $myfavs !== null)
                        @foreach($myfavs as $fav)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">{{$fav->title}}</div>
                                        <div class="panel-body">{{$fav->description}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="panel panel default">Empty...</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection