<?php

header("Content-type: text/xml");

function __autoload($class) {
    require_once  ('../class/class.' . $class . '.php');
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);
$bd->setBaseDatos(Constantes::$basedatos);

$idPelicula = $_GET["idPelicula"];
$fechaSesion = $_GET["fechaSesion"];
$horaSesion = $fechaSesion . " " . $_GET["horaSesion"];

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<ocupadas>';
$bd->setConsulta("SELECT fila,butaca FROM Ticket WHERE idPelicula='$idPelicula' AND fechaSesion='$fechaSesion' AND horaSesion='$horaSesion';");
while ($fila = $bd->getFila()) {
    echo "<butacas>";
    $ticket = new Ticket();
    $ticket->setButacas($fila);
    echo "<fila>" . $ticket->getFila() . "</fila>";
    echo "<butaca>" . $ticket->getButaca() . "</butaca>";
    echo "</butacas>";
}
echo '</ocupadas>';
?>