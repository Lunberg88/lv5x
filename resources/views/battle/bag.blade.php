@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="char-bag">
                @if($clothes)
                    @foreach($clothes as $cloth)
                        <div class="cloth-box">
                            <div class="cl-name">
                                {{$cloth->obj_id}}
                            </div>
                            <div class="cl-params">
                            </div>
                        </div>
                    @endforeach
                @endif
                @if(session('message'))
                    <div class="label label-warning">
                        Your bag is empty.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection