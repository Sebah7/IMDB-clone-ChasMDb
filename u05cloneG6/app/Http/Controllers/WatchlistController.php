<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\cmdb_watchlist;
use App\Models\User;


class WatchlistController extends Controller
{
    public function index()
    {
       // Retrieve the current authenticated user
        $user = Auth::user();

        dd($user->id);

       // Get the watchlist for the user with eager loading for the associated movie data
        $watchlist = cmdb_watchlist::where('id')->where('user_id', $user->id)->first();
       
        dd($watchlist);
       
        $movies = $watchlist->watchlistMovieRelation()->get();

        return view('watchlist', compact('watchlist'));

       
       
        // TEST 1 $watchlist = cmdb_watchlist::where('id')->first();
        // $watchlistmovies = $watchlist->watchlistMovieRelation()->get();

      //  return view('watchlist', ['watchlists' => $watchlist, 'watchlistmovies' => $watchlistmovies]); 


        // TEST 2  $user = User::with('watchlist')->find(\Auth::id());

        //  var_dump($user);
        
    
    }

    //public function addToWatchlist($id)
//{

    //$createItemInWatchlist = Watchlist::create([
     //   'user_id' => Auth::user()->id,
       // 'movie_id' => $id
    //]);

    //return Redirect::to('watchlist');  
//}

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'movie_id' => 'required|exists:movie_id',
        ]);

        // Add item to the user's watchlist
        auth()->user()->watchlist()->create([
            'movie_id' => $request->movie_id,
        ]);

        // Redirect back with success message
        return back()->with('success', 'Movie added to watchlist successfully.');
    }

    public function destroy(Watchlist $watchlist)
    {
        // Ensure the user owns the watchlist entry
        $this->authorize('delete', $watchlist);

        // Delete the watchlist entry
        $watchlist->delete();

        // Redirect back with success message
        return back()->with('success', 'Movie removed from watchlist successfully.');
    }
} 