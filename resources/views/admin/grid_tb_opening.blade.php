<tr>
    <td>{{$p->title}}</td>
    <td>{{$p->location}}</td>
    <td>{{$p->salary}}</td>
    <td>{{$p->description}}</td>
    <td>{{$p->status}}</td>
    <td><a href="{{route('admin.openings.edit.id', $p->id)}}" class="btn btn-warning">EDIT</a>
        <a href="{{route('admin.openings.show.id', $p->id)}}" class="btn btn-info">VIEW</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.openings.destroy', $p->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
</tr>