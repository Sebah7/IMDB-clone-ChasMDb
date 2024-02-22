
    <h1>My Watchlist</h1>
    
    @if ($watchlist->isEmpty())
        <p>Your watchlist is empty.</p>
    @else
        <ul>
            @foreach ($watchlist as $item)
                <li>{{ $item->movie->title }}</li>
            @endforeach
        </ul>
    @endif