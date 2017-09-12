@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($cc as $c)
            {{$c->fio}}<br>
            {{$c->email}}<br>
            {{$c->stack}}<br>
            {{$c->tags}}<br>
            {{$c->salary}}<br>
            <hr>
            @endforeach
            @foreach($cv as $v)
                {{$v}}
            @endforeach
        </div>
    </div>
@endsection()