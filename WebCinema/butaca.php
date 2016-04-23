<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
function __autoload($class) {
    require_once ('class/class.' . $class . '.php');
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);

$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoPelicula($bd);

$pelicula = $uso->getPeliculaJuan($_GET["idpelicula"]);

$nombrePelicula;
$foto;
$sala; 

while ($fila = $bd->getFila($pelicula)){
 $nombrePelicula = $fila["nombrePelicula"];
 $foto = $fila["foto"];
 $sala = $fila["salaProyeccion"];
}

$bd->closeConexion();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Compra -Theatrum Cinema</title>
<link rel="stylesheet" type="text/css" href="css/template.css"/>
<script type="text/javascript" src="js/scriptTablaEntradas.js"></script>
<link rel="shortcut icon" href="favicon.ico">
</head>

<body bgcolor="#000000">

<input type="hidden" id="error" value="<?php if(isset($_GET["error"])){echo $_GET["error"];}?>" />
<input type="hidden" id="miercoles" value="<?php echo $miercoles=$_GET["miercoles"]; ?>" />
<input type="hidden" id="pelicula" value="<?php echo $idPelicula=$_GET["idpelicula"]; ?>" />
<input type="hidden" id="fechaSesion" value="<?php echo $fechaSesion=$_GET["fechasesion"]; ?>" />
<input type="hidden" id="horaSesion" value="<?php echo $horaSesion=$_GET["horasesion"]; ?>" />

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
            <button type="button" name="" value="" class="button_menu estrenos" onClick="location.href='estrenos.php'">ESTRENOS</button>
            <button type="button" name="" value="" class="button_menu_active cartelera" onClick="location.href='cartelera.php'">CARTELERA</button>
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
        <div class="menu_pelicula_area butaca">
          <div class="menu_pelicula_content butaca">
            <div class="pelicula_content_right_sup_left butaca">SALA <?php echo $sala; ?>&nbsp;-</div>
            <div class="pelicula_content_right_sup_right butaca">&#X0201C;<?php echo $nombrePelicula; ?>&#X0201D;</div>
            <div class="butaca_container">
              <div class="butaca_area_left">
                <div class="date_session_area">
                  <div class="date_session_content">
                    <div class="date_butaca">FECHA</div>
                    <div class="date_butaca content"><?php echo $fechaSesion; ?></div>
                    <div class="session_butaca">SESIÓN</div>
                    <div class="session_butaca content"><?php echo $horaSesion; ?></div>
                  </div>
                </div>
                <div class="show_area sala pelicula butaca">
                  <div class="show_content sala pelicula butaca"><img id="fotoCartelera" src="images/foto/<?php echo $foto; ?>" alt="Cartel" /> </div>
                </div>
              </div>
              <div class="butaca_area_center">
                <div class="butaca_area">
                  <div class="butaca_content">
                    <?php
                      $contador = 1400;     
                        echo "<div>";
                        echo "<table class='tablita' border='0'>";
                        for ($i = 14; $i > 0; $i--) {
                          echo "<tr id='$i'>";
                          echo "<td>". ($i) . "</td>";
                            for ($j = 0; $j < 24; $j++) {
                              $id = $contador + ($j + 1);
                              echo "<td><img id='$id' src='images/butacas/iconoElegido.ico' alt='0' onclick='do_click($id)'><span>Butaca: ". ($j+1) . "</span></td>";
                            }
                            echo "</tr>";
                            $contador = $contador - 100;
                        }
                        echo "</table>";
                        echo "</div>";
                    ?>
                  </div>
                </div>
              </div>
              <div class="butaca_area_right">
                <div class="detail_area">
                  <div class="detail_content">
                    <div class="options_content">
                      <div class="num_content">
                        <div class="num_sum" id="buttonMoreGoggles" onclick="gogglesPlus()">+</div>
                        <div class="num_sum number"><p id="goggles">0</p></div>
                        <div class="num_sum subtraction" id="buttonLessGoggles" onclick="gogglesLess()">-</div>
                        <div class="product">GAFAS 3D</div>
                      </div>
                      <div class="num_content">
                        <div class="num_sum" id="buttonMoreStudent" onclick="studentPlus()">+</div>
                        <div class="num_sum number"><p id="student">0</p></div>
                        <div class="num_sum subtraction" id="buttonLessStudent" onclick="studentLess()">-</div>
                        <div class="product">ESTUDIAN.</div>
                      </div>
                      <div class="num_content" id="numEnt">
                        <div class="num_sum number"><p id="numeroEntradas">0</p></div>
                        <div class="product">ENTRADAS</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="detail_image_ticket"></div>
                <div class="detail_button_area">
                  <div class="detail_button_compra" id="buttonBuy" onclick="buy()" >COMPRAR</div>
                </div>
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
