@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<table class="table table-stripped">
                <thead>
                    <th>Id</th>
                    <th>Fio</th>
                    <th>Email</th>
                    <th>Stack</th>
                    <th>Tags</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </thead>
                <tbody>
			@if($c)
					@foreach($c as $p)
					@include('admin.grid_tb')
					{{--
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->fio}}</td>
                        <td>{{$p->email}}</td>
                        <td>{{$p->stack}}</td>
                        <td>{{$p->tags}}</td>
                        <td>{{$p->salary}}</td>
                        <td><a href="{{route('admin.edit', $p->id)}}" class="btn btn-warning">EDIT</a>
                           {!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroy', $p->id]]) !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                           {!! Form::close() !!}
                           <!--<a href="{{route('admin.destroy', 34)}}">DEL</a>-->
                        </td>
                    </tr>
                    --}}
                    @endforeach()
            @else
            <tr>
            	<td><span class="alert alert-warning">No matches found!</span></td>
            </tr>
			@endif()
                </tbody>
            </table>
		</div>
	</div>       
@endsection()