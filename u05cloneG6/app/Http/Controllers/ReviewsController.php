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

        return view('reviews', compact('movies'));
    }

    public function create()
    {

        // Return view for creating a new review
        return view('reviews');
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|integer',
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'user_id' => 'nullable|integer', // Assuming user_id is optional or can be filled later
        ]);
    
        // Create a new review using mass assignment
        $review = cmdb_reviews::create($request->all());
    
        return redirect()->route('reviews.store')->with('success', 'Review created successfully');
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