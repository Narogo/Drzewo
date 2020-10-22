@foreach($children as $chi)
    <ul>
        <li>{{$chi->name}}</li>
        @if(count($chi->child))
            @include('tree.child',['children' => $chi->child])
        @endif
    </ul>
@endforeach
