
<?php

function __autoload($class) {
    require_once "../class/class." . $class . ".php";
}

$bd = new BaseDatos();
$bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);

$bd->setBaseDatos(constantes::$basedatos);


$uso = new UsoFichar($bd);
$fichar = new Fichar();
$fichar = $uso->getFichajeLogin($_GET["loginFichar"]); //or die("Error en $consulta: " . mysql_error());
?>
<form method="GET" action="modificarFichar.php">
    <h3>Edición Fichaje</h3>
    <table id="fichaje">
        <tr>
            <td>Login</td>
            <td><input type="text" name="loginFichar" size="55" value="<?php echo $fichar->getLoginFichar(); ?>" /></td>
        </tr>
        <tr>
            <td>Fichaje Entrada</td>
            <td><input type="text" name="ficharEntrada" size="55" value="<?php echo $fichar->getFicharEntrada(); ?>" /></td>
        </tr>
        <tr>
            <td>Fichaje Salida</td>
            <td><input type="text" name="ficharSalida" size="55" value="<?php echo $fichar->getFicharSalida(); ?>" /></td>
        </tr>          
        <tr>
            <td><input type="hidden" name="loginFicharOld" size="55" value="<?php echo $_GET["loginFichar"]; ?>" /></td>
        </tr> 
    </table>
    <input type="submit" value="Enviar" />&nbsp;&nbsp; <a href="index.php?"><input type="button" value="Cancelar"/></a>
</form>

