<tr>
    <td>{{$p->id}}</td>
    <td>{{$p->fio}}</td>
    <td>{{$p->email}}</td>
    <td>{{$p->stack}}</td>
    <td>
        @if($p->tags)
            @php
                $tags = explode(',', $p->tags)
            @endphp
            @foreach($tags as $tag)
                <a href="{{route('admin.candidates.search')}}?search={{$tag}}" title="{{$tag}}" class="label label-success">{{$tag}}</a>
            @endforeach
        @endif
    </td>
    <td>{{$p->salary}}</td>
    <td><a href="{{route('admin.candidates.edit.id', $p->id)}}" class="btn btn-warning">EDIT</a>
        <a href="{{route('admin.candidates.show.id', $p->id)}}" class="btn btn-info">VIEW</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.candidates.destroy', $p->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
</tr>