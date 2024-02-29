<h2>
    Castmembers:
</h2>

<p>Director:</p>
@if (isset($directors))
@foreach ($directors as $director)
{{ $director->director_name }},
@if (auth()->check() && auth()->user()->role == '0')
                        <form action="{{ route('directors.destroy', $director->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 dark:text-red-400 mt-2">Delete</button>
                        </form>
                        @endif
@endforeach
@endif
<br> <br>

<p>Actor:</p>
@if (isset($actors))
@foreach ($actors as $actor)
{{ $actor->name }},
@endforeach
@endif