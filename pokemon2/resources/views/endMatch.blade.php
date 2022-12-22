@extends('template')


@section('style') 
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
@endsection

@section('content')


    <div class="content text-center"> 
        <h1> Résumé du match : </h1>
        <h2> Gagant : {{$match->gagnant}}</h2> 
        <h2> Perdant : {{$match->perdant}}</h2> 
        <h3> Replay : <br> {{$match->replay}}</h3>

        <a href='/'> Retour à l'acceuil  </a>

    </div>
	
@endsection

@section('script')

	<script src="{{asset('js/script.js')}}"></script>
	
@endsection