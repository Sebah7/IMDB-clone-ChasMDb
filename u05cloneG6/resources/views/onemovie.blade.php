<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
            <a href="/cast" class="text-sm font-semibold leading-6 text-gray-900">Cast</a>
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
                    <button type="submit"
                        class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
            @else
                <a href="/register" class="text-sm font-semibold leading-6 text-white" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 30px; padding: 5px 15px; border-radius: 5px;">Sign Up <span aria-hidden="true">&rarr;</span></a>
                <a href="/login" class="text-sm font-semibold leading-6 text-white" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 0px; padding: 5px 15px; border-radius: 5px;">Log in <span aria-hidden="true">&rarr;</span></a>
            @endauth
        </div>
    </nav>
</header>
<br /><br /><br />


    @if(isset($movie))
    <h1>{{ $movie->title }}</h1>
    <p>{{ $movie->ratings }}</p>
    <p>{{ $movie->description }}</p>
    <p>{{ $movie->runtime }}</p>
    <img src="{{ $movie->poster }}" alt="Poster for {{ $movie->title }}">
    {!! $movie->trailer !!}

    <!-- Calling out the actors, directors, genres, reviews related to the movie -->
<h2>Actors</h2>
    @foreach($movie->actors as $actor)
        <p>{{ $actor->name }}</p>
    @endforeach

    <h2>Directors</h2>
    @foreach($movie->directors as $director)
        <p>{{ $director->director_name }}</p>
    @endforeach

    <h2>Genres</h2>
    @foreach($movie->genres as $genre)
        <p>{{ $genre->name }}</p>
    @endforeach

    <h2>Reviews</h2>
    @foreach($movie->reviews as $review)
        <p>{{ $review->Comment }}</p>
    @endforeach
@endif


    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

