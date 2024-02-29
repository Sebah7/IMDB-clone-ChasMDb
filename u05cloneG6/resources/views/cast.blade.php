<h2>
    Castmembers:
</h2>
<br>
@if (session('success'))
<div class="alert alert-success mt-6">
    {{ session('success') }}
</div>
@endif

<br> <br>

<p>Actor:</p>
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