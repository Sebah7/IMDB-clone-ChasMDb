<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | CMDb</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
            /* Adjust as needed */
        }

        .heading {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .content {
            color: #555;
            margin-bottom: 20px;
        }

        .navbar {
            background-color: rgb(246, 236, 255);
            box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);
            position: fixed;
            width: 100%;
            z-index: 999;
            /* Ensure it's above other elements */
        }

        .navbar a {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-right: 20px;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .navbar a:hover {
            color: #6c63ff;
        }

        .navbar .logo {
            font-size: 30px;
            font-weight: 900;
        }

        .logout-btn {
            background-color: #6c63ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .logout-btn:hover {
            background-color: #5649b3;
        }
    </style>
</head>

<body>
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
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/movies" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
                <a href="/modify" class="text-sm font-semibold leading-6 text-gray-900">Modify</a>
                <a href="/watchlist" class="text-sm font-semibold leading-6 text-gray-900">Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{ route('profile.edit') }}" style="margin-top:8px;">
                    <span id="user-info" class="text-sm font-semibold leading-6 text-white bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md mr-4" style="margin-top:17px; padding:10px 14px;">
                        {{ Auth::user()->name }}
                    </span>
                </a>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        </nav>
    </header>
    <br /><br /><br /><br />

    <div class="container">
        <div class="heading">Admin Dashboard</div>
        <div class="content">
            You're logged in as {{ Auth::user()->role ? "user" : "admin." }}<br>
            Click on your name to get to your profile settings.
        </div>

        <h2 class="text-2xl font-semibold mb-6">All Users Reviews</h2>

<ul>
    @foreach ($allReviews as $review)
    @if ($review->userReviewsRelationship && $review->movieReviewsRelationship)
    <li>
        {{ $review->userReviewsRelationship->name }} reviewed {{ $review->movieReviewsRelationship->title }} - {{ $review->comment }} - Rating: {{ $review->stars }}
        <form action="{{ route('admin.deleteReview', ['review' => $review->id]) }}" method="post" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 dark:text-red-400 ml-2">Delete Review</button>
        </form>
    </li>
    @endif
    @endforeach
</ul>

@if(session('success'))
<div class="alert alert-success mt-6">
    {{ session('success') }}
</div>
@endif

    </div>
</body>

</html>