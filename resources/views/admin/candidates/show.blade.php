@extends('admin.index')
@section('title', ':: '.$candidate->fio)
@section('content')
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                @if($candidate)
                    <!-- -->
                        <div class="wizard-container">
                            <div class="card wizard-card active" data-color="blue" id="wizardProfile">
                                <div class="wizard-header">
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
                                            <div class="col-md-10 col-md-offset-1">
                                                <table class="table candidate-info-table">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Name:</b></td>
                                                            <td>{{$candidate->fio}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Email:</b></td>
                                                            <td>{{$candidate->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Stack:</b></td>
                                                            <td>
                                                                @php
                                                                    echo \App\Traits\CandidatesHelper::convertTypes($candidate->stack, 'stack');
                                                                @endphp
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Skills:</b></td>
                                                            <td>
                                                                @if($tags)
                                                                    @foreach($tags as $tag)
                                                                        <a href="{{route('admin.candidates.search')}}?search=&stags={{trim($tag)}}" title="{{$tag}}" class="label label-success">{{$tag}}</a>&nbsp;
                                                                    @endforeach()
                                                                @endif()
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Salary/Rate:</b></td>
                                                            <td>
                                                                {{$candidate->salary}}
                                                                <b>
                                                                    @php
                                                                        echo \App\Traits\CandidatesHelper::convertTypes($candidate->currency, 'currency');
                                                                    @endphp
                                                                </b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>CV file:</b></td>
                                                            <td>
                                                                @if($candidate->cvs !== null)
                                                                    <a href="{{$candidate->cvs}}" target="_blank">{{$candidate->cvs}}</a>
                                                                @else
                                                                    Not matched yest...
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Uploaded CV:</b></td>
                                                            <td>{{ $candidate->upload_cvs ? $candidate->upload_cvs : 'Not uploaded yet...' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <span class="d-block pull-left">
                                                                    <a href="{{route('admin.candidates')}}" class="btn btn-default">Back</a>
                                                                </span>
                                                                <span class="d-block pull-right">
                                                                    <a href="{{route('admin.candidates.edit.id', $candidate->id)}}" class="btn btn-warning">Edit</a>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
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
