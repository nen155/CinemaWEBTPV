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

$uso = new UsoFichar($bd);
$fichar = new Fichar();


$fichar->setLoginFichar($_POST["loginFichar"]);
$fichar->setFicharEntrada($_POST["ficharEntrada"]);
$fichar->setFicharSalida($_POST["ficharSalida"]);
 
//verificacion si el login existe
if ($uso->existeFichajeLogin($_POST["loginFichar"])) {
    $bd->closeConexion();
  header("Location:../index.php?Yaexistente");
    return;
} else {
    $uso->insertarFichaje($fichar);
    $bd->closeConexion();
    
    header("Location:../index.php?fichaje=ok");
}
 

?>
