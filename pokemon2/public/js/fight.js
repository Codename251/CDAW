/////////////////////////////////////////////
// CONTENTS
/////////////////////////////////////////////
// VARIABLES
// UTILITIES
  // RANDOM NUMBER GENERATOR
  // CHARACTER BUILD
  // ATTACK MULTIPLIER
  // SFX PLAYER
  // HP BAR ANIMATION
// RESET
// CHARACTER CHOICE
// HERO ATTACK
// ENEMY ATTACK
// ATTACK SEQUENCE
// MODAL CONTROLS

//const { functionsIn } = require("lodash");

//const { inRange } = require("lodash");


/////////////////////////////////////////////
// VARIABLES
/////////////////////////////////////////////


window.addEventListener('load', function () {
  fightMode = document.getElementById('fightMode').value;

  PokemonList = document.getElementById('Pokemons').value;
  PokemonList = PokemonList.substring(0, PokemonList.length - 1);
  PokemonList = JSON.parse(PokemonList);
  PokemonListGuest = PokemonList;

  console.log(maitrises);
  console.log(PokemonList);
  console.log(fightMode);


var typeSprite = '',
    types = [],
    gameData = {}
    attackName = '',
    curAttack = {},
    randInt = 0,
    enemyAttack = {},
    characters = [],
    defendProgressInt = null,
    defendProgressComplete = 0,
    progressInt = null,
    progressComplete = 0;
    player1Lives = 0;
    player2Lives = 0;
    gameLog = "";

function buildVars(){

  typeSprite = 'http://orig15.deviantart.net/24d8/f/2011/057/3/5/ge___energy_type_icons_by_aschefield101-d3agp02.png';
  types = ['bug', 'dark', 'dragon', 'electric', 'fairy', 'fighting', 'fire', 'flying', 'ghost', 'grass', 'ground', 'ice', 'normal', 'poison', 'psychic', 'rock', 'steel', 'water'];



  // the data for the game in play
  gameData = {
    step: 1,
    hero: {},
    enemy: {}
  }



  // attack variables
  attackName = '';
  curAttack = {};
  randInt = 0;
  enemyAttack = {};
  defendProgressInt = null;
  defendProgressComplete = 0;
  progressInt = null;
  progressComplete = 0;
  player1Lives = 3;
  player2Lives = 3;
  gameLog = "";


  for(var i in PokemonList){
    PokemonList[i].hp = PokemonList[i].pv_max;
    PokemonList[i].attacks = [
      {
        name: "attaque normale",
        hp: randomNum(20,10)
      },
      {
        name: "attaque spéciale",
        hp: randomNum(40,20)
        
      },
      {
        name: "défense normale",
        hp: randomNum(10,5)
        
      },
      {
        name: "défense spéciale",
        hp: randomNum(20, 10)
        
      }
    ];

    if(PokemonList[i].energy.name == "grass"){
      PokemonList[i].weakness =  ['fire'];
      PokemonList[i].resistance = ['water'];
    }

    else if(PokemonList[i].energy.name == "fire"){
      PokemonList[i].weakness =  ['water'];
      PokemonList[i].resistance = ['grass'];
    }

    else if(PokemonList[i].energy.name == "water"){
      PokemonList[i].weakness =  ['grass'];
      PokemonList[i].resistance = ['fire'];
    }

    else{
      PokemonList[i].weakness =  ['fighting'];
      PokemonList[i].resistance = ['steel'];
    }
    
  }



  // available characters
  characters = [
    {
      name: "pikachu",
      type: 'electric',
      weakness: ['fighting'],
      resistance: ['steel'],
      img: {
        default: "http://vignette2.wikia.nocookie.net/all-anime-characters/images/7/7b/Cute_pikachu_with_hat_by_mlpochea-d63xlom.png/revision/latest?cb=20150108111832",
        front: "http://rs1263.pbsrc.com/albums/ii631/Pokemon-Vampire-Knight-lover/pikachu_.gif~c200",
        back: "http://vignette4.wikia.nocookie.net/pokemon/images/5/5b/Pikachu_Back_XY.gif/revision/latest?cb=20141009080948"
      },
      hp: {
        current: 500,
        total: 500
      },
      attacks: [
        {
          name: "thunder jolt",
          hp: randomNum(40,20),
          avail: {
            total: 30,
            remaining: 30
          }
        },
        {
          name: "electro ball",
          hp: randomNum(60,45),
          avail: {
            total: 10,
            remaining: 10
          }
        },
        {
          name: "volt tackle",
          hp: randomNum(75,60),
          avail: {
            total: 5,
            remaining: 5
          }
        },
        {
          name: "thunder crack",
          hp: randomNum(160, 130),
          avail: {
            total: 2,
            remaining: 2
          }
        }
      ]
    },
    {
      name: "charmander",
      type: 'fire',
      weakness: ['water'],
      resistance: ['grass'],
      img: {
        default: "http://img3.wikia.nocookie.net/__cb20150330015216/pokemon/images/f/f5/004Charmander_Pokemon_Mystery_Dungeon_Explorers_of_Sky.png",
        front: "http://rs772.pbsrc.com/albums/yy9/HybridRainbow88/Charmander.gif~c200",
        back: "http://vignette1.wikia.nocookie.net/pokemon/images/2/23/Charmander_Back_XY.gif/revision/latest?cb=20141009063457"
      },
      hp: {
        current: 500,
        total: 500
      },
      attacks: [
        {
          name: "ember",
          hp: randomNum(40,20),
          avail: {
            total: 30,
            remaining: 30
          }
        },
        {
          name: "flamethrower",
          hp: randomNum(60,45),
          avail: {
            total: 10,
            remaining: 10
          }
        },
        {
          name: "burning tail",
          hp: randomNum(75,60),
          avail: {
            total: 5,
            remaining: 5
          }
        },
        {
          name: "fire spin",
          hp: randomNum(160, 130),
          avail: {
            total: 2,
            remaining: 2
          }
        }
      ]
    },
    {
      name: "squirtle",
      type: 'water',
      weakness: ['electric','grass'],
      resistance: ['normal','fire'],
      img: {
        default: "http://vignette3.wikia.nocookie.net/ssbb/images/7/79/Squirtle_Rojo_Fuego_y_Verde_Hoja.png/revision/latest?cb=20130907041944&path-prefix=es",
        front: "https://66.media.tumblr.com/ddd22fe10a485ed56a46d958c058a970/tumblr_n9lnpepqkW1scncwdo1_500.gif",
        back: "http://vignette3.wikia.nocookie.net/pokemon/images/d/d8/Squirtle_XY_Back_Sprite.gif/revision/latest?cb=20141031154426"
      },
      hp: {
        current: 500,
        total: 500
      },
      attacks: [
        {
          name: "bubble",
          hp: randomNum(40,20),
          avail: {
            total: 30,
            remaining: 30
          }
        },
        {
          name: "water gun",
          hp: randomNum(60,45),
          avail: {
            total: 10,
            remaining: 10
          }
        },
        {
          name: "shell attack",
          hp: randomNum(75,60),
          avail: {
            total: 5,
            remaining: 5
          }
        },
        {
          name: "hydro pump",
          hp: randomNum(160, 130),
          avail: {
            total: 2,
            remaining: 2
          }
        }
      ]
    },
    {
      name: "bulbasaur",
      type: 'grass',
      weakness: ['fire'],
      resistance: ['water','psychic'],
      img: {
        default: "http://vignette4.wikia.nocookie.net/pokemon/images/8/81/001Bulbasaur_Pokemon_Mystery_Dungeon_Explorers_of_Sky.png/revision/latest?cb=20150105223818",
        front: "https://media.giphy.com/media/iIWW4BM6nNWTu/giphy.gif",
        back: "http://rs425.pbsrc.com/albums/pp335/Grasaldrea/ShinyBulbasauranimatedback.gif~c200",
        deranged: "http://rs522.pbsrc.com/albums/w348/Richtoon18/b3617568f13aa750c57eacc45d0b2da7.gif~c200",
        sleep: "https://31.media.tumblr.com/4dd7682db26ac687ef81f0dd06794652/tumblr_msesq5uAIk1r93jsro1_500.gif"
      },
      hp: {
        current: 500,
        total: 500
      },
      attacks: [
        {
          name: "tackle",
          hp: randomNum(40,20),
          avail: {
            total: 30,
            remaining: 30
          }
        },
        {
          name: "vine whip",
          hp: randomNum(60,45),
          avail: {
            total: 10,
            remaining: 10
          }
        },
        {
          name: "razor leaf",
          hp: randomNum(75,60),
          avail: {
            total: 5,
            remaining: 5
          }
        },
        {
          name: "solar beam",
          hp: randomNum(160, 130),
          avail: {
            total: 2,
            remaining: 2
          }
        }
      ]
    },
    {
      name: "machop",
      type: 'fighting',
      weakness: ['psychic','electric'],
      resistance: [],
      img: {
        default: "http://clipart.toonarific.com/data/media/11/pokemon066.gif",
        front: "http://graphics.tppcrpg.net/xy/normal/066F.gif",
        back:  "http://pokeunlock.com/wp-content/uploads/2015/01/machop-2.gif"
      },
      hp: {
        current: 500,
        total: 500
      },
      attacks: [
        {
          name: "low kick",
          hp: randomNum(40,20),
          avail: {
            total: 30,
            remaining: 30
          }
        },
        {
          name: "karate chop",
          hp: randomNum(60,45),
          avail: {
            total: 10,
            remaining: 10
          }
        },
        {
          name: "seismic toss",
          hp: randomNum(75,60),
          avail: {
            total: 5,
            remaining: 5
          }
        },
        {
          name: "hundred furious punches",
          hp: randomNum(160, 130),
          avail: {
            total: 2,
            remaining: 2
          }
        }
      ]
    }
  ];



}





/////////////////////////////////////////////
// UTILITY
/////////////////////////////////////////////
// RANDOM NUMBER GENERATOR
// min is optional
function randomNum(max, min){
  // generate a random number

  // min not required
  if(min === undefined || min === '' || min === null){
    // min default value
    min = 0;
  }

  // random number, yay
  return Math.floor(Math.random() * (max - min) + min);
}



// CHARACTER BUILD
// build the character UI
function populateChar(container,character){

  // build the character
  container.append('<section class="char"><img src="'+gameData[character].path+'" alt="'+gameData[character].name+'"><aside class="data"><h2>'+gameData[character].name+'</h2><div><progress max="'+gameData[character].pv_max+'"></progress><p><span>'+gameData[character].hp+'</span>/'+gameData[character].pv_max+'</p></div></aside></section>');
}



// ATTACK MULTIPLIER
// modify attack value for weaknesses & strengths
function attackMultiplier(attacker, curAttack){
  var defender = 'enemy';
  if(attacker === 'enemy'){
    defender = 'hero';
  }

  if(gameData[defender].weakness.indexOf(gameData[attacker].type) >= 0){
    // weakness exists
    curAttack.hp *= 2;
  }

  if(gameData[defender].resistance.indexOf(gameData[attacker].type) >= 0){
    // weakness exists
    curAttack.hp /= 2;
  }

  curAttack.hp = Math.floor(curAttack.hp);

  if(gameData[defender].isDefending){
    if(curAttack.hp - gameData[defender].shield > 1){
      curAttack.hp -= gameData[defender].shield;
    }
    else{
      curAttack.hp = 1;
    }
  }
  return curAttack.hp;
}


// HP BAR ANIMATION
// stop and set health bar
function setHP(){
  // stop health animation and set value
  clearInterval(defendProgressInt);
  clearInterval(progressInt);
  $('.stadium .enemy progress').val(gameData.enemy.hp);
  $('.stadium .hero progress').val(gameData.hero.hp);
}


/////////////////////////////////////////////
// RESET
/////////////////////////////////////////////
function resetGame(){
  // set default values for game variables
  buildVars();

  fightModeToString = fightMode.substring(0, fightMode.length - 1);
  gameLog = gameLog.concat('', "Début de la partie en " + fightModeToString + " .");
  

  // clear the stadium
  $('.hero').empty();
  $('.enemy').empty();

  // reset
  $('.attack-list li').unbind('click');
  $('.attack-list').empty();
  $('.enemy-attack-list li').unbind('click');
  $('.enemy-attack-list').empty();
  $('.stadium .enemy').css({'padding':'0'});
  $('.instructions p').text('Player 1 Choose your Pokemon : restants ' + player1Lives);

  // empty characters
  $('.characters').empty();
  $('.characters').removeClass('hidden');

  for(var i in PokemonList){
    // On prend uniquement les pokemons des energies maitrisees
    if (maitrises.includes(PokemonList[i].id_energy)){
      // build the character list
      $(".characters").append('<div class="char-container"><img src="'+PokemonList[i].path+'" alt="'+ PokemonList[i].name +'"><h2>'+PokemonList[i].name+'</h2><span class="type '+PokemonList[i].energy.name+'"></span></div>')
    }
  }
  characterChoice();
}
resetGame();
$('.logo').click(function(){resetGame();});


//Check if object is empty

function isObjEmpty(obj) {
  for (var prop in obj) {
    if (obj.hasOwnProperty(prop)) return false;
  }

  return true;
}


/////////////////////////////////////////////
// CHARACTER CHOICE
/////////////////////////////////////////////
function characterChoice(){

  if(fightMode == "RandomAuto/" || fightMode == "RandomManuel/" ){
    switch(gameData.step){
      // switch for the current step in the game
      case 1:
        // step 1: automatic hero attribution
        randInt = randomNum(PokemonList.length);
        while(!maitrises.includes(PokemonList[randInt].id_energy)){
          randInt = randomNum(PokemonList.length);
        };
        gameData.hero = PokemonList[randInt];

        // remove the character from the available list
        var char = $(this).remove();
        // build my hero
        populateChar($('.stadium .hero'), 'hero');

        //update gamelog
        gameLog = gameLog.concat('\n', "Player 1 choose " + gameData.hero.name + " .");

        listeAttack = document.getElementsByClassName("attack-list");

        for(var i in gameData.hero.attacks){
          // populate attack list
          
          if(listeAttack[0].childElementCount < 4){
              
              $('.attack-list').append('<li><p class="attack-name"><strong>'+gameData.hero.attacks[i].name+'</strong></p></li>');
              $('.enemy-attack-list').append('<li><p class="enemy-attack-name"><strong>'+gameData.hero.attacks[i].name+'</strong></p></li>');
          }
        }

        $('.attack-list').addClass('disabled');
        $('.enemy-attack-list').addClass('disabled');

        // update instructions
        $('.instructions p').text('Player 2 Choose your Pokemon : restant ' + player2Lives);
        // set health bar value
        $('.stadium .hero progress').val(gameData.hero.hp);

        // move on to choosing an enemy
        if(isObjEmpty(gameData.enemy)){
          console.log("go to step 2");
          gameData.step = 2;
          characterChoice();
        }
        else{
          console.log("go to step 3");
          gameData.step = 3;
          // hide the hero list
          $('.characters').children().slideUp('500', function(){
            $('.characters').addClass('hidden');
          });
          attackList();
        }
      
        break;

      case 2:
        // step 2: automatic enemy attribution
        randInt2 = randomNum(PokemonList.length);
        while(randInt2 == randInt || !maitrises.includes(PokemonList[randInt2].id_energy)){
          randInt2 = randomNum(PokemonList.length);
        }
        gameData.enemy = PokemonList[randInt2];

        // remove the enemy from the list
        var char = $(this).remove();
        // build the enemy
        populateChar($('.stadium .enemy'), 'enemy');

        //update gamelog
        gameLog = gameLog.concat('\n', "Player 2 choose " + gameData.enemy.name +" .");
        // pad the stadium - give them some breathing room
        $('.stadium .enemy').css({'padding':'25px 0'});

      
        
        // update instructions
        $('.instructions p').text('Fight!!!');

        // hide the hero list
        $('.characters').children().slideUp('500', function(){
          $('.characters').addClass('hidden');
        });

        // update enemy health bar value
        $('.stadium .enemy progress').val(gameData.enemy.hp);

        // update step to attack phase and bind click events
        gameData.step = 3;
        //update gamelog
        gameLog = gameLog.concat('\n', "Début du combat ! .");
        attackList();
        break;
    }
  }


  else{
    $('.characters .char-container').click(function(){
      // you have chosen a character

      // your chosen character name
      var name = $(this).children('h2').text().toLowerCase();

      switch(gameData.step){
        // switch for the current step in the game

        case 1:
          // step 1: choose your hero
          for(var i in PokemonList){
            if(PokemonList[i].name === name){
              // find and save your chosen hero's data
              gameData.hero = PokemonList[i];
            }
          }

          // remove the character from the available list
          var char = $(this).remove();
          // build my hero
          populateChar($('.stadium .hero'), 'hero');

          //update gamelog
          gameLog = gameLog.concat('\n', "Player 1 choose " + gameData.hero.name + " .");

          listeAttack = document.getElementsByClassName("attack-list");

          for(var i in gameData.hero.attacks){
            // populate attack list
            
            if(listeAttack[0].childElementCount < 4){
                
                $('.attack-list').append('<li><p class="attack-name"><strong>'+gameData.hero.attacks[i].name+'</strong></p></li>');
                $('.enemy-attack-list').append('<li><p class="enemy-attack-name"><strong>'+gameData.hero.attacks[i].name+'</strong></p></li>');
            }
          }

          $('.attack-list').addClass('disabled');
          $('.enemy-attack-list').addClass('disabled');

          // update instructions
          $('.instructions p').text('Player 2 Choose your Pokemon : restant ' + player2Lives);
          // set health bar value
          $('.stadium .hero progress').val(gameData.hero.hp);

          // move on to choosing an enemy


          if(isObjEmpty(gameData.enemy)){
            gameData.step = 2;
          }
          else{
            gameData.step = 3;
            // hide the hero list
            $('.characters').children().slideUp('500', function(){
              $('.characters').addClass('hidden');
            });
            attackList();
          }
        
          break;

        case 2:
          // step 2: choose your enemy
          for(var i in PokemonList){
            if(PokemonList[i].name === name){
              // find and save the enemy data
              gameData.enemy = PokemonList[i];
            }
          }

          // remove the enemy from the list
          var char = $(this).remove();
          // build the enemy
          populateChar($('.stadium .enemy'), 'enemy');

          //update gamelog
          gameLog = gameLog.concat('\n', "Player 2 choose " + gameData.enemy.name +" .");
          // pad the stadium - give them some breathing room
          $('.stadium .enemy').css({'padding':'25px 0'});

        
          
          // update instructions
          $('.instructions p').text('Fight!!!');

          // hide the hero list
          $('.characters').children().slideUp('500', function(){
            $('.characters').addClass('hidden');
          });

          // update enemy health bar value
          $('.stadium .enemy progress').val(gameData.enemy.hp);

          // update step to attack phase and bind click events
          gameData.step = 3;
          attackList();
          break;
      }
    });
  }
  
}





/////////////////////////////////////////////
// HERO ATTACK
/////////////////////////////////////////////
function attackEnemy(that, callback){
  // attack the enemy!!!
  if(fightMode == "RandomAuto/"){
      // random attack
    randInt = randomNum(gameData.hero.attacks.length);
    curAttack = gameData.hero.attacks[randInt];
  }

  else{
     // name of your attack
    attackName = that.children('.attack-name').children('strong').text().toLowerCase();

    for(var i in gameData.hero.attacks){
      if(gameData.hero.attacks[i].name === attackName){
        // get chosen attack data
        curAttack = gameData.hero.attacks[i];
      }
    }
  }

  //update gamelog
  gameLog = gameLog.concat('\n', gameData.hero.name + " use " + curAttack.name + " .");

 

  if(curAttack.name == "défense normale" || curAttack.name == "défense spéciale"){
    gameData.hero.isDefending = true;
    gameData.hero.shield = curAttack.hp;
  }

  else{
    gameData.hero.isDefending = false;
    // attack!!!
    $('.attack-list').addClass('disabled');
    $('.enemy-attack-list').addClass('disabled');

    $('.hero .char img').animate(
      {
        'margin-left': '-30px',
        'margin-top': '10px'
      },
      50,
      'swing'
    );
    $('.hero .char img').animate(
      {
        'margin-left': '30px',
        'margin-top': '-10px'
      },
      50,
      'swing'
    );
    $('.hero .char img').animate(
      {
        'margin-left': '0px',
        'margin-top': '0px'
      },
      50,
      'swing'
    );

    // attack enemy
    gameData.enemy.hp -= attackMultiplier('hero', curAttack);
    //update gamelog
    
    if(gameData.enemy.hp > 0){
      gameLog = gameLog.concat('\n', gameData.enemy.name + " have " + gameData.enemy.hp + " hp left .");
    }

    else{
      gameLog = gameLog.concat('\n', gameData.enemy.name + " have 0 hp left .");
    }
  
    }
    

    if(gameData.enemy.hp <= 0){
      // Enemy is dead
      //update gamelog
      gameLog = gameLog.concat('\n', gameData.enemy.name + " is dead .");

      player2Lives --;
      if(player2Lives == 0){
        //update gamelog
        gameLog = gameLog.concat('\n', "Player 1 win !  .");
        clearModal();
        $('.modal-in header').append('<h1>Player 1 win !</h1><span class="close">x</span>');
        $('.modal-in section').append('<p>Fermez cette fenêtre pour aller vers le résumé de combat ou cliquez sur le logo PokeBattle pour revenir au menu principal');
        $('.modal-out').slideDown('400');
        modalControls();
        return;
      }

      else{
        clearModal();
        $('.modal-in header').append('<h1>Player 2 Pokemon is dead !</h1><span class="close">x</span>');
        $('.modal-in section').append('<p>Il lui reste ' + player2Lives + ' Pokemons');
        $('.modal-out').slideDown('400');
        modalControls();
      }

     

      gameData.enemy.hp = 0;
      // clear the stadium of the dead
      $('.enemy').empty();
      // show the available characters
      $('.characters').removeClass('hidden');
      $('.characters').children().slideDown('500');

      gameData.enemy = {};

      // choose enemy
      gameData.step = 2;
     
      // unbind click for reset
      $('.attack-list li').unbind('click');
    }else{

      if(!gameData.hero.isDefending){
          // enemy is still alive (Attack!!!)

        // interval to animate health bar
        progressInt = setInterval(function(){
          // get current value of health bar
          var val = $('.stadium .enemy progress').val();
          val--;

          // update health bar value
          $('.stadium .enemy progress').val(val);

          if(val === gameData.enemy.hp){
            // if you've hit your target clear interval
            clearInterval(progressInt);
            progressComplete = 1;
          }
        },1);

        // update health numbers
        $('.stadium .enemy .data p span').text(gameData.enemy.hp);
      }

      
      // wait a second to recover
      setTimeout(function(){
        // now defend that attack
        if(fightMode == "RandomManuel/" || fightMode == "manuelManuel/"){
            EnemyattackList(that);
        }

        else{
          defend(that);
        }
        
      }, 1000);
    }
  
}

this.setInterval(function(){
  console.log(gameData.step);
  console.log(gameLog);
},500);

/////////////////////////////////////////////
// ENEMY ATTACK (DEFEND)
/////////////////////////////////////////////
function defend(that){

  if(fightMode == "RandomManuel/" || fightMode == "manuelManuel/"){
    // name of your attack
    EnemyAttackName = that.children('.enemy-attack-name').children('strong').text().toLowerCase();

    for(var i in gameData.enemy.attacks){
      if(gameData.enemy.attacks[i].name === EnemyAttackName){
        // get chosen attack data
        enemyAttack = gameData.enemy.attacks[i];
      }
    }
  }

  else{

    // random attack
    randInt = randomNum(gameData.enemy.attacks.length);
    enemyAttack = gameData.enemy.attacks[randInt];
    
  }

  //update gamelog
  gameLog = gameLog.concat('\n', gameData.enemy.name + " use " + enemyAttack.name +" .");
  

  if(enemyAttack.name == "défense normale" || enemyAttack.name == "défense spéciale"){
      gameData.enemy.isDefending = true;
      gameData.enemy.shield = enemyAttack.hp;
  }

  else{

    gameData.enemy.isDefending = false;
    // enemy attack animation sequence
    $('.enemy .char img').animate(
      {
        'margin-right': '-30px',
        'margin-top': '-10px'
      },
      50,
      'swing'
    );
    $('.enemy .char img').animate(
      {
        'margin-right': '30px',
        'margin-top': '10px'
      },
      50,
      'swing'
    );
    $('.enemy .char img').animate(
      {
        'margin-right': '0px',
        'margin-top': '0px'
      },
      50,
      'swing'
    );

    // attack the hero
    gameData.hero.hp -= attackMultiplier('enemy', enemyAttack);
    //update gamelog
    if(gameData.hero.hp > 0){
      gameLog = gameLog.concat('\n', gameData.hero.name + " have " + gameData.hero.hp + " hp left .");
    }

    else{
      gameLog = gameLog.concat('\n', gameData.hero.name + " have 0 hp left .");
    }
    
  }

  

  if(gameData.hero.hp <= 0){
    // ding dong the hero's dead
    player1Lives --;

    //update gamelog
    gameLog = gameLog.concat('\n', gameData.hero.name + " is dead ! .");
    

    if(player1Lives == 0){
      //update gamelog
      gameLog = gameLog.concat('\n', "Player 2 win ! .");
      clearModal();
      $('.modal-in header').append('<h1>Player 2 win !</h1><span class="close">x</span>');
      $('.modal-in section').append('<p>Fermez cette fenêtre pour aller vers le résumé de combat ou cliquez sur le logo PokeBattle pour revenir au menu principal');
      $('.modal-out').slideDown('400');
      modalControls();
      
    }

    else{
      clearModal();
      $('.modal-in header').append('<h1>Player 1 pokemon is dead !</h1><span class="close">x</span>');
      $('.modal-in section').append('<p>Il lui reste ' + player1Lives + ' Pokemons');
      $('.modal-out').slideDown('400');
      modalControls()
    }

    gameData.hero.hp = 0;
      // clear the stadium of the dead
      $('.hero').empty();
      // show the available characters
      $('.characters').removeClass('hidden');
      $('.characters').children().slideDown('500');

    gameData.hero = {};

    // choose hero
    gameData.step = 1;
    // unbind click for reset
    $('.attack-list li').unbind('click');
  }else{
    // the hero lives

    if(!gameData.enemy.isDefending){
      // health bar animation
    defendProgressInt = setInterval(function(){
      // get current val of health bar
      var val = $('.stadium .hero progress').val();
      val--;

      // update health bar value
      $('.stadium .hero progress').val(val);

      if(val === gameData.hero.hp){
        // stop the interval when target is attained
        clearInterval(defendProgressInt);
        defendProgressComplete = 1;
      }
    },1);

    // update health value
    $('.stadium .hero .data p span').text(gameData.hero.hp);
    }

    
    setTimeout(function(){   

      if(fightMode == "RandomAuto/"){
        attackEnemy($(this));
      }

      else{
          if(defendProgressComplete && progressComplete){
            $('.attack-list').removeClass('disabled');
            $('.enemy-attack-list').addClass('disabled');
            
          }else{
            setHP();
            $('.attack-list').removeClass('disabled');
            $('.enemy-attack-list').addClass('disabled');
          }
      }
    }, 1000);
  }
}





/////////////////////////////////////////////
// ATTACK SEQUENCE
/////////////////////////////////////////////
function attackList(){
  // attack instantiation

  if(fightMode == "RandomAuto/"){
    setTimeout(function(){
       attackEnemy($(this));
  
    },1000);

  }
   
  else{
    $('.attack-list').removeClass('disabled');

    $('.attack-list li').click(function(){
      // attack choice is clicked
      var doAttack = 1;

      if(gameData.step == 3){
        // attack step - start attack sequence

        attackEnemy($(this));
      }
    });
  }
  

}

function EnemyattackList(that){
  // attack instantiation

  $('.attack-list').addClass('disabled');
  $('.enemy-attack-list').removeClass('disabled');

  $('.enemy-attack-list li').click(function(){
    // attack choice is clicked
    var doAttack = 1;

    if(gameData.step == 3){
      // attack step - start attack sequence
      defend($(this));
    }
  });

}


function sendMatch(winner, looser, replay){
  console.log("send match !!!!!!!!!!!!!!");
  var currentUrl = window.location.href;
  document.location.replace('http://127.0.0.1:8000/postFight/' + winner + '/' + looser + '/' + replay);

  // const Http = new XMLHttpRequest();
  // const url = 'http://127.0.0.1:8000/postFight/' + winner + '/' + looser + '/' + replay;
  // Http.open("POST", url);
  // Http.send();

  //   $.ajax({
  //     method: 'POST',
  //     url: '/postFight/' + winner + '/' + looser + '/' + replay,
  //     success: function(response){
  //         console.log('ok'); 
  //     },
  //     error: function() {
  //         console.log('error');
  //     }
// });
}


/////////////////////////////////////////////
// MODAL
/////////////////////////////////////////////
function modalControls(){
  $('.modal-out').click(function(){
    $(this).slideUp('400');

    if(player1Lives == 0){
      sendMatch('Player2', 'Player1', gameLog);
      resetGame();
    }

    else if(player2Lives ==0 ){
      sendMatch('Player1', 'Player2', gameLog);
      resetGame();
    }

    else{
      characterChoice();
    }
  });
  $('.modal-in .close').click(function(e){
    $('.modal-out').slideUp('400');

    if(player1Lives == 0){
      sendMatch('Player2', 'Player1', gameLog);
      resetGame();
    }

    else if(player2Lives ==0 ){
      sendMatch('Player1', 'Player2', gameLog);
      resetGame();
    }

    else{
      characterChoice();
    }
    
  });

  $('.modal-in').click(function(e){
    e.stopPropagation();
    e.preventDefault();
  });
}

function clearModal(){
  $('.modal-in header').empty();
  $('.modal-in section').empty();
  $('.modal-in footer').empty();
  setHP();
}

});