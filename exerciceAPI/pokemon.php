<?php

    function GetPokemon(){
        $pokemonTab = array();
        $json = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=10&offset=0');
        $pokemonTab = json_decode($json,true);
        return $pokemonTab=$pokemonTab['results'];
    }

    function ShowPokemons(){
        $pokemonTab = GetPokemon();
        foreach($pokemonTab as $pokemon){
            $getJsonPokemonInfo = file_get_contents($pokemon['url']);
            $PokemonInfo = json_decode($getJsonPokemonInfo, true);
            
            echo '<td>' . $pokemon['name'] . '</td>';
            echo "<td><img src='" .$PokemonInfo['sprites']["front_default"]."'></td></tr>" ;
           
        }
    }



    
?>

<table>
    <h1>Pokemon</h1>
    <thead>
        <tr>
            <th>Name</th>
            <th >Image</th>
          
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
                ShowPokemons();
                ?>
            
            
        </tr>
    </tbody>
</table>

