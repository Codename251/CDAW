@extends('template')

@section('style')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" >
    <link href="css/content.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content">
        <table id="myTable"  style="width:100%">
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Niveau</th>
                    <th >Victoire</th>
                    <th >Matchs joués</th>
                    <th >Score</th>
                    <th >Maîtrises</th>
                
                </tr>
            </thead>

            
            <tbody>
                <tr>
                    @foreach ($Joueurs as $joueur)
                        <td> {{$joueur->id}}</td>
                        <td> {{$joueur->name}}</td>
                        <td><img src= "{{$joueur->path}}"></td>
                        <td> {{$joueur->energy->name}}</td></tr>
                    @endforeach 
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>  
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection