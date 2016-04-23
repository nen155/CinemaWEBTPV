<?php

// realizacion de comprobacion sobre los derechos del usuario
//establecemos la conexion
function __autoload($class) {
    require_once "../class/class." . $class . ".php";
}

$bd = new BaseDatos();
$bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);

$bd->setBaseDatos(constantes::$basedatos);

$uso = new UsoPelicula($bd);

$uso->borrarIdPelicula($_GET["idPelicula"]);

$bd->closeConexion();

header("Location:index.php?");

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
