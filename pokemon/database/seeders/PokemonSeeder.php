<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etape 1
        // DB::table('energy')->insert([
        //      'name' => Str::random(10)
        //     ]);

        //Etape 2
        //\App\Models\Pokemon::factory(1)->create();

        function GetPokemon(){
            $pokemonTab = array();
            $json = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=10&offset=0');
            $pokemonTab = json_decode($json,true);
            return $pokemonTab=$pokemonTab['results'];
        }

        $pokemonTab = GetPokemon();
        foreach($pokemonTab as $pokemon){
            $getJsonPokemonInfo = file_get_contents($pokemon['url']);
            $PokemonInfo = json_decode($getJsonPokemonInfo, true);
            //Etape 1
               DB::table('pokemon')->insert([
                 'id' => $PokemonInfo['id'],
                 'id_energy' => 1,
                 'name' => $PokemonInfo['name'],
                 'pv_max' => $PokemonInfo['stats'][0]['base_stat'],
                 'level' => $PokemonInfo['base_experience'],
                 'path' => $PokemonInfo["sprites"]["front_default"],

               ]);
        }

    }
}