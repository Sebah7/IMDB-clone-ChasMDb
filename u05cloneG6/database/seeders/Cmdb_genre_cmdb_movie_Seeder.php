<?php

namespace Database\Seeders;

use App\Models\Admin\cmdb_genre;
use App\Models\Admin\cmdb_movies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cmdb_genre_cmdb_movie_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = cmdb_genre::pluck('id');
        $movies = cmdb_movies::all();

        foreach ($movies as $movie) {
            /**
             * the genres() method here returns from model cmdb_movies belongs to many relation
             */
            $randomGenreIds = $genres->random(rand(1, $genres->count()))->toArray();
            $movie->genres()->attach($randomGenreIds);
        }
    }
}