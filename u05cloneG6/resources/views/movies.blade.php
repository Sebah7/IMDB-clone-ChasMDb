        <div>

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

        </div>