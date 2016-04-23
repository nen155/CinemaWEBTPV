<?php

function __autoload($class) {
    require_once ('../class/class.' . $class . '.php');
}
/*
//validar los datos
require_once ('../incluir/funccion_filtro.php');
*/
//establecemos la conexion
$bd = new BaseDatos();
$bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);

$bd->setBaseDatos(constantes::$basedatos);

$uso = new UsoPelicula($bd);
$pelicula = new Pelicula();

//tocado el 23/03
// Ruta donde se guardarán las imágenes
 $directorio = $_SERVER['DOCUMENT_ROOT'].'/upload/';

$pelicula->setIdPelicula($_POST["idPelicula"]);
$pelicula->setNombrePelicula($_POST["nombrePelicula"]);
$pelicula->setDescripcion($_POST["descripcion"]);
$pelicula->setFoto($_POST["foto"]);
$pelicula->setGenero($_POST["genero"]);
$pelicula->setDirector($_POST["director"]);
$pelicula->setInterpretes($_POST["interpretes"]);
$pelicula->setCalificacion($_POST["calificacion"]);
$pelicula->setTrailler($_POST["trailer"]);
$pelicula->setDuracion($_POST["duracion"]);
$pelicula->setTresD($_POST["tresD"]);
$pelicula->setVo($_POST["vo"]);
$pelicula->setVos($_POST["vos"]);
$pelicula->setVd($_POST["vd"]);
$pelicula->setDigital($_POST["digital"]);
$pelicula->setFechaInicio($_POST["fechaInicio"]);
$pelicula->setFechaFin($_POST["fechaFin"]);
$pelicula->setSalaProyeccion($_POST["salaProyeccion"]);

//tocado el 23/03
// Recibo los datos de la imagen
    $nombre = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];
    
   // Muevo la imagen desde su ubicación, temporal al directorio definitivo
 $ok=move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre); 
 
//verificacion si el usuario existe
if ($uso->existePeliculaDirector($_POST["nombrePelicula"], $_POST["director"])) {
    $bd->closeConexion();
  header("Location:../index.php?Yaexistente");
    return;
} else {
    
    $uso->insertarpelicula($pelicula);
    $bd->closeConexion();
    
    header("Location:../index.php?pelicula=insertada");
}
 

?>
