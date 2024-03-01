<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\cmdb_watchlist;


class WatchlistController extends Controller
{
    public function index()
    {
        $userWatchlist = Auth::user()->movies()->get();
        $allMovies = cmdb_movies::all();

        return view('watchlist', compact('userWatchlist', 'allMovies'));
    }

    public function addToWatchlist(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:cmdb_movies,id',
        ]);

        $user = Auth::user();
        $user->movies()->attach($request->input('movie_id'));

        return back()->with('success', 'Movie added to watchlist successfully.');
    }

    public function removeMovie(Request $request, $watchlistId, $movieId)
{
    $watchlist = cmdb_watchlist::find($watchlistId);

    // Check if the watchlist belongs to the logged-in user
    if ($watchlist->user_id != Auth::id()) {
        return redirect()->back()->with('error', 'Unauthorized access');
    }

    // Remove the movie from the watchlist
    $watchlist->movies()->detach($movieId);

    return redirect()->back()->with('success', 'Movie removed from watchlist');
}
}
