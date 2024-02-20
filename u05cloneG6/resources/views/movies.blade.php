    <div>

        @foreach ($movies as $movie)
        <ol>
            <p>{{ $movie->title }}</p>
            <p>{{ $movie->description }}</p>
            </iframe>
        </ol>
        @endforeach

        <!-- frame:n displayas men länken går inte att köra -->
        @if($movie = App\Models\Admin\cmdb_movies::find(5))
        <iframe width="640" height="360" src="https://www.youtube.com/embed/{{ $movie->trailer }}" frameborder="0" allowfullscreen>
        </iframe>

        <!-- en klickbar poster som öppnas upp på samma sida -->
        <a href="{{ $movie->poster }}" target="_self">
            <img src="{{ $movie->poster }}" alt="Movie Poster" width="200" height="350">
        </a>


        @else
        <p>No movie found with id:5.</p>
        @endif

    </div>