<?php

namespace Database\Seeders;

use App\Models\Admin\cmdb_movies;
use App\Models\Admin\cmdb_watchlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cmdb_movie_cmdb_watchlist_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * pluck is used to get all the ids of the watchlists.
         * movies variable will get all the movies from the database.
         * for each loop will loop through each movie and attach a random number of watchlists to each movie.
         */
        $watchlists = cmdb_watchlist::pluck('id');
        $movies = cmdb_movies::all();

        foreach ($movies as $movie) {
            /**
             * the watchlists() here return from the method in movies model
             */
            $randomWatchlistIds = $watchlists->random(rand(1, $watchlists->count()))->toArray();
            $movie->watchlists()->attach($randomWatchlistIds);
        }
    }
}
