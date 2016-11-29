    <?php

    if($_SERVER['SERVER_NAME'] == 'thet.com.ar'){
        $data = new stdClass();
        $data->headInsert = '';
        $data->bodyPrepend = '';
    } 
    else
    {
        $data = new stdClass();
        $content = file_get_contents('http://a.dilcdn.com/g/latino/homepage/responsive.json?bg=dark&nav=true');
        $data = json_decode($content);
    }

    // ME FIJO SEGUN LA FECHA QUE POSTERS ESTAN HABILITADOS
    $poster2Enabled = ( date("Ymd") >= 20161202 );
    $poster3Enabled = ( date("Ymd") >= 20161209 );
    $poster4Enabled = ( date("Ymd") >= 20161216 );


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Language" content="es">
    <meta name="description" content="Juego interactivo de carreras de Hot Wheels donde podrás ganar tarjetas de los autos coleccionables para completar un póster distinto cada semana con toda la colección de autos de carrera de Hot Wheels con temática de Star Wars.">
    <meta name="keywords" content="Hot Wheels, autos, carreras, tarjetas, posters, poderes, colección, juego de carrera, Star Wars, Darth Vader, Jabba the Hut, Stormtrooper, Jango Fett, Boba Fett, Kylo Ren's Command Shuttle, First Order Star Destroyer, R1 - Imperial AT-ACT Cargo Walker (Elephant), First Order TIE fighter, Tie Striker">
    <meta property="og:title" content="Hot Wheels"/>
    <meta property="og:description" content="Juego interactivo de HotWheels de carrera donde podes ganar tarjetas de los autos coleccionables para completar en cada semana un póster distinto con toda la colección de autos de carrera de HotWheels de Star War."/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://ads.disneylatino.com/hotwheels">
    <meta property="og:image" content="http://ads.disneylatino.com/hotwheels/img/fb.jpg"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="Hot Wheels"/>
    <meta name="twitter:description" content="Juego interactivo de HotWheels de carrera donde podes ganar tarjetas de los autos coleccionables para completar en cada semana un póster distinto con toda la colección de autos de carrera de HotWheels de Star War."/>
    <meta name="twitter:domain" content="http://ads.disneylatino.com/hotwheels/">
    <meta name="twitter:image" content="http://ads.disneylatino.com/hotwheels/img/twitcard.jpg"/>
    <link rel="icon" href="img/favicon.ico">
    <title><?=$pageTitle?></title>
    <!-- DISNEY -->
    <?php echo $data->headInsert ?>
    <!-- /DISNEY -->
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nprstrap.css">
    <script src="https://use.fontawesome.com/e197a5108a.js"></script>
    <!-- Javascript -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Disney Scripts -->
    <script type="text/javascript" src="//analytics.disneyinternational.com/analytics/wdigWebAnalytics.js"></script>
    <script type="text/javascript" src="https://tredir.go.com/capmon/GetDE/?set=j&param=iso&param=state&param=country&param=connection&param=metro&param=zip&param=domain"></script>
    <script type="text/javascript" src="//libs.coremetrics.com/eluminate.js"></script>
    <script type="text/javascript" src="js/dilame.js"></script>
  </head>
  <body>
    <script>
    var DILMEparameters = {basepath: "latam:d2:dcore:dol:ads:hotwheels", id: "ADS", pageID: document.title, URL: "http://ads.disneylatino.com/hotwheels/",catID: "HotWheels Star Wars", sitename: "HotWheels Star Wars", baseCountry:"LATAM:D2:"}

    // 2 - initialize
    dilame = new DILAME( DILMEparameters );
    </script>
    <?php echo $data->bodyPrepend ?>
    <!-- .wrapper -->
    <div id="wrapper" class="">
      <!-- .page-content-wrapper -->
      <div id="page-content-wrapper" class="page-content-wrapper">