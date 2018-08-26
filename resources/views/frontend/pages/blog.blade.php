@extends('frontend.index')
@section('title', ' :: Notes')
@section('og-description', 'Notes')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <h2 id="about" class="text-center h1 mt-5 section-title">
                    <span>interesting notes</span>
                </h2>
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10">
                <div class="py-5 px-5 about-xs text-justify text-black">
                    @if($notes)
                        <div class="notes--list">
                            @foreach($notes as $note)
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12 ml-xl-12 mb-4">
                                        <h3 class="mb-3 font-weight-bold dark-grey-text">
                                            <strong>{{str_limit($note->title, 40)}}</strong>
                                        </h3>
                                        <div class="grey-text">{!! $note->short !!}</div>
                                        <p><b><i class="fa fa-calendar"></i></b> <small>{{ $frontendService->carbonParseTimestamp($note->created_at)}}</small></p>
                                        <a class="btn btn-primary btn-md waves-effect waves-light">Read more</a>
                                    </div>
                                </div>
                                <hr class="mb-5">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection