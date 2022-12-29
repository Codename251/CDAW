@extends('template')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" >
    <link href="{{asset('css/content.css')}}" rel="stylesheet" />
    <link href="css/content.css" rel="stylesheet" />
    <link href="css/app.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content">
        <h1>Choisissez votre adversaire :</h1>
        <table id="myTable"  style="width:100%">
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Choix</th>
                
                </tr>
            </thead>

            
            <tbody>
                <tr>
                    
                    @foreach ($Joueurs as $joueur)
                        <?php if(Auth::user()->name != $joueur->name){ ?>
                        <td> {{$joueur->name}}</td>
                        <td> <button class="myBtn" onclick ="getValue('{{$fightMode}}', '{{$joueur->name}}')"> 
                                choisir </button></td></tr>
                        <?php } ?>
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

    <script>
        function getValue(fightMode, opponentName) {
            
                document.location.replace('http://127.0.0.1:8000/fight/' + fightMode + '/' + opponentName);

        }
    </script>
@endsection