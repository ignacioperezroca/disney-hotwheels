<?php
    $vehiculeValue  = !empty($_GET['vehiculeValue']) ? (int)$_GET['vehiculeValue'] : 1;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    	<script src="main.js"></script>
    	<link rel="stylesheet" href="styles.css">

    </head>
    <body>


        <div id="espacio">

            <div id="pista">
                <div id="meta"></div>
                <div id="car" class="car_<?php echo $vehiculeValue; ?>"><div id="car_rojo"></div></div>
            	
            </div>


            <!-- DECORADOS DEL ESPACIO -->

<!--             <div id="nave1"></div>
            <div id="nave2"></div>
            <div id="nave3"></div> -->

            

        </div>
        


        
        
    </body>
</html>