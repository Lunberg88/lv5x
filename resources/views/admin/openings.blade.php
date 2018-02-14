@extends('admin.index')
@section('content')
        <div class="row">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        @foreach($openings as $i => $open)
        @if($i++%4 == 0)
            <div class="row">
        @endif
            <div class="col-md-3">
                        <div class="card card-product" data-count="5">
                            <div class="card-image" data-header-animation="true">
                                @if($open->img !== null)
                                    <a href="#pablo">
                                        <img class="img" src="{{route('main')}}/images/{{$open->img}}" width="320">
                                    </a>
                                @endif
                            </div>
                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>
                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="material-icons">art_track</i>
                                    </button>
                                    <a type="button" href="{{route('admin.openings.edit.id', $open->id)}}" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <!--
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="material-icons">close</i>
                                    </button>
                                    -->
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.openings.destroy', $open->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-simple',
                                    'rel' => 'tooltip', 'data-placement' => 'bottom',
                                    'data-riginal-title' => 'Remove',
                                    'onClick' => 'demo.showSwal("warning-message-and-cancel");']) !!}
                                    <i class="material-icons">close</i>
                                    {!! Form::close() !!}
                                </div>
                                <h4 class="card-title">
                                    <a href="#pablo">{{$open->title}}</a>
                                </h4>
                                <div class="card-description">
                                    {{$open->description}}
                                </div>
                                <div class="pull-right">
                                    @if($open->status == 1)
                                        <span class="op-active">open</span>
                                    @else
                                        <span class="op-disabled">closed</span>
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
                        </div>
                    </div>
               {{-- @foreach($openings as $open)
                    <div class="opening_box">
                        <ul class="controls">
                            <li><a href="{{route('admin.openings.edit.id', $open->id)}}" class="btn btn-success">Edit</a></li>
                            <li>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.openings.destroy', $open->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onClick' => 'return confirm("Are You sure Delete this Opening?");']) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                        <div class="opening-title">{{$open->title}}</div>
                        <div class="opening-body">{{$open->description}}</div>
                        @if($open->img !== null)
                        <div class="img-cover">
                            <img src="{{route('main')}}/images/openings/{{$open->img}}" width="70" alt="Opening" class="img">
                        </div>
                        @endif
                        <div class="opening-location">{{$open->location}}</div>
                        <div class="opening-salary">{{$open->salary}}</div>
                        <div class="opening-status">
                            @if($open->status == 1)
                                <span class="op-active">open</span>
                            @else
                                <span class="op-disabled">closed</span>
                            @endif
                        </div>
                    </div>
                @endforeach --}}
        @if($i++%4 == 0 || $i == count($open))
            </div>
        @endif
        @endforeach
        <div class="row">
            <div class="col-md-12">
                <div align="center">
                    {{$openings->links()}}
                </div>
            </div>
        </div>
@endsection

