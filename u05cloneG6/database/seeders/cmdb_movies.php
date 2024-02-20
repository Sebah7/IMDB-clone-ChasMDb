<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cmdb_movies extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('cmdb_movies')->insert([
            'id' => 5,
            'title' => 'Oppenheimer', // You can replace null with the appropriate value.
            'description' => 'A movie of the worlds first atombomb',
            'ratings' => 5,
            'genre' => 'Action', // You can replace null with the appropriate value.
            'director' => 'Christopher Nolan',
            'language' => 'English',
            'release_date' => '210723',
            'runtime' => '3',
            'poster' => 'https://m.media-amazon.com/images/I/81XXxWVKbOL._AC_UF1000,1000_QL80_.jpg',
            'trailer' => 'https://youtu.be/SdHe-JseJfQ?feature=shared',
            // 'created_at' => now(),
            // 'updated_at' => null,

        ]);
    }
}
