<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Movie Specifics</title>
</head>

<body>


    @if(isset($movie))
    <h1>{{ $movie->title }}</h1>
    <p>{{ $movie->description }}</p>
    <p>{{ $movie->ratings }}</p>
    <p>{{ $movie->runtime }}</p>
    <p>{{ $movie->poster }}</p>
    <p>{{ $movie->trailer }}</p>
    <!-- Display other movie details as needed -->
    @endif


    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
</body>

</html>