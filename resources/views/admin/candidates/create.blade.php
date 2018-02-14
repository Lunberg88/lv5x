@extends('admin.index')
@section('content')
        @can('create', $candidate)
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <!-- -->
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="blue">
                            <div class="card-inline-box">
                                <i class="material-icons">person_add</i>
                            </div>
                            <div class="card-inline-box">
                                <h4 class="card-title">Add new candidate</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="row"><div class="col-md-12"><br></div></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" action="{{ route('admin.candidates.store') }}" novalidate="novalidate">
                                        {{ csrf_field() }}
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Name
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="fio" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Email
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="email" id="email" type="email" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Shared CV Link
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="cvs" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Stack
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="stack" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Tags
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="tags" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Salary
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="salary" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-footer text-right">
                                            <button name="add" type="submit" class="btn btn-success btn-fill">Create...</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //-->
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                Access dined for you!
            </div>
        @endcan()
@endsection()