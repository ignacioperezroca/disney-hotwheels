// ----------------------------------------------------------------------------------------------------
// ANIMATIONS
// ----------------------------------------------------------------------------------------------------

// var previewCards = { 
//   1: {0: 'BB-8', 1: 'RESISTENCIA', 2: 'DROIDE ASTROMECÁNICO', 3: '0.67M'},
//   2: {0: 'El halcón milenario', 1: 'Alianza Rebelde', 2: 'Corellia', 3: '34,75 m.', 4: ''},
//   3: {0: 'Han solo', 1: 'Alianza Rebelde', 2: 'Pistola bláster', 3: 'Corellia', 4: '1,8 m.'},
//   4: {0: 'TRANSPORTE DE KYLO REN', 1: 'Primer Orden', 2: '37,2 M.', 3: '', 4: ''},
// };

function getRaceData(){

  switch(parseInt(posterValue)) {
    case 1:
        dilame.action('seleccionposter:spaceship');
        break;
    case 2:
        dilame.action('seleccionposter:stormtrooper');
        break;    
    case 3:
        dilame.action('seleccionposter:darthvader');
        break;    
    case 4:
        dilame.action('seleccionposter:vadertrooper');
        break;
  }

  switch(parseInt(vehiculeValue)) {
    case 1:
        dilame.action('seleccioncar:stormtrooper');
        break;
    case 2:
        dilame.action('seleccioncar:bb8');
        break;    
    case 3:
        dilame.action('seleccioncar:darthvader');
        break;    
    
  }

  dilame.action('seleccionposter:next');

  document.location = 'juego.php?posterValue='+posterValue+'&vehiculeValue='+vehiculeValue;
}

$(document).ready(function(){

  // ANIMATION IMG
  $(window).load(function(){
    $("img, .subtitle, .title").not('.not-preload,.img-hover').each(function(){
      $(this).animate({'opacity':1},2000);
    });
  });

  // SELECT CHOICE POSTER ACTIVE
  
  $('section.seleccion .select-poster').not('.disabled').click(function(){
    // SI ESTA ACTIVA NO HAGO NADA
    if( !$(this).hasClass('active') )
    {
      $(this).addClass('active');
      $('.circle-block').not(this).removeClass('active');
      posterValue = $(this).attr('data-posterValue');
    }
  });

  // SELECT CHOICE ACTIVE
  $('.select-vehicule').click(function(){
    
    if( !$(this).hasClass('set-active') )
    {
      $(this).toggleClass('set-active');
      $('.circle-block').not(this).removeClass('set-active');
      vehiculeValue = $(this).attr('data-vehiculeValue');
    }

  });

// -----------------------
// CHECKBOX
// -----------------------
// preview-tarjetas.php

  // SELECT CARD ACTIVE
  $('.select-card').click(function(){
    $(this).addClass('active');
    $('.select-card').not(this).removeClass('active');

    var cardSelector = $(this).attr('data-card');
    var visibleCard = $('.card_' + cardSelector);

    $('.cards-area:visible').not(visibleCard).fadeOut(200, function(){
      visibleCard.fadeIn(200);
    });
    
  });

  // SELECT VIRTUD VISIBLE
  $('.icon-block').click(function(){
    rawPos = $(this).attr('data-position');
    arrRawPos = rawPos.split('_');
    card = arrRawPos[0];
    virtud = arrRawPos[1];

    $('.card_' + card + ' .virtud_' + virtud).fadeToggle().toggleClass('active');

    $(this).toggleClass('checkbox-active');
    
  });

  // INITIALIZE GAME
  var winHeight = $(window).height();
  $('.play-area').css('height', winHeight);

  function scrollToAnchor(aid){
     var aTag = $("#"+ aid);
     $('html,body').animate({scrollTop: aTag.offset().top},'slow');
  }

  $('.initialize-game').click(function(){
    scrollToAnchor('play-area');
  });


  // initialize-game
  if($('section.top.juego').length){

    gamePlay.startLivebox();

    // PRECARGO IMAGENES
    var arrImagenes = [
      'juego/pista/patron-pista.jpg',
      'juego/patron-espacio-estrellas2.jpg',
      'juego/autos/explosion.png',
      'juego/autos/bb-8-car.png',
      'juego/autos/boba-fett-car.png',
      'juego/autos/darth-vader-car.png',
      'juego/autos/joda-car.png',
      'juego/autos/luke-car.png'
    ]

    $(arrImagenes).preload();

  };


  // INICIALIZACIONES EN LA PAGINA DE PREVIEW TARJETAS
  if( $('section.top.previewtarjetas').length ){

    // PRECARGO IMAGENES
    var arrImagenes = [
      'img/POSTER-SEMANA-'+posterValue+'.jpg'
    ]
    $(arrImagenes).preload();

  }
});


// --------------------------------------------------
// CHECKBOX
// --------------------------------------------------

// preview-tarjetas.php
var posterData = {};
posterData.cards = {};

function getPosterData(){

  $('.cards-area').each(function(index){

    offset = 5*(posterValue-1);

    var card = index+1+offset;
    var virtudes = [];

    $('.card_' + card + ' li.active span.white').each(function(){
      
      virtudes.push( $(this).html() );

      virtud = parseInt($(this).parent('li').attr("data-virtud"))+1;

      dilame.action('seleccionelementos:poster'+posterValue+':card'+card+':virtud'+virtud);

    });

    posterData.cards[card-offset] = virtudes;

  });

  document.location.href = 'descarga-poster.php?posterValue='+posterValue+'&data='+urlencode(JSON.stringify(posterData));

}




// --------------------------------------------------
// PLAY GAME
// --------------------------------------------------
// juego.php

// Chronometer GAME
var adderTime = (function() {
  
  var enterAdder = function(){
    $('.adder-time').animate({opacity: '1', top: '16'},{
      duration: 300,
    });
    $('.adder-time--block').delay(100).fadeIn('500');
    $('.chronometer').delay(500).addClass('bounceIn').css('color','#ed1b24');
  };
  
  var exitAdder = function(){
    $('.adder-time').delay(500).animate({opacity: '0', top: '-80'},{
      duration: 300,
    });
    $('.adder-time--block').delay(200).fadeOut('200');
    setTimeout(function(){
      $('.chronometer').removeClass('bounceIn');
      $('.chronometer').css('color','#fff');
    }, 1000)
  };

  return{
    enterAdder: enterAdder,
    exitAdder: exitAdder
  }

})();

var carPosition = function(pos)
{
  // offset final para que llegue con la trompa justo
  var offset = (67*pos/100).toFixed();
  var offsetMobile = (16*pos/104).toFixed();

  // console.log('pos:'+pos,'offset:'+offset);
  // console.log('pos:'+pos,'offset:'+offsetMobile);

  // ME LLEGA LA posicion en %
  $('#timeline-car').css({ left:'calc(' + pos + '% - ' + offset + 'px)' });
  $('#timeline-car--mobile').css({ left:'calc(' + pos + '% - ' + offsetMobile + 'px)' });

}



// GAME Livebox
var gamePlay = (function() {
  var iframe = $(".iframe");
  var dataStorage = { 
    start: {title: '¿LISTO? ¿PREPARADO?', button: '¡JUEGA!'},
    win: {title: '¡FELICITACIONES! HAS LLEGADO A LA META.<br> Ahora puedes personalizar las tarjetas ganadas.', button: 'VER TARJETAS'},
    lose: {title: 'EL TIEMPO SE HA TERMINADO.<br> ¡INTÉNTALO DE NUEVO PARA CONSEGUIR TU PREMIO!', button: '¡VOLVER A JUGAR!'}
  };
  var mq = window.matchMedia("(min-width: 992px)");

  function scrollToAnchor(aid){
     var aTag = $("#"+ aid);
     $('html,body').animate({scrollTop: aTag.offset().top},'slow');
  }

  var openLivebox = function(){
    $('.livebox-body').slideDown();
    $('.close-livebox').fadeIn(1000);
  };
  var closeLivebox = function(){
    $('.livebox-body').slideUp();
    $('.close-livebox').fadeOut(1000);
  };

  function setFocusThickboxIframe() {

    

    var iframe = $(".iframe")[0];
    iframe.contentWindow.focus();

  }

  var audio = {};
  audio.paso = {};

  var initSounds = function()
  {

    if(audio.fondo) audio.fondo.unload();

    audio.fondo = new Howl({
      src: ['juego/audios/fondo.mp3'],
      loop: true,
      volume: 0.4
    });

    audio.fondo.play();

    audio.choque = new Howl({ src: ['juego/audios/choco.mp3'] });
    
    audio.paso[1] = new Howl({ src: ['juego/audios/paso1.mp3'], volume: 0.2 });
    audio.paso[2] = new Howl({ src: ['juego/audios/paso2.mp3'], volume: 0.2 });
    audio.paso[3] = new Howl({ src: ['juego/audios/paso3.mp3'], volume: 0.2 });

    audio.mancha = new Howl({ src: ['juego/audios/mancha.mp3'], volume: 0.2 });

  }

  var destroyAudio = function(){

    if(audio.fondo){
      
      audio.fondo.fade(0.4,0,1000);
      // setTimeout(function(){ audio.fondo.stop(); audio.fondo.unload(); audio.fondo = null; console.log(audio.fondo); },2000);
      
    }

  }


  var playMancha = function(){
    audio.mancha.play();
  }

  var playChoque = function(){
    audio.choque.play();
  }

  var playPaso1 = function(){
    audio.paso[1].play();
  }

  var playPaso2 = function(){
    audio.paso[2].play();
  }

  var playPaso3 = function(){
    audio.paso[3].play();
  }

  var focusLivebox = function(){
    initSounds();
    setTimeout(setFocusThickboxIframe, 200);
  };
  var chargeLivebox = function(){
    iframe.attr("src", "juego/?vehiculeValue="+vehiculeValue).focus();
  };

  var startLivebox = function(){
    openLivebox();
    $('.h1-livebox').html(dataStorage.start.title);
    $('.close-play').html(dataStorage.start.button).attr('href', 'javascript:void(0)');
    $('.close-play').click(function(){
      scrollToAnchor('play-area');
      closeLivebox();
      if (!mq.matches) {
        var winHeight = $(window).height() - 50;
        $('.play-area').css('height', winHeight);
        $('.game-controls').fadeIn();
      }
      chargeLivebox();
      focusLivebox();
    });
  };

  var winLivebox = function(){
    openLivebox();
    $('.close-play').click(function(){iframe.attr("src", "");});
    $('.h1-livebox').html(dataStorage.win.title);
    $('.close-play').html(dataStorage.win.button).attr('href', 'preview-tarjetas.php?posterValue='+posterValue).attr('onclick', "dilame.action('finaljuego:next');");
    dilame.action('finaljuego:win');
  }
  
  var loseLivebox = function(){
    openLivebox();
    $('.h1-livebox').html(dataStorage.lose.title);
    $('.close-play').html(dataStorage.lose.button).attr('href', 'javascript:void(0)').attr('onclick', "dilame.action('finaljuego:tryagain');");

    $('.close-play').click(function(){
      scrollToAnchor('play-area');
      closeLivebox();
      chargeLivebox();
      focusLivebox();
    });

    dilame.action('finaljuego:lose');

  };

  return{
    openLivebox: openLivebox,
    closeLivebox: closeLivebox,
    focusLivebox: focusLivebox,
    chargeLivebox: chargeLivebox,
    startLivebox: startLivebox,
    winLivebox: winLivebox,
    loseLivebox: loseLivebox,
    playMancha: playMancha,
    playChoque: playChoque,
    playPaso1: playPaso1,
    playPaso2: playPaso2,
    playPaso3: playPaso3,
    destroyAudio: destroyAudio
  }
})();




// PLUGIN DE JQUERY
// PRELOADER DE IMAGENES
$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
        // console.log('precargando imagen: ',this);
    });
}


function urlencode (str) {
  //       discuss at: http://locutus.io/php/urlencode/
  //      original by: Philip Peterson
  //      improved by: Kevin van Zonneveld (http://kvz.io)
  //      improved by: Kevin van Zonneveld (http://kvz.io)
  //      improved by: Brett Zamir (http://brett-zamir.me)
  //      improved by: Lars Fischer
  //         input by: AJ
  //         input by: travc
  //         input by: Brett Zamir (http://brett-zamir.me)
  //         input by: Ratheous
  //      bugfixed by: Kevin van Zonneveld (http://kvz.io)
  //      bugfixed by: Kevin van Zonneveld (http://kvz.io)
  //      bugfixed by: Joris
  // reimplemented by: Brett Zamir (http://brett-zamir.me)
  // reimplemented by: Brett Zamir (http://brett-zamir.me)
  //           note 1: This reflects PHP 5.3/6.0+ behavior
  //           note 1: Please be aware that this function
  //           note 1: expects to encode into UTF-8 encoded strings, as found on
  //           note 1: pages served as UTF-8
  //        example 1: urlencode('Kevin van Zonneveld!')
  //        returns 1: 'Kevin+van+Zonneveld%21'
  //        example 2: urlencode('http://kvz.io/')
  //        returns 2: 'http%3A%2F%2Fkvz.io%2F'
  //        example 3: urlencode('http://www.google.nl/search?q=Locutus&ie=utf-8')
  //        returns 3: 'http%3A%2F%2Fwww.google.nl%2Fsearch%3Fq%3DLocutus%26ie%3Dutf-8'

  str = (str + '')

  // Tilde should be allowed unescaped in future versions of PHP (as reflected below),
  // but if you want to reflect current
  // PHP behavior, you would need to add ".replace(/~/g, '%7E');" to the following.
  return encodeURIComponent(str)
    .replace(/!/g, '%21')
    .replace(/'/g, '%27')
    .replace(/\(/g, '%28')
    .replace(/\)/g, '%29')
    .replace(/\*/g, '%2A')
    .replace(/%20/g, '+')
}