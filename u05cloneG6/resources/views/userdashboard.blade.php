<h2>Your Reviews</h2>

@forelse ($userReviews as $review)
    <div>
        <p>Stars: {{ $review->stars }}</p>
        <p>Comment: {{ $review->comment }}</p>

        <form action="{{ route('reviews.destroy', ['review_id' => $review->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Review</button>
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