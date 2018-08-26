@extends('admin.index')
@section('title', ':: '.$openings->title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($openings)
                <div class="wizard-container">
                    <div class="card wizard-card active" data-color="blue" id="wizardProfile">
                        <div class="wizard-header">
                            <h2>{{$openings->title}}</h2>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="active" style="width: 33.3333%;">
                                    <a href="#" data-toggle="tab" aria-expanded="true">About</a>
                                </li>
                            </ul>
                            <div class="moving-tab" style="width: 219.109px; transform: translate3d(-8px, 0px, 0px); transition: all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1);">Openings Details</div></div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="about">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <table class="table candidate-info-table">
                                            <tbody>
                                            <tr>
                                                <td><b>Poster:</b></td>
                                                <td>
                                                    <img class="opening--detail__img" src="{{route('main')}}/images/openings/{{$openings->img}}" style="max-width: 300px;" alt="{{$openings->title}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Type:</b></td>
                                                <td>{!! ($openings->type == 1 ? '<span class="badge badge-warning">relocate</span>' : '<span class="badge badge-info">remote</span>') !!}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Status:</b></td>
                                                <td>
                                                    <span class="label label-{{$openings->status == 1 ? 'success' : 'danger'}}">
                                                        {{$openings->status == 1 ? 'active' : 'closed'}}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Salary/Rate:</b></td>
                                                <td>
                                                    <b>$</b> {{$openings->salary}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Description</b></td>
                                                <td>{!! $openings->description !!}</td>
                                            </tr>
                                            @if(count(\App\Traits\CandidatesHelper::showAppliedOpenings($openings->id)) > 0)
                                            <tr class="padding--bottom--0">
                                                <td colspan="2">
                                                    <h3 class="opening--detail__applied--title">Applied candidates:</h3>
                                                </td>
                                            </tr>
                                            <tr class="opening--detail__td--actions">
                                                <td colspan="2">
                                                    @foreach(\App\Traits\CandidatesHelper::showAppliedOpenings($openings->id, 1) as $candidates)
                                                    <div class="pb-2">
                                                            {{-- {{$candidates->fio}} / {{$candidates->email}} / <span class="label label-default">{{\App\Traits\CandidatesHelper::convertTypes($candidates->stack, 'stack')}}</span>--}}
                                                        <b>{{$candidates->name}}</b> / {{$candidates->email}}
                                                        <span class="applied--box__actions">
                                                           <button type="submit" class="label label-success btn-small">Approve</button>
                                                            <form action="{{route('openings.applied.reject')}}" method="post" style="display: inline-block">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="rejected_user" value="{{$candidates->id}}">
                                                                <input type="hidden" name="rejected_opening" value="{{$openings->id}}">
                                                                <button type="submit" class="label label-danger btn-small">Reject</button>
                                                            </form>
                                                        </span>
                                                    </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <hr />
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td colspan="2">
                                                    <span class="d-block pull-left">
                                                        <a href="{{route('admin.openings')}}" class="btn btn-default">Back</a>
                                                    </span>
                                                    <span class="d-block pull-right">
                                                        <a href="{{route('admin.openings.edit.id', $openings->id)}}" class="btn btn-warning">Edit</a>
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
            @else
                <div class="alert alert-danger">
                    No Opening found with this ID.
                </div>
            @endif()
        </div>
    </div>
@endsection()

