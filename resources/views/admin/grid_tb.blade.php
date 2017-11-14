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
                <a href="{{route('search')}}?search={{$tag}}" title="{{$tag}}" class="label label-success">{{$tag}}</a>
            @endforeach
        @endif
    </td>
    <td>{{$p->salary}}</td>
    <td><a href="{{route('admin.edit', $p->id)}}" class="btn btn-warning">EDIT</a>
        <a href="{{route('admin.index')}}/{{$p->id}}" class="btn btn-primary">VIEW</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroy', $p->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
</tr>