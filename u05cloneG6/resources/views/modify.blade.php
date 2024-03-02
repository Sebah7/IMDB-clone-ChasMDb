
<h2 class="text-2xl font-semibold mb-6">All Reviews</h2>

@if ($allReviews->isEmpty())
<p>No reviews available.</p>
@else
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
@endif

@if(session('success'))
<div class="alert alert-success mt-6">
    {{ session('success') }}
</div>
@endif