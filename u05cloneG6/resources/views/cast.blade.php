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
                <a href="/watchlist" class="text-sm font-semibold leading-6 text-gray-900">Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="/register" class="text-sm font-semibold leading-6 text-gray-900" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 30px; padding: 5px 15px; border-radius: 5px; color: white;">SignUp <span aria-hidden="true">&rarr;</span></a>
                <a href="/login" class="text-sm font-semibold leading-6 text-gray-900" style="background: linear-gradient(to left, rgb(119, 119, 255), rgb(153, 0, 255)); margin-right: 0px; padding: 5px 15px; border-radius: 5px; color: white;">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
    </header>
<br /><br /><br /><br />


<div class="mt-30 mb-30 mx-auto max-w-md flex flex-col md:flex-row"> <!-- Tailwind classes for margin top, bottom, centering, and flex container -->
    <div class="director-section"> <!-- CSS class for Director section -->
        <h2 class="text-3xl font-bold text-center text-gray-800 py-4"> <!-- Tailwind classes for heading -->
            Director:
        </h2>

        <div class="director-list px-6 pt-4 pb-6"> <!-- CSS class for Director list -->
            @if (isset($directors))
                @foreach ($directors as $director)
                    <div class="director-item flex items-center justify-between mb-2"> <!-- CSS class for Director item -->
                        <span class="mr-2">{{ $director->director_name }}</span> <!-- Tailwind classes for margin right -->
                        <button class="text-red-600" onclick="deleteDirector('{{ $director->id }}')">Delete</button> <!-- Tailwind classes for button and text color -->
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="actor-section"> <!-- CSS class for Actor section -->
        <h2 class="text-3xl font-bold text-center text-gray-800 py-4"> <!-- Tailwind classes for heading -->
            Actor:
        </h2>

        <div class="actor-list px-6 pt-4 pb-6"> <!-- CSS class for Actor list -->
            @if (isset($actors))
                @foreach ($actors as $actor)
                    <div class="actor-item flex items-center justify-between mb-2"> <!-- CSS class for Actor item -->
                        <span class="mr-2">{{ $actor->name }}</span> <!-- Tailwind classes for margin right -->
                        <button class="text-red-600" onclick="deleteActor('{{ $actor->id }}')">Delete</button> <!-- Tailwind classes for button and text color -->
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<style>
    .director-section,
    .actor-section {
        width: 100%;
    }

    @media (min-width: 768px) {
        .director-section {
            width: 50%;
            margin-right: 1rem;
        }

        .actor-section {
            width: 50%;
        }
    }
</style>
