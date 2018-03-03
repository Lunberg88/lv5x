@if($p->viewed === 0)
<tr style="background: #eee;">
@else
<tr>
@endif
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
                <a href="{{route('admin.candidates.search')}}?search=&stags={{trim($tag)}}" name="{{trim($tag)}}" title="{{trim($tag)}}" class="label label-info">{{$tag}}</a>
            @endforeach
        @endif
    </td>
    <td>{{$p->salary}}
    <b>
    @php switch($p->currency) { case 1: echo "&dollar;"; break; case 2: echo "&euro;"; break; case 3: echo "руб."; break; case 4: echo "грн."; break; default: echo "&dollar;"; } @endphp
    </b>
    </td>
    <td>
        <a href="{{route('admin.candidates.show.id', $p->id)}}">
            <i class="fa fa-eye  btn btn-info" aria-hidden="true"></i>
        </a>
        <a href="{{route('admin.candidates.edit.id', $p->id)}}">
            <i class="fa fa-edit btn btn-warning" aria-hidden="true"></i>
        </a>
        <a href="{{route('admin.candidates.destroy', $p->id)}}" onclick="event.preventDefault();
                                                                document.getElementById('delete').submit();
                                                                ">
            <i class="fa fa-trash-o btn btn-danger" aria-hidden="true"></i>
        </a>
        <form id="delete" action="{{route('admin.candidates.destroy', $p->id)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
    </td>
</tr>