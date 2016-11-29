<?php
	$pageTitle = "Selección de póster y vehículo | Hot Wheels - Star Wars";
?>
<?php include 'header.php'; ?>
<script>
	var posterValue = '1';
	var vehiculeValue = '1';
</script>
<!--[if IE]> <style> .circle-block { left: 0 !important; } </style> <![endif]-->
<section class="top seleccion">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center mobile-container">
				<img src="img/main-banner.jpg" alt="" class="img-responsive full-width opacity-1">
				<div class="main-container block-img--bcg">
					<div class="button-block">
						<a href="index.php" onclick="dilame.action('seleccionposter:back');"><div class="btn btn-primary pull-left font26">Volver</div></a>
						<div class="btn btn-primary pull-right font26" data-toggle="modal" data-target="#help" onclick="dilame.action('seleccionposter:help');">Ayuda</div>
					</div>
					<h1><span>1. </span>Selecciona el póster</h1>
					<h1 class="font26">donde puedes aplicar las tarjetas disponibles al ganar la carrera</h1>
			    <!-- .skew-row -->
					<div class="row skew-row">
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-poster active" data-posterValue="1">
								<div class="black-circle">
									<img src="img/block-img-01.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-poster <?php echo (!$poster2Enabled) ? 'disabled' : ''; ?>"  data-posterValue="2">
								<div class="black-circle">
									<?php if(!$poster2Enabled){ ?>
										<img src="img/next-week.png" alt="" class="img-responsive">
									<?php }else{ ?>
										<img src="img/block-img-02.png" alt="" class="img-responsive">
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-poster  <?php echo (!$poster3Enabled) ? 'disabled' : ''; ?>" data-posterValue="3">
								<div class="black-circle">
									<?php if(!$poster3Enabled && !$poster2Enabled){ ?>
										<img src="img/coming-soon.png" alt="" class="img-responsive">
									<?php }else if(!$poster3Enabled && $poster2Enabled){ ?>
										<img src="img/next-week.png" alt="" class="img-responsive">
									<?php }else{ ?>
										<img src="img/block-img-03.png" alt="" class="img-responsive">
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-poster  <?php echo (!$poster4Enabled) ? 'disabled' : ''; ?>" data-posterValue="4">
								<div class="black-circle">
									<?php if(!$poster4Enabled && !$poster3Enabled){ ?>
										<img src="img/coming-soon.png" alt="" class="img-responsive">
									<?php }else if(!$poster4Enabled && $poster3Enabled){ ?>
										<img src="img/next-week.png" alt="" class="img-responsive">
									<?php }else{ ?>
										<img src="img/block-img-04.png" alt="" class="img-responsive">
									<?php } ?>
								</div>
							</div>
						</div>
				    <!-- /.skew-row -->
					</div>
				</div>
				<div class="main-container block-select-bcg">
					<h1><span>2. </span>Elige un vehículo</h1>
					<h1 class="font26">PARA COMENZAR LA CARRERA</h1>
			    <!-- .skew-row -->
					<div class="row skew-row margintop40 marginbottom80">
						<div class="col-xs-12 col-md-4">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-vehicule set-active" data-vehiculeValue='1'>
								<div class="black-circle">
									<img src="img/circle-img-01_c.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-vehicule" data-vehiculeValue='2'>
								<div class="black-circle">
									<img src="img/circle-img-02_c.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="margintop20 visible-xs visible-sm"></div>
							<div class="circle-block select-vehicule" data-vehiculeValue='3'>
								<div class="black-circle">
									<img src="img/circle-img-03_c.png" alt="" class="img-responsive">
								</div>
							</div>
						</div>
				    <!-- /.skew-row -->
					</div>
					<a href="javascript:getRaceData();" class="btn btn-primary">juega</a>
					<img src="img/block-img--bottom.png" alt="" class="block-img--bottom">
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">dilame.page();</script>
<?php include 'footer.php'; ?>
