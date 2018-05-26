@extends('admin.index')
@section('title', ':: Hot Opening Offer')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="header--title">
                <h3>Hot Opening Offer</h3>
            </section>
        </div>
    </div>
    <div class="row">
        <form class="form-horizontal" method="POST" action="{{ route('admin.opening_offer.send_mail') }}" novalidate="novalidate" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <div class="card-inline-box">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="card-inline-box">
                        <h4 class="card-title">Send Hot Opening Offer</h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="row"><div class="col-md-12"><br></div></div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ csrf_field() }}
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">
                                    Title
                                    <small>*</small>
                                </label>
                                <input class="form-control" name="send_title" type="text" required="true" aria-required="true">
                                <span class="material-input"></span>
                            </div>
                            <div class="row form-footer text-right">
                                <a href="{{route('admin.candidates')}}" class="btn btn-default pull-left">Back</a>
                                <button name="add" type="submit" class="btn btn-success btn-fill">Create...</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <div class="card-inline-box">
                        <i class="material-icons">mail</i>
                    </div>
                    <div class="card-inline-box">
                        <h4 class="card-title">Options</h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="row"><div class="col-md-12"><br></div></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">
                                    Skills
                                    <small>*</small>
                                </label>
                                <input class="form-control" name="skills" type="text" required="true" aria-required="true">
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </form>
    </div>
@endsection