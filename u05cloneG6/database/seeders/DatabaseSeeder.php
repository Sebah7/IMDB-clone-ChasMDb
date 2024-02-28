<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            Cmdb_userSeeder::class,
            Cmdb_actorsSeeder::class,
            Cmdb_directorsSeeder::class,
            Cmdb_genreSeeder::class,
            Cmdb_moviesSeeder::class,
            Cmdb_reviewsSeeder::class,
            Cmdb_watchlistsSeeder::class,
            Cmdb_genre_cmdb_movie_Seeder::class,
            Cmdb_actor_cmdb_movie_Seeder::class,
            Cmdb_director_cmdb_movie_Seeder::class,
            Cmdb_movie_cmdb_watchlist_Seeder::class,

            // Add other seeders if needed
        ]);
    }
}
