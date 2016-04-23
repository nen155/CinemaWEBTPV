<?php

function __autoload($class) {
    require_once "../class/class." . $class . ".php";
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);
$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoPrecio($bd);

$precio = new Precio();
$precio->setFechaPrecio($_GET["fechaPrecio"]);
$precio->setPrecioBase($_GET["precioBase"]);
$precio->setMiercoles($_GET["miercoles"]);
$precio->setGafas($_GET["gafas"]);
$precio->setEspecial($_GET["especial"]);
$precio->setIva($_GET["iva"]);

$uso->insertarPrecio($precio);

$bd->closeConexion();
?>