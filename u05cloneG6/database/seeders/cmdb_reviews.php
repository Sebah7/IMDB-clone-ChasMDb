<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cmdb_reviews extends Seeder
{
    public function run()
    {
        DB::table('cmdb_reviews')->insert([
            'id' => 1,
            'Movieid' => null, // You can replace null with the appropriate value.
            'Stars' => 4,
            'Comment' => 'hello',
            'Userid' => null, // You can replace null with the appropriate value.
            'created_at' => now(),
            'updated_at' => null,
        ]);
    }
}
