@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <form name="upload" method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-control">
                        <label for="upload" class="form-control">Upload File</label>
                    </div>
                    <div class="form-control" id="upload">
                        <input type="file" name="doc" class="btn btn-primary" value="Upload">
                    </div>
                    <div class="form-control">
                        <button type="submit" name="upd">Upload...</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()