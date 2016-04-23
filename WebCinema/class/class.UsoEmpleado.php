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
class UsoEmpleado {

//put your code here
    // solo una variable de tipo de la clase BaseDatos
    private $bd = null;

    //constructor se le pasa la base de datos
    function __construct($bd) {

        $this->bd = $bd;
    }
    
    //si existe el empleado segun el dni
    function existeEmpleadoDni($dni) {
        $this->bd->setConsulta("select * from Empleado where dni='$dni' ");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }

    //si existe el empleado segun el login
    function existeEmpleadoLogin($login) {
        $this->bd->setConsulta("select * from Empleado where dni='$login' ");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }
    
    //devuelve el empleado segun el dni
    function getEmpleadoDni($dni) {
        $this->bd->setConsulta("select * from Empleado where dni='$dni' ");
        $fila = $this->bd->getFila();
        $empleado = new Empleado();
        $empleado->setObjeto($fila);
        return $empleado;
    }
    
    //devuelve el empleado segun el login
    function getEmpleadoLogin($login) {
        $this->bd->setConsulta("select * from Empleado where login='$login' ");
        $fila = $this->bd->getFila();
        $empleado = new Empleado();
        $empleado->setObjeto($fila);
        return $empleado;
    }
    
    //borra el Empleado segun el dni
    function borrarEmpleadoDni($dni) {
       if ($this->bd->setConsulta("delete from Empleado where dni='$dni"))
            return true;
        return false;
    }

    //borra el empleado segun el login y el dni
    function borrarEmpleadoLoginDni($login, $dni) {
        if ($this->bd->setConsulta("delete from Empleado where login='$login' 
                                    and dni='$dni'"))
            return true;
        return false;
    }
    //borra el empleado segun el apellido y el dni
    function borrarEmpleadoApellidosDni($apellidos, $dni) {
       if ($this->bd->setConsulta("delete from Empleado where apellidos='$apellidos'
                                and dni='$dni"))
           return true;
       return false;
    }

    //actualiza los datos de un empleado segun su dni
    function setEmpleadoLogin($objetoempleado, $dni) {
        $sql = "update empleado set login='" . $objetoempleado->getLogin() . "',
                                    clave='" . $objetoempleado->getClave() . "',
                                    nombre='" . $objetoempleado->getNombre() . "',
                                    apellidos='" . $objetoempleado->getApellidos(). "',
                                    dni='" . $objetoempleado->getDni() . "'
                                    where dni = '$dni' ";

        $this->bd->setConsulta($sql);
    }

    //inserta un empleado en la bd
    function insertarEmpleado($empleado) {
        $sql = "insert into Empleado values (
                '" . $empleado->getLogin() . "',
                '" . $empleado->getClave()  . "',
                '" . $empleado->getNombre()  . "',
                '" . $empleado->getApellidos()  . "',
                '" . $empleado->getDni()  . "')";
        $this->bd->setConsulta($sql);
    }

    //escribe tabla de todos los empleados
    function escribeEmpleado() {
        echo "<div>";
        echo "<h3>Edición Tabla Empleados</h3>";
        echo "<table id=\"empleado\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Login</th>";
        echo "<th>Clave</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellidos</th>";
        echo "<th>Dni</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $estilofila = "par";
        //hace la consulta
        $this->bd->setConsulta("select * from Empleado");
        //recoge el resultado
        while ($fila = $this->bd->getFila()) {
            $empleado = new Empleado();
            $empleado->setObjeto($fila);
            //escribe el empleado
            echo "<tr class=\"$estilofila\">";
            echo "<td>" . $empleado->getLogin() . "</td>";
            echo "<td>" . $empleado->getClave() . "</td>";
            echo "<td>" . $empleado->getNombre() . "</td>";
            echo "<td>" . $empleado->getApellidos() . "</td>";
            echo "<td>" . $empleado->getDni() . "</td>";
            echo "</tr>";

            if ($estilofila == "par")
                $estilofila = "impar";
            else
                $estilofila = "par";
        }
        echo "</tbody>";
        echo "</table>";
        //permite volver al index de la web
       // echo "<a href='index.php?pagina=pag1&tipo='><input type='button' value='Mapa'/></a>";
        echo "</div>";
    }

    function escribeEmpleadoPaginado($page = "", $ver = "") {
        if ($ver == "")
            $ver = 10;
        // por defecto la pagina es 0 y con visualizar 10 registros
        echo "<div id=\"empleadoPaginado\">";
        echo "<h3>Edición Tabla Paginada Empleados </h3>";
        echo "<table id=\"empleado\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Login</th>";
        echo "<th>Clave</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellidos</th>";
        echo "<th>Dni</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $estilofila = "par";
        //consulta
        $this->bd->setConsulta("select * from Empleado ");
        $numreg = $this->bd->getNumFiles();
        //si el resultado es mayor que 10 empleados
        if ($numreg > 10) {
            $totalpaginas = ceil($numreg / $ver);
            if ($page < 0)
                $page = 1;
            //A VER SI ESTA BIEN FONCCIONABA POR EL VINO
            if ($page >= $totalpaginas)
                $page = $totalpaginas - 1;
            $this->bd->setConsulta("select * from Empleado limit "
                    . $page * $ver . "," . $ver);
        }else
            $totalpaginas = 1;
        //recoge el resultado
        while ($fila = $this->bd->getFila()) {
            $empleado = new Empleado();
            $empleado->setObjeto($fila);
            echo "<tr class=\"$estilofila\">";
            echo "<td>" . $empleado->getLogin() . "</td>";
            echo "<td>" . $empleado->getClave() . "</td>";
            echo "<td>" . $empleado->getNombre() . "</td>";
            echo "<td>" . $empleado->getApellidos() . "</td>";
            echo "<td>" . $empleado->getDni() . "</td>";
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

    function escribeSelectEmpleado($condicion = "") {
        echo "<select name=\"nombre\" id=\"nombre\">";
        echo"<option value=\"\">Selecciona Empleado</option>";
        $this->bd->setConsulta("select * from Empleado  $condicion");
        while ($fila = $this->bd->getFila()) {
            $empleado = new Establicimiento();
            $empleado->setObjeto($fila);
            echo "<option value=\"" . $empleado->getNombre() . "\">";
            echo $empleado->getNombre();
            echo "</option>";
        }
        echo "</select>";
    }

    //si quiere una consulta por ajax
    function mostrarAjax($condicion = "") {
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<empleados>';
        $this->bd->setConsulta("select * from Empleado $condicion");
        while ($fila = $this->bd->getFila()) {
            echo "<empleado>";
            $empleado = new Empleado();
            $empleado->setObjeto($fila);
            echo "<login>" . $empleado->getLogin() . "</login>";
            echo "<clave>" . $empleado->getClave() . "</clave>";
            echo "<nombre>" . $empleado->getNombre() . "</nombre>";
            echo "<apellidos>" . $empleado->getApellidos() . "</apellidos>";
            echo "<dni>" . $empleado->getDni() . "</dni>";
            echo "</empleado>";
        }
        echo '</empleados>';
    }

}

?>
