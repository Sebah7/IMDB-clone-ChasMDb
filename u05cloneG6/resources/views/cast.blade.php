<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


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
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">My Reviews</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">My Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <span id="user-info"
                    class="text-sm font-semibold leading-6 text-gray-900" style="margin-top: 7px;">{{ Auth::user()->name }}</span>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit"
                        class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        </nav>
    </header>
    <br><br><br><br><br>

<div class="" style="display:flex;"> <!-- Tailwind classes for margin top, bottom, centering, and flex container -->
    <div class="director-section" style="width:50%;"> <!-- CSS class for Director section -->
        <h2 class="text-3xl font-bold text-center text-gray-800 py-4"> <!-- Tailwind classes for heading -->
            Castmembers
        </h2>

        <div style="color: rgb(0, 0, 0); background:linear-gradient(to top left, rgb(216, 216, 255), rgb(255, 221, 255)); padding: 10px; border-radius: 10px; box-shadow: 2px 2px 20px 2px rgb(224, 224, 224); display:flex;">
            @if (session('success'))
            <div class="alert alert-success mt-6">
                {{ session('success') }}
            </div>
            @endif
    
            @if (session('director_success'))
            <div class="alert alert-success mt-6">
                {{ session('director_success') }}
            </div>
            @endif
    
            <p>Director:</p>
            @if (isset($directors))
            @foreach ($directors as $director)
            {{ $director->director_name }},
            @if (auth()->check() && auth()->user()->role == '0')
            <form action="{{ route('directors.destroy', $director->id) }}" method="POST" style="color: rgb(0, 0, 0); background:linear-gradient(to top left, rgb(216, 216, 255), rgb(255, 221, 255)); padding: 10px; border-radius: 10px; box-shadow: 2px 2px 20px 2px rgb(224, 224, 224);">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 dark:text-red-400 mt-2">Delete</button>
            </form>
            @endif
            @endforeach
            @endif
            
        </div>
    </div>

    <div class="actor-section" style="width:50%;"> <!-- CSS class for Actor section -->
        <h2>Actor</h2>
        <div style="color: rgb(0, 0, 0); background:linear-gradient(to top left, rgb(216, 216, 255), rgb(255, 221, 255)); padding: 10px; border-radius: 10px; box-shadow: 2px 2px 20px 2px rgb(224, 224, 224); display:flex;">
            @if (isset($actors))
            @foreach ($actors as $actor)
            {{ $actor->name }},
            @if (auth()->check() && auth()->user()->role == '0')
            <form action="{{ route('actors.destroy', $actor->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 dark:text-red-400 mt-2">Delete</button>
            </form>
            @endif
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
