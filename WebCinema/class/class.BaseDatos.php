<?php

class BaseDatos {

    private $conexion;
    private $resultado;

    //Constructor por defecto
    function __construct($servidor=null, $usuario=null, $pass=null) {
        if ($servidor != null && $usuario != null && $pass != null) {
            $this->setConexion($servidor, $usuario, $pass);
            mysql_query("set names 'utf8'"); //Indice a la base de datos que use la codificacion UTF8
        }
    }

    //Establece la conexion
    function setConexion($ser, $us, $pas) {
        $this->conexion = mysql_connect($ser, $us, $pas);
        if ($this->conexion)
            return true;
        return false;
    }

    //Cierra la conexion
    function closeConexion() {
        mysql_close($this->conexion);
    }

    //Estabablece la base de datos
    function setBaseDatos($bd) {
        if (mysql_select_db($bd, $this->conexion))
            return true;
        return false;
    }

    //Ejecuta la consulta que se le pasa
    function setConsulta($sql) {
        if ($this->resultado = mysql_query($sql))
            return true;
        return false;
    }

    //Devuelve cada fila resultante de ejecutar la consulta
    function getFila() {
        return  mysql_fetch_array($this->resultado);
    }

    //Devuelve el número de filas de la tabla
    function getNumFilas() {
        return mysql_num_rows($this->resultado);
    }

    //Devuelve el número de filas que se modificaron en la última consulta
    function getNumFilasModificadas() {
        return mysql_affected_rows();
    }

}

?>