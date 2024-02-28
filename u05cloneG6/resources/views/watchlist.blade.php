<h1>My Watchlist</h1>

@if ($movies->isEmpty())
    <p>Your watchlist is empty.</p>
@else
    <ul>
        @foreach ($movies as $item) 
            <li>
                @if ($item->id)
                    <span>{{ $item->id }} - Title: {{ $item->title }}</span>
                @else
                    <span>Movie not available</span>
                @endif
            </li>
        @endforeach
    </ul>
@endif
