<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    This is a test, don't you see?
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
















































<!-- <div>

@foreach ($movies as $movie)
<ul>
    <p>Title: {{ $movie->title }}</p>
    <p>Description: {{ $movie->description }}</p>
    <p>Actor: {{ $movie->actor }}</p>
    <p>Genre: {{ $movie->genre }}</p>
    </iframe>
</ul>
@endforeach

<-- frame:n displayas men länken går inte att köra -->
<!-- @if($movie = App\Models\Admin\cmdb_movies::find(6)) -->


<!-- en klickbar poster som öppnas upp på samma sida -->
<!-- <a href="{{ $movie->poster }}" target="_self">
    <img src="{{ $movie->poster }}" alt="Movie Poster" width="200" height="350">
</a>


@else
<p>No movie found with id:5.</p>
@endif'

</div>  -->