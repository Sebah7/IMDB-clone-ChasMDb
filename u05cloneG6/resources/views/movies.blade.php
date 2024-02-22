<div>

            <form action="{{ route('movies.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Movie title:</label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <button type="submit">
                        Add Movie
                    </button>
                </div>
            </form>

    @foreach ($movies as $movie)
    <ul>
        <p>Title: {{ $movie->title }}</p>
        <p>Description: {{ $movie->description }}</p>
        <p>Actor: {{ $movie->actor }}</p>
        <p>Genre: {{ $movie->genre }}</p>
        </iframe>
    </ul>
    @endforeach


    <!-- frame:n displayas men länken går inte att köra -->
    @if($movie = App\Models\Admin\cmdb_movies::find(6))


    <!-- en klickbar poster som öppnas upp på samma sida -->
    <a href="{{ $movie->poster }}" target="_self">
        <img src="{{ $movie->poster }}" alt="Movie Poster" width="200" height="350">
    </a>

    @else
    <p>No movie found with id:5.</p>
    @endif'

    <p>Reviews:</p>
    @foreach ($movie->reviews as $review)
    <ul>
        <li>User: {{ $review->user_id }}</li>
        <li>Stars: {{ $review->stars }}</li>
        <li>Comment: {{ $review->comment }}</li>
    </ul>

    @endforeach
    <h2>Add a Review</h2>
    <form action="{{ route('reviews.store') }}" method="post">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

        <label for="stars">Stars:</label>
        <input type="number" name="stars" id="stars" required>

        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" required></textarea>

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <button type="submit">Submit Review</button>
    </form>
</div>