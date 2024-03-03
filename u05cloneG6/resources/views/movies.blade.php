<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .moviesection {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .movie-card {
            position: relative;
            /* Ensure relative positioning for absolute children */
            flex: 0 0 calc(20% - 15px);
            /* Adjust width as needed */
            margin: 10px;
            padding: 0;
            height: 300px;
            border: solid;
            border-width: 1px;
            border-color: black;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            overflow: hidden;
            /* Hide overflow content */
        }

        .movie-poster {
            width: 100%;
            height: 100%;
            /* Update height to fill the card */
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .movie-card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Add a semi-transparent background */
        }

        .movie-card-content a {
            color: #000;
            /* Adjust link color as needed */
            text-decoration: none;
        }

        .delete-button {
            position: absolute;
            top: 25px;
            /* Updated margin-top */
            right: 10px;
            padding: 10px;
            background-color: rgba(255, 0, 0, 0.8);
            /* Add a semi-transparent red background */
            color: #fff;
            /* Button text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Fixed navbar */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
        }
    </style>
</head>
<style>
    .delete-button {
        margin-top: 15px;
        /* Add margin-top */
    }

    /* Fixed navbar */
    header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 999;
    }
</style>

<body class="bg-gray-100 dark:bg-gray-900">

    <!---nav bar using tailwind-->

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
    <br /><br /><br /><br /><br />


    @if (session('movie_delete_success'))
    <div class="alert alert-success">
        {{ session('movie_delete_success') }}
    </div>
    @endif

    <!-- Main content -->
    <div class="moviesection" style="position: relative;">
        <style>
            .moviesection {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
                align-items: center;
                margin-top: 0px;
            }

            .movie-card {
                position: relative;
                /* Ensure relative positioning for absolute children */
                flex: 0 0 calc(20% - 15px);
                /* Adjust width as needed */
                margin: 10px;
                padding: 0;
                height: 300px;
                border: solid;
                border-width: 1px;
                border-color: black;
                border-radius: 10px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
                overflow: hidden;
                /* Hide overflow content */
            }

            .movie-poster {
                width: 100%;
                height: 100%;
                /* Update height to fill the card */
                object-fit: cover;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .movie-card-content {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                padding: 10px;
                background-color: rgba(255, 255, 255, 0.8);
                /* Add a semi-transparent background */
            }

            .movie-card-content a {
                color: #000;
                /* Adjust link color as needed */
                text-decoration: none;
            }

            .delete-button {
                position: absolute;
                top: 10px;
                right: 10px;
                padding: 10px;
                background-color: rgba(255, 0, 0, 0.8);
                /* Add a semi-transparent red background */
                color: #fff;
                /* Button text color */
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 15px;
                /* Add margin-top */
            }

            /* Fixed navbar */
            header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 999;
            }
        </style>

        <!-- Movies -->

        @foreach ($movies as $movie)


        <div class="movie-card">
            <a href="#">
                <img class="movie-poster" src="{{ $movie->poster }}" alt="movie image" />
            </a>

            <div class="movie-card-content">
                <a href="{{ route('onemovie.showPreview', $movie->title) }}">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $movie->title }}</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        @for ($i = 0; $i < $movie->ratings; $i++)
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            @endfor
                            @for ($i = $movie->ratings; $i < 5; $i++) <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                @endfor
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $movie->ratings }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <a href="/watchlist" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Watchlist</a>

                    @if (auth()->user() && auth()->user()->role == '0')
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">X</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
        @endforeach

    </div>
