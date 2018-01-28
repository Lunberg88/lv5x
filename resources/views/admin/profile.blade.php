@extends('admin.index')

@section('content')
        <div class="row">
            <div class="panel-body">
                <table class="table table-responsive">
                    @if($c)
                        @foreach($c as $p)
                            <tr>
                                <td>
                                    {{$p->email}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{$p->name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{$p->created_at}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{$p->updated_at}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        Profile not found.
                    @endif
                </table>
            </div>
        </div>
@endsection