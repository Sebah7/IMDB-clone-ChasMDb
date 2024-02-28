<!-- This comment is to Elias/Frontend
This is the the blade where we want all our movies to be visble. 
Below is the whole movie table and the data in relation from other models-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Navigation bar -->
    <header class="bg-red" style="position: fixed; width: 100%; margin-top: 0px; background-color: rgb(246, 236, 255); box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global" style="padding: 20px 20px;">
            <div class="flex lg:flex-1" style="margin-top: -11px;">
                <h1>
                    <a href="#" class="-m-1.5 p-1.5" style="font-size: 30px; font-weight: 900;">
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
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">My Reviews</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">My Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <span id="user-info" class="text-sm font-semibold leading-6 text-gray-900" style="margin-top: 7px;"></span>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <br /><br /><br /><br />

    <!-- Main content -->
    <div class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Movies -->
                    <ul style="box-shadow: 2px 2px 20px 2px rgb(227, 227, 227); padding: 10px 20px; margin-top:30px;">
                        <h2>{{ __('All Movies') }}</h2>
                        @foreach ($movies as $movie)
                        
                        <p style="font-weight: 700;">Movie name: {{ $movie->title }}</p>
                        <!-- Each foreach below fetches data from the related models of the movie -->
                        <!-- <p>Actors:
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
                        </p> -->

                        <p>Ratings: {{ $movie->ratings }}</p>

                        <!-- the !! is used to display the html tags. And in this cas it is used to display the trailer -->
                        <!-- <p>Trailer: {!! $movie->trailer !!}</p> -->

                        <!-- the img tag is to display the poster -->
                        <p><!--Poster:--> <img src="{{ $movie->poster }}" alt="Poster"></p>
                        <br><br>

                        <!-- <p>Runtime: {{ $movie->runtime }}</p>

                        <p>Language: {{ $movie->language }}</p>

                        <p>Description: {{ $movie->description }}</p> -->
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>