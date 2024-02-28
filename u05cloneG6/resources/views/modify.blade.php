
        <!-- Adding Movie to db  -->
        <h2>Add a Movie</h2>

<form action="{{ route('movie.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required maxlength="255">
    </div>

    <div>
        <label for="actor">Actor:</label>
        <select id="actor" name="actors[]" multiple>
            @foreach($actors as $actor)
                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="director">Director:</label>
        <select id="director" name="directors[]" multiple>
            @foreach($directors as $director)
                <option value="{{ $director->id }}">{{ $director->director_name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="genre">Genre:</label>
        <select id="genre" name="genres[]" multiple>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>

    <div>
        <label for="ratings">Ratings:</label>
        <input type="number" id="ratings" name="ratings">
    </div>

    <div>
        <label for="language">Language:</label>
        <input type="text" id="language" name="language" required>
    </div>

    <div>
        <label for="release_date">Release Date:</label>
        <input type="date" id="release_date" name="release_date" required>
    </div>

    <div>
        <label for="runtime">Runtime:</label>
        <input type="number" id="runtime" name="runtime" required>
    </div>

    <div>
        <label for="poster">Poster:</label>
        <input type="text" id="poster" name="poster" required>
    </div>

    <div>
        <label for="trailer">Trailer:</label>
        <input type="text" id="trailer" name="trailer" required>
    </div>
    <div>
        <button type="submit">Create Movie</button>
    </div>
</form>
@if (session('actor_success'))
    <div class="alert alert-success">
        {{ session('movie_success') }}
    </div>
@endif

<!-- Adding Genre to genre db -->

                  <form action="{{ route('genres.store') }}" method="POST">
                    @csrf
                    <label for="name">Genre Name:</label>
                        <input type="text" name="name" id="genre_name">
                        <button type="submit">
                            Add Genre
                        </button>
                  </form>
                  @if (session('actor_success'))
    <div class="alert alert-success">
        {{ session('genre_success') }}
    </div>
@endif

<!-- Adding Actor to actor db -->

        <form action="{{ route('actors.store') }}" method="POST">
            @csrf
            <label for="name">Actor Name:</label>
            <input type="text" name="name" id="actor_name">
            <button type="submit">
                Add Actor
            </button>
        </form><br><br>

        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif