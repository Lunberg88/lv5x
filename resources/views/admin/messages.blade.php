@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Messages...</h2>
        </div>
    </div>
    @if(isset($messages) && $messages !== null)
        @foreach($messages as $mail)
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <span class="glyphicon glyphicon-ok"></span> <strong>{{$mail->name}} | {{$mail->email}}</strong>
                        <hr class="message-inner-separator">
                        <p>
                            {!! $mail->message !!}
                        </p>
                        <hr>
                        <p>
                            {{$mail->created_at}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection