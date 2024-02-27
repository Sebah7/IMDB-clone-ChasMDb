<h1>My Watchlist</h1>

@if ($watchlist->isEmpty())
    <p>Your watchlist is empty.</p>
@else
    <ul>
        @foreach ($watchlist as $item) 
            <li>
                @if ($item->id)
                    <span>{{ $item->id }} - Title: {{ $item->id }}</span>
                @else
                    <span>Movie not available</span>
                @endif
            </li>
        @endforeach
    </ul>
@endif
    <!-- <ul>
        @foreach ($watchlists as $watchlist)
            <li>
                <a href="{{ url('/watchlist/'.$watchlist->id) }}">{{ $watchlist->id}}</a>
            </li>
            @endforeach
    </ul> -->
