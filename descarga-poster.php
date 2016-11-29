<?php
	$pageTitle = "Descarga de póster | Hot Wheels - Star Wars";
?>
<?php include 'header.php'; ?>
<?php
	$posterValue 	= !empty($_GET['posterValue']) ? (int)$_GET['posterValue'] : 1;
?>
<script>
	var posterValue = '<?php echo $posterValue; ?>';
</script>
	<?php
		if(!empty($_GET['data']))
		{	
			$posterData = json_decode(stripslashes(html_entity_decode(urldecode($_GET['data']))),true);
			// print_r($posterData);
		}
	?>
	<script src="js/html2canvas.js"></script>
	<script src="js/canvas2image.js"></script>
	<script>
	var newImg = null;
	var newCanvas = null;
	// $(document).ready(function(){

	// 	setTimeout(function(){

	// 		html2canvas($('#poster'), {
	// 			onrendered: function (canvas) {

					
	// 					newCanvas = canvas;
	// 					newImg = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
	// 					$("#poster").html('').css({ width:'100%',height:'auto' });
	// 					$("<img />").css({ width:'100%',display:'block',height:'auto',opacity:1 }).attr({src:newImg, id:'poster_img'}).appendTo("#poster");
	// 					$("#poster").appendTo(".middle-rounded--block");
	// 					$(".btn-download").show();
					
	// 			}
	// 		});

	// 	},2000);
	// });

	$(window).bind("load", function() {

		html2canvas($('#poster'), {
			onrendered: function (canvas) {

				
					newCanvas = canvas;
					newImg = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
					$("#poster").html('').css({ width:'100%',height:'auto' });
					$("<img />").css({ width:'100%',display:'block',height:'auto',opacity:1 }).attr({src:newImg, id:'poster_img'}).appendTo("#poster");
					$("#poster").appendTo(".middle-rounded--block");
					$(".btn-download").show();
				
			}
		});
	});

	function descargar()
	{		
		if (newCanvas.msToBlob) { //para IE
            var blob = newCanvas.msToBlob();
            window.navigator.msSaveBlob(blob, 'poster-hootwheels-starwars.png');
        } else {
            //otros browsers
            a = document.createElement('a');
			document.body.appendChild(a);
			a.href = newImg;
			a.download = 'poster-hootwheels-starwars.jpg';
			a.click();
        }


	}

	function back()
	{
		document.location = 'preview-tarjetas.php?posterValue='+posterValue+'&data='+getParameterByName('data');
		
	}

	function getParameterByName(name, url) {
	    if (!url) {
	      url = window.location.href;
	    }
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
	}


	</script>
	<style>
		.btn-download
		{
			display: none;
		}

		#poster
		{
			width: 1920px;
			height: 1080px;
		}
		.main
		{
			height: 100%;
			width: 100%;
			background: transparent url('img/POSTER-SEMANA-<?php echo $posterValue; ?>.jpg') center center no-repeat;
			position: relative;
		}
		.main .card
		{
			position: absolute;
			font: 24px/26px 'AgencyR';
			color: #fff;
			text-transform: uppercase;
			text-align: left;
		}
		.card.card1
		{
			top: 370px;
		    left: 490px;
		}
		.card.card2
		{
			top: 370px;
		    left: 890px;
		}
		.card.card3
		{
			top: 865px;
		    left: 95px;
		}
		.card.card4
		{
			top: 865px;
		    left: 490px;
		}

		.card.card5
		{
			top: 865px;
		    left: 890px;
		}
	</style>
<section class="top descarga-poster">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center mobile-container">
				<img src="img/main-banner.jpg" alt="" class="img-responsive full-width opacity-1">
				<div class="main-container block-play-area paddingbottom140">
					<div class="button-block">
						<a href="javascript:back();"><div class="btn btn-primary pull-left font26" onclick="dilame.action('posterterminado:back');">Volver</div></a>
					<div class="btn btn-primary pull-right font26" data-toggle="modal" data-target="#help" onclick="dilame.action('posterterminado:help');">Ayuda</div>
					</div>
					<div class="row skew-row">
						<div class="col-xs-12">
							<div class="main-rounded--block">
								<div class="upper-rounded--block">
									<div class="title">¡Tu póster está listo para descargar!</div>
									<div class="title visible-xs visible-sm">Presiona el poster unos segundos para descargarlo</div>
									<div class="arrow-block btn-download hidden-xs hidden-sm">
										<a href="javascript:descargar();" class="btn btn-primary" onclick="dilame.action('posterterminado:download');">descargar</a>
									</div>										
								</div>
								<div class="middle-rounded--block">

								</div>
								<div class="lower-rounded--block">
									<div class="title AgencyB">Vuelve a ingresar cada semana para encontrar</div>
									<div class="title subtitle">nuevos PÓSTERES y modelos para tu colección.</div>
									<div class="arrow-block">
										<a href="seleccion.php" class="btn btn-primary" onclick="dilame.action('posterterminado:playagain');">volver a jugar</a>
									</div>		
								</div>
							</div>
						</div>
					</div>
					<img src="img/block-img--bottom.png" alt="img-bottom" class="block-img--bottom">
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">dilame.page();</script>
</section>
<div id="poster">
	<div class="main">
		<?php
		for($i=1;$i<6;$i++)
		{
		?>
		<div class="card card<?php echo $i; ?>">
		<?php

			if(!empty($posterData['cards'][$i]))
			{
				foreach($posterData['cards'][$i] as $val)
				{
					echo $val."<br/>";
				}
			}

		?>
		</div>
		<?php
		}
		?>
	</div>
</div>
<?php include 'footer.php'; ?>
