<?php
$bd = new BaseDatos(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);

$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoPelicula($bd);
$pelicula = new Pelicula();
?>
<div id="container_area">
    <div id="header_area">
        <div id="header_logo"><a href="index.php"> <img src="css/images/header_logo.png" alt="" /></a></div>
        <div id="header_name"><a href="index.php"> <img src="css/images/header_name.png" alt="" /></a></div>
        <div id="header_logo_blur"></div>
    </div>
    <div class="main_area cartelera">
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
        <div class="show_area sala">
            <div class="show_title sala">
                <img src="images/pelis-cartelera/pelicuall_icon.jpg" id="icono" /><b>&nbsp;SALA 1</b>
            </div>
            <div class="show_content sala">
                <a href="cartelera.php?sala=1#sipnosis">
                    <?php
                    $sala = 1;
                    $pelicula = new Pelicula();
                    $pelicula = $uso->obtenerCarteleraSala($sala);
                    ?><img src="images/foto/<?php echo $pelicula->getFoto(); ?>" title="Sala 1" height="270px" width="190px" id="sala1"/></a> 
            </div>
        </div>
        <div class="show_area sala sala2">
            <div class="show_title sala">
                <img src="images/pelis-cartelera/pelicuall_icon.jpg" id="icono" /><b>&nbsp;SALA 2</b>
            </div>
            <div class="show_content sala">
                <a href="cartelera.php?sala=2#sipnosis">
                    <?php
                    $sala = 2;
                    $pelicula = new Pelicula();
                    $pelicula = $uso->obtenerCarteleraSala($sala);
                    ?><img src="images/foto/<?php echo $pelicula->getFoto(); ?>" title="Sala 2"  height="270px" width="190px" id="sala2"/></a>
            </div>
        </div>
        <div class="show_area sala sala3">
            <div class="show_title sala">
                <img src="images/pelis-cartelera/pelicuall_icon.jpg" id="icono" /><b>&nbsp;SALA 3</b>
            </div>
            <div class="show_content sala">
                <a href="cartelera.php?sala=3#sipnosis">
                    <?php
                    $sala = 3;
                    $pelicula = $uso->obtenerCarteleraSala($sala);
                    ?><img src="images/foto/<?php echo $pelicula->getFoto(); ?>" title="Sala 3" height="270px" width="190px" id="sala3"/></a>
            </div>
        </div>
        <div class="show_area sala sala4">
            <div class="show_title sala">
                <img src="images/pelis-cartelera/pelicuall_icon.jpg" id="icono" /><b>&nbsp;SALA 4</b>
            </div>
            <div class="show_content sala">
                <a href="cartelera.php?sala=4#sipnosis">
                    <?php
                    $sala = 4;
                    $pelicula = $uso->obtenerCarteleraSala($sala);
                    ?><img src="images/foto/<?php echo $pelicula->getFoto(); ?>" title="Sala 4" height="270px" width="190px" id="sala4"/></a>
            </div>
        </div>
        <div class="show_area sala sala5">
            <div class="show_title sala">
                <img src="images/pelis-cartelera/pelicuall_icon.jpg" id="icono" /><b>&nbsp;SALA 5</b>
            </div>
            <div class="show_content sala">
                <a href="cartelera.php?sala=5#sipnosis">
                    <?php
                    $sala = 5;
                    $pelicula = $uso->obtenerCarteleraSala($sala);
                    ?><img src="images/foto/<?php echo $pelicula->getFoto(); ?>" title="Sala 5" height="270px" width="190px" id="sala5"/></a>
            </div>
        </div>
        <div class="show_area sala sala6">
            <div class="show_title sala">
                <img src="images/pelis-cartelera/pelicuall_icon.jpg" id="icono" /><b>&nbsp;SALA 6</b>
            </div>
            <div class="show_content sala">
                <a href="cartelera.php?sala=6#sipnosis">
                    <?php
                    $sala = 6;
                    $pelicula = $uso->obtenerCarteleraSala($sala);
                    ?><img src="images/foto/<?php echo $pelicula->getFoto(); ?>" title="Sala 6" height="270px" width="190px" id="sala6"/></a>
            </div>
        </div>
        <div class="show_area sala sala7">
            <div class="show_title sala">
                <img src="images/pelis-cartelera/pelicuall_icon.jpg" id="icono" /><b>&nbsp;SALA 7</b>
            </div>
            <div class="show_content sala">
                <a href="cartelera.php?sala=7#sipnosis">
                    <?php
                    $sala = 7;
                    $pelicula = $uso->obtenerCarteleraSala($sala);
                    ?><img src="images/foto/<?php echo $pelicula->getFoto(); ?>" title="Sala 7" height="270px" width="190px" id="sala7"/></a>
            </div>
        </div>
        <div class="show_area sala sala8">
            <div class="show_title sala">
                <img src="images/pelis-cartelera/pelicuall_icon.jpg" id="icono" /><b>&nbsp;SALA 8</b>
            </div>
            <div class="show_content sala">
                <a href="cartelera.php?sala=8#sipnosis">
                    <?php
                    $sala = 8;
                    $pelicula = $uso->obtenerCarteleraSala($sala);
                    ?><img src="images/foto/<?php echo $pelicula->getFoto(); ?>" title="Sala 8" height="270px" width="190px" id="sala8"/></a>
            </div>
        </div>
        <?php
        $bd->closeConexion();
        ?>