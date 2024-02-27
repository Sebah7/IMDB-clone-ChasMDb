<?php

namespace Database\Seeders;

use App\Models\Admin\cmdb_director;
use App\Models\Admin\cmdb_movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cmdb_director_cmdb_movie_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * The pluck method is going to get all the ids from the director table.
         * the movies variable is going to get all the movies from the cmdb_movies table.
         * the foreach loop is going to iterate through all the movies and attach a random number of directors to each movie.
         */
        $directors = cmdb_director::pluck('id');
        $movies = cmdb_movies::all();

        foreach ($movies as $movie) {
            /**
             * the directors() method here returns from model cmdb_movies belongs to many relation
             */
            $randomDirectorIds = $directors->random(rand(1, $directors->count()))->toArray();
            $movie->directors()->attach($randomDirectorIds);
        }
    }
}
