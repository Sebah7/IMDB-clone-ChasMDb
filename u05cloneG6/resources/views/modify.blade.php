<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie | CMDb</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            border-color: #6c63ff;
        }

        .btn {
            background-color: #6c63ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #5649b3;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #d1f7d6;
            color: #106933;
            border: 1px solid #53a749;
            border-radius: 4px;
        }
    </style>
</head>

<body>



    <!-- Navigation bar -->
    <header class="bg-red" style="position: fixed; width: 100%; background-color: rgb(246, 236, 255); box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-1">
                <h1>
                    <a href="/" class="-m-1.5 p-1.5 text-3xl font-bold text-purple-900">
                        CMDb
                    </a>
                </h1>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/movies" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
                <a href="/genres" class="text-sm font-semibold leading-6 text-gray-900">Genres</a>
                <a href="/watchlist" class="text-sm font-semibold leading-6 text-gray-900">Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <span id="user-info" class="text-sm font-semibold leading-6 text-gray-900" style="margin-top: 10px;">{{ Auth::user()->name }}</span>
                <button type="submit" class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md" style="width:fit-content; height:fit-content; padding: 5px 10px">Settings</button>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <br /><br /><br /><br />



    <div class="container">
        <!-- Adding Movie to db -->
        <h2 class="text-2xl font-semibold mb-6">Add a Movie</h2>
        <form action="{{ route('movie.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="actor" class="form-label">Actor:</label>
                <select id="actor" name="actors[]" multiple class="form-control">
                    @foreach($actors as $actor)
                    <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="director" class="form-label">Director:</label>
                <select id="director" name="directors[]" multiple class="form-control">
                    @foreach($directors as $director)
                    <option value="{{ $director->id }}">{{ $director->director_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="genre" class="form-label">Genre:</label>
                <select id="genre" name="genres[]" multiple class="form-control">
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="ratings" class="form-label">Ratings:</label>
                <input type="number" id="ratings" name="ratings" class="form-control">
            </div>

            <div class="form-group">
                <label for="language" class="form-label">Language:</label>
                <input type="text" id="language" name="language" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="release_date" class="form-label">Release Date:</label>
                <input type="date" id="release_date" name="release_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="runtime" class="form-label">Runtime:</label>
                <input type="number" id="runtime" name="runtime" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="poster" class="form-label">Poster:</label>
                <input type="text" id="poster" name="poster" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="trailer" class="form-label">Trailer:</label>
                <input type="text" id="trailer" name="trailer" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Create Movie</button>
            </div>
        </form>
        @if (session('actor_success'))
        <div class="alert alert-success">
            {{ session('movie_success') }}
        </div>
        @endif

        <!-- Adding Genre to genre db -->
        <form action="{{ route('genres.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Genre Name:</label>
                <input type="text" name="name" id="genre_name" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Add Genre</button>
            </div>
        </form>
        @if (session('actor_success'))
        <div class="alert alert-success">
            {{ session('genre_success') }}
        </div>
        @endif

        <!-- Adding Actor to actor db -->
        <form action="{{ route('actors.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Actor Name:</label>
                <input type="text" name="name" id="actor_name" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Add Actor</button>
            </div>
        </form>
        @if (session('success'))
        <div class="alert alert-success mt-6">
            {{ session('success') }}
        </div>
        @endif
    </div>
</body>

</html>