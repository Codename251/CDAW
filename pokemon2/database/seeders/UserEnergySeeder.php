<?php

namespace Database\Seeders;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserEnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 10; $i++) {

            DB::table('userEnergies')->insert([
                'user_id' => $i,
                'energy_id' => 1,
            ]);

        }

    
    }
}