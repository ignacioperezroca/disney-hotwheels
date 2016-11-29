<?php
	$pageTitle = "Personalización de tarjetas | Hot Wheels - Star Wars";
?>
<?php include 'header.php'; ?>
<?php
	$posterValue 	= !empty($_GET['posterValue']) ? (int)$_GET['posterValue'] : 1;
	$posterData 	=  !empty($_GET['data']) ? json_decode(stripslashes(html_entity_decode(urldecode($_GET['data']))),true) : '';
?>
<script>
	var posterValue = '<?php echo $posterValue; ?>';

	function back()
	{
		document.location = 'juego.php?posterValue='+posterValue;
	}
</script>
<section class="top previewtarjetas">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center mobile-container">
				<img src="img/main-banner.jpg" alt="" class="img-responsive full-width opacity-1">
				<div class="main-container block-img--bcg">
					<div class="button-block">
						<a href="javascript:back();" onclick=""><div class="btn btn-primary pull-left font26" onclick="dilame.action('personalizaciontarjetas:back');">Volver</div></a>
						<div class="btn btn-primary pull-right font26" data-toggle="modal" data-target="#help" onclick="dilame.action('personalizaciontarjetas:help');">Ayuda</div>
					</div>
					<h1>TUS pósteres</h1>
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
				<div class="main-container block-cards-bcg paddingbottom160">
					<h1>¡Felicitaciones! Has ganado 5 tarjetas</h1>
					<h1 class="font26">Puedes personalizarlas como más te guste para luego incluirlas en tu póster</h1>
				
				<?php if($posterValue == 1){ ?>
			    
			    <!-- 1 .skew-row -->
					<div class="row skew-row margintop40 marginbottom80 card1">
						<div class="col-xs-12 col-padding-0">
							<div class="cards-area-block">

								<div class="cards-area card_1 active">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--01.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('bb-8', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">bb-8</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Resistencia', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Resistencia</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Droide astromecánico', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Droide astromecánico</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('0.67 m', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">0.67 m</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('bb-8', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='1_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>bb-8</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Resistencia', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='1_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Resistencia</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Droide astromecánico', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='1_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>armas: </span>Droide astromecánico</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('0.67 m', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='1_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>0.67 m</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_2">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--02.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('El halcón milenario', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">El halcón milenario</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Alianza Rebelde', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Alianza Rebelde</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Corellia', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Corellia</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('34.75 m', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">34.75 m</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('El halcón milenario', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='2_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>El halcón milenario</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Alianza Rebelde', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='2_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Alianza Rebelde</div>
											</li>
											
											<li>
												<div class="icon-block <?php echo (in_array('Corellia', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='2_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Ubicación: </span>Corellia</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('34.75 m', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='2_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>34.75 m</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_3">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--03.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Han solo', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Han solo</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Alianza Rebelde', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Alianza Rebelde</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Pistola bláster', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Pistola bláster</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('Corellia', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Corellia</span></li>
													<li data-virtud="4" class="virtud_4 <?php echo (in_array('1.8 m', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">1.8 m</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Han solo', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='3_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Han solo</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Alianza Rebelde', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='3_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Alianza Rebelde</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Pistola bláster', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='3_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>armas: </span>Pistola bláster</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Corellia', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='3_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Ubicación: </span>Corellia</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('1.8 m', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='3_4'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>1.8 m</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_4">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--04.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Transporte de Kylo Ren', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Transporte de Kylo Ren</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Primer Orden', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Primer Orden</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('37.2 M', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">37.2 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Transporte de Kylo Ren', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='4_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Transporte de Kylo Ren</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Primer Orden', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='4_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Primer Orden</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('37.2 M', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='4_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>37.2 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_5">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--17.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('U-WING', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">U-WING</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Resistencia', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Resistencia</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('U-WING', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='5_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>U-WING</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Resistencia', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='5_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Resistencia</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				    <!-- /.skew-row -->

				<?php } ?>
				<?php if($posterValue == 2){ ?>
			    <!-- 2 .skew-row -->
					<div class="row skew-row margintop40 marginbottom80 card2">
						<div class="col-xs-12 col-padding-0">
							<div class="cards-area-block">

								<div class="cards-area card_6 active">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--05.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Stormtrooper', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Stormtrooper</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Imperio Galáctico', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Imperio Galáctico</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Pistola bláster', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Pistola bláster</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('1,83 M', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">1,83 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Stormtrooper', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='6_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Stormtrooper</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Imperio Galáctico', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='6_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Imperio Galáctico</div>
											</li>
											
											<li>
												<div class="icon-block <?php echo (in_array('Pistola bláster', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='6_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Ubicación: </span>Pistola bláster</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('1,83 M', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='6_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>1,83 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_7">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--06.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Speeder de Rey', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Speeder de Rey</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('3,73 M', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">3,73 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Speeder de Rey', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='7_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Speeder de Rey</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('3,73 M', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='7_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>3,73 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_8">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--07.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Jango Fett', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Jango Fett</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Z-6 Jetpack, rifle bláster', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Z-6 Jetpack, rifle bláster</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('1.8 m', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">1.8 m</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Jango Fett', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='8_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Jango Fett</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Z-6 Jetpack, rifle bláster', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='8_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>armas: </span>Z-6 Jetpack, rifle bláster</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('1.8 m', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='8_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>1.8 m</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_9">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--08.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('AT-ACT Cargo Walker', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">AT-ACT Cargo Walker</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Imperio Galáctico', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Imperio Galáctico</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('AT-ACT Cargo Walker', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='9_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>AT-ACT Cargo Walker</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Imperio Galáctico', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='9_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Imperio Galáctico</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_10">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--18.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?>  <?php echo (in_array('Jabba The Hut', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Jabba The Hut</span></li>
													<li data-virtud="1" class="virtud_1  <?php echo (in_array('Tatooine', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Tatooine</span></li>
													<li data-virtud="2" class="virtud_2  <?php echo (in_array('3,90 M', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">3,90 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Jabba The Hut', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='10_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Jabba The Hut</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Tatooine', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='10_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Tatooine</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('3,90 M', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='10_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>3,90 M</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				    <!-- /.skew-row -->
					<?php } ?>
					<?php if($posterValue == 3){ 
					?>
			   		<!-- 3 .skew-row -->
					<div class="row skew-row margintop40 marginbottom80 card3">
						<div class="col-xs-12 col-padding-0">
							<div class="cards-area-block">

								<div class="cards-area card_11 active">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--09.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Darth Vader', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Darth Vader</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Imperio Galáctico, Sith', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Imperio Galáctico, Sith</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Sable Láser', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Sable Láser</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('Estrella de la Muerte', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Estrella de la Muerte</span></li>
													<li data-virtud="4" class="virtud_4 <?php echo (in_array('2,03 M', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">2,03 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Darth Vader', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='11_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Darth Vader</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Imperio Galáctico, Sith', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='11_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Imperio Galáctico, Sith</div>
											</li>
											
											<li>
												<div class="icon-block <?php echo (in_array('Sable Láser', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='11_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>arma: </span>Sable Láser</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Estrella de la Muerte', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='11_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Ubicación: </span>Estrella de la Muerte</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('2,03 M', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='11_4'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>2,03 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_12">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--10.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Gunship de la República', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Gunship de la República</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Alianza Rebelde', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Alianza Rebelde</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('17,69 M', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">17,69 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Gunship de la República', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='12_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Gunship de la República</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Alianza Rebelde', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='12_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>afiliacion: </span>Alianza Rebelde</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('17,69 M', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='12_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>17,69 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_13">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--11.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Yoda', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Yoda</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Orden Jedi', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Orden Jedi</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Sable Láser', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Sable Láser</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('Hut de Yoda', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Hut de Yoda</span></li>
													<li data-virtud="4" class="virtud_4 <?php echo (in_array('0,66 M', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">0,66 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Yoda', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='13_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Yoda</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Orden Jedi', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='13_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>afiliacion: </span>Orden Jedi</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Sable Láser', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='13_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>armas: </span>Sable Láser</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Hut de Yoda', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='13_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Ubicación: </span>Hut de Yoda</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('0,66 M', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='13_4'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>0,66 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_14">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--12.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('X-Wing de Poe', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">X-Wing de Poe</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Resistencia', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Resistencia</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('12,48 M', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">12,48 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?>  <?php echo (in_array('X-Wing de Poe', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='14_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>X-Wing de Poe</div>
											</li>
											<li>
												<div class="icon-block  <?php echo (in_array('Resistencia', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='14_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Resistencia</div>
											</li>
											<li>
												<div class="icon-block  <?php echo (in_array('12,48 M', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='14_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>12,48 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_15">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--19.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Boba Fett', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Boba Fett</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Z-6 Jetpack', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Z-6 Jetpack</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Kamino', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Kamino</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('1,83 M', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">1,83 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Boba Fett', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='15_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Boba Fett</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Z-6 Jetpack', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='15_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Armas: </span>Z-6 Jetpack</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Kamino', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='15_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Ubicación: </span>Kamino</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('1,83 M', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='15_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>1,83 M</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				    <!-- /.skew-row -->

					<?php } ?>
					<?php if($posterValue == 4){ ?>
			    	<!-- 4 .skew-row -->
					<div class="row skew-row margintop40 marginbottom80 card4">
						<div class="col-xs-12 col-padding-0">
							<div class="cards-area-block">

								<div class="cards-area card_16 active">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--13.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Luke Skywalker', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Luke Skywalker</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Orden Jedi', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Orden Jedi</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Pistola Bláster, Sable Láser', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Pistola Bláster, Sable Láser</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('Tatooine', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Tatooine</span></li>
													<li data-virtud="4" class="virtud_4 <?php echo (in_array('1,72 M', $posterData['cards'][1])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">1,72 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Luke Skywalker', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='16_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Luke Skywalker</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Orden Jedi', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='16_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Orden Jedi</div>
											</li>
											
											<li>
												<div class="icon-block <?php echo (in_array('Pistola Bláster, Sable Láser', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='16_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>arma: </span>Pistola Bláster, Sable Láser</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Tatooine', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='16_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Ubicación: </span>Tatooine</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('1,72 M', $posterData['cards'][1])) ? 'checkbox-active' : '' ?>" data-position='16_4'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>1,72 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_17">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--14.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Destructor Estelar', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Destructor Estelar</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Primera Orden', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Primera Orden</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('2.915,81 M', $posterData['cards'][2])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">2.915,81 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Destructor Estelar', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='17_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Destructor Estelar</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Primera Orden', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='17_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>afiliacion: </span>Primera Orden</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('2.915,81 M', $posterData['cards'][2])) ? 'checkbox-active' : '' ?>" data-position='17_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>2.915,81 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_18">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--15.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('C3PO', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">C3PO</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Resistencia', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Resistencia</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('Droide de Protocolo', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Droide de Protocolo</span></li>
													<li data-virtud="3" class="virtud_3 <?php echo (in_array('Tatooine', $posterData['cards'][3])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Tatooine</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('C3PO', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='18_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>C3PO</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Resistencia', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='18_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>afiliacion: </span>Resistencia</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Droide de Protocolo', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='18_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>armas: </span>Droide de Protocolo</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Tatooine', $posterData['cards'][3])) ? 'checkbox-active' : '' ?>" data-position='18_3'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Ubicación: </span>Tatooine</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_19">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--16.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Tie Fighter', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Tie Fighter</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Primera Orden', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Primera Orden</span></li>
													<li data-virtud="2" class="virtud_2 <?php echo (in_array('6,69 M', $posterData['cards'][4])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">6,69 M</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?> <?php echo (in_array('Tie Fighter', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='19_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Tie Fighter</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('Primera Orden', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='19_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Primera Orden</div>
											</li>
											<li>
												<div class="icon-block <?php echo (in_array('6,69 M', $posterData['cards'][4])) ? 'checkbox-active' : '' ?>" data-position='19_2'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>altura: </span>6,69 M</div>
											</li>
										</ul>
									</div>
								</div>

								<div class="cards-area card_20">
									<div class="hero-block">
										<div class="margintop20 visible-xs"></div>
										<img src="img/card-background.jpg" alt="" class="img-responsive">
										<div class="carhero-block">
											<img src="img/card-hero--20.png" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<div class="desc-block">
												<ul>
													<li data-virtud="0" class="virtud_0 <?php echo (empty($_GET['data'])) ? 'visible-virtud active' : ''; ?> <?php echo (in_array('Tie Fighter', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Tie Striker</span></li>
													<li data-virtud="1" class="virtud_1 <?php echo (in_array('Império Galáctico', $posterData['cards'][5])) ? 'visible-virtud active' : '' ?>"><span>> </span><span class="white">Império Galáctico</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="data-block">
										<div class="title">Elige los elementos para personalizar tu tarjeta</div>
										<ul>
											<li>
												<div class="icon-block <?php echo (empty($_GET['data'])) ? 'checkbox-active' : ''; ?>  <?php echo (in_array('Tie Striker', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='20_0'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>personaje: </span>Tie Striker</div>
											</li>
											<li>
												<div class="icon-block  <?php echo (in_array('Império Galáctico', $posterData['cards'][5])) ? 'checkbox-active' : '' ?>" data-position='20_1'><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div>
												<div class="subtitle"><span>Equipo: </span>Império Galáctico</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				    <!-- /.skew-row -->
				    <?php } ?>
				

					<?php if($posterValue == 1){ ?>
					<!-- 1 Row select card -->
					<div class="row skew-row card-hero--row">
						<div class="row hero-block">
							<div class="col-xs-6 col-sm-2 select-card active" data-card='1'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--01.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='2'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--02.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='3'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--03.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='4'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--04.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='5'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--17.jpg" alt="" class="img-responsive">
							</div>
						</div>
					</div>
					
					<?php } ?>
					<?php if($posterValue == 2){ ?>
					<!-- 2 Row select card -->
					<div class="row skew-row card-hero--row">
						<div class="row hero-block">
							<div class="col-xs-6 col-sm-2 select-card active" data-card='6'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--05.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='7'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--06.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='8'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--07.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='9'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--08.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='10'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--18.jpg" alt="" class="img-responsive">
							</div>
						</div>
					</div>
					
					<?php } ?>
					<?php if($posterValue == 3){ ?>
					<!-- 3 Row select card -->
					<div class="row skew-row card-hero--row">
						<div class="row hero-block">
							<div class="col-xs-6 col-sm-2 select-card active" data-card='11'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--09.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='12'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--10.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='13'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--11.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='14'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--12.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='15'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--19.jpg" alt="" class="img-responsive">
							</div>
						</div>
					</div>
					
					<?php } ?>
					<?php if($posterValue == 4){ ?>
					<!-- 4 Row select card -->
					<div class="row skew-row card-hero--row">
						<div class="row hero-block">
							<div class="col-xs-6 col-sm-2 select-card active" data-card='16'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--13.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='17'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--14.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='18'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--15.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='19'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--16.jpg" alt="" class="img-responsive">
							</div>
							<div class="col-xs-6 col-sm-2 select-card" data-card='20'>
								<div class="margintop20 visible-xs"></div>
								<img src="img/card-hero--20.jpg" alt="" class="img-responsive">
							</div>
						</div>
					</div>
					<?php } ?>

					<div class="row skew-row card-hero--row">
						<div class="col-xs-12 col-padding-0">
							<div class="play-controls margintop-10">
								<div class="title">Luego de armar tus tarjetas podrás ver tu póster terminado.</div>
								<div class="arrow-block">
									<a href="javascript:getPosterData();" class="btn btn-primary" onclick="dilame.action('personalizaciontarjetas:viewposter');">ver póster</a>
								</div>
							</div>
						</div>
					</div>
					<img src="img/block-img--bottom.png" alt="" class="block-img--bottom">
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">dilame.page();</script>
</section>
<?php include 'footer.php'; ?>
