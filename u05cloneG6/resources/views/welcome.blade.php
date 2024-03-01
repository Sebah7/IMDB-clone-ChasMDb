<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>CMDb-G6</title>
</head>

<body>

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
            <a href="/watchlist" class="text-sm font-semibold leading-6 text-gray-900">Watchlist</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @auth
                <div class="relative inline-block">
                    <span id="user-info" class="text-sm font-semibold leading-6 text-white bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md mr-4" style="margin-top:7px;">
                        {{ Auth::user()->name }}
                    </span>
                    <div class="absolute hidden profile-dropdown-content bg-white border rounded-lg mt-2 py-2 w-40" style="right: 0;">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/register" class="text-sm font-semibold leading-6 text-white" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 30px; padding: 5px 15px; border-radius: 5px;">Sign Up <span aria-hidden="true">&rarr;</span></a>
                <a href="/login" class="text-sm font-semibold leading-6 text-white" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 0px; padding: 5px 15px; border-radius: 5px;">Log in <span aria-hidden="true">&rarr;</span></a>
            @endauth
        </div>
    </nav>
</header>





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




    <!---main show-->

    <div class="ouhwyirkfu948" style="display: flex; width: 100%; height: 98vh; align-items: center; justify-content: center; background: linear-gradient(to top right, pink, rgba(106, 106, 255, 0.137), rgba(255, 166, 0, 0.132));">
    <div class="slideshow-container" style="height: 70%; width: 40%;">
        <img class="slide" src="https://media.istockphoto.com/id/1363352866/sv/foto/friends-enjoying-a-comedy-movie-at-the-cinema.jpg?s=612x612&w=0&k=20&c=abBKLjSmQbB69OmDfydgFwJ-QCD5rj7CT2mV9yg5cPo=" alt="Slide 1">
        <img class="slide" src="https://media.istockphoto.com/id/1336937059/sv/foto/film-reels-on-black-background-movie-video-and-cinema-prodaction-and-edition-concept.jpg?s=612x612&w=0&k=20&c=HjQNMl0lzUiTKe0BP2bks-DDEF34rdzhkwjVbXGnw2E=" alt="Slide 2">
        <img class="slide" src="https://media.istockphoto.com/id/1302499143/sv/vektor/modern-biobakgrund-med-filmremsa-realistisk-3d-filmremsa-i-perspektiv-3d-isometrisk.jpg?s=612x612&w=0&k=20&c=I5vx83MFQe4ad-iOtPdRyZNZjrBIDakkSnODGXulDFA=" alt="Slide 3">
        <img class="slide" src="https://media.istockphoto.com/id/1056247682/sv/vektor/vector-r%C3%B6d-gardin-bakgrund-modern-stil.jpg?s=612x612&w=0&k=20&c=VkcVtPhRT8gHHDvxDQmtpcwBNrcW60B35BoGP9iGeWM=" alt="Slide 4">
        <img class="slide" src="https://media.istockphoto.com/id/514727234/sv/foto/neon-sign-on-a-brick-wall-cinema.jpg?s=612x612&w=0&k=20&c=lqlVjovMwNEcRmcoYK7GN4DbMBz5mizdqlSRuGpxetI=" alt="Slide 5">
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
        <div style="margin-top: 20px;">
            <h2 class="text-xl font-extrabold leading-6 text-gray-900" style="font-weight: 600;">Your Damn Movies</h2>
        </div>
    </div>


    <div class="moviesection">
        <style>
            .moviesection {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 150px;
                margin-top: 50px;

            }

            .w-full {
                margin-top: 30px;
                width: calc(20% - 15px);
                box-sizing: border-box;
            }
        </style>
        <!-- component -->

        <div class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Movies -->
                        <ul class="flex space-x-4 overflow-x-auto" style="box-shadow: 2px 2px 20px 2px rgb(227, 227, 227); padding: 10px 20px; margin-top:30px; white-space: nowrap;">
                                @foreach ($movies as $movie)
                                <li class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-white-800 dark:border-white-700" style="border-style: solid; padding: 0; width: 200px; height:300px;">
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
                                        <a href="#">
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
                                            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Preview</a>
                                            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+</a>
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
