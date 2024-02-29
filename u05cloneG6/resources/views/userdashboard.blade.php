<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Userdashboard</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Navigation bar -->
    <header class="bg-red" style="position: fixed; width: 100%; margin-top: 0px; background-color: rgb(246, 236, 255); box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global"
            style="padding: 20px 20px;">
            <div class="flex lg:flex-1" style="margin-top: -11px;">
                <h1>
                    <a href="#" class="-m-1.5 p-1.5" style="font-size: 30px; font-weight: 900;">
                        CMDb
                    </a>
                </h1>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
            <a href="/movies" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
                <a href="/userdashboard" class="text-sm font-semibold leading-6 text-gray-900">My Reviews</a>
                <a href="/watchlist" class="text-sm font-semibold leading-6 text-gray-900">Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <span id="user-info"
                    class="text-sm font-semibold leading-6 text-gray-900" style="margin-top:7px;">{{ Auth::user()->name }}</span>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit"
                        class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        </nav>
    </header>
    <br><br><br>

    <!-- Main content -->
    <div class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Functionality template -->
                    <h2 style="font-weight: 700;">Your Reviews</h2>

                    @forelse ($userReviews as $review)
                    <div>
                        <p>Movie: {{ $review->movieReviewsRelationship->title }}</p>
                        <p>Stars: {{ $review->stars }}</p>
                        <p>Comment: {{ $review->comment }}</p>

                        <form action="{{ route('reviews.destroy', ['review_id' => $review->id]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 dark:text-red-400 mt-2">Delete Review</button>
                        </form>
                    </div>
                    @empty
                    <p>No reviews found.</p>
                    @endforelse

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <br><br>
                    <h2 style="font-weight: 700;">Add a Review</h2>
<br><br>
<form action="{{ route('reviews.store') }}" method="post">

    @csrf

    <label for="movie_id">Select Movie:</label>

    <select class="border-solid border-2 border-indigo-600;" name="movie_id" id="movie_id" required>

        @foreach ($movies as $movie)

            <option value="{{ $movie->id }}">{{ $movie->title }}</option>

        @endforeach

    </select>




    <label for="stars">Stars:</label>

    <input class="border-solid border-2 border-indigo-600;" name="stars" id="stars" required>




    <label for="comment">Comment:</label>

    <textarea class="border-solid border-2 border-indigo-600;" name="comment" id="comment" required></textarea>




    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">




    <button class="border-solid border-2 border-indigo-900;" type="submit">Submit Review</button>

</form>
                </div>
            </div>
        </div>
    </div>  

</body>

</html>
