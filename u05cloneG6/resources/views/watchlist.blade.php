<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Watchlist | CMDb-G6</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Navigation bar -->

    <header class="bg-red" style="position: fixed; width: 100%; margin-top: 0px; background-color: rgb(246, 236, 255); box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global" style="padding: 20px 20px;">
            <div class="flex lg:flex-1" style="margin-top: -11px;">
                <h1>
                    <a href="/" class="-m-1.5 p-1.5" style="font-size: 30px; font-weight: 900;">
                        CMDb
                    </a>
                </h1>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="navbaricone h-6 w-6" onclick="toggleNavbarLinks()" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <style>
                .navbarlinks___ {
                    visibility: hidden;
                    background-color: rgb(246, 236, 255);
                    width:100%;
                    padding: 5px 15px;
                    position: fixed;
                    top:75px;
                    left: 0px;
                }
                .navbarlinks___ a{
                    box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);
                    width:100%;
                    padding: 10px;
                    border-radius:10px;
                }
            </style>
            <script>
                function toggleNavbarLinks() {
                    var navbarLinks = document.getElementById("navbarLinks");
                    if (navbarLinks.style.visibility === "visible") {
                        navbarLinks.style.visibility = "hidden";
                    } else {
                        navbarLinks.style.visibility = "visible";
                    }
                }
            </script>
            <div class="navbarlinks___" id="navbarLinks">
                <a href="/movies" class="text-sm font-semibold leading-6 text-gray-900">Movies</a><br /><br />
                <a href="/genres" class="text-sm font-semibold leading-6 text-gray-900">Genres</a><br /><br />
                <a href="/cast" class="text-sm font-semibold leading-6 text-gray-900">Cast Library</a><br /><br />
                <a href="/userdashboard" class="text-sm font-semibold leading-6 text-gray-900">Reviews</a><br /><br />
                <a href="/watchlist" class="text-sm font-semibold leading-6 text-gray-900">Watchlist</a><br /><br /><br />

                @auth

                <a href="/home" style="margin-top:8px;"><span id="user-info" class="text-sm font-semibold leading-6 text-white bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md mr-4" style="margin-top:17px; padding:10px 14px;">
                        {{ Auth::user()->name }}</a>
                </span>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
                @else
                <a href="/register" class="text-sm font-semibold leading-6 text-white" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 30px; padding: 5px 15px; border-radius: 5px;">Sign Up <span aria-hidden="true">&rarr;</span></a>
                <a href="/login" class="text-sm font-semibold leading-6 text-white" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 0px; padding: 5px 15px; border-radius: 5px;">Log in <span aria-hidden="true">&rarr;</span></a>
                @endauth
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/movies" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
                <a href="/genres" class="text-sm font-semibold leading-6 text-gray-900">Genres</a>
                <a href="/cast" class="text-sm font-semibold leading-6 text-gray-900">Cast Library</a>
                <a href="/userdashboard" class="text-sm font-semibold leading-6 text-gray-900">Reviews</a>
                <a href="/watchlist" class="text-sm font-semibold leading-6 text-gray-900">Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                @auth

                <a href="/home" style="margin-top:8px;"><span id="user-info" class="text-sm font-semibold leading-6 text-white bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md mr-4" style="margin-top:17px; padding:10px 14px;">
                        {{ Auth::user()->name }}</a>
                </span>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
                @else
                <a href="/register" class="text-sm font-semibold leading-6 text-white" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 30px; padding: 5px 15px; border-radius: 5px;">Sign Up <span aria-hidden="true">&rarr;</span></a>
                <a href="/login" class="text-sm font-semibold leading-6 text-white" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 0px; padding: 5px 15px; border-radius: 5px;">Log in <span aria-hidden="true">&rarr;</span></a>
                @endauth
            </div>
        </nav>
    </header>
    <br /><br /><br />
    <!-- Main Content -->
    <div class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <form action="{{ route('watchlist.store') }}" method="post">
                        @csrf
                        <label for="movie_id">Add Movie to Watchlist:</label>
                        <select class="border-solid border-2 border-gray-300;" name="movie_id" id="movie_id">
                            @foreach ($allMovies as $movie)
                            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                            @endforeach
                        </select>
                        <button class="border-solid border-2 border-gray-900;" type="submit">Add Movie</button>
                    </form>

                    @if ($userWatchlist->isEmpty())
                    <p>Your watchlist is empty.</p>

                    @else
                    @if(session('movie_watchlist_delete_success'))
                    <div class="alert alert-success mt-6">
                        {{ session('movie_watchlist_delete_success') }}
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success mt-6">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('info'))
                    <div class="alert alert-info mt-6">
                        {{ session('info') }}
                    </div>
                    @endif
                    <h2 style="font-weight: 700;">My Watchlist</h2>
                    @foreach ($userWatchlist as $movie)
                    <ul style="
            background-color: white;
            box-shadow: 2px 2px 20px 2px rgb(207, 207, 207);
            padding: 10px 20px;
            width: 100%;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            
            ">
                        <p style="font-weight: 700;">{{ $movie->title }}</p>

                        <form action="{{ route('watchlist.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 dark:text-red-400 mt-2" type="submit">Delete Movie</button>
                        </form>
                    </ul>
                    @endforeach
                    </ul>
                    @endif
                    <br><br>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 200px; text-align: center;">
        <hr style="height: 2px; background-color: black;">
        <p style="margin-top: 50px;">Developed by <a href="https://github.com/chas-academy/u05-imdb-klon-grupp-6/" style="color: blue; margin-top: 50px;">u05-imdb-klon-grupp-6</a></p>
    </div>
    
</body>
</html>