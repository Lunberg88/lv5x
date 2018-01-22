@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <button id="ref" class="btn btn-default">Refresh</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>created at</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($news as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{!! str_limit($post->title, 30) !!}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a href="{{route('admin.blog.edit', $post->id)}}" class="btn btn-warning btn-sm">edit</a>
                            <a href="{{route('admin.blog.view', $post->id)}}" class="btn btn-info btn-sm">view</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.blog.destroy', $post->id]]) !!}
                            {!! Form::submit('delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            {{$news->links()}}
        </div>
    </div>
@endsection