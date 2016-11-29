

var lastSound = 1;


var frame = 0;
var running = 1;


var fastSpeed = 75; 
var slowSpeed = 100; 
var currentSpeed = fastSpeed; 

var time = 90;

var pistaPosition = 0;
var pistaStep = 30;

var espacioPosition = 0;
var espacioStep = 2;

var metaPositionOrg = -25000; // ESTA ES LA DISTANCIA A LA META

var metaPosition = metaPositionOrg;

var vehicle = 1; // NUMERO DE VEHICULO

var move = {};
var carriles = 5;

var obstacles = [];
var obstacleNumber = 0;         // contador de obstaculos
var obstaclesFactor = 11;       // Cada cuanto aparecen los obstaculos - 1 es lo mas jodido
var obstaclesQty = 6;           // Cantidad de vehiculos distintos que hay
var obstaclesMaxSpeed = 10;     // MAxima velocidad del obstaculo del 1 a obstaclesMaxSpeed
var obstaclesHeight = 141;
var crashHeightMin = 0;         // Se calcula dinamicamente en el document ready dependiento de la altura de la pista
var crashHeightMax = 0;         // Se calcula dinamicamente en el document ready dependiento de la altura de la pista
var obstaclesStep = 10;
var col = 2;

var lastObsCarril = [];

var carrilActual = 3;

var asteroidLastSide = [];
asteroidLastSide[1] = 'left';
asteroidLastSide[2] = 'right';
asteroidLastSide[3] = 'left';
asteroidLastSide[4] = 'right';

var interval = null;

function carMoveLeft()
{
    move.left = true;
    carMoves('mobile');
}

function carMoveRight()
{
    move.right = true;
    carMoves('mobile');
}

function carMoveForward()
{
    currentSpeed = slowSpeed;
    carMoves('mobile');
}

function carMoveBackward()
{
    currentSpeed = fastSpeed;
    carMoves('mobile');
}


$(document).ready(function(){
    
    // Keyboard Variables
    var leftKey = 37;
    var upKey = 38;
    var rightKey = 39;
    var downKey = 40;


    // Keyboard event listeners
    $(window).keydown(function(e){
        var keyCode = e.keyCode;
    
        if(keyCode == leftKey){
            move.left = true;
        } else if(keyCode == upKey){
            // move.forward = true;
            currentSpeed = fastSpeed;
            e.preventDefault();
        } else if(keyCode == rightKey){
            move.right = true;
        } else if (keyCode == downKey){
            //move.backward = true;
            currentSpeed = slowSpeed;
            e.preventDefault();
        }

        carMoves('desktop');
    });

    $(window).keyup(function(e){
        var keyCode = e.keyCode;
        if(keyCode == leftKey){
            move.left = false;
        } else if(keyCode == upKey){
            move.forward = false;
        } else if(keyCode == rightKey){
            move.right = false;
        } else if (keyCode == downKey){
            move.backward = false;
        }
    });



    isMobile = false;

    if($(document).innerWidth() <= 768)
    {
        isMobile = true;
        obstaclesHeight = 111;
        obstaclesFactor = obstaclesFactor*2; // MANDO LA MITAD DE AUTOS
    }


    roadLength = $(document).innerHeight();
    crashHeightMin = roadLength - obstaclesHeight*2;
    crashHeightMax = roadLength;


    var ua = navigator.userAgent;
    var is_native_android = ((ua.indexOf('Mozilla/5.0') > -1 && ua.indexOf('Android ') > -1 && ua.indexOf('AppleWebKit') > -1) && (ua.indexOf('Version') > -1));

    if(is_native_android || isMobile)
    {
        fastSpeed = 200; 
        slowSpeed = 230; 
        metaPositionOrg = metaPosition = -9375;
        currentSpeed = fastSpeed; 
        obstaclesFactor = obstaclesFactor/2;
    }

    play();

});

function play()
{
    running = 1;
    updates();
    interval = setInterval(updateReloj, 1000);
}

function end()
{
    running = 0;

    // LLAMO A LA FUNCION QUE MARCA QUE PERDÍ
    if(window.parent.gamePlay) 
    {
        window.parent.gamePlay.loseLivebox();
        window.parent.gamePlay.destroyAudio();
    }
}

function stopReloj()
{
    clearInterval(interval);
}

function updateReloj()
{
    if(running == 0) return;

    time--;

    if(time<=0)
    {
        time=0;
        clearInterval(interval);
        if(running > 0) end();
    }

    if(time > 59)
    {
        min = '01';
        seg = time-60;

        if(seg < 10) seg = '0'+seg;
    }
    else
    {
        min = '00';
        seg = time;

        if(seg < 10)
        seg = '0'+seg;
    }

    if(window.parent)
    $('#chronometer', window.parent.document).html(min+':'+seg);

    

}



function updates()
{
    if(running == 0) return false;

    updatePista();
    updateObstacles();

    // UPDATE DEL LA POCISION EN EL CIRCUITO
    metaPositionPerc = 100-(100*metaPosition/(metaPositionOrg)).toFixed();
    
    if(window.parent.carPosition)
    window.parent.carPosition(metaPositionPerc);

    

    if(frame % 200 == 0)
    {
        createMancha();
    }
    

    if((frame+100) % 200 == 0)
    {
        newNave = $("<div />").attr('id','nave_'+frame).addClass("nave1").appendTo("#espacio");

        setTimeout(function(){
            newNave.css({ bottom: roadLength+'px', left:'1060px', backgroundSize: '100%' });
        },1000);
    }

    if((frame+200) % 200 == 0)
    {
        newNave = $("<div />").attr('id','nave_'+frame).addClass("nave2").appendTo("#espacio");

        setTimeout(function(){
            newNave.css({ bottom: '80%', left:'-333px', backgroundSize: '100%' });
        },1000);

    }

    if((frame+300) % 200 == 0)
    {
        newNave = $("<div />").attr('id','nave_'+frame).addClass("nave3").appendTo("#espacio");

        setTimeout(function(){
            newNave.css({ bottom: '80%', left:'1060px', backgroundSize: '80%' });
        },1000);

    }


    // ASTERIODES
    if(!isMobile)
    {

        if(frame % 100 == 0)
        {
                
            newAsteroide = $("<div />").attr('id','asteroide_'+frame).addClass("asteroide1").appendTo("#espacio");

            if(asteroidLastSide[1] == 'left')
            {
                asteroidLastSide[1] = 'right';
                newAsteroide.css({ left:'auto', right:'20px' });
            }
            else
            {
                asteroidLastSide[1] = 'left'
                newAsteroide.css({ right:'auto', left:'20px' });
            }

            setTimeout(function(){
                
                if(asteroidLastSide[1] == 'left')
                {
                    newAsteroide.css({ top: '110%', left: '40px', transform: 'rotate(90deg)' });
                }else{
                    newAsteroide.css({ top: '110%', right: '40px', transform: 'rotate(30deg)' });
                }

            },1000);

        }

        if((frame+25) % 100 == 0)
        {
            newAsteroide = $("<div />").attr('id','asteroide_'+frame).addClass("asteroide2").appendTo("#espacio");
            

            if(asteroidLastSide[2] == 'left')
            {
                asteroidLastSide[2] = 'right';
                newAsteroide.css({ right:'20px' });
            }
            else
            {
                asteroidLastSide[2] = 'left'
                newAsteroide.css({ left:'20px' });
            }
            
            setTimeout(function(){

                if(asteroidLastSide[2] == 'left')
                {
                    newAsteroide.css({ top: '110%', left: '40px', transform: 'rotate(-90deg)' });
                }else{
                    newAsteroide.css({ top: '110%', right: '40px', transform: 'rotate(-30deg)' });
                }

            },1000);

        }

        if((frame+50) % 100 == 0)
        {

            newAsteroide = $("<div />").attr('id','asteroide_'+frame).addClass("asteroide3").appendTo("#espacio");

            if(asteroidLastSide[3] == 'left')
            {
                asteroidLastSide[3] = 'right';
                newAsteroide.css({ right:'20px' });
            }
            else
            {
                asteroidLastSide[3] = 'left'
                newAsteroide.css({ left:'20px' });
            }

            setTimeout(function(){

                if(asteroidLastSide[3] == 'left')
                {
                    newAsteroide.css({ top: '110%', left: '100px', transform: 'rotate(-180deg)' });
                }else{
                    newAsteroide.css({ top: '110%', right: '100px', transform: 'rotate(180deg)' });
                }

                
            },1000);

        }

        if((frame+75) % 100 == 0)
        {
            newAsteroide = $("<div />").attr('id','asteroide_'+frame).addClass("asteroide4").appendTo("#espacio");

            if(asteroidLastSide[4] == 'left')
            {
                asteroidLastSide[4] = 'right';
                newAsteroide.css({ right:'20px' });
            }
            else
            {
                asteroidLastSide[4] = 'left'
                newAsteroide.css({ left:'20px' });
            }

            setTimeout(function(){
                
                if(asteroidLastSide[4] == 'left')
                {
                    newAsteroide.css({ top: '110%', left: '40px', transform: 'rotate(180deg)' });
                }else{
                    newAsteroide.css({ top: '110%', right: '40px', transform: 'rotate(180deg)' });
                }

            },1000);

        }

    }

    frame++;

    setTimeout(updates, currentSpeed);

    
}

// Main animation loop
function carMoves(entorno){

    if(move.right == true)
    {
        if(col<(carriles-1))
        col++;
    }

    if(move.left == true)
    {
        if(col>0)
        col--;
    }

    // POSICIONO
    left = col*20;
    $("#car").css({ left: left+'%' });


    carrilActual = col+1;

    if(entorno == 'mobile')
    {
        move.left = false;    
        move.right = false;    
        move.forward = false;    
        move.backward = false;    
    }
    
}

function updatePista(){

    pistaPosition += pistaStep;
    document.getElementById("pista").style.backgroundPosition = "0px "+pistaPosition+"px";

    espacioPosition += espacioStep;
    document.getElementById("espacio").style.backgroundPosition = "0px "+espacioPosition+"px";

    metaPosition += pistaStep;
    document.getElementById("meta").style.top = metaPosition+"px";

    if(metaPosition >= crashHeightMax)
    {
        
        running = 0;
        stopReloj();

        if(window.parent.gamePlay) 
        {
            window.parent.gamePlay.winLivebox();
            window.parent.gamePlay.destroyAudio();
        }


    }

    lastObsCarril[1]--;
    lastObsCarril[2]--;
    lastObsCarril[3]--;
    lastObsCarril[4]--;
    lastObsCarril[5]--;

}

function updateObstacles(){



    if( Math.floor((Math.random() * obstaclesFactor) + 1)  == obstaclesFactor )
    {
        createObstacle();
    }

    var carrilMaxSpeed = {
        1: {
            speed: 0,
            top: 0
            },

        2:  {
            speed: 0,
            top: 0
            },

        3:  {
            speed: 0,
            top: 0
            },

        4:  {
            speed: 0,
            top: 0
            },

        5:  {
            speed: 0,
            top: 0
            }
    };


    for (var obstacle in obstacles) {


        // skip loop if the property is from prototype
        if (!obstacles.hasOwnProperty(obstacle)) continue;

        var obj = obstacles[obstacle];


        // ACA RECORRO CADA OBSTACULO
        if(obj.active==1)
        {


            realSpeed = !isMobile ? obj.speed : obj.speed/2;

            obj.top += obstaclesStep*realSpeed;

            // $("#obs_"+obstacle).css({ top: obj.top+'%' });


            document.getElementById("obs_"+obstacle).style.top = obj.top+'px';
            // document.getElementById("obs_"+obstacle).innerHTML = obj.top+'px';

            
            // ACA ME TENGO QUE FIJAR QUE NO HAYA NINGUNO ABAJO Y QUE LO PISE
            // me vengo con una velocidad mayor lo freno
            if(carrilMaxSpeed[obj.carril].speed > 0 && carrilMaxSpeed[obj.carril].speed < obj.speed)
            {


                distancia = parseInt(carrilMaxSpeed[obj.carril].top) - parseInt(obj.top);

                // BAJO LA VELOCIDAD EN 50, SINO QEUDA MUY TRUCHO
                if(distancia <= (obstaclesHeight*2))
                {
                    obj.speed = carrilMaxSpeed[obj.carril].speed;
                }

            }

            carrilMaxSpeed[obj.carril] = { top:obj.top, speed:obj.speed }



            // ACA TENGO QUE PONDER CONDICIONES PARA EL CHOQUE
            if(obj.top >= crashHeightMin && obj.top < crashHeightMax && obj.choco == 0)
            {
                
                if( carrilActual == obj.carril )
                {
                    obj.choco = 1;
                    

                    $("#car").addClass('bounceIn');


                    // SI ES MANCHA PONGO EL SONIDO DE MANCHA, SINO CHOQUE
                    if(obj.vehicle == 100)
                    {
                        window.parent.gamePlay.playMancha();
                    }
                    else{
                        window.parent.gamePlay.playChoque();
                        $("#obs_"+obstacle).css( {'background-image': 'url(autos/explosion.png)', 'background-size': '100% auto' });
                    }

                    setTimeout(function(){
                        $("#car").removeClass('bounceIn');
                    },800);

                    time = time-3;

                    // ACCIONES DE CHOQUE
                    if(window.parent.adderTime)
                    {
                        window.parent.adderTime.enterAdder();
                        window.parent.adderTime.exitAdder();
                    }
                }
                else
                {
                    

                    if(obj.vehicle != 100 && obj.paso == 0)
                    {

                        if(obj.speed == 2)
                        {

                            // AL QUE VA LENTO LE PONGO EL SONIDO LARGO
                            window.parent.gamePlay.playPaso3();
                        }
                        else
                        {
                            // A LOS QUE VAN RAPIDO

                            if(lastSound == 1)
                            {
                                lastSound = 2;
                                window.parent.gamePlay.playPaso2();

                            }
                            else
                            {
                                lastSound = 1;
                                window.parent.gamePlay.playPaso1();
                            }

                        }
                    }

                    obj.paso = 1;

                }
            }


            if(obj.top > roadLength) obj.active = 0;
        }
        else
        {

            $("#obs_"+obstacle).remove();
            obj = null;
        }
        

        
    }






}

function getVehicleNumber()
{
    vehicle++;
    if(vehicle>obstaclesQty) vehicle = 1;
    return vehicle;
}


function createMancha()
{

    carril = Math.floor((Math.random() * carriles) + 1);

    if(lastObsCarril[carril] > 0)
    {
        return false;
    }
    else
    {
        lastObsCarril[carril] = 15;
    }


    var obstacle = {

        top: obstaclesHeight*(-1),

        // en que carril
        carril: carril,

        // que vehiculo es
        vehicle: 100,

        speed: 6,

        active: 1,

        choco: 0,

        paso: 0

    }

    obstacles.push(obstacle);

    $( "<div class='obs carril_"+carril+" obs_"+obstacle.vehicle+"' id='obs_"+obstacleNumber+"'></div>" ).appendTo( "#pista" );

    obstacleNumber++;

}


function createObstacle()
{

    carril = Math.floor((Math.random() * carriles) + 1);
    speed = Math.floor((Math.random() * obstaclesMaxSpeed/2) + 2);

    if(lastObsCarril[carril] > 0)
    {
        return false;
    }
    else
    {
        lastObsCarril[carril] = 15;
    }
    
    var obstacle = {

        top: obstaclesHeight*(-1),

        // en que carril
        carril: carril,

        // que vehiculo es
        vehicle: getVehicleNumber(),

        speed: speed,

        active: 1,

        choco: 0,

        paso: 0

    }


    obstacles.push(obstacle);

    $( "<div class='obs carril_"+carril+" obs_"+obstacle.vehicle+"' id='obs_"+obstacleNumber+"'></div>" ).appendTo( "#pista" );

    obstacleNumber++;

    
}

