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
                    <div class="card card-product" data-count="5">
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
                            <div class="card-description">
                                {!! str_limit($open->description, 25) !!}
                            </div>
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
                {{--<div class="modal fade" id="applied-opening-id-{{$open->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Applied</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group bmd-form-group">
                                                    @foreach(\App\Traits\CandidatesHelper::showAppliedOpenings($open->id, 1) as $candidates)
                                                       <div>
                                                           {{$candidates->fio}} / {{$candidates->email}} /
                                                           <span class="label label-default">{{\App\Traits\CandidatesHelper::convertTypes($candidates->stack, 'stack')}}</span>
                                                           <span class="applied--box__actions">
                                                               <a class="label label-success btn-small">Approve</a>
                                                               <a class="label label-warning btn-small">Reject</a>
                                                           </span>
                                                       </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="label label-danger" data-dismiss="modal">
                                        <span class="modal--msg__btn">Close X</span>
                                        <div class="ripple-container">
                                            <div class="ripple-decorator ripple-on ripple-out" style="left: 29.5781px; top: 24px; background-color: rgb(244, 67, 54); transform: scale(8.50976);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>--}}
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

