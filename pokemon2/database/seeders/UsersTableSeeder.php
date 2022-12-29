<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gege',
            'email' => 'lepillierdubar@wanadoo.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Pierrot',
            'email' => 'pierrotdu59@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
