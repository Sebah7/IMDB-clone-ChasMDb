<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cmdb_directors extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cmdb_directors')->insert([
            'director_name' => 'Hayao Miyazaki',
            'director_name' => 'Eiichiro Oda',
        ]);
    }
}
