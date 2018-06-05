@extends('frontend.index')
@section('title', ' :: Openings')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <section class="section-opening-header">
                            <h4>Openings list</h4>
                        </section>
                    </div>
                </div>
                <div class="row">
                @foreach($openings as $i => $open)
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-4">
                            <div class="view overlay rounded z-depth-2 mb-2">
                                <img class="img-fluid opening-list-img fixed-img" src="{{route('main')}}/images/openings/{{$open->img}}" alt="Card image cap">
                                <a href="{{ route('index.show.opening', $open->slug) }}">
                                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                </a>
                            </div>
                            <h4 class="mb-0 font-weight-bold dark-grey-text">
                                <strong class="opening--title">
                                    {!! str_limit($open->title, 155) !!}
                                </strong>
                            </h4>
                            <span class="btn-sm opening--type" style="display: block;">
                                <span class="
                                {{ $open->type == 1 ? 'badge badge-warning' : 'badge badge-success' }}
                                        ">{{ $open->type == 1 ? 'relocate' : 'remote' }}
                                </span>
                            </span>
                            <p class="mt-2 normal-text">
                                {!! str_limit($open->description, 85) !!}
                            </p>
                            <a href="{{route('index.show.opening', $open->slug)}}" class="btn btn-info btn-sm waves-effect waves-light">view opening</a>
                            <span class="pull-right">
                                <span class="badge indigo">
                                    <a href="https://www.facebook.com/sharer.php?u=https://recuiteriia.com/openings/{{$open->slug}}" target="_blank" class="share-social">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </span>
                                <span class="badge badge-danger">
                                    <a href="https://plus.google.com/share?url=https://recuiteriia.com/openings/{{$open->slug}}" target="_blank" class="share-social">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </span>
                                <span class="badge badge-info">
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=https://recuiteriia.com/openings/{{$open->slug}}&title=Opening&summary=" target="_blank" class="share-social">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </span>
                            </span>
                        </div>
                @endforeach
                </div>
                <div class="row hidden">
                    <div id="get_openings" class="card-deck">

                    </div>
                </div>
            </div>
            <div class="col-md-2 justify-content-center">
                <div class="center-block form-group openings-tools-bar">
                    <h4 class="op-h4 pl-5">type</h4>
                    <hr>
                    <form method="post">
                        {{csrf_field()}}
                    <div class="form-check pl-0">
                        <input class="form-check-input" type="radio" name="type[]" value="0" id="type-1">
                        <label class="form-check-label" for="type-1">
                            remote
                        </label>
                    </div>
                    <div class="form-check mb-4 pl-0">
                        <input class="form-check-input" type="radio" name="type[]" value="1" id="type-2">
                        <label class="form-check-label" for="type-2">
                            relocate
                        </label>
                    </div>
                    <h4 class="op-h4 pl-5">status</h4>
                    <hr>
                    <div class="form-check pl-0">
                        <input class="form-check-input" type="radio" name="status[]" value="0" id="status-1">
                        <label class="form-check-label" for="status-1">
                            closed
                        </label>
                    </div>
                    <div class="form-check mb-3 pl-0">
                        <input class="form-check-input" type="radio" name="status[]" value="1" id="status-2">
                        <label class="form-check-label" for="status-2">
                            active
                        </label>
                    </div>
                    <button type="submit" id="get_openings" class="btn btn-teal waves-effect waves-light pull-right btn-sm">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div align="center" class="opening-pagination">{{$openings->links()}}</div>
            </div>
        </div>
    </div>
@endsection

