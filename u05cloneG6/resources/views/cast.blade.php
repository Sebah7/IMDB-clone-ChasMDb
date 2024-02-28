<h2>
    Castmembers:
</h2>

<p>Director:</p>
@if (isset($directors))
@foreach ($directors as $director)
{{ $director->director_name }},
@endforeach
@endif
<br> <br>
<p>Actor:</p>
@if (isset($actors))
@foreach ($actors as $actor)
{{ $actor->name }},
@endforeach
@endif