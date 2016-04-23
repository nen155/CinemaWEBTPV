
<?php

function __autoload($class) {
    require_once "../class/class." . $class . ".php";
}

$bd = new BaseDatos();
$bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);

$bd->setBaseDatos(constantes::$basedatos);


$uso = new UsoPelicula($bd);
$pelicula = new Pelicula();
$pelicula = $uso->getPeliculaIdPelicula($_GET["idPelicula"]); //or die("Error en $consulta: " . mysql_error());
?>
<form method="GET" action="modificarPelicula.php" method="POST" enctype="multipart/form-data">
    <h3>Edición Pelicula</h3>
    <table id="pelicula">
        <tr>
            <td>Codigó de la Pelicula</td>
            <td><input type="text" name="idPelicula" size="55" readonly="readonly" value="<?php echo $pelicula->getIdPelicula(); ?>"/></td>
        </tr>
        <tr>
            <td>Titulo de la Pelicula</td>
            <td><input type="text" name="nombrePelicula" size="55" readonly="readonly" value="<?php echo $pelicula->getNombrePelicula(); ?>"/></td>
        </tr>
        <tr><td>Descripción</td>
            <td><input type="text" name="descripcion" size="55" readonly="readonly" value="<?php echo $pelicula->getDescripcion(); ?>" /></td>
        </tr>
        <tr> 
            <td>Cartel de la Pelicula</td>
            <td><input type="text" name="foto" size="55" readonly="readonly" value="<?php echo $pelicula->getFoto(); ?>" /></td>
        </tr>
        <tr>
            <td>Genero de la Pelicula</td>
            <td><input type="text" name="genero" size="55" readonly="readonly" value="<?php echo $pelicula->getGenero(); ?>" /></td>
        </tr>

        <tr>
            <td>Director</td>
            <td><input type="text" name="director" size="55" readonly="readonly" value="<?php echo $pelicula->getDirector(); ?>" /></td>
        </tr>
        <tr>
            <td>Interpretes</td>
            <td><input type="text" name="interprete" size="55" readonly="readonly" value="<?php echo $pelicula->getInterpretes(); ?>" /></td>
        </tr>
        <tr> 
            <td>Calificación de la Pelicula</td>
            <td><input type="text" name="calificacion" size="55" readonly="readonly" value="<?php echo $pelicula->getCalificacion(); ?>" /></td>
        </tr>
        <tr>
            <td>Trailer de la Pelicula</td>
            <td><input type="text" name="trailer" size="55" readonly="readonly" value="<?php echo $pelicula->getTrailer(); ?>" /></td>
        </tr>
        <tr>
            <td>Duración</td>
            <td><input type="text" name="duracion" size="55" readonly="readonly" value="<?php echo $pelicula->getDuracion(); ?>" /></td>
        </tr>
        <tr>
            <td>Pelicula 3D</td>
            <td><input type="text" name="tresD" size="55" readonly="readonly" value="<?php echo $pelicula->getTresD(); ?>" /></td>
        </tr>
        <td>Pelicula Version Original</td>
        <td><input type="text" name="vo" size="55" readonly="readonly" value="<?php echo $pelicula->getVo(); ?>" /></td>
        </tr>
        <tr>
            <td>Pelicula Version Original Subtitulada</td>
            <td><input type="text" name="vos" size="55" readonly="readonly" value="<?php echo $pelicula->getVos(); ?>" /></td>
        </tr>
        <tr>
            <td>Pelicula Version Doblada</td>
            <td><input type="text" name="vd" size="55" readonly="readonly" value="<?php echo $pelicula->getVd(); ?>" /></td>
        </tr>
        <tr> 
            <td>Pelicula en 35 Mm</td>
            <td><input type="text" name="trentaycincomm" size="55" readonly="readonly" value="<?php echo $pelicula->getTrentaycincomm(); ?>" /></td>
        </tr>
        <tr>
            <td>Pelicula Digital</td>
            <td><input type="text" name="digital" size="55" readonly="readonly" value="<?php echo $pelicula->getDigital(); ?>" /></td>
        </tr>

        <tr>
            <td>Fecha Inicio</td>
            <td><input type="text" name="fechaInicio" size="55" readonly="readonly" value="<?php echo $pelicula->getFechaInicio(); ?>" /></td>
        </tr>
        <tr>
            <td>Fecha Fin</td>
            <td><input type="text" name="fechaFin" size="55" readonly="readonly" value="<?php echo $pelicula->getFechaFin(); ?>" /></td>
        </tr>
        <tr>
            <td>Sala de Proyección</td>
            <td><input type="text" name="salaProyeccion" size="55" readonly="readonly" value="<?php echo $pelicula->getSalaProyeccion(); ?>" /></td>
        </tr>
        <tr>
            <td><input type="hidden" name="idPeliculaOld" size="55" value="<?php echo $pelicula->getIdPelicula() ?>" /></td>
        </tr> 
    </table>
    <input type="submit" value="Enviar" />&nbsp;&nbsp; <a href="index.php?"><input type="button" value="Cancelar"/></a>
</form>

