<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_movies;
use App\Models\Admin\cmdb_reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ReviewsController extends Controller
{
    public function index()
    {
        $movies = cmdb_movies::with('reviews')->get();

        return view('movies', compact('movies'));
    }

    public function create()
    {
        $movies = cmdb_movies::all();
        return view('reviews');
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|integer',
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'user_id' => 'nullable|integer',
        ]);

        // This is to check if the user has already added a review to the movie
       $existingReview = cmdb_reviews::where('movie_id', $request->movie_id)
       ->where('user_id', Auth::id())
       ->first();

       if ($existingReview) {
       return back()->with('error', 'You have already added a review to this movie.');
       }
        
        $review = cmdb_reviews::create($request->all());

        return back()->with('success', 'Review created successfully');

        //alternativ route 
        //return redirect()->route('movie.index', $request->input('movie_id'))->with('success', 'Review created successfully');  

    }

    public function show($id)
    {
        $movie = cmdb_movies::with('reviews')->findOrFail($id);
        dd($movie);
        // Rest of the method
    }

    public function destroy($id)
    {
        $review = cmdb_reviews::find($id);

        if ($review) {
            // Check if the authenticated user owns the review
            if ($review->user_id == Auth::id()) {
                $review->delete();
                return redirect()->route('userdashboard')->with('success', 'Review deleted successfully');
            }
        }
    }

    public function userDashboard()
    {
        $userReviews = cmdb_reviews::with('movieReviewsRelationship')->where('user_id', Auth::id())->get();
        $movies = cmdb_movies::all();
        return view('userdashboard', compact('userReviews', 'movies'));
    }

    public function adminModify()
    {
        $allReviews = cmdb_reviews::with('userReviewsRelationship', 'movieReviewsRelationship')->get();
        dd($allReviews);  // Debugging code

        return view('layouts.show', compact('allReviews'));
    }

    public function adminDeleteReview($reviewId)
    {
        $review = cmdb_reviews::findOrFail($reviewId);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}
