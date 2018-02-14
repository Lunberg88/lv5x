@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header card-header-text" data-background-color="blue">
                    <h4 class="card-title">Blog Stats</h4>
                    <p class="category">List of all available blogs</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
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
                                    <a href="{{route('admin.blog.edit', $post->id)}}">
                                        <i class="fa fa-eye btn btn-info" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{route('admin.blog.view', $post->id)}}">
                                        <i class="fa fa-edit btn btn-warning" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{route('admin.blog.destroy', $post->id)}}"
                                                onclick="event.preventDefault();
                                                document.getElementById('delete').submit();">
                                        <i class="fa fa-trash-o btn btn-danger" aria-hidden="true"></i>
                                    </a>
                                    <form id="delete" action="{{route('admin.blog.destroy', $post->id)}}" method="post">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{csrf_field()}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            {{$news->links()}}
        </div>
    </div>
@endsection


