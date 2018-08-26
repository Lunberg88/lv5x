@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-stripped">
                <thead>
                <th><b>Id</b></th>
                <th><b>Fio</b></th>
                <th><b>Email</b></th>
                <th><b>Stack</b></th>
                <th><b>Tags</b></th>
                <th><b>Salary</b></th>
                <th><b>Actions</b></th>
                </thead>
                <tbody>
                @if($candidate)
                    @foreach($candidate as $p)
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