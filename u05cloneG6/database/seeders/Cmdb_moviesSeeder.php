<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Cmdb_moviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /**
         * Added faker to generte random data in the database.
         * created a loop to generate 5 movies.
         */
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
        DB::table('cmdb_movies')->insert([
            'title' => $faker->name,
            'description' => $faker->paragraph,
            'actor' => $faker->name,
            'ratings' => $faker->numberBetween(1, 5),
            'genre' => $faker->word,
            'director' => $faker->name,
            'language' => $faker->languageCode,
            'release_date' => $faker->date,
            'runtime' => $faker->numberBetween(60, 180),
            'poster' => $faker->imageUrl($width = 640, $height = 480),
            'trailer' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/bK6ldnjE3Y0?si=iK1o-siEloe5PH95" frameborder="0" allowfullscreen></iframe>',
        ]);
      }
    }
}
