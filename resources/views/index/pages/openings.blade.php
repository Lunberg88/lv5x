@extends('index')
@section('content')
    <section id="home" class="home-2">
        <div class="container">
            @include('index.section.home')
        </div>
    </section>
    <section class="openings_lists">
        <div class="container">
            <div class="row">
                @include('index.partials.opening_single')
            </div>
        </div>
    </section>
@endsection