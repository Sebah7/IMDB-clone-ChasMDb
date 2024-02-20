<div>

    @foreach ($movies as $movie)
    <p>{{ $movie->title }}</p>
    <p>{{ $movie->trailer }}</p>
    <p>{{ $movie->poster }}</p>
    <p>{{ $movie->runtime }}</p>
    <p>{{ $movie->description }}</p>
    @endforeach

</div>