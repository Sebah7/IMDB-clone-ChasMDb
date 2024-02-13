<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            cmdb_reviews::class,

            cmdb_movies::class,
/**resolving conflict=======*/
            cmdb_directors::class,
          
            // Add other seeders if needed
        ]);
    }
}
