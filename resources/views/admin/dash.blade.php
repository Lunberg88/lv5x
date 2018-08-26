@extends('admin.index')
@section('title', ':: Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section>
                <div class="card dashboard--card">
                    <div class="card-header card-header-text" data-background-color="blue">
                        <div class="card-inline-box">
                            <i class="material-icons">mail</i>
                        </div>
                        <div class="card-inline-box">
                            <h4 class="card-title">Updates</h4>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-stats dashboard--cards__content dashboard--card__hover" onclick="window.location.href = '{{route('admin.candidates')}}';">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <p class="card-category">New Candidates</p>
                                <h3 class="card-title">+{{count($adminService->notifyNewCandidates())}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-stats dashboard--cards__content dashboard--card__hover" onclick="window.location.href = '{{route('admin.msg.list')}}';">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <p class="card-category">New Messages</p>
                                <h3 class="card-title">+{{count($adminService->notifyNewMessages())}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-stats dashboard--cards__content dashboard--card__hover">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <p class="card-category">New Applied</p>
                                <h3 class="card-title">+NaN</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12">
            <div class="my-5 py-5">
                <section>
                    <div class="card dashboard--card">
                        <div class="card-header card-header-text" data-background-color="blue">
                            <div class="card-inline-box">
                                <i class="material-icons">star</i>
                            </div>
                            <div class="card-inline-box">
                                <h4 class="card-title">New notifications</h4>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon" style="text-align: left; width: 100%;">
                                    @foreach($user->unreadNotifications as $notif)
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons" id="{{$notif->id}}">close</i>
                                        </button>
                                        <span>Candidate <b><a href="{{route('admin.candidates.show.id', $notif->data['candidate_id'])}}">{{$notif->data['candidate_fio']}}</a></b> applied for #Opening - <a href="{{route('admin.openings.show.id', $notif->data['opening_id'])}}">{{$notif->data['opening_title']}}</a>  [{{$notif->created_at}}]<br>
                                    </span>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="card-footer">
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection