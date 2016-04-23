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

$uso = new UsoEmpleado($bd);
$empleado = new Empleado();


$empleado->setLogin($_POST["login"]);
$empleado->setClave($_POST["clave"]);
$empleado->setNombre($_POST["nombre"]);
$empleado->setApellidos($_POST["apellidos"]);
$empleado->setDni($_POST["dni"]);
 
//verificacion si el login existe
if ($uso->existeEmpleadoLogin($_POST["login"])) {
    $bd->closeConexion();
  header("Location:../index.php?Yaexistente");
    return;
} else {
    $uso->insertarEmpleado($mpleado);
    $bd->closeConexion();
    
    header("Location:../index.php?empleado=ok");
}
 

?>
