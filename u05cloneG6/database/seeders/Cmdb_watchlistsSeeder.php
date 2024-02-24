<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Cmdb_watchlistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // This will get all the movie and user ids and store them in a new array to be used later.
        $movieIds = DB::table('cmdb_movies')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            DB::table('cmdb_watchlists')->insert([
                /**
                 * The random Element will get a random element 
                 * from the array created by the pluck above.
                 */
                'user_id' => $faker->randomElement($userIds),
                'movie_id' => $faker->randomElement($movieIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
