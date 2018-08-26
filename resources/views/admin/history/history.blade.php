@extends('admin.index')
@section('title', ':: History')
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header card-header-text" data-background-color="blue">
                <div class="card-inline-box">
                    <i class="material-icons">update</i>
                </div>
                <div class="card-inline-box">
                    <h4 class="card-title">Activity history</h4>
                </div>
            </div>
            <div class="card-content table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Actions</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($history) && $history !== null)
                            @foreach($history as $log)
                                <tr>
                                    <td>{{$log->id}}</td>
                                    <td>
                                        <label class="label
                                            @if($log->type == 1)
                                                label-success">created</label>
                                            @elseif($log->type == 2)
                                                label-info">updated</label>
                                            @elseif($log->type == 3)
                                                label-danger">deleted</label>
                                            @else
                                            label-default">system</label>
                                            @endif
                                    </td>
                                    <td>{!! $log->actions !!}</td>
                                    <td>{{$log->created_at}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection