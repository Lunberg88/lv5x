@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($c)
                    <div class="row">
                        <div class="group-control">id: <b>{{$c->id}}</b></div>
                        <div class="group-control">fio: <b>{{$c->fio}}</b></div>
                        <div class="group-control">fio: <b>{{$c->email}}</b></div>
                        <div class="group-control">stack: <b>{{$c->stack}}</b></div>
                        <div class="group-control">tags: {{$c->tags}}</div>
                        <div class="group-control">salary: <b>{{$c->salary}}</b></div>
                        <div class="group-control">
                            @if($t)
                                @foreach($t as $tag)
                                    <a href="{{route('search')}}?search={{$tag}}" title="{{$tag}}" class="label label-primary">{{$tag}}</a>&nbsp;
                                @endforeach()
                            @endif()
                        </div>
                        <br />
                        <div class="row">
                            <div>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Info</a></li>
                                    @if($pr)
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Show CV</a></li>
                                    @endif()
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        Some text info about this candidate...
                                    </div>
                                    @if($pr)
                                        <div role="tabpanel" class="tab-pane" id="profile">
                                            <iframe src="https://docs.google.com/gview?url=http://lunberg.hol.es/j.doc&embedded=true" class="cv_frame"></iframe>
                                        </div>
                                    @endif()
                                </div>

                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        No profile found with this ID.
                    </div>
                @endif()
            </div>
        </div>
    </div>
@endsection()

