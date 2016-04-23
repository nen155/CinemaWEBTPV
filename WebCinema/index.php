<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

function __autoload($class) {
    require_once ('class/class.' . $class . '.php');
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);

$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoPelicula($bd);

$estrenos = $uso->obtenerEstrenos();

$i = 0;
$idEstreno = array();
$nombreEstreno = array();
$cartel = array();
$salaEstreno = array();
while ($fila = $bd->getFila($estrenos)) {
    $idEstreno[$i] = $fila["idPelicula"];
    $nombreEstreno[$i] = $fila["nombrePelicula"];
    $cartel[$i] = $fila["cartel"];
    $salaEstreno[$i] = $fila["salaProyeccion"];
    $i++;
}

$proximos = $uso->obtenerProximos();

$i = 0;
$idProximo = array();
$nombreProximo = array();
$descProximo = array();
$foto = array();

while ($fila = $bd->getFila($proximos)) {
    $idProximo[$i] = $fila["idPelicula"];
    $nombreProximo[$i] = $fila["nombrePelicula"];
    $descProximo[$i] = $fila["descripcion"];
    $foto[$i] = $fila["foto"];
    $i++;
}

$peliculas = $uso->obtenerCartelera();

$i = 0;
$idPelicula = array();
$nombrePelicula = array();
$descripcion = array();
$fotoPelicula = array();
$salaCartelera = array();

while ($fila = $bd->getFila($peliculas)) {
  $idPelicula[$i] = $fila["idPelicula"];
  $nombrePelicula[$i] = $fila["nombrePelicula"];
  $descripcion[$i] = $fila["descripcion"];
  $fotoPelicula[$i] = $fila["foto"];
  $salaCartelera[$i] = $fila["salaProyeccion"];
  $i++;
}

$bd->closeConexion();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Theatrum Cinema</title>
<link rel="stylesheet" type="text/css" href="css/template.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jcarousellite.js"></script>
<script type="text/javascript">
  $(function() {
    $(".anyClass").jCarouselLite({
      btnNext: ".nex",
      btnPrev: ".prev",
      visible: 4,
      scroll: 4,
      horizontal: "true",
      circular: "true"
      });
    });
</script>
<script type="text/javascript">
  $(function() {
    $(".otherClass").jCarouselLite({
      btnNext: ".siguiente",
      btnPrev: ".previo",
      visible: 1,
      scroll: 1,
      horizontal: "true",
      circular: "true",
      auto: 8800
    });
  });
</script>
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
      <div class="main_area">
        <div id="publish_area">
          <div id="publish_content">
         <div class="containerSlider">
                  <div id="slider">
                      <div id="mask"><!-- 
                                      Slide 1:    [=]=== 
                                      Slide 2:   =[=]==
                                      Slide 3:  ==[=]=
                                      Slide 4: ===[=] 
                          -->
                          <ul>
                              <li>
                                  <a href="index.php" title=""><img id="imagen0" alt="imagen0" src="css/theatrum_publi.jpg"/></a>
                              </li>
                              <li>
                                  <a href="cartelera.php?sala=<? echo $salaEstreno[0]; ?>#sinopsis" title=""><img id="imagen1" alt="imagen1" src="images/cartel/<?php echo $cartel[0]; ?>"/></a>
                              </li>
                              <li>
                                  <a href="cartelera.php?sala=<? echo $salaEstreno[1]; ?>#sinopsis" title=""><img id="imagen2" alt="imagen2" src="images/cartel/<?php echo $cartel[1]; ?>"/></a>
                              </li>
                              <li>      
                                  <a href="cartelera.php?sala=<? echo $salaEstreno[2]; ?>#sinopsis" title=""><img id="imagen3" alt="imagen3" src="images/cartel/<?php echo $cartel[2]; ?>"/></a>
                              </li>
                          </ul>
                      </div>
                      <div id="progress">
                      </div>
                      <div id="pause">
                      </div>
                  </div>
              </div> 
          </div>
        </div>
        <div class="menu_area">
          <div id="menu_content">
            <button type="button" name="" value="" class="button_menu_active inicio" onClick="location.href='index.php'">INICIO</button>
            <button type="button" name="" value="" class="button_menu estrenos" onClick="location.href='estrenos.php'">ESTRENOS</button>
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
        <div class="show_area">
          <div class="show_title">PELÍCULAS EN CARTELERA</div>
          <div class="show_content">
              <div id="carrusel2">
                <div class="anyClass">
                <ul>
                    <li id="cero" class="tooltip">
                      <div class="view view-sixth">
                          <img src="images/foto/<?php echo $fotoPelicula[0]; ?>" alt="imagen0" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descripcion[0]),0,100); ?>...</p>
                              <a href="cartelera.php?sala=<?php echo $salaCartelera[0]; ?>#sinopsis" title="">Comprar Entrada</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombrePelicula[0]); ?></p></li>
                    <li id="uno" class="tooltip">
                      <div class="view view-sixth">
                          <img src="images/foto/<?php echo $fotoPelicula[1]; ?>" alt="imagen1" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descripcion[1]),0,100); ?>...</p>
                              <a href="cartelera.php?sala=<?php echo $salaCartelera[1]; ?>#sinopsis" title="">Comprar Entrada</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombrePelicula[1]); ?></p></li>
                    <li id="dos" class="tooltip">
                      <div class="view view-sixth">
                          <img src="images/foto/<?php echo $fotoPelicula[2]; ?>" alt="imagen2" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descripcion[2]),0,100); ?>...</p>
                              <a href="cartelera.php?sala=<?php echo $salaCartelera[2]; ?>#sinopsis" title="">Comprar Entrada</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombrePelicula[2]); ?></p></li>
                    <li id="tres" class="tooltip">
                         <div class="view view-sixth">
                          <img src="images/foto/<?php echo $fotoPelicula[3]; ?>" alt="imagen3" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descripcion[3]),0,100); ?>...</p>
                              <a href="cartelera.php?sala=<?php echo $salaCartelera[3]; ?>#sinopsis" title="">Comprar Entrada</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombrePelicula[3]); ?></p></li>
                    <li id="cuatro" class="tooltip">
                      <div class="view view-sixth">
                          <img src="images/foto/<?php echo $fotoPelicula[4]; ?>" alt="imagen4" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descripcion[4]),0,100); ?>...</p>
                              <a href="cartelera.php?sala=<?php echo $salaCartelera[4]; ?>#sinopsis" title="">Comprar Entrada</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombrePelicula[4]); ?></p></li>
                    <li id="cinco" class="tooltip">
                      <div class="view view-sixth">
                          <img src="images/foto/<?php echo $fotoPelicula[5]; ?>" alt="imagen5" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descripcion[5]),0,100); ?>...</p>
                              <a href="cartelera.php?sala=<?php echo $salaCartelera[5]; ?>#sinopsis" title="">Comprar Entrada</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombrePelicula[5]); ?></p></li>
                    <li id="seis" class="tooltip">
                      <div class="view view-sixth">
                          <img src="images/foto/<?php echo $fotoPelicula[6]; ?>" alt="imagen6" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descripcion[6]),0,100); ?>...</p>
                              <a href="cartelera.php?sala=<?php echo $salaCartelera[6]; ?>#sinopsis" title="">Comprar Entrada</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombrePelicula[6]); ?></p></li>
                    <li id="siete" class="tooltip">
                        <div class="view view-sixth">
                          <img src="images/foto/<?php echo $fotoPelicula[7]; ?>" alt="imagen7" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descripcion[7]),0,100); ?>...</p>
                              <a href="cartelera.php?sala=<?php echo $salaCartelera[7]; ?>#sinopsis" title="">Comprar Entrada</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombrePelicula[7]); ?></p></li>
                </ul>
            </div>
          </div> 
                <img src="images/flechaIzq.png" alt="flecha" class="prev"/><img src="images/flechaDrch.png" alt="flecha" class="nex"/> 
          </div>
        </div>
        <div class="show_area next">
          <div class="show_title next">PRÓXIMAMENTE</div>
          <div class="show_content next">
            <div id="carrusel">
              <div class="otherClass">
                <ul>
                  <li id="cero" class="tooltipProx">
                    <div class="view view-sixth">
                          <img src="images/foto/<?php echo $foto[0]; ?>" alt="imagen0" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descProximo[0]),0,100); ?>...</p>
                              <a href="proximamente.php?idPelicula=<?php echo $idProximo[0]; ?>" title="">Ver Información</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombreProximo[0]); ?></p></li>
                  <li id="uno" class="tooltipProx">
                        <div class="view view-sixth">
                          <img src="images/foto/<?php echo $foto[1]; ?>" alt="imagen1" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descProximo[1]),0,100); ?>...</p>
                              <a href="proximamente.php?idPelicula=<?php echo $idProximo[1]; ?>" title="">Ver Información</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombreProximo[1]); ?></p></li>
                  <li id="dos" class="tooltipProx">
                        <div class="view view-sixth">
                          <img src="images/foto/<?php echo $foto[2]; ?>" alt="imagen2" width="133" height="185" />
                          <div class="mask">
                              <p><?php echo substr(utf8_encode($descProximo[2]),0,100); ?>...</p>
                              <a href="proximamente.php?idPelicula=<?php echo $idProximo[2]; ?>" title="">Ver Información</a>
                          </div>
                      </div>
                    <p>&nbsp;<img src="images/simbolo1.png" alt="simbolo"/>&nbsp;<?php echo utf8_encode($nombreProximo[2]); ?></p></li>
                </ul>
            </div>
          </div>
           <img src="images/flechaIzq.png" alt="flecha" class="previo"/><img src="images/flechaDrch.png" alt="flecha" class="siguiente" />
          </div>
        </div>
      </div>
      <div id="footer_area">
        <div id="footer_left">
          <p><a href="index.php">&#187;&nbsp;Inicio.</a></p>
          <p><a href="estrenos.php">&#187;&nbsp;Estrenos.</a></p>
          <p><a href="cartelera.php">&#187;&nbsp;Cartelera.</a></p>
          <p><a href="proximamente.php">&#187;&nbsp;Próximamente.</a></p>
          <p><a href="contacto.html">&#187;&nbsp;Contacto.</a></p>
        </div>
        <div id="footer_center"></div>
        <div id="footer_rigth">
          <div id="footer_rigth_top"><a href="index.html"> <img src="css/images/footer_logo.png" alt="" /></a> </div>
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
