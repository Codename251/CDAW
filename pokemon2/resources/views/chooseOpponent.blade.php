@extends('template')

@section('style')
    <link href="css/content.css" rel="stylesheet" />
    <link href="css/app.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content items-center" style="margin-top: 10em">
        

            <div >
                <x-jet-label class="text-center h4" for="opponentPseudo" value="{{ __('Enter your Opponent pseudo') }}" />
                <input style="display: block; margin-left: auto; margin-right: auto" id="opponentPseudo" class="block text-center mt-1" type="opponentPseudo" name="opponentPseudo" :value="old('opponentPseudo')" required autofocus />
            </div>

            
            <div class="flex items-center mt-4">
                <button onclick="getValue('{{$fightMode}}')" class="ml-4" style="display: block; margin-left: auto; margin-right: auto">
                    {{ __('Next') }}
                </button>
            </div>
   
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
        function getValue(fightMode) {
                 // Sélectionner l'élément input et récupérer sa valeur
                var input = document.getElementById("opponentPseudo").value;
                // Afficher la valeur
                document.location.replace('http://127.0.0.1:8000/fight/' + fightMode + '/' + input);

        }
    </script>
@endsection