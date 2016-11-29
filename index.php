<?php
	$pageTitle = "Hot Wheels - Star Wars";
?>
<?php include 'header.php'; ?>
<section class="top home">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center mobile-container">
				<img src="img/main-banner.jpg" alt="" class="img-responsive full-width opacity-1">
				<div class="main-container paddingtop80">
					<h1>¡Demuestra tus habilidades en la pista de carreras!</h1>
					<h1>Una sorpresa te espera en la meta</h1>
			    <!-- .skew-row -->
					<div class="row skew-row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<div class="margintop60 visible-sm visible-md"></div>
							<img src="img/circle-img-02_b.png" alt="" class="img-responsive visible-xs">
							<div class="skew-block">Elige tu vehículo</div>
							<div class="circle-block">
								<div class="black-circle">
									<img src="img/circle-img-01.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<div class="margintop60 visible-sm visible-md"></div>
							<img src="img/circle-img-01_b.png" alt="" class="img-responsive visible-xs">
							<div class="skew-block">Juega para completar tu póster</div>
							<div class="circle-block">
								<div class="black-circle">
									<img src="img/circle-img-02.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<div class="margintop60 visible-sm visible-md"></div>
							<img src="img/circle-img-04_b.png" alt="" class="img-responsive visible-xs">
							<div class="skew-block">Gana una tarjeta para personalizar</div>
							<div class="circle-block">
								<div class="black-circle">
									<img src="img/circle-img-03.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<div class="margintop60 visible-sm visible-md"></div>
							<img src="img/circle-img-03_b.png" alt="" class="img-responsive visible-xs">
							<div class="skew-block">¡Gana un póster nuevo cada semana!</div>
							<div class="circle-block">
								<div class="black-circle">
									<img src="img/circle-img-04.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
				    <!-- /.skew-row -->
					</div>
					<a href="seleccion.php" class="btn btn-primary" onclick="dilame.action('index:start');">INGRESA AL JUEGO</a>
					<img src="img/block-img--bottom.png" alt="" class="block-img--bottom">
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">dilame.page();</script>
</section>
<?php include 'footer.php'; ?>