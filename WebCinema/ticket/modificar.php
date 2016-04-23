<?php

function __autoload($class) {
    require_once("../class/class." . $class . ".php");
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);
$bd->setBaseDatos(Constantes::$basedatos);

$ticket = new Ticket ();
$uso = new UsoTicket($bd);
$campoIdTicket = $_GET["idTicketOld"];

$ticket->setIdTicket($_GET["idTicket"]);
$ticket->setFechaExpedicion($_GET["fechaExpedicion"]);
$ticket->setTipoExpedicion($_GET["tipoExpedicion"]);
$ticket->setTipoCobro($_GET["tipoCobro"]);
$ticket->setFechaSesion($_GET["fechaSesion"]);
$ticket->setHoraSesion($_GET["horaSesion"]);
$ticket->setIdPelicula($_GET["idPelicula"]);
$ticket->setSalaProyeccion($_GET["salaProyeccion"]);
$ticket->setFila($_GET["fila"]);
$ticket->setButaca($_GET["butaca"]);
$ticket->setPrecioTotal($_GET["precioTotal"]);
$ticket->setComprobado($_GET["comprobado"]);
$ticket->setLoginFichar($_GET["loginFichar"]);

$uso->modificarTicket($ticket, $campoIdTicket);

$bd->closeConexion();
?>