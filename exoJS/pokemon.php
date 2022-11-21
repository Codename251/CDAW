<?php

    function GetPokemon(){
        $pokemonTab = array();
        $json = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=100&offset=0');
        $pokemonTab = json_decode($json,true);
        return $pokemonTab=$pokemonTab['results'];
    }

    function ShowPokemons(){
        $pokemonTab = GetPokemon();
        foreach($pokemonTab as $pokemon){
            $getJsonPokemonInfo = file_get_contents($pokemon['url']);
            $PokemonInfo = json_decode($getJsonPokemonInfo, true);

            echo '<td>' . $PokemonInfo['id'] . '</td>';
            echo '<td>' . $pokemon['name'] . '</td>';
            echo "<td><img src='" .$PokemonInfo['sprites']["front_default"]."'></td></tr>" ;
           
        }
    }



    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
        

    </head>

    <body>

        <table id="myTable"  style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th >Image</th>
                
                </tr>
            </thead>

            
            <tbody>
                <tr>
                    <?php
                        ShowPokemons();
                        ?>
                    
                    
                
            </tbody>
        </table>
    </body>
</html>
