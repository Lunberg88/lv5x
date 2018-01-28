@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped">
            <thead>
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
@endsection