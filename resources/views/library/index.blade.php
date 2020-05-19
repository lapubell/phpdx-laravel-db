<h1>Libraries</h1>
<ul>
    @foreach ($l as $library)
        <li>
            <a href="/library/{{$library->id}}">{{ $library->name }}</a>
        </li>
    @endforeach
</ul>
{!! $l->links() !!}

{{-- don't do inline styles, check out laravel mix for asset compliation and SCSS/JS bundles --}}
<style>
nav ul.pagination {
    display: inline;
    list-style: none;
}
nav ul.pagination li {
    display: inline;
}
</style>
