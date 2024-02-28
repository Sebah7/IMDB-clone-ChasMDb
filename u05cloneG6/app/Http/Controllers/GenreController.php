<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_genre;
use App\Models\Admin\cmdb_movies;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    /**
     * The constratct method will make sure that only admin can create and store a new genre.
     */
    public function __construct()
{
    $this->middleware(['auth', 'admin'])->only(['create', 'store']);
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = cmdb_genre::all();
        return view('genre', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cmdb_genres|max:255',
        ]);

        /**
         * the cmdb_genre(our table name) plus ::create will try to create a column in our table.
         * And it requests a name to do so.
         */
        cmdb_genre::create([

            'name' => $request->name,
        ]); 

        /**
         * If the colums is created successfully we will be redirected to the index function with a message.
         */
        return redirect()->route('modify')->with('genre_success', 'Genre added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = cmdb_genre::find($id);

        if ($genres === null) {
            // No genre found with the given ID
            abort(404, 'Genre not found');
        }

        $movies = $genres->movies; // get all movies related to this genre

        return view('genre', ['genres' => [$genres], 'movies' => $movies]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = cmdb_genre::find($id);
        $genres->delete($id);

        return redirect()->route('genre')
        ->with('success', 'Genre deleted successfully.');

    }
}
