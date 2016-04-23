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
$estrenos = new Pelicula();

$estrenos = $uso->obtenerEstrenos();

$i = 0;
$idEstreno = array();
$nombreEstreno = array();
$descripcion = array();
$cartel = array();
$genero = array();
$interpretes = array();
$sala = array();

while ($fila = $bd->getFila($estrenos)) {
    $idPelicula[$i] = $fila["idPelicula"];
    $nombreEstreno[$i] = $fila["nombrePelicula"];
    $descripcion[$i] = $fila["descripcion"];
    $cartel[$i] = $fila["cartel"];
    $genero[$i] = $fila["genero"];
    $interpretes[$i] = $fila["interpretes"];
    $sala[$i] = $fila["salaProyeccion"];
    $i++;
}

$bd->closeConexion();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Estrenos -Theatrum Cinema</title>
<link rel="stylesheet" type="text/css" href="css/template.css"/>
<link rel="shortcut icon" href="favicon.ico">
</head>

<body bgcolor="#000000">
<div id="background_area">
  <div id="container">
    <div id="container_area">
      <div id="header_area">
        <div id="header_logo"><a href="index.php"> <img src="css/images/header_logo.png" alt="" /></a></div>
        <div id="header_name"><a href="index.php"> <img src="css/images/header_name.png" alt="" /></a></div>
        <div id="header_logo_blur"></div>
      </div>
      <div class="main_area butaca">
        <div class="menu_area cartelera">
          <div id="menu_content">
            <button type="button" name="" value="" class="button_menu inicio" onClick="location.href='index.php'">INICIO</button>
            <button type="button" name="" value="" class="button_menu_active estrenos" onClick="location.href='estrenos.php'">ESTRENOS</button>
            <button type="button" name="" value="" class="button_menu cartelera" onClick="location.href='cartelera.php'">CARTELERA</button>
            <button type="button" name="" value="" class="button_menu proximamente" onClick="location.href='proximamente.php'">PRÓXIMAMENTE</button>
            <button type="button" name="" value="" class="button_menu contacto" onClick="location.href='contacto.php'">CONTACTO</button>
            <div class="button_menu networks_area">
              <div class="menu_icons"><a href="http://www.facebook.com" target="_blank"> <img src="css/images/facebook_ico.png" alt="" /></a></div>
              <div class="menu_icons"><a href="http://www.twitter.com" target="_blank"> <img src="css/images/twitter_ico.png" alt="" /></a></div>
              <div class="menu_icons"><a href="http://www.vimeo.com" target="_blank"> <img src="css/images/vimeo_ico.png" alt="" /></a></div>
              <div class="menu_icons"><a href="http://www.flickr.com" target="_blank"> <img src="css/images/flickr_ico.png" alt="" /></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="menu_pelicula_container">
        <div class="menu_pelicula_area estrenos">
          <div class="menu_pelicula_content estrenos">
            <div class="content_estrenos">
              <div class="show_area sala pelicula estrenos">
                <div class="show_content sala pelicula estrenos">
                  <img class="fotoEstreno" alt="imagen1" src="images/cartel/<?php echo $cartel[0]; ?>" width="274" height="83" />
                </div>
              </div>
              <div class="pelicula_content_right_sup_right estrenos">&#X0201C;<?php echo utf8_encode($nombreEstreno[0]); ?>&#X0201D;</div>
              <div class="holder_estrenos">SINOPSIS</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($descripcion[0]); ?></div>
              <div class="holder_estrenos">REPARTO</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($interpretes[0]); ?></div>
              <div class="holder_estrenos">GENERO</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($genero[0]); ?></div>
              <div class="detail_image_ticket estrenos"></div>
              <div class="detail_button_area estrenos">
                <div class="detail_button_compra estrenos" onClick="location.href='cartelera.php?sala=<?php echo $sala[0]; ?>#sinopsis'">ENTRADAS</div>
              </div>
            </div>
            <div class="content_estrenos_center">
              <div class="show_area sala pelicula estrenos center">
                <div class="show_content sala pelicula estrenos center">
                  <img class="fotoEstreno" alt="imagen2" src="images/cartel/<?php echo $cartel[1]; ?>" width="274" height="83" />
                </div>
              </div>
              <div class="pelicula_content_right_sup_right estrenos">&#X0201C;<?php echo utf8_encode($nombreEstreno[1]); ?>&#X0201D;</div>
              <div class="holder_estrenos">SINOPSIS</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($descripcion[1]); ?></div>
              <div class="holder_estrenos">REPARTO</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($interpretes[1]); ?></div>
              <div class="holder_estrenos">GENERO</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($genero[1]); ?></div>
              <div class="detail_image_ticket estrenos"></div>
              <div class="detail_button_area estrenos">
                <div class="detail_button_compra estrenos" onClick="location.href='cartelera.php?sala=<?php echo $sala[1]; ?>#sinopsis'">ENTRADAS</a></div>
              </div>
            </div>
            <div class="content_estrenos_right">
              <div class="show_area sala pelicula estrenos right">
                <div class="show_content sala pelicula estrenos right">
                  <img class="fotoEstreno" alt="imagen3" src="images/cartel/<?php echo $cartel[2]; ?>" width="274" height="83" />
                </div>
              </div>
              <div class="pelicula_content_right_sup_right estrenos">&#X0201C;<?php echo utf8_encode($nombreEstreno[2]); ?>&#X0201D;</div>
              <div class="holder_estrenos">SINOPSIS</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($descripcion[2]); ?></div>
              <div class="holder_estrenos">REPARTO</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($interpretes[2]); ?></div>
              <div class="holder_estrenos">GENERO</div>
              <div class="holder_estrenos_content"><?php echo utf8_encode($genero[2]); ?></div>
              <div class="detail_image_ticket estrenos"></div>
              <div class="detail_button_area estrenos">
                <div class="detail_button_compra estrenos" onClick="location.href='cartelera.php?sala=<?php echo $sala[2]; ?>#sinopsis'">ENTRADAS</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="footer_area">
        <div id="footer_left">
          <p><a href="index.php">&#187;&nbsp;Inicio.</a></p>
          <p><a href="estrenos.php">&#187;&nbsp;Estrenos.</a></p>
          <p><a href="cartelera.php">&#187;&nbsp;Cartelera.</a></p>
          <p><a href="proximamente.php">&#187;&nbsp;Próximamente.</a></p>
          <p><a href="contacto.php">&#187;&nbsp;Contacto.</a></p>
        </div>
        <div id="footer_center"></div>
        <div id="footer_rigth">
          <div id="footer_rigth_top"><a href="index.php"> <img src="css/images/footer_logo.png" alt="" /></a> </div>
          <div id="footer_rigth_bottom">
            <p>C.C. La Repera. Local 23-25</p>
            <p>C / Limonera S/N</p>
            <p>C.P.: 18010 GRANADA.</p>
            <p>Tel.: 958 666 666</p>
          </div>
        </div>
        <div id="footer_bottom">
          <p>Copyright © 2012 Theatrum Cinema, Todos los derechos reservados. <a href="aviso_legal.html">Aviso legal</a> | <a href="politica.html">Política de Privacidad.</a></p>
          <p>El copyright de los carteles, fotografías, banners y portadas que se incluyen en este sitio pertenece a los respectivos autores, productoras, distribuidoras y sites enlazados.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
