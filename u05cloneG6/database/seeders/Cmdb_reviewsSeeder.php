<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Cmdb_reviewsSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create();
        /**
         * This will go to the cmdb_movies and users table
         * and get all the id and put them in an array to be used furthur by the for loop.
         */
        $movieIds = DB::table('cmdb_movies')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();
        
        for ($i = 0; $i < 5; $i++){
        DB::table('cmdb_reviews')->insert([
            'stars' => $faker->numberBetween(1, 5),
            'comment' => $faker->sentence,
            // This is going to get a random element from the array of movieIds and userIds.
            'movie_id' => $faker->randomElement($movieIds),
            'user_id' => $faker->randomElement($userIds), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    }
}
