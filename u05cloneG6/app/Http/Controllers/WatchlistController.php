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

    public function destroy($id)
{
    $movie = cmdb_movies::find($id);

    // Check if the movie belongs to the logged-in user
    if ($movie->user_id != Auth::id()) {
        return redirect()->back()->with('error', 'Unauthorized access');
    }

    // Delete the movie
    $movie->delete();

    return redirect()->back()->with('success', 'Movie deleted successfully');
}
}
