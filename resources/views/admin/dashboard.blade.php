@extends('admin.index')
@section('title', ':: Candidates')
@section('content')
    <div class="main-dashboard">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['method' => 'GET', 'route' => ['admin.candidates.search'], 'role' => 'search']) !!}
                <div class="input-group">
                    <input name="search" type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><b>Go!</b></button>
                      </span>
                    <select class="form-control" name="stags">
                        <option disabled="disabled" selected="selected">Choose stack</option>
                        @if($tags)
                            @foreach(str_replace('</p>', '', str_replace('<p>', '', $tags)) as $i => $t)
                                <option value="{{$i + 1}}">{{$t}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">

            <div class="card">
                <div class="card-header card-header-text" data-background-color="blue">
                    <h4 class="card-title">Candidate Stats</h4>
                    <p class="category">List of all available candidates - 2018</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>#id</th>
                            <th>Fio</th>
                            <th>Email</th>
                            <th>Stack</th>
                            <th>Tags</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($candidates as $p)
                                @include('admin.grid_tb')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{$candidates->links()}}
                </div>
            </div>

        </div>
    </div>
@endsection




