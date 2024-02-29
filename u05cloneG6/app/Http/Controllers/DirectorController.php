<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\cmdb_director;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = cmdb_director::all();
        return view('cast', ['directors' => $directors]);
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
                'director_name' => 'required|unique:cmdb_directors|max:255',
            ]);
    
            cmdb_director::create([
                'director_name' => $request->director_name,
    
            ]);
    
            return redirect()->route('modify')->with('director_success', 'Director created successfully');
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
        $directors = cmdb_director::find($id);
        $directors->delete($id);
        return back()->with('director_success', 'Director deleted successfully');
    }
}
