<?php
 function __autoload($class) {
     require_once "../class/class.".$class . ".php";
 }
 
 $bd = new BaseDatos();
 $bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);

 $bd->setBaseDatos(constantes::$basedatos);
 $uso=new UsoEmpleado($bd);
 $empleado=new Empleado();
 $loginOld=$_GET["loginOld"];
 
$empleado->setLogin($_POST["login"]);
$empleado->setClave($_POST["clave"]);
$empleado->setNombre($_POST["nombre"]);
$empleado->setApellidos($_POST["apellidos"]);
$empleado->setDni($_POST["dni"]);
 
 $uso->setEmpleadoLogin($empleado, $loginOld);
 $bd->closeConexion();
header("Location: ../index.php?");
?>