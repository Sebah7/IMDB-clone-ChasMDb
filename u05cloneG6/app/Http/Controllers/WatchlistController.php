<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\cmdb_watchlist;


class WatchlistController extends Controller
{
    public function index()
    {
        // Retrieve the user's watchlist entries
        $watchlist = cmdb_watchlist::all();

        // Return view with watchlist data
        return view('watchlist', compact('watchlist'));
    }

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