<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\cmdb_actors;
use App\Models\Admin\cmdb_director;
use App\Models\Admin\cmdb_genre;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $actors = cmdb_actors::all();
        return view('cast', ['actors' => $actors]);
    }


    public function getactorsanddirectors()
    {
        $actors = cmdb_actors::all();
        $directors = cmdb_director::all();
        $genres = cmdb_genre::all();

        return view('cast', ['actors' => $actors, 'directors' => $directors, 'genre' => $genres]);
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

        $request->validate([
            'name' => 'required|unique:cmdb_actors|max:255',

        ]);

        cmdb_actors::create([
            'name' => $request->name,
            //'name' => $validated['name']

        ]);

        // '$actors->movies()->attach($request->movies);'

        return redirect()->route('modify')->with('success', 'Actor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $actors = cmdb_actors::find($id);
        $movies = $actors->movies()->get();
        return view('modify', ['actors' => $actors, 'movies' => $movies]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(cmdb_actors $actor) // Här använder vi $actor istället för $id
    {
        if (!$actor) {
            return response('Actor not found', 404);
        }

        $actor->delete();

        return back()->with('success', 'Actor deleted successfully');
    }
}
