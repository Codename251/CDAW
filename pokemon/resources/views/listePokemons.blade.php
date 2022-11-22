@extends('template')

@section('content')
    <div><p>Liste Pokemon </p></div>

    <table id="myTable"  style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th >Image</th>
                    <th >Energy</th>
                
                </tr>
            </thead>

            
            <tbody>
                <tr>
                    <?php
                        foreach ($Pokemons as $pokemon) {
                            echo '<td>' . $pokemon->id . '</td>';
                            echo '<td>' . $pokemon->name . '</td>';
                            echo "<td><img src='" .$pokemon->path."'></td>" ;
                            echo '<td>' . $pokemon->energy->name . '</td></tr>';
                            
                        }
                        ?>
                    
                    
                
            </tbody>
        </table>
@endsection
