<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_actors;
use App\Models\Admin\cmdb_director;
use App\Models\Admin\cmdb_genre;
use App\Models\Admin\cmdb_movies;
use App\Models\User;
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

    public function MovieRandomizer()
    {
        $movies = cmdb_movies::inRandomOrder()->take(5)->get();
        return view('welcome', ['movies' => $movies]);
    }


    public function getActorsAndDirectors() //används även till att få alla users på modify.blade
    {
        $actors = cmdb_actors::all();
        $directors = cmdb_director::all();
        $genres = cmdb_genre::all();
        $users = User::all();

        return view('modify', ['actors' => $actors, 'directors' => $directors, 'genres' => $genres, 'users' => $users]);
    }

    public function create()
    {
        $actors = cmdb_actors::all();
        $directors = cmdb_director::all();
        $genres = cmdb_genre::all();

        return view('modify', compact('actors', 'directors', 'genres'));
    }


    public function showPreview($title)
    {
        /**
         * Added the with to get the actors, directors, genres and reviews related to the movie.
         */
        $movie = cmdb_movies::where('title', $title)
        ->with('actors:name', 'directors:director_name', 'genres:name', 'reviews')
        ->first();

        if ($movie) {
            return view('onemovie', ['movie' => $movie]);
        } else {
            return back()->with('error', 'Movie was not found.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * The validate method is going to return validated data or give an expection if the validation fails.
         * Then it will hold the validated data in the $validatedData variable.
         * The attach method is going to attach actors, genres and directors to the movie
         */
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'actors' => 'required|array',
            'directors' => 'required|array',
            'genres' => 'required|array',
            'description' => 'nullable|string',
            'language' => 'required|string',
            'release_date' => 'required|date',
            'ratings' => 'required|integer',
            'runtime' => 'required|integer',
            'poster' => 'required|string',
            'trailer' => 'required|string',
        ]);

        // Create a new movie
        $movie = cmdb_movies::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'language' => $validatedData['language'],
            'release_date' => $validatedData['release_date'],
            'ratings' => $validatedData['ratings'],
            'runtime' => $validatedData['runtime'],
            'poster' => $validatedData['poster'],
            'trailer' => $validatedData['trailer'],
        ]);

        $movie->actors()->attach($validatedData['actors']);
        $movie->genres()->attach($validatedData['genres']);
        $movie->directors()->attach($validatedData['directors']);

        return redirect(route('modify'))->with('movie_success', 'Movie added successfully!');
    }


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
        $movie = cmdb_movies::find($id);
        $movie->delete();

        return back()->with('movie_delete_success', 'Movie deleted successfully.');
    }
}
