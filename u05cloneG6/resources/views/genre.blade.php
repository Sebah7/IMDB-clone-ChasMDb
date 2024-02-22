
        <h2>
            {{ __('All Genres') }}
        </h2>

                <!-- <a href="{{ route('genres.index') }}">View All Genres</a> -->
                <!-- Function Index -->
                @foreach ($genres as $genres)
            <ul>
                <p>Genre type: {{ $genres-> name }}</p>
            </ul>
            @endforeach