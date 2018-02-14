@extends('index')
@section('content')
    <section id="home" class="home-2">
        <div class="container">
            @include('index.section.home')
        </div>
    </section>
    <section class="openings_lists">
        <div class="container">
            @include('index.partials.opening_single')
            <div class="row">
                <div class="col-md-12">
                    <div align="center">{{$openings->links()}}</div>
                </div>
            </div>
        </div>
    </section>
@endsection