
<?php

function __autoload($class) {
	require_once "class/class." . $class . ".php";
}
/*
 $bd = new BaseDatos(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);

$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoPelicula($bd);
$pelicula = new Pelicula();

$contador = -1;

if (isset($_GET["sala"])) {
$pelicula = $uso->getPeliculaSala($_GET["sala"]) or die("Error en $consulta: " . mysql_error());
$contador++;
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--bloque jquery-->
<script type="text/javascript" src="js/jqueryy.js"></script>
<!--archivo javaScript cartelera-->
<script type="text/javascript" src="js/cartelera_1.js">
</script>
<title>Cartelera -Theatrum Cinema</title>
<link rel="stylesheet" type="text/css" href="css/template.css" />
<link rel="shortcut icon" href="css/images/favicon.ico">

</head>

<body bgcolor="#000000">
	<div id="background_area">
		<div id="container">
			<?php
			include ( "incluir/cabecera.php");
			?>
		</div>

		<!-- cosas de Yannick -->
		<?php
		$bd = new BaseDatos(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);

		$bd->setBaseDatos(Constantes::$basedatos);

		$uso = new UsoPelicula($bd);
		$pelicula = new Pelicula();

		$contador = -1;
		if (isset($_GET["sala"])) {
			$pelicula = $uso->obtenerCarteleraSala($_GET["sala"]);
		}
		$contador++;
		?>
		<input type="hidden" value="<?php echo $pelicula->getIdPelicula() ?>"
			id="truco" /> <input type="hidden" value="<?php echo $contador; ?>"
			id="otrotruco" />
		<!-- hasta aqui -->

		<div class="menu_pelicula_container" id="menu_pelicula_container">
			<a name="sipnosis"></a>

			<div class="flange_informacion_area"
				id="flange_informacion_area_info">
				<div class="flange_compra_entradas_content"
					id="flange_informacion_content">
					<span id="btpeli">INFORMACI&Oacute;N</span>
				</div>
				<div class="flange_compra_entradas_area">
					<div class="flange_compra_entradas_content"
						id="flange_compra_entradas_content">
						<span id="btticket">COMPRAR ENTRADAS</span>
					</div>
				</div>
			</div>

			<div class="menu_pelicula_area" id="menu_pelicula_area">
				<div class="menu_pelicula_content">
					<div class="pelicula_content_left_sup">
						<div class="show_area sala pelicula">
							<div class="show_content sala pelicula">
								<img id="fotoCartelera"
									src="images/foto/<?php echo $pelicula->getFoto(); ?>"
									height="270px" width="190px" title="Cartel" />
							</div>
						</div>
					</div>
					<div class="pelicula_content_left_inf">
						<div class="pelicula_content_left_inf_left celda1">
							<b>VERSI&Oacute;N</b>
						</div>
						<div class="pelicula_content_left_inf_left celda2">
							<b>DURACI&Oacute;N</b>
						</div>
						<div class="pelicula_content_left_inf_left celda3">DIRECTOR</div>
						<div class="pelicula_content_left_inf_left celda4">CLASIFIC.</div>
						<div class="pelicula_content_left_inf_right celda1">
							<p id="version" name="version">
								<?php
								if ($pelicula->getDigital() == 1)
									echo " Digital.<br>";
								if ($pelicula->getTresD() == 1)
									echo " Tres D.<br> ";
								if ($pelicula->getVos() == 1)
									echo " Original Subtitulada.<br>";
								if ($pelicula->getVo() == 1)
									echo " Original.<br>";
								if ($pelicula->getTrentaycincomm() == 1)
									echo " 35 mm.<br>";
								?>
							</p>
						</div>
						<div class="pelicula_content_left_inf_right celda2">
							<p id="duracion" name="duracion">
								<?php echo $pelicula->getDuracion(); ?>
								min.
							</p>
						</div>
						<div class="pelicula_content_left_inf_right celda3">
							<p id="director" name="director">
								<?php echo $pelicula->getDirector(); ?>
							</p>
						</div>
						<div class="pelicula_content_left_inf_right celda4">
							<p id="calificacion" name="calificacion">
								<?php echo $pelicula->getCalificacion(); ?>
							</p>
						</div>
					</div>
					<div class="pelicula_content_right">
						<div class="pelicula_content_right_sup_left">
							<h2 id="salaproyeccion" name="salaproyeccion">
								SALA
								<?php echo $pelicula->getSalaProyeccion(); ?>
							</h2>
						</div>
						<div class="pelicula_content_right_sup_right">
							<h2 id="nbepelicula" name="nbepelicula">
								<!-- &OpenCurlyDoubleQuote; --> &#X0201C;
								<?php echo $pelicula->getNombrePelicula(); ?>
								<!-- &CloseCurlyDoubleQuote; -->&#X0201D;
							</h2>
						</div>
						<div class="pelicula_content_right_sup_left celda2">
							<b>SINOPSIS</b>
						</div>
						<div class="pelicula_content_right_sup_right celda2">
							<p id="descripcion" name="descripcion">
								<?php echo $pelicula->getDescripcion(); ?>
							</p>
						</div>
						<div class="pelicula_content_right_sup_left celda3">
							<b>REPARTO</b>
						</div>
						<div class="pelicula_content_right_sup_right celda3">
							<p id="interpretes" name="interpretes">
								<?php echo $pelicula->getInterpretes(); ?>
							</p>
						</div>
						<div class="pelicula_content_right_sup_left celda4">
							<b>G&Eacute;NERO</b>
						</div>
						<div class="pelicula_content_right_sup_right celda4">
							<p id="genero" name="genero">
								<?php echo $pelicula->getGenero(); ?>
							</p>
						</div>
						<div class="pelicula_content_right_sup_left trailer">
							<b>TR&Aacute;ILER</b>
						</div>
						<div class="pelicula_content_right_trailer_container">
							<div class="show_area sala trailer_area">
								<div class="show_content sala trailer_content">
								<?php
									$trailer=$pelicula->getTrailler(); 
									if(isset($trailer)){
										echo "<iframe width='326' height='194' src='http://www.youtube.com/embed/$trailer' frameborder='0' allowfullscreen></iframe>";
									}
								?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- ------------------------------------------------------------------------------ -->
			<a name="sesion"></a>
			<div class="menu_pelicula_area compra" id="menu_pelicula_area_compra">
				<div class="menu_pelicula_content compra">
					<div class="pelicula_content_right_sup_left compra">
						SALA
						<!--&nbsp;-->
						<?php
						//variables en uso para la compra de un ticket
						echo $sala = $pelicula->getSalaProyeccion();
						$idpelicula = $pelicula->getIdPelicula();
						?>
					</div>
					<div class="pelicula_content_right_sup_right compra">	
						&nbsp;
						<!-- &OpenCurlyDoubleQuote; --> &#X0201C;
						<span id="titulopeli"><?php echo $pelicula->getNombrePelicula(); ?>
						</span>
						<!-- &CloseCurlyDoubleQuote; -->&#X0201D;
					</div>
					<div class="pelicula_content_right_sup_right compra sesion">Escoge
						la sesi&oacute;n para disfrutar de tu pel&iacute;cula:</div>
					<div class="show_area sala pelicula compra">

						<div class="show_content sala pelicula compra">
							<img src="images/foto/<?php echo $pelicula->getFoto(); ?>"
								height="270px" width="190px" />
						</div>
						<div class="session_container">
							<div class="session_area">
								<?php
								//cada sesion tiene un intermedio de 15 minuto que se añade
								//a la duracion de la peli
								$numsesion = ceil(420 / ( $pelicula->getDuracion() + 15)); //500 son 7 horas de cine
								//sesion de la semana
								$sesionlunes = $numsesion;
								$sesionmartes = $numsesion;
								$sesionmiercoles = $numsesion;
								$sesionjueves = $numsesion;
								$sesionviernes = $numsesion;
								$sesionsabado = $numsesion;
								$sesiondomingo = $numsesion;
								//objeto para usar los metodo de cartelera para calcular la hora de la proxima sesion
								$carte = new Cartelera();
								//para tener hora y minuto de la peli con descanso
								$carte->setHoraDuracion((int) (($pelicula->getDuracion() + 15) / 60));

								$carte->setMinutoDuracion(((ceil((($pelicula->getDuracion() + 15) % 60) / 10)) * 10));
								?>
								<div class="session_content_light">
									<?php
									include ("incluir/lunes.php");
									?>
								</div>
								<div class="session_content_dark">
									<?php
									include ( "incluir/martes.php");
									?>

								</div>
								<div class="session_content_light">
									<?php
									include ( "incluir/miercoles.php");
									?>
								</div>
								<div class="session_content_dark">
									<?php
									include ( "incluir/jueves.php");
									?>
								</div>
								<div class="session_content_light">
									<?php
									include ( "incluir/viernes.php");
									?>
								</div>
								<div class="session_content_dark">
									<?php
									include ( "incluir/sabado.php");
									?>
								</div>
								<div class="session_content_light">
									<?php
									include ( "incluir/domingo.php");
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>



		<div id="footer_area">
			<?php
			include ( "incluir/pie.php");
			?>
		</div>
	</div>


</body>
<?php $bd->closeConexion(); ?>
</html>
