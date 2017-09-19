@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br />
                    <table class="table table-responsive">
                        <tr>
                            <td>{{$u->id}}</td>
                        </tr>
                        <tr>
                            <td>
                                {{$u->email}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{$u->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{$u->created_at}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{$u->updated_at}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
