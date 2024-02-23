<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_movies;
use App\Models\Admin\cmdb_reviews;
use Illuminate\Http\Request;


class ReviewsController extends Controller
{
    public function index()
    {
        $movies = cmdb_movies::with('reviews')->get();

        return view('movies', compact('movies'));
    }

    public function create()
    {

        return view('reviews');
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|integer',
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'user_id' => 'nullable|integer',
        ]);


        $review = cmdb_reviews::create($request->all());

        return back()->with('success', 'Review created successfully');

        //alternativ route 
        //return redirect()->route('movie.index', $request->input('movie_id'))->with('success', 'Review created successfully');
        
        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = cmdb_movies::with('reviews')->findOrFail($id);
        dd($movie);
        // Rest of the method
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
    public function destroy(string $id)
    {
        //
    }
}