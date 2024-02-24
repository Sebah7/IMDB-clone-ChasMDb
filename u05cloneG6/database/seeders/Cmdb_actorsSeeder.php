<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Cmdb_actorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Added faker and for loop to generte random actor names.
         */
        $faker = Faker::create();
        
        for ($i = 0; $i < 5; $i++){
        DB::table('cmdb_actors')->insert([
            'name' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
    }
}
