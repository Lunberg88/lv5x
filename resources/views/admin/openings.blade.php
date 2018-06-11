@extends('admin.index')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <div class="card-inline-box"><i class="material-icons">library_books</i></div>
                        <div class="card-inline-box"><h4 class="card-title">The list of all available openings</h4></div>
                    </div>
                    <div class="card-content">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($openings as $i => $open)
                <div class="col-md-4">
                    <div class="card card-product">
                        <div class="card-image" data-header-animation="true">
                            @if($open->img !== null)
                                <a href="#">
                                    <img class="img" src="{{route('main')}}/images/openings/{{$open->img}}" width="320">
                                </a>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="card-actions">
                                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>
                                <a type="button" class="btn btn-default btn-simple" href="{{route('admin.openings.show.id', $open->id)}}">
                                    <i class="material-icons">art_track</i>
                                </a>
                                <a type="button" href="{{route('admin.openings.edit.id', $open->id)}}" class="btn btn-success btn-simple">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-simple"
                                        onclick="event.preventDefault();
                                            demo.showSwal('warning-message-and-cancel')
                                            //document.getElementById('delete').submit();
                                    ">
                                    <i class="material-icons">close</i>
                                </button>
                                <form id="delete" action="{{route('admin.openings.destroy', $open->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </div>
                            <h4 class="card-title">
                                <a href="{{route('admin.openings.show.id', $open->id)}}">{{ str_limit($open->title, 15)}}</a>
                            </h4>
                            {{--
                            <div class="card-description">
                                {!! str_limit($open->description, 25) !!}
                            </div>
                            --}}
                            <div class="pull-right">
                                @if($open->status == 1)
                                    <span class="label label-success">open</span>
                                @else
                                    <span class="label label-danger">closed</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="price">
                                <h4>${{$open->salary}}</h4>
                            </div>
                            <div class="stats pull-right">
                                <p class="category"><i class="material-icons">place</i> {{$open->location}}</p>
                            </div>
                        </div>
                        @php if(count(\App\Traits\CandidatesHelper::showAppliedOpenings($open->id)) > 0) { echo '<div class="label label-warning applied__openings">applied: '.count(\App\Traits\CandidatesHelper::showAppliedOpenings($open->id)).'</div>'; } @endphp
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
                <div align="center">
                    {{$openings->links()}}
                </div>
            </div>
        </div>
@endsection

