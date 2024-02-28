<?php

namespace Database\Seeders;

use App\Models\Admin\cmdb_actors;
use App\Models\Admin\cmdb_movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cmdb_actor_cmdb_movie_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    /**
     * the pluck is going to return a collection of all the ids of the actors
     * the movies variable is going to return all the movies
     * the foreach is going to iterate over all the movies
     */
    {
        $actors = cmdb_actors::pluck('id');
        $movies = cmdb_movies::all();

        foreach ($movies as $movie) {
            /**
             * the actors() method here returns from model cmdb_movies belongs to many relation
             */
            $randomActorIds = $actors->random(rand(1, $actors->count()))->toArray();
            $movie->actors()->attach($randomActorIds);
        }
    }
}
