<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>CMDb-G6</title>
</head>

<body>
    <style>
        body{
            overflow-x: hidden;
        }
    </style>

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
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="/movies" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
            <a href="/genres" class="text-sm font-semibold leading-6 text-gray-900">Genres</a>
            <a href="/cast" class="text-sm font-semibold leading-6 text-gray-900">Castlibrary</a>
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




    <style>
        @media (max-width: 900px) {
            .right__ {
                display: none;
            }

            .ouhwyirkfu948 {
                padding: 0 20px;
            }

            .moviesection .w-full {
                width: 100px;
            }
        }
    </style>


        <div class="ouhwyirkfu948" style="display: flex; width: 100%; height: 98vh; align-items: center; justify-content: center; background: linear-gradient(to top right, pink, rgba(106, 106, 255, 0.137), rgba(255, 166, 0, 0.132));">
        <div class="slideshow-container">
            <img class="slide" src="https://media.istockphoto.com/id/1205279508/sv/foto/randig-l%C3%A5da-med-popcorn.jpg?s=612x612&w=0&k=20&c=vZ3zU2Fa9hdHFtiHiATXI5yOSO7LJbIVYyGdgwzmEnA=" alt="Slide 1">
            <img class="slide" src="https://media.istockphoto.com/id/115022743/sv/foto/cinema-hall.jpg?s=612x612&w=0&k=20&c=PsbK09d-6rzJRVc6PodfISn7Y-C23BwnCONuNleAPlg=" alt="Slide 2">
            <img class="slide" src="https://media.istockphoto.com/id/1455714258/sv/foto/bright-spotlights-near-wall-in-dark-room-space-for-text.jpg?s=612x612&w=0&k=20&c=vP3X55xSgwa8gIuZPKqKcbygzbnlw1BAgcDTjRwWpRc=" alt="Slide 3">
            <img class="slide" src="https://media.istockphoto.com/id/1332167970/sv/foto/coming-soon-neon-sign-the-banner-shining-light-signboard-collection.jpg?s=612x612&w=0&k=20&c=RoqBG_vyYdDDitSxlX3mXgUqyF1bTfpM7fRU4Iz6kV0=" alt="Slide 4">
            <img class="slide" src="https://media.istockphoto.com/id/1128524161/sv/foto/gamla-svartvita-negativ-film-rullar-retro-reels-bildband-fotografisk-film-vintage-bakgrund.jpg?s=612x612&w=0&k=20&c=CNjK2HgYiwAt9kE2baGxwI50gvP63cM0riLBNAcDgIM=" alt="Slide 5">
            <img class="slide" src="https://media.istockphoto.com/id/1697201106/sv/foto/storytelling-text-title-on-film-slate-or-movie-clapper-board-for-filmmakers-and-film-industry.jpg?s=612x612&w=0&k=20&c=Su3m5KYH_Y9s-zgpldxemdumX6dR-1BLUEFG2Nws81Q=" alt="Slide 6">
            <!-- Add more images here -->
        </div>

    <style>
        .slide {
            width: 100%;
            height: 100%;
            border-radius: 20px;
            object-fit: cover; /* Ensure images cover the entire container */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let slideIndex = 0;
            const slides = document.querySelectorAll('.slide');

            function showSlides() {
                slides.forEach(slide => slide.style.display = 'none');
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                slides[slideIndex - 1].style.display = 'block';
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }

            showSlides();
        });
    </script>
</div>

    </div>




    <!--- user adjustments -->

    <div class="userfiltersection" style="display: flex; justify-content:center; padding: 10px 20px;" id="movies__">
        <div style="margin-top: 10px;">
<h2 class="text-3xl font-semibold bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent border-b-2 border-black pb-2">
                Get inspired from the latest of our dämn movies
</h2>
        </div>
    </div>


    <div class="moviesection">
        <style>
            .moviesection {
                display: flex;
                justify-content: center;
                align-items: center;
/*                 margin-bottom: 150px; */
                margin-top:0px;

            }

            .w-full {
                margin-top: 0px;
                width: calc(20% - 15px);
                box-sizing: border-box;
            }
        </style>
        <!-- component -->

        <div class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="">
                    <div class="p-6 text-gray-900 dark:text-gray-100" style="margin-left:35px;">
                        <!-- Movies -->
                        <ul class="flex space-x-4 overflow-x-auto" style="padding: 10px 20px; margin-top:-30px;margin-left:30px; white-space: nowrap; justify-content: space-between; text-aline:center;">
                                @foreach ($movies as $movie)
                                <li class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-white-800 dark:border-white-700" style="border-style: solid; padding: 0; width: 200px; height:300px; margin-left:20px; justify-content: space-between;">
                                    <a href="#">
                                        <img class="movie-poster" src="{{ $movie->poster }}" alt="movie image" />
                                    </a>
                                    <style>
                                        .movie-poster {
                                            width: 100%;
                                            height: 50%;
                                            object-fit: cover;
                                        }

                                    </style>
                                    <div class="px-5 pb-5">
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
                                            <a href="/watchlist" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ watchlist</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                    </div>
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
