<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie | CMDb</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
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
        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
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

    <div class="container">
        <!-- Adding Movie to db -->
        <h2 class="text-2xl font-semibold">Add a Movie</h2>
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

            <!-- Add other form fields here -->

            <div>
                <button type="submit">Create Movie</button>
            </div>
        </form>

        <!-- Adding Genre to genre db -->
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <label for="name">Genre Name:</label>
            <input type="text" name="name" id="genre_name">
            <button type="submit">Add Genre</button>
        </form>

        <!-- Adding Actor to actor db -->
        <form action="{{ route('actors.store') }}" method="POST">
            @csrf
            <label for="name">Actor Name:</label>
            <input type="text" name="name" id="actor_name">
            <button type="submit">Add Actor</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>
</html>
