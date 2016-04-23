<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
function __autoload($class) {
	require_once ('class/class.' . $class . '.php');
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);

$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoPelicula($bd);
$pelicula = new Pelicula();

$idPelicula = $_GET["idPelicula"];
$fechaSesion = $_GET["fechaSesion"];
$horaSesion = $_GET["horaSesion"];
$numeroEntradas = $_GET["numeroEntradas"];
$entradas = $_GET["entradas"];
$gafas = $_GET["gafas"];
$estudiante = $_GET["estudiante"];
$miercoles = $_GET["miercoles"];

$pelicula = $uso->getPeliculaJuan($idPelicula);

while ($fila = $bd->getFila($pelicula)) {
	$nombrePelicula = $fila["nombrePelicula"];
	$tresD = $fila["tresD"];
	$digital = $fila["digital"];
	$sala = $fila["salaProyeccion"];
}

$uso2 = new UsoPrecio($bd);
$precio = new Precio();

$precio = $uso2->getPrecio();

$precioBase = 0;
$precioMiercoles = 0;
$precioGafas = 0;
$precioEspecial = 0;
$iva = 0;
$precioTresD = 0;
$precioDigital = 0;

while ($fila = $bd->getFila($precio)){
	$precioBase = $fila["precioBase"];
	$precioMiercoles = $fila["miercoles"];
	$precioGafas = $fila["gafas"];
	$precioEspecial = $fila["especial"];
	$iva = $fila["iva"];
	$precioTresD = $fila["tresD"];
	$precioDigital = $fila["digital"];
}

$bd->closeConexion();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Compra -Theatrum Cinema</title>
<link rel="stylesheet" type="text/css" href="css/template.css" />
<link rel="shortcut icon" href="favicon.ico">

</head>

<body bgcolor="#000000">
	<div id="background_area">
		<div id="container">
			<div id="container_area">
				<div id="header_area">
					<div id="header_logo">
						<a href="index.php"> <img src="css/images/header_logo.png" alt="" />
						</a>
					</div>
					<div id="header_name">
						<a href="index.php"> <img src="css/images/header_name.png" alt="" />
						</a>
					</div>
					<div id="header_logo_blur"></div>
				</div>
				<div class="main_area butaca">
					<div class="menu_area cartelera">
						<div id="menu_content">
							<button type="button" name="" value="" class="button_menu inicio"
								onClick="location.href='index.php'">INICIO</button>
							<button type="button" name="" value=""
								class="button_menu estrenos"
								onClick="location.href='estrenos.php'">ESTRENOS</button>
							<button type="button" name="" value=""
								class="button_menu_active cartelera"
								onClick="location.href='cartelera.php'">CARTELERA</button>
							<button type="button" name="" value=""
								class="button_menu proximamente"
								onClick="location.href='proximamente.php'">PRÓXIMAMENTE</button>
							<button type="button" name="" value=""
								class="button_menu contacto"
								onClick="location.href='contacto.php'">CONTACTO</button>
							<div class="button_menu networks_area">
								<div class="menu_icons">
									<a href="http://www.facebook.com" target="_blank"> <img
										src="css/images/facebook_ico.png" alt="" />
									</a>
								</div>
								<div class="menu_icons">
									<a href="http://www.twitter.com" target="_blank"> <img
										src="css/images/twitter_ico.png" alt="" />
									</a>
								</div>
								<div class="menu_icons">
									<a href="http://www.vimeo.com" target="_blank"> <img
										src="css/images/vimeo_ico.png" alt="" />
									</a>
								</div>
								<div class="menu_icons">
									<a href="http://www.flickr.com" target="_blank"> <img
										src="css/images/flickr_ico.png" alt="" />
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$tickets = array();
				$precioTotal = 0;
				$precioEntrada = round($precioBase + (($precioBase*$iva)/100));

				$g = $gafas;
				$e = $estudiante;

				if ($tresD == 1)
					$precioEntrada = $precioEntrada + $precioTresD;
				else if ($digital == 1)
					$precioEntrada = $precioEntrada + $precioDigital;

				for ($i = 0; $i < $numeroEntradas; $i++){
					$tickets[$i] = $precioEntrada;
					if ($g > 0){
						$tickets[$i] = $tickets[$i] + $precioGafas;
						$g--;
					}
					if ($miercoles == 1){
						$tickets[$i] = $tickets[$i] + $precioEspecial;
					}else if ($miercoles == 0){
						if ($e > 0){
							$tickets[$i] = $tickets[$i] + $precioEspecial;
							$e--;
						}
					}

					$precioTotal = $precioTotal + $tickets[$i];
				}

				$fila_Butaca = explode(",",$entradas);

				$j = 0;
				$fea = number_format(($fila_Butaca[0]/100), 2);
				$Fila = explode(".", $fea);
				?>
				<div class="menu_pelicula_container">
					<div class="menu_pelicula_area ticket">
						<div class="menu_pelicula_content ticket">
							<div class="pelicula_content_right_sup_left ticket">
								SALA
								<?php echo $sala; ?>
								:
							</div>
							<div class="pelicula_content_right_sup_right ticket">
								"
								<?php echo $nombrePelicula; ?>
								"
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">FECHA:</div>
							<div class="pelicula_content_right_sup_right ticket rest">
								<?php echo $fechaSesion; ?>
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">HORA:</div>
							<div class="pelicula_content_right_sup_right ticket rest">
								<?php echo $horaSesion?>
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">Nº
								ENTRADAS:</div>
							<div class="pelicula_content_right_sup_right ticket rest">
								<?php echo $numeroEntradas; ?>
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">Nº
								GAFAS:</div>
							<div class="pelicula_content_right_sup_right ticket rest">
								<?php echo $gafas; ?>
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">Nº
								ESTUDIANTES:</div>
							<div class="pelicula_content_right_sup_right ticket rest">
								<?php echo $estudiante; ?>
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">FILA:</div>
							<div class="pelicula_content_right_sup_right ticket rest">
								<?php echo $Fila[0]; ?>
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">BUTACAS:</div>
							<div class="pelicula_content_right_sup_right ticket rest">
								<?php 
								for ($i = 0; $i < sizeof($fila_Butaca); $i++){
									$aux[$i] = number_format(($fila_Butaca[$i]/100), 2);
									$cosa = explode(".", $aux[$i]);
									if ($cosa[0] != 0){
										echo $cosa[1];
										if ($j < $numeroEntradas-1){
											echo "-";
										}
										$j++;
									}
								}
								$mapache = implode(",", $tickets);
								?>
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">IMPORTE:</div>
							<div class="pelicula_content_right_sup_right ticket rest">
								<?php echo $precioTotal; ?>
								€
							</div>
							<div class="pelicula_content_right_sup_left ticket rest">&nbsp;</div>
                            <div class="detail_button_area ticket">
                                <div class="detail_button_compra" id="buttonBuy"
                                    onclick="location.href='insertar.php?idPelicula=<?php echo $idPelicula; ?>&nombrePelicula=<?php echo $nombrePelicula; ?>&fechaSesion=<?php echo $fechaSesion; ?>&horaSesion=<?php echo $horaSesion; ?>&tickets=<?php echo $mapache; ?>&entradas=<?php echo $entradas; ?>&sala=<?php echo $sala; ?>&miercoles=<?php echo $miercoles; ?>'">ACEPTAR</div>
                             </div>
						</div>
					</div>
				</div>
				<div id="footer_area">
					<div id="footer_left">
						<p>
							<a href="index.php">&#187;&nbsp;Inicio.</a>
						</p>
						<p>
							<a href="estrenos.php">&#187;&nbsp;Estrenos.</a>
						</p>
						<p>
							<a href="cartelera.php">&#187;&nbsp;Cartelera.</a>
						</p>
						<p>
							<a href="proximamente.php">&#187;&nbsp;Próximamente.</a>
						</p>
						<p>
							<a href="contacto.php">&#187;&nbsp;Contacto.</a>
						</p>
					</div>
					<div id="footer_center"></div>
					<div id="footer_rigth">
						<div id="footer_rigth_top">
							<a href="index.php"> <img src="css/images/footer_logo.png" alt="" />
							</a>
						</div>
						<div id="footer_rigth_bottom">
							<p>C.C. La Repera. Local 23-25</p>
							<p>C / Limonera S/N</p>
							<p>C.P.: 18010 GRANADA.</p>
							<p>Tel.: 958 666 666</p>
						</div>
					</div>
					<div id="footer_bottom">
						<p>
							Copyright © 2012 Theatrum Cinema, Todos los derechos reservados.
							<a href="aviso_legal.html">Aviso legal</a> | <a
								href="politica.html">Política de Privacidad.</a>
						</p>
						<p>El copyright de los carteles, fotografías, banners y portadas
							que se incluyen en este sitio pertenece a los respectivos
							autores, productoras, distribuidoras y sites enlazados.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
