@extends('index')
@section('content')
<section id="home" class="home-2">
    <div class="container">
        @include('index.section.home')
    </div>
</section>
<section id="about" class="section">
    <div class="container">
        <div class="row">
            @include('index.section.about')
        </div>
    </div>
</section>
<section id="news" class="section bg-lightgray">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h2>The New Openings</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed ation Lorem ipsum
                        <br>dolor sit amet.Veniam quis notru exercit.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @include('index.section.openings_main')
        </div>
    </div>
</section>
<section id="contact" class="section">
    <div class="container">
        @include('index.section.contact')
    </div>
</section>
@endsection