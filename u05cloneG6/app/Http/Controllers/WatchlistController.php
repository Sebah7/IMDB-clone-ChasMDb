<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WatchlistController extends Controller
{
    public function index()
    {
        /**
         * The $userWatchlist variable is being used to store movies that Auth::user has added to watchlist.
         * The $allMovies variable is being used to store all movies from the cmdb_movies table.
         * The view is being returned with the $userWatchlist and $allMovies variables.
         */
        $userWatchlist = Auth::user()->watchlist->movies;

        $allMovies = cmdb_movies::all();

        return view('watchlist', ['userWatchlist' => $userWatchlist, 'allMovies' => $allMovies]);
    }


    public function store(Request $request)
{
    /**
     * The request is being validated to ensure that the movie_id is being sent.
     * Here the movie_id is being attached to the watchlist of the Auth::user.
     */
    Auth::user()->watchlist->movies()->attach($request->movie_id);

    return redirect()->back()->with('success', 'Movie added to watchlist successfully');
}


public function destroy($id)
{
    /**
     * The movie_id here is being detached from the watchlist of the Auth::user.
     */
    Auth::user()->watchlist->movies()->detach($id);

    return redirect()->back()->with('movie_watchlist_delete_success', 'Movie removed from watchlist successfully');
}

}
