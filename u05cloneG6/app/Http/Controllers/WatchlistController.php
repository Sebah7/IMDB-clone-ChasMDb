<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_movies;
use App\Models\Admin\cmdb_watchlist;
use App\Models\User;
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
         *The Auth::user() method is being used to get the authenticated user.
         * The if was added to check if the user has a watchlist. 
         * If the user doesn't have a watchlist, a new watchlist is created.
         */

    $user = Auth::user();

    if ($user->userwatchlist === null) {
        $watchlist = new cmdb_watchlist;
        $user->userwatchlist()->save($watchlist);
    }

        $userWatchlist = Auth::user()->userwatchlist->movies;

        $allMovies = cmdb_movies::all();

        return view('watchlist', ['userWatchlist' => $userWatchlist, 'allMovies' => $allMovies]);
    }


    public function store(Request $request)
{
    /**
     * After the user is authenticated, 
     * the movie_id can being stored in the variable $movie_id.
     * If the movie_id is already in the watchlist, 
     * a message is being returned to the user.
     */
    $user = Auth::user();
    $movie_id = $request->movie_id;

    if ($user->userwatchlist->movies->contains($movie_id)) {
        return redirect()->back()->with('info', 'Movie is already in the watchlist');
    }

    $user->userwatchlist->movies()->attach($movie_id);
    return redirect()->back()->with('success', 'Movie added to watchlist successfully');
}


public function destroy($id)
{
    /**
     * The movie_id here is being detached from the watchlist of the Auth::user.
     */
    Auth::user()->userwatchlist->movies()->detach($id);

    return redirect()->back()->with('movie_watchlist_delete_success', 'Movie removed from watchlist successfully');
}

}
