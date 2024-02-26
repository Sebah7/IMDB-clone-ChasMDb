<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cmdb_genre_cmdb_movie_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = DB::table('cmdb_genres')->pluck('id');
        $movies = DB::table('cmdb_movies')->pluck('id');

        foreach ($movies as $movie) {
            DB::table('cmdb_genre_cmdb_movie')->insert([
                'movie_id' => $movie,
                'genre_id' => $genres->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}