<?php
 function __autoload($class) {
     require_once "../class/class.".$class . ".php";
 }
 
 $bd = new BaseDatos();
 $bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);

 $bd->setBaseDatos(constantes::$basedatos);
 $uso=new UsoFichar($bd);
 $fichar=new Fichar();
 $fichar=$_GET["loginFicharOld"];
 
 $fichar->setLoginFichar($_GET["loginFichar"]);
 $fichar->setFicharEntrada($_GET["ficharEntrada"]);
 $fichar->setFicharSalida($_GET["ficharSalida"]);
 
 $uso->setFichajeLogin($fichar,$loginFicharOld);
 $bd->closeConexion();
header("Location: ../index.php?");
?>