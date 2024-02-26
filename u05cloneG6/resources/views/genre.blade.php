<h2>
    {{ __('All Genres') }}
</h2>

@foreach ($genres as $genre)
    <ul>
        <p>Genre type: {{ $genre->name }}</p>
        <a href="{{ route('genres.show', $genre->id) }}">{{ $genre->name }}</a>
    <!-- Delete button -->
    <form action="{{ route('genres.destroy', $genre->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </ul>
@endforeach

@if (isset($movies))
    @foreach($movies as $movie)
        <h2>{{ $movie->title }}</h2>
        <!-- display other movie details here -->
    @endforeach
@endif

