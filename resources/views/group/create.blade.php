@extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal" method="POST" action="{{ route('group.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Title:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" autofocus placeholder="Title...">
                                    <small>Min: 2, Max: 32, only text</small>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="description">Description:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" class="form-control" id="description" autofocus placeholder="Description...">
                                    <small>Min: 2, Max: 32, only text</small>
                                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="add" value="Create..." class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
    @section('content')