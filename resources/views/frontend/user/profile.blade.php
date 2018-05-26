@extends('frontend.index')
@section('title', ' :: '.Auth::user()->name.' - Profile')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="my-5 pt-5 pb-2 border-bottom">
                    <i class="fa fa-user"></i> {{Auth::user()->name}} :: Profile
                    <br>
                    <i class="fa fa-envelope"></i> {{Auth::user()->email}}
                </div>
                <div class="mt-3 py-2 pl-0 border-bottom">
                    <span class="text-info">My Favourites Openings</span>
                </div>
                <div class="my-1 py-3">
                    @foreach(Auth::user()->userfavs as $favs)
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="{{route('main')}}/images/openings/{{$favs->img}}" style="width: 64px; height: 64px;" class="mr-3">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">
                                        <a href="{{route('index.show.opening', $favs->id)}}">{{$favs->title}}</a>
                                    </h5>
                                    {!! str_limit($favs->description, 150) !!}
                                    <span class="d-block float-right">
                                        <small class="text-secondary"><i class="fa fa-map-marker"></i> Location: <b>{{$favs->location}}</b> / {!! $favs->type == 0 ? '<span class="badge badge-warning">Remote</span>' : '<span class="badge badge-success">Relocate</span>' !!} / {!! $favs->salary === null ? '' : 'Salary: <b>'.$favs->salary.'</b> $' !!} {{$favs->rate == 0 ? '' : 'Rate: <b>'.$favs->rate.'</b> $'}}</small>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection