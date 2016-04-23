<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author Asus
 */
class UsoFichar {
 // solo una variable de tipo de la clase BaseDatos
    private $bd = null;

    //constructor se le pasa la base de datos
    function __construct($bd) {

        $this->bd = $bd;
    }
    
    //si existe el fichaje segun el login
    function existeFichajeLogin($loginFichar) {
        $this->bd->setConsulta("select * from Fichar where loginFichar='$loginFichar' ");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }

    //si existe el fichaje segun el ficharEntrada
    function existeFichajeEntrada($ficharEntrada) {
        $this->bd->setConsulta("select * from Fichar where ficharEntrada='$ficharEntrada' ");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }
    //si existe el fichaje segun el ficharSalida
    function existeFichajeSalida($ficharSalida) {
        $this->bd->setConsulta("select * from Fichar where ficharSalida='$ficharSalida' ");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }
    //devuelve el fichaje segun el ficharLogin
    function getFichajeLogin($ficharLogin) {
        $this->bd->setConsulta("select * from Fihar where ficharLogin='$ficharLogin' ");
        $fila = $this->bd->getFila();
        $fichar = new Fichar();
        $fichar->setObjeto($fila);
        return $fichar;
    }
    
    //devuelve el fichaje segun el ficharEntrada
    function getFichajeEntradaLogin($ficharEntrada) {
        $this->bd->setConsulta("select * from Fichar where ficharEntrada='$ficharEntrada' ");
        $fila = $this->bd->getFila();
        $fichar = new Fichar();
        $fichar->setObjeto($fila);
        return $fichar;
    }
    //devuelve el fichaje segun el ficharSalida
    function getFichajeSalidaLogin($ficharSalida) {
        $this->bd->setConsulta("select * from Fichar where ficharSalida='$ficharSalida' ");
        $fila = $this->bd->getFila();
        $fichar = new Fichar();
        $fichar->setObjeto($fila);
        return $fichar;
    }
    //borra el fichaje segun el ficharLogin
    function borrarFicharLogin($ficharLogin) {
       if ($this->bd->setConsulta("delete from Fichar where ficharLogin='$ficharLogin"))
            return true;
        return false;
    }

    //borra el fichaje segun el loginFichar y el ficharEntrada
    function borrarFicharLoginFicharEntrada($loginFichar, $ficharEntrada) {
        if ($this->bd->setConsulta("delete from Fichar where loginFichar='$loginFichar' 
                                    and ficharEntrada='$ficharEntrada'"))
            return true;
        return false;
    }
    //borra el fichaje segun el loginFichar y el ficharSalida
    function borrarFicharLoginFicharSalida($loginFichar, $ficharSalida)  {
       if ($this->bd->setConsulta("delete from Fichar where loginFichar='$loginFichar' 
                                    and ficharSalida='$ficharSalida'"))
           return true;
       return false;
    }

    //actualiza los datos de un fichaje segun el ficharLogin
    function setFichajeLogin($objetofichar, $ficharLogin) {
        $sql = "update Fichar set ficharLogin='" . $objetofichar->getLoginFichar() . "',
                                    ficharEntrada='" . $objetofichar->getFicharEntrada() . "',
                                    ficharSalida='" . $objetofichar->getFicharSalida() . "'
                                    where ficharLogin = '$ficharLogin' ";

        $this->bd->setConsulta($sql);
    }

    //inserta un fichaje en la bd
    function insertarFichaje($fichar) {
        $sql = "insert into Fichar values (
                '" . $fichar->getLoginFichar() . "',
                '" . $fichar->getFicharEntrada()  . "',
                '" . $fichar->getFicharSalida() . "')";
        $this->bd->setConsulta($sql);
    }

    //escribe tabla de todos los fichajes
    function escribeFichajes() {
        echo "<div>";
        echo "<h3>Edición Tabla Los Fichajes </h3>";
        echo "<table id=\"fichar\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Login</th>";
        echo "<th>Entrada</th>";
        echo "<th>Salida</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $estilofila = "par";
        //hace la consulta
        $this->bd->setConsulta("select * from Fichar");
        //recoge el resultado
        while ($fila = $this->bd->getFila()) {
            $fichar = new Fichar();
            $fichar->setObjeto($fila);
            //escribe el empleado
            echo "<tr class=\"$estilofila\">";
            echo "<td>" . $fichar->getLoginFicharLogin() . "</td>";
            echo "<td>" . $fichar->getFicharEntrada() . "</td>";
            echo "<td>" . $fichar->getFicharSalida(). "</td>";
            echo "</tr>";

            if ($estilofila == "par")
                $estilofila = "impar";
            else
                $estilofila = "par";
        }
        echo "</tbody>";
        echo "</table>";
        //permite volver al index de la web
       // echo "<a href='index.php?'><input type='button' value='Mapa'/></a>";
        echo "</div>";
    }

    function escribeFichajePaginado($page = "", $ver = "") {
        if ($ver == "")
            $ver = 10;
        // por defecto la pagina es 0 y con visualizar 10 registros
        echo "<div id=\"ficharPaginado\">";
        echo "<h3>Edición Tabla Paginada Fichajes </h3>";
        echo "<table id=\"fichar\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Login</th>";
        echo "<th>Entrada</th>";
        echo "<th>Salida</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $estilofila = "par";
        //consulta
        $this->bd->setConsulta("select * from Fichar ");
        $numreg = $this->bd->getNumFiles();
        //si el resultado es mayor que 10 fichajes
        if ($numreg > 10) {
            $totalpaginas = ceil($numreg / $ver);
            if ($page < 0)
                $page = 1;
            //A VER SI ESTA BIEN FONCCIONABA POR EL VINO
            if ($page >= $totalpaginas)
                $page = $totalpaginas - 1;
            $this->bd->setConsulta("select * from Fichar limit "
                    . $page * $ver . "," . $ver);
        }else
            $totalpaginas = 1;
        //recoge el resultado
        while ($fila = $this->bd->getFila()) {
            $fichar = new Fichar();
            $fichar->setObjeto($fila);
            echo "<tr class=\"$estilofila\">";
            echo "<td>" . $fichar->getLoginFichar() . "</td>";
            echo "<td>" . $fichar->getFicharEntrada() . "</td>";
            echo "<td>" . $fichar->getFicharSalida(). "</td>";
            echo "</tr>";

            if ($estilofila == "par")
                $estilofila = "impar";
            else
                $estilofila = "par";
        }
        echo "</tbody>";
        echo "</table>";
        //permite volver al inicio de la web 
       // echo "<a href='index.php?'><input type='button' value='Home'/></a>";
        echo "&nbsp";
        echo"<table class=\"index\">";
        echo "<tr>";
        echo "<td><a href='?page=0&ver=10'>&nbsp;&nbsp;&nbsp;&lt;&lt;
            &nbsp;</a></td>";

        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";

        if ($page > 0) {
            echo "<td><a href='?pagina=pag12&page=" . ($page - 1) . "&ver=5'>&nbsp;
                                                &nbsp;&nbsp;&lt;&nbsp;</a></td>";
        }
        else
            echo "<td><a href='#'>&nbsp;&nbsp;&nbsp;&lt;&nbsp;</a></td>";

        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;Pagina Nº
                <input type=\"text\" size=\"2\" value='" . ($page + 1) . "' readonly=\"readonly\"/>
                De<input type=\"text\" size=\"2\" value='" . ($totalpaginas) . "'/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";

        if ($page < $totalpaginas - 1)
            echo "<td><a href='?page=" . ($page + 1) . "&ver=5'>&nbsp;
                                                &nbsp;&nbsp;&gt;&nbsp;</a></td>";
        else
            echo "<td><a href='#'>&nbsp;&nbsp;&nbsp;&gt;&nbsp;</a></td>";

        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";

        echo "<td><a href='?page=" . ($totalpaginas - 1) . "&ver=5'>
                                        &nbsp;&nbsp;&nbsp;&gt;&gt;&nbsp;</a></td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    }

    function escribeSelectFichar($condicion = "") {
        echo "<select name=\"nombre\" id=\"nombre\">";
        echo"<option value=\"\">Selecciona Fichaje</option>";
        $this->bd->setConsulta("select * from Fichar  $condicion");
        while ($fila = $this->bd->getFila()) {
            $fichar = new Fichar();
            $fichar->setObjeto($fila);
            echo "<option value=\"" . $fichar->getLoginFichar() . "\">";
            echo $fichar->getLoginFichar();
            echo "</option>";
        }
        echo "</select>";
    }

    //si quiere una consulta por ajax
    function mostrarAjax($condicion = "") {
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<fichajes>';
        $this->bd->setConsulta("select * from Fichar $condicion");
        while ($fila = $this->bd->getFila()) {
            echo "<fichar>";
            $fichar = new Fichar();
            $fichar->setObjeto($fila);
            echo "<loginFichar>" . $fichar->getLoginFichar() . "</loginFichar>";
            echo "<ficharEntrada>" . $fichar->getFicharEntrada() . "</ficharEntrada>";
            echo "<ficharSalida>" . $fichar->getFicharSalida() . "</ficharSalida>";
            echo "</fichar>";
        }
        echo '</fichajes>';
    }
}
?>
