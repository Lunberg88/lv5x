@extends('admin.index')

@section('content')
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                @if($candidate)
                    <!-- -->
                        <div class="wizard-container">
                            <div class="card wizard-card active" data-color="blue" id="wizardProfile">
                                <div class="wizard-header">
                                    <div class="picture-container candidate-preview">
                                        <div class="picture">
                                            <img src="http://demos.creative-tim.com/material-dashboard-pro/assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="">
                                        </div>
                                    </div>
                                    <h3 class="wizard-title">Info</h3>
                                    <h2>{{$candidate->fio}}</h2>
                                </div>
                                <div class="wizard-navigation">
                                    <ul class="nav nav-pills">
                                        <li class="active" style="width: 33.3333%;">
                                            <a href="#" data-toggle="tab" aria-expanded="true">About</a>
                                        </li>
                                    </ul>
                                    <div class="moving-tab" style="width: 219.109px; transform: translate3d(-8px, 0px, 0px); transition: all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1);">About</div></div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
                                        <div class="row">
                                            <div class="col-md-10 col-lg-offset-1">
                                                <div class="group-control">id: <b>{{$candidate->id}}</b></div>
                                                <div class="group-control">fio: <b>{{$candidate->fio}}</b></div>
                                                <div class="group-control">fio: <b>{{$candidate->email}}</b></div>
                                                <div class="group-control">stack: <b>{{$candidate->stack}}</b></div>
                                                <div class="group-control">tags: {{$candidate->tags}}</div>
                                                <div class="group-control">salary: <b>{{$candidate->salary}}</b></div>
                                                <div class="group-control">
                                                    @if($tags)
                                                        @foreach($tags as $tag)
                                                            <a href="{{route('admin.candidates.search')}}?search={{$tag}}" title="{{$tag}}" class="label label-info">{{$tag}}</a>&nbsp;
                                                        @endforeach()
                                                    @endif()
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //-->
                        {{--
                        <div class="row">
                            <div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Info</a></li>
                                    @if($profile)
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Show CV</a></li>
                                    @endif()
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        Some text info about this candidate...
                                    </div>
                                    @if($profile)
                                        <div role="tabpanel" class="tab-pane" id="profile">
                                            <iframe src="https://docs.google.com/gview?url=http://lunberg.hol.es/j.doc&embedded=true" class="cv_frame"></iframe>
                                        </div>
                                    @endif()
                                </div>
                            </div>
                          --}}

            </div>
                @else
                    <div class="alert alert-danger">
                        No profile found with this ID.
                    </div>
                @endif()
            </div>
        </div>
@endsection()
