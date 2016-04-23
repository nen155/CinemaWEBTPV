<?php

function __autoload($class) {
    require_once "../class/class." . $class . ".php";
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);
$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoSala($bd);

$sala = new Sala();
$sala->setNumeroSala($_GET["numeroSala"]);
$sala->setNumeroButacas($_GET["numeroButacas"]);
$sala->setNumeroFilas($_GET["numeroFilas"]);
$sala->setOcupada($_GET["ocupada"]);
$sala->setIdPelicula($_GET["idPelicula"]);

$uso->insertarSala($sala);

$bd->closeConexion();
?>