@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-10">
            <form action="{{route('admin.settings.update')}}" method="post" name="settings" class="form-horizontal">
                <input name="_method" type="hidden" value="PUT">
                {{ csrf_field() }}
                <div class="panel panel-info">
                    <div class="panel-heading" id="toggle">
                        <h3>Header text message</h3>
                    </div>
                    <div class="panel-body">
                        <input name="header-text" id="header-text" class="form-control">
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading" id="toggle">
                        <h3>Header description</h3>
                    </div>
                    <div class="panel-body">
                        <input name="header-description" id="header-description" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <button id="hide" class="btn btn-success">Show or Hide</button>
                </div>
            </form>
        </div>
    </div>
@endsection