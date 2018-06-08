@extends('frontend.index')
@section('title', ' :: Homepage')
@section('og-description', 'Recruiteriia homepage')
@section('body')
<div class="container container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 id="about" class="text-center h1 my-5 section-title">
                <span>about us</span>
            </h2>
        </div>
        <section class="section-about">
            <div class="row">
                <div class="col-md-6">
                    <p class="px-5 mb-5 pb-3 text-center">
                        {!! \App\CoreSettings::where('key', 'homepage_aboutme_text')->pluck('value')->first() !!}
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="card card-cascade narrower mb-r hp-card-form">
                        <form class="hp-form" name="send_message" action="{{route('index.send.msg')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                @if(!Auth::check())
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <div class="md-form">
                                            <input type="text" name="name" id="contact-name" class="form-control">
                                            <label for="contact-name" class="">Your name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <div class="md-form">
                                            <input type="text" name="email" id="contact-email" class="form-control">
                                            <label for="contact-email" class="">Your email</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <textarea type="text" name="message" id="contact-message" rows="10" class="md-textarea"></textarea>
                                        <label for="contact-message">Your message</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="center-on-small-only">
                                        <button class="btn btn-primary waves-effect waves-light">Send
                                            <i class="fa fa-send ml-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-about-graph">
            <h2 id="about" class="text-center h1 my-5 section-title">
                <span class="font-ms">how it works</span>
            </h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="info info-seo font-ms">
                        <div class="icon icon-circle ">
                            <i class="fa fa-volume-control-phone hp-rec-process ico ico-seo"></i>
                        </div>
                        <h4 class="info-title">first interview</h4>
                        <p class="description">Cross-account dashboards provide sophisticated reporting for enterprise.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info info-file font-ms">
                        <div class="icon icon-circle">
                            <i class="fa fa-file-code-o hp-rec-process ico ico-file"></i>
                        </div>
                        <h4 class="info-title">technical test</h4>
                        <p class="description">CloudCheckr provides summary and detailed usage statistics for resources.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info info-skype font-ms">
                        <div class="icon icon-circle">
                            <i class="fa fa-skype hp-rec-process ico ico-skype"></i>
                        </div>
                        <h4 class="info-title">second interview</h4>
                        <p class="description">CloudCheckr enables users to save money, time, and effort.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info info-client font-ms">
                        <div class="icon icon-circle">
                            <i class="fa fa-user-circle hp-rec-process ico ico-client"></i>
                        </div>
                        <h4 class="info-title">client interview</h4>
                        <p class="description">CloudCheckr enables users to save money, time, and effort.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 class="text-center h1 py-5 section-title"><span class="font-ms">new openings</span></h2>
        </div>
        @foreach($openings as $opening)
            <div class="col-12 col-sm-12 col-md-4">
                <div class="card card-cascade narrower mb-r hp-card">
                    <div class="view overlay hm-white-slight">
                        <img src="{{asset('images/openings/'.$opening->img)}}" class="img-fluid hp-img" alt="placeholder image with fruits" width="325" height="180">
                        <a href="{{route('index.show.opening', $opening->slug)}}">
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                    </div>
                    <div class="card-body hp-opening-card">
                        <h7 class="blue-text opening-tags">{{$opening->title}}</h7>
                        <div>
                            <span class="d-block">
                                <small class="float-left">
                                    <i class="fa fa-map-marker"></i> {{$opening->location}} <i class="home--opening--seperator"></i><i class="fa fa-dollar"></i>{{$opening->salary}}
                                </small>
                                <a uid="opening--link" href="{{route('index.show.opening', $opening->slug)}}" class="btn btn-success waves-effect waves-light btn-sm float-right">View</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection