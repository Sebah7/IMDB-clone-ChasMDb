<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Cmdb_genreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Added faker and loop to insert 5 rows of genre.
         */
        $faker = Faker::create(); 

        for ($i = 0; $i < 5; $i++){
        DB::table('cmdb_genres')->insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    }
}
