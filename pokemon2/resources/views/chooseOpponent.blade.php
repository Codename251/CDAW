@extends('template')

@section('style')
    <link href="css/content.css" rel="stylesheet" />
    <link href="css/app.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content items-center" style="margin-top: 10em">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div >
                <x-jet-label class="text-center h4" for="opponentPseudo" value="{{ __('Enter your Opponent pseudo') }}" />
                <x-jet-input style="display: block; margin-left: auto; margin-right: auto" id="opponentPseudo" class="block text-center mt-1" type="opponentPseudo" name="opponentPseudo" :value="old('opponentPseudo')" required autofocus />
            </div>

            
            <div class="flex items-center mt-4">
                <x-jet-button class="ml-4" style="display: block; margin-left: auto; margin-right: auto">
                    {{ __('Next') }}
                </x-jet-button>
            </div>
        </form>
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