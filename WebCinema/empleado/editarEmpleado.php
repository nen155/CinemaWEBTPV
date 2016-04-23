
<?php

function __autoload($class) {
    require_once "../class/class." . $class . ".php";
}

$bd = new BaseDatos();

$bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);
$bd->setBaseDatos(constantes::$basedatos);

$uso = new UsoEmpleado($bd);
$empleado = new Empleado();
$empleado = $uso->getEmpleadoLogin($_GET["login"]); //or die("Error en $consulta: " . mysql_error());
?>
<form method="GET" action="modificarEmpleado.php">
    <h3>Edición Empleado</h3>
    <table id="empleado">
        <tr>
            <td>Login</td>
            <td><input type="text" name="login" size="55" value="<?php echo $empleado->getLogin(); ?>" /></td>
        </tr>
        <tr>
            <td>Clave</td>
            <td><input type="text" name="clave" size="55" value="<?php echo $empleado->getClave(); ?>" /></td>
        </tr>
        <tr>
            <td>Nombre del Empleado</td>
            <td><input type="text" name="nombre" size="55" value="<?php echo $empleado->getNombre(); ?>" /></td>
        </tr>
        <tr>
            <td>Apellidos del empleado</td>
            <td><input type="text" name="apellidos" size="55" value="<?php echo $empleado->getApellidos(); ?>" /></td>
        </tr>
        <tr>
            <td>Dni del Empleado</td>
            <td><input type="text" name="dni" size="55" value="<?php echo $empleado->getDni(); ?>" /></td>
        </tr>

        <tr>
            <td><input type="hidden" name="loginOld" size="55" value="<?php echo $_GET["login"]; ?>" /></td>
        </tr> 
    </table>
    <input type="submit" value="Enviar" />&nbsp;&nbsp; <a href="index.php?"><input type="button" value="Cancelar"/></a>
</form>

