<h1>Libraries</h1>
<ul>
    @foreach ($l as $library)
        <li>
            <a href="/library/{{$library->id}}">{{ $library->name }}</a>
        </li>
    @endforeach
</ul>
