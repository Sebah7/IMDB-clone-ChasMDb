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
        $movies = cmdb_movies::all();
        return view('movies', ['movies' => $movies]);


        // return "Is this thing on?";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = new cmdb_movies();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->title = $request->title;
        $movie->done = $request->done;
        $movie->user_id = Auth::id();
        $movie->save();

        return view('/workspaces/u05-imdb-klon-grupp-6/u05cloneG6/app/View/TestBladeMovies/create.blade.php');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('TestBladeMovies.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(cmdb_movies::where('id', $id)->exists()){

            $movie = cmdb_movies::find($id);
            $movie->title = is_null($request->title) ? todo->title : $request->title;
            $movie->description = is_null($request->description) ? cmdb_movies->description : $request->description;
            $movie->done = is_null($request->done) ? movie->done : $request->done;
            $movie->save();
        }   
            return view('/workspaces/u05-imdb-klon-grupp-6/u05cloneG6/app/View/TestBladeMovies/create.blade.php');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
