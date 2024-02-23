<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cmdb_actors extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cmdb_actors')->insert([
            'name' => 'Viggo Mortensen',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
