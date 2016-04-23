<?php 
date_default_timezone_set("Europe/Madrid");

function __autoload($class) {
	require_once ('class/class.' . $class . '.php');
}

$bd = new BaseDatos();
$bd->setConexion(Constantes::$servidor, Constantes::$usuario, Constantes::$clave);

$bd->setBaseDatos(Constantes::$basedatos);

$uso = new UsoTicket($bd);

$idPelicula = $_GET["idPelicula"];
$nombrePelicula = $_GET["nombrePelicula"];
$fechaSesion = $_GET["fechaSesion"];
$horaSesion = $fechaSesion . " " . $_GET["horaSesion"];
$tickets = $_GET["tickets"];
$entradas = $_GET["entradas"];
$sala = $_GET["sala"];
$miercoles = $_GET["miercoles"];

$juba = explode(",", $tickets);

$fila_Butaca = explode(",", $entradas);

$j = 0;

$comprobacion = 0;

for ($i = 0; $i < sizeof($fila_Butaca); $i++){
	$aux[$i] = number_format(($fila_Butaca[$i]/100), 2);
	$cosa = explode(".", $aux[$i]);
	if ($uso->compruebaTicket($idPelicula,$fechaSesion,$horaSesion,$cosa[0],$cosa[1],$sala)){
		$comprobacion = 1;
	}
}

if ($comprobacion == 0){
	for ($i = 0; $i < sizeof($fila_Butaca); $i++){
		$ticket = new Ticket();
		$aux[$i] = number_format(($fila_Butaca[$i]/100), 2);
		$cosa = explode(".", $aux[$i]);
		if ($cosa[0] != 0){
			$ticket->setIdTicket(null);
			$ticket->setFechaExpedicion(date('y-m-j'));
			$ticket->setTipoExpedicion('web');
			$ticket->setTipoCobro('otro');
			$ticket->setFechaSesion($fechaSesion);
			$ticket->setHoraSesion($horaSesion);
			$ticket->setIdPelicula($idPelicula);
			$ticket->setSalaProyeccion($sala);
			$ticket->setFila($cosa[0]);
			$ticket->setButaca($cosa[1]);
			$ticket->setPrecioTotal($juba[$j]);
			$j++;
			$ticket->setComprobado('0');
			$ticket->setLoginFichar('admin');
			$ticket->setCompra(null);

			$uso->insertarTicket($ticket);
		}
	}

	$bd->closeConexion();

	header('Location:correo.php');
}else{
	header("Location:butaca.php?idpelicula=". $idPelicula ."&sala=". $sala ."&fechasesion=". $fechaSesion ."&horasesion=". $horaSesion ."&miercoles=". $miercoles ."&error=1");
}
?>