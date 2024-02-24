<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Cmdb_directorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 
        for ($i = 0; $i < 5; $i++){
            DB::table('cmdb_directors')->insert([
                'director_name' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}
