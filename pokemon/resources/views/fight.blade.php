@extends('template')

@section('style')
        <link href="{{asset('css/fight.css')}}" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
@endsection

@section('content')

    <input type=hidden id=variableAPasser value=<?php echo $fightMode; ?>/>
    <div class="content">
    <header>
    <img class="logo" title="Reset Game" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/International_Pok%C3%A9mon_logo.svg/2000px-International_Pok%C3%A9mon_logo.svg.png" alt="Pokemon">
    </header>

<main>
  <div class="instructions">
    <p>Choose your hero</p>
  </div>
  
  <section class="characters"></section>
  
  <section class="stadium">
    <section class="enemy"></section>
    <section class="hero"></section>
  </section>
  
  
  <ul class="attack-list"></ul>
</main>


<div class="audio">
  <audio class="sfx"></audio>
  <audio class="music" loop></audio>
</div>

<div class="modal-out">
  <div class="modal-in">
    <header></header>
    <section></section>
    <footer></footer>
  </div>
</div>
    </div>
@endsection

@section('script')

    
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/fight.js')}}"></script>

    
@endsection
