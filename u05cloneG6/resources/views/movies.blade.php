<!-- This comment is to Elias/Frontend
This is the the blade where we want all our movies to be visble. 
Below is the whole movie table and the data in relation from other models-->

<h2>{{ __('All Movies') }}</h2>
@foreach ($movies as $movie)
<p>Movie name: {{ $movie->title }}</p>
<!-- Each foreach below fetches data from the related models of the movie -->
<p>Actors: 
    @foreach ($movie->actors as $actor)
        {{ $actor->name }},
    @endforeach
    </p>
    <p>Genres: 
    @foreach ($movie->genres as $genre)
        {{ $genre->name }},
    @endforeach
    </p>
    <p>Director: 
    @foreach ($movie->directors as $director)
        {{ $director->name }},
    @endforeach
    </p>
    <p>Ratings: {{ $movie->ratings }}</p>
    <!-- the !! is used to display the html tags. And in this cas it is used to display the trailer -->
    <p>Trailer: {!! $movie->trailer !!}</p>
    <!-- the img tag is to display the poster -->
    <p>Poster: <img src="{{ $movie->poster }}" alt="Poster"></p>
    <p>Runtime: {{ $movie->runtime }}</p>
    <p>Language: {{ $movie->language }}</p>
    <p>Description: {{ $movie->description }}</p>
@endforeach
