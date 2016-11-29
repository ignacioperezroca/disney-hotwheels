<?php
	$pageTitle = "Juego | Hot Wheels - Star Wars";
?>
<?php include 'header.php'; ?>
<?php
	$posterValue 	= !empty($_GET['posterValue']) ? (int)$_GET['posterValue'] : 1;
	$vehiculeValue 	= !empty($_GET['vehiculeValue']) ? (int)$_GET['vehiculeValue'] : 1;
?>
<script src="juego/howler.core.js"></script>
<script>
	var posterValue = '<?php echo $posterValue; ?>';
	var vehiculeValue = '<?php echo $vehiculeValue; ?>';
</script>
<!--[if IE]> <style> .circle-block { left: 0 !important; } </style> <![endif]-->
<section class="top juego">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center mobile-container">
				<img src="img/main-banner.jpg" alt="" class="img-responsive full-width opacity-1">
				<div class="main-container block-img--bcg">
					<div class="button-block">
						<a href="seleccion.php"><div class="btn btn-primary pull-left font26" onclick="dilame.action('carrera:back');">Volver</div></a>
						<div class="btn btn-primary pull-right font26" data-toggle="modal" data-target="#help" onclick="dilame.action('carrera:help');">Ayuda</div>
					</div>
					<h1>Has elegido este póster.</h1>
					<h1 class="font26">Finaliza la carrera para obtenerlo.</h1>
			    <!-- .skew-row -->
					<div class="row skew-row">
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-poster <?php echo ($posterValue == 1) ? 'active' : 'disabled'; ?>">
								<div class="black-circle">
									<img src="img/block-img-01.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-poster <?php echo ($posterValue == 2) ? 'active' : 'disabled'; ?>">
								<div class="black-circle">
									<?php if(!$poster2Enabled){ ?>
										<img src="img/coming-soon.png" alt="" class="img-responsive">
									<?php }else{ ?>
										<img src="img/block-img-02.png" alt="" class="img-responsive">
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-poster <?php echo ($posterValue == 3) ? 'active' : 'disabled'; ?>">
								<div class="black-circle">
									<?php if(!$poster3Enabled){ ?>
										<img src="img/coming-soon.png" alt="" class="img-responsive">
									<?php }else{ ?>
										<img src="img/block-img-03.png" alt="" class="img-responsive">
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-poster <?php echo ($posterValue == 4) ? 'active' : 'disabled'; ?>">
								<div class="black-circle">
									<?php if(!$poster4Enabled){ ?>
										<img src="img/coming-soon.png" alt="" class="img-responsive">
									<?php }else{ ?>
										<img src="img/block-img-04.png" alt="" class="img-responsive">
									<?php } ?>
								</div>
							</div>
						</div>
				    <!-- /.skew-row -->
					</div>
				</div>
				<div class="main-container block-play-area">
					<div class="row skew-row">
						<div class="col-xs-12">
							<div id='play-area' class="play-area">
								<iframe src="" id='iframe' class="iframe"></iframe>
								<div class="countdown">
									<span class="adder-time">-3</span>
									<span class="adder-time--block"></span>
									<div class="title hidden-xs">tiempo restante</div>
									<div id="chronometer" class="chronometer">00:00</div>
									<hr class="divider hidden-xs">
									<div class="range">
										<div class="range-line">
											<img src="img/timeline-car.png" alt="timeline-car" id='timeline-car' class="timeline-car hidden-xs">
											<div id='timeline-car--mobile' class="circle-range visible-xs"></div>
										</div>
									</div>
								</div>
								<div class="livebox close-livebox">
									<div class="livebox-dialog">
										<div class="livebox-content">
											<div class="livebox-body">
												<h1 class="h1-livebox">¿LISTO? ¿PREPARADO?</h1>
												<h1 class="change-orientation">Cambia la orientación del dispositivo para jugar</h1>
												<a href="javascript:void(0)" class="btn btn-primary close-play" onclick="dilame.action('carrera:play');">¡JUEGA!</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="game-controls">
								<div class="arrow-block arw-block">
									<div class="arrow arw-left arw--left"><button onclick="document.getElementById('iframe').contentWindow.carMoveLeft();"></button></div>
									<div class="arrow arw-bottom arw--bottom"><button onclick="document.getElementById('iframe').contentWindow.carMoveBackward();"></button></div>
									<div class="arrow arw-bottom arw--bottom rotate-180"><button onclick="document.getElementById('iframe').contentWindow.carMoveForward();"></button></div>
									<div class="arrow arw-right arw--right"><button onclick="document.getElementById('iframe').contentWindow.carMoveRight();"></button></div>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="play-controls">
								<div class="title">usa las flechas <span class="hidden-xs hidden-sm">del teclado </span>para conducir el vehículo</div>
								<div class="arrow-block">
									<div class="arrow arw-left"><img src="img/arrow-left.png" alt=""></div>
									<div class="arrow arw-bottom"><img src="img/arrow-bottom.png" alt=""></div>
									<div class="arrow arw-bottom rotate-180"><img src="img/arrow-bottom.png" alt=""></div>
									<div class="arrow arw-right"><img src="img/arrow-right.png" alt=""></div>
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
<?php include 'footer.php'; ?>
