@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(isset($messages) && $messages !== null)
            <div class="card">
                <div class="card-header card-header-text" data-background-color="blue">
                    <div class="card-inline-box">
                        <i class="material-icons">mail</i>
                    </div>
                    <div class="card-inline-box">
                        <h4 class="card-title"><strong>Messages for you</strong></h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>From User</th>
                                    <th>Message</th>
                                    <th>Time</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $mail)
                                <tr>
                                <td class="text-center">{{$mail->id}}</td>
                                <td>{{$mail->name}} ({{$mail->email}})</td>
                                <td>{!! $mail->message !!}</td>
                                <td>{{$mail->created_at}}</td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                        <i class="material-icons">close</i>
                                    </button>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
                <strong>Empty...</strong>
            @endif
        </div>
    </div>
@endsection