<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(EnergySeeder::class);
        $this->call(PokemonSeeder::class);
        $this->call(MatchSeeder::class);
        $this->call(UserEnergySeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
