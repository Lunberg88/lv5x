@extends('frontend.index')
@section('title', '::'.$opening->title)
@section('og-description', $opening->title)
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div class="my-5 mb-5 mx-auto p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="pb-5 mt-0">
                                <a href="{{route('index.openings')}}" class="btn btn-outline-default btn-sm">
                                    <i class="fa fa-arrow-left"></i>
                                    back to openings
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="view overlay rounded z-depth-2 mb-2">
                                <img class="img-fluid opening-list-img fixed-img" src="{{route('main')}}/images/openings/{{$opening->img}}" alt="Card image cap">
                                <a data-target="#opening-{{ $opening->id }}" data-toggle="modal">
                                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <h4 class="mb-3 font-weight-bold dark-grey-text">
                                <strong>
                                    {!! $opening->title !!}
                                </strong>
                            </h4>
                            <span class="opening-list-date">
                                {{ (explode(' ', $opening->created_at))[0] }}
                            </span>
                            <span class="opening-list-status pull-right">
                                <h5>
                                    <label class="badge badge-{{ $opening->status == 1 ? 'success' : 'danger' }} badge-small">
                                        {{ $opening->status == 1 ? 'active' : 'closed' }}
                                    </label>
                                </h5>
                            </span>
                            <span class="btn-sm" style="display: block; padding-top: 10px;">
                                <span class="
                                {{ $opening->type == 1 ? 'badge badge-warning' : 'badge badge-success' }}
                                        ">{{ $opening->type == 1 ? 'relocate' : 'remote' }}
                                </span>
                            </span>
                            <p class="normal-text text-justify py-2">
                                {!! $opening->description !!}
                            </p>
                            <div class="my-3 py-2 w-100">
                                <span class="d-block float-left">
                                   <i class="fa fa-map-marker"></i> Location: <b>{!! $opening->location !!}</b>
                                </span>
                                <span class="d-block float-right">
                                    {!! $opening->salary !== null ? 'Salary: <b>'.$opening->salary.'$</b>' : '' !!} {!! $opening->rate != 0 ?  'Rate: <b>'.$opening->rate.'$</b>' : '' !!}
                                </span>
                            </div>
                            <div class="mt-4 pt-3 w-100">
                                <span class="d-block float-right">
                                    <span class="badge indigo">
                                    <a href="https://www.facebook.com/sharer.php?u=https://recuiteriia.com/openings/{{$opening->slug}}" target="_blank" class="share-social">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </span>
                                <span class="badge badge-danger">
                                    <a href="https://plus.google.com/share?url=https://recuiteriia.com/openings/{{$opening->slug}}" target="_blank" class="share-social">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </span>
                                <span class="badge badge-info">
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=https://recuiteriia.com/openings/{{$opening->slug}}&title=Opening&summary=" target="_blank" class="share-social">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn {{$applied->isEmpty() ? "btn-warning" : "btn-success" }} waves-effect btn-sm pull-left" uid="op-{{ $opening->id }}" id="{{ $opening->id }}" onclick="@php if(Auth::check() === true) { echo 'applyNow(this);'; } else { echo 'showRegisterForm();'; } @endphp">
                                {{$applied->isEmpty() ? "apply now" : "applied" }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="related--openings pt-4">
                    <span class="d-block">
                        <h3>Related openings</h3>
                    </span>
                    <div class="opening--box d-none d-lg-block">
                        @php
                            $related = App\Openings::where('status', '>', '0')->latest()->take(5)->get();
                        @endphp
                        @foreach($related as $open)
                            <div class="pb-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="view overlay rounded z-depth-1">
                                            <div style="background: url({{route('main')}}/images/openings/{{$open->img}}) no-repeat; width: 120px; height: 80px; background-position: center; background-size: cover"></div>
                                            <a href="{{route('index.show.opening', $open->slug)}}">
                                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="d-block">
                                            <a href="{{route('index.show.opening', $open->slug)}}">{{ $open->title }}</a>
                                        </span>
                                        <span class="d-block">
                                            <small>
                                                <span class="badge badge-{{$open->type === 1 ? 'success' : 'warning'}}">{{$open->type === 1 ? 'remote' : 'relocate'}}</span>
                                            </small>
                                        </span>
                                        <span class="d-block">
                                            <small>
                                                <b>&dollar;</b> {{$open->salary}}
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
