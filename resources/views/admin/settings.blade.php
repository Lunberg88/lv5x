@extends('admin.index')
@section('title', ':: Settings')
@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <form action="{{route('admin.settings.update')}}" method="post" name="settings" class="form-horizontal">
                <input name="_method" type="hidden" value="PUT">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Website settings</h4>
                    </div>
                    <div class="card-content">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            @if(isset($settings) && $settings != null)
                                @foreach($settings as $k => $option)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="option-{{ $option->id }}">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $option->id }}" aria-expanded="false" aria-controls="{{ $option->id }}" class="collapsed">
                                            <h4 class="panel-title">
                                               {{ $option->key }}
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </h4>
                                        </a>
                                    </div>
                                    <div id="{{ $option->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{ $option->key }}" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <textarea name="{{ $option->key }}" class="form-control" rows="3">{{ $option->value }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection