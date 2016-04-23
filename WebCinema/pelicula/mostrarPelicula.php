<div id="mostrarPelicula">
    <?php

// realizacion de comprobacion sobre los derechos del usuario
//establecemos la conexion
    function __autoload($class) {
        require_once "../class/class." . $class . ".php";
    }

    $bd = new BaseDatos();
    $bd->setConexion(constantes::$servidor, constantes::$usuario, constantes::$clave);

    $bd->setBaseDatos(constantes::$basedatos);

    $uso = new UsoPelicula($bd);
    if ($condicion != "")
        $uso->escribeSelectPelicula($condicion);
    else {
        if ($_GET["page"] == NULL) {

            $page = 0; //$_GET["page"];
            $ver = 0; //$_GET["ver"];
        } else {
            $page = $_GET["page"];
            $ver = $_GET["ver"];
        }
        $uso->escribePeliculaPaginado($page, $ver);
    }

    $bd->closeConexion();
    ?>
</div>
