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
            Cmdb_actorsSeeder::class,
            Cmdb_directorsSeeder::class,
            Cmdb_genreSeeder::class,
            Cmdb_moviesSeeder::class,
            Cmdb_reviewsSeeder::class,
            Cmdb_watchlistsSeeder::class,
            Cmdb_userSeeder::class,

            // Add other seeders if needed
        ]);
    }
}
