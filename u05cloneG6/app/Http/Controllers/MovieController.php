<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * the with() method gets the actors, genres, ratings, and directors from their respective tables, with the help of the relationships defined in the cmdb_movies model.
         */
        
        $movies = cmdb_movies::with('actors:name', 'genres:name', 'directors:director_name')->get();
        return view('movies', ['movies' => $movies]);
        // $movies = cmdb_movies::all();
        // return view('movies', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = cmdb_movies::create();
        return view('movies.index', compact('movies'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'actor' => 'required|max:255',
        'director' => 'required|max:255',
        'genre' => 'required|max:255',
        // Add more fields as needed
    ]);

    // Create a new movie
    $movie = cmdb_movies::create($validatedData);

    // Attach actors, genres, watchlists, directors to the movie
    // Assuming that the request contains arrays of IDs named 'actors', 'genres', 'watchlists', 'directors'
    $movie->actors()->attach($request->actors);
    $movie->genres()->attach($request->genres);
    $movie->watchlists()->attach($request->watchlists);
    $movie->directors()->attach($request->directors);

    return redirect(route('modify'))->with('success', 'Movie added successfully!');
}
        // {
        //     $movies = $request->validate([
        //         'title' => 'required|max:255',
        //         'actor' => 'required|max:255',
        //         'director' => 'required|max:255',
        //         'genre' => 'required|max:255',
        //         // Add more fields as needed
        //     ]);
        //     // Create a new movie
        //     cmdb_movies::create($movies);

        //     return redirect(route('modify'))->with('success', 'Movie added successfully!');
        // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('modify');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (cmdb_movies::where('id', $id)->exists()) {

            $movie = cmdb_movies::find($id);
            $movie->title = is_null($request->title) ? $movie->title : $request->title;
            $movie->description = is_null($request->description) ? $movie->description : $request->description;
            $movie->done = is_null($request->done) ? $movie->done : $request->done;
            $movie->save();
        }

        return "Storing the movies";
        // return view('modify');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
