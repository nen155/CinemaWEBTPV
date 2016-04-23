<?php
 function __autoload($class) {
     require_once "../class/class.".$class . ".php";
 }
 
 $bd = new BaseDatos();
 $bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);

 $bd->setBaseDatos(constantes::$basedatos);
 $uso=new UsoPelicula($bd);
 $pelicula=new Pelicula();
 $idPeliculaOld=$_GET["idPeliculaOld"];
 
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

 
 $uso->setIdPelicula($pelicula,$idPeliculaOld);
 $bd->closeConexion();
 
header("Location: ../index.php?");
?>