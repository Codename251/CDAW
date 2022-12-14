@extends('template')


@section('style') 
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
@endsection

@section('content')


    <div class="content text-center"> 
        <h1> Résumé du match : </h1>
        <h2> Gagnant : {{$gagnant}}</h2> 
        <h2> Perdant : {{$perdant}}</h2> 
        <h3> Replay : <br></h3>
        <?php       
            $replayTab = explode(".", $replay);  
              
        ?>

        @foreach ($replayTab as $phrase)
            <p> {{$phrase}} <br></p>
                        
        @endforeach 
        <a href='/'> Retour à l'acceuil  </a>

    </div>
	
@endsection

@section('script')

	<script src="{{asset('js/script.js')}}"></script>
	
@endsection