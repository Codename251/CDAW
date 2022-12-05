<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        DB::table('match')->insert([
             'gagnant' => Str::random(10),
             'perdant' => Str::random(10),
             'replay' => Str::random(10),
            ]);

    
    }
}