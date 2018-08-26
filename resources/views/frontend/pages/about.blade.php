@extends('frontend.index')
@section('title', ' :: About us')
@section('og-description', 'About us')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <h2 id="about" class="text-center h1 mt-5 section-title">
                    <span>about us</span>
                </h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="py-5 px-5 about-xs text-justify text-black">
                    {!! \App\CoreSettings::where('key', 'homepage_aboutme_text')->pluck('value')->first() !!}
                </div>
            </div>
        </div>
    </div>
@endsection