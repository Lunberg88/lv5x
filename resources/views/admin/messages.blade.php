@extends('admin.index')
@section('title', ':: Messages')
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
                        <h4 class="card-title">Messages for you</h4>
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
                                <tr class="{{($mail->viewed == 1) ? '' : 'msg--box__isviewed'}}">
                                <td class="text-center">{{$mail->id}}</td>
                                <td>{{$mail->name}} ({{$mail->email}})</td>
                                <td class="msg--box__msg">{!! str_limit($mail->message, 100) !!}</td>
                                <td>{{$mail->created_at}}</td>
                                <td class="td-actions text-right msg--box__actions">
                                    <button id="{{$mail->id}}" type="button" onclick="readMsg(this);" class="btn btn-info" data-toggle="modal" data-target="#read-{{$mail->id}}">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-default" title="" data-toggle="modal" data-target="#id{{$mail->id}}">
                                        <i class="material-icons">reply</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                        <i class="material-icons">close</i>
                                    </button>
                                </td>
                            </tr>
                                <!-- view modal -->
                                <div class="modal fade" id="read-{{$mail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{route('msg.reply')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{$mail->name}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <label class="col-md-2 col-form-label">From</label>
                                                        <div class="col-md-10">
                                                            <div class="form-group bmd-form-group msg--box__from is-filled">
                                                                <input type="text" name="sender" class="form-control" value="{{$mail->email}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Message:</label>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <p>{{$mail->message}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location = '/admin/msg';">
                                                        <span class="modal--msg__btn">Close</span>
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container">
                                                            <div class="ripple-decorator ripple-on ripple-out" style="left: 29.5781px; top: 24px; background-color: rgb(244, 67, 54); transform: scale(8.50976);"></div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- reply modal -->
                                <div class="modal fade" id="id{{$mail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{route('msg.reply')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{$mail->name}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <label class="col-md-2 col-form-label">To</label>
                                                        <div class="col-md-10">
                                                            <div class="form-group bmd-form-group msg--box__from is-filled">
                                                                <input type="text" name="sender" class="form-control" value="{{$mail->email}}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Message:</label>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <textarea name="body" class="form-control" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info">
                                                        <span class="modal--msg__btn">Send</span>
                                                        <i class="material-icons">send</i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <span class="modal--msg__btn">Close</span>
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container">
                                                            <div class="ripple-decorator ripple-on ripple-out" style="left: 29.5781px; top: 24px; background-color: rgb(244, 67, 54); transform: scale(8.50976);"></div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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