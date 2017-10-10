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