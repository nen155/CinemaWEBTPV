<?php

function __autoload($class) {
    require_once "../class/class." . $class . ".php";
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);
$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoSala($bd);
$uso->borrarSala($_GET["numeroSala"]);

$bd->closeConexion();
?>