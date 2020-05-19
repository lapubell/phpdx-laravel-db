<small><a href="/libraries">Back to all libraries</a></small>
<h1>{{ $l->name }}'s Books</h1>
<ul>
    @foreach ($l->books as $book)
        <li>
            <strong>{{ $book->title }}</strong><br />
            <p><small>{{ $book->description }}</small></p>
            <p>Status:
                @if ($book->checked_out_at)
                    Unavailable
                @else
                    Available
                @endif
            </p>
        </li>
    @endforeach
</ul>
