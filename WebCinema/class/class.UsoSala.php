<?php

class UsoSala {

    private $bd = null;

    function __construct($bd) {
        $this->bd = $bd;
    }

    //Comprueba si existe la sala
    function existeSala($numeroSala) {
        $this->bd->setConsulta("select * from Sala where numeroSala = '$numeroSala' ");
        if ($this->bd->getNumFilas() > 0) {
            return true;
        }
        return false;
    }

    //Devuelve la sala
    function getSala($numeroSala) {
        $this->bd->setConsulta("select * from Sala where numeroSala = '$numeroSala' ");
        $fila = $this->bd->getFila();
        $sala = new Sala();
        $sala->set($fila);
        return $sala;
    }

    //Borrar las salas indicadas
    function borrarSala($numeroSala) {
        $this->bd->setConsulta("delete from Sala where numeroSala = '$numeroSala'");
    }

    //Inserta un nueva sala en la tabla
    function insertarSala($sala) {
        $sql = "insert into Sala values('" 
                . $sala->getNumeroSala() . "','"
                . $sala->getNumeroButacas() . "','"
                . $sala->getNumeroFilas() . "','"
                . $sala->getOcupada() . "','"
                . $sala->getIdPelicula() . "');";
        $this->bd->setConsulta($sql);
    }

    //Modifica una sala
    function modificarSala($objetoSala, $campoNumeroSala) {
        $sql = "update Sala set numeroSala='" . $objetoSala->getNumeroSala() . "',
            numeroButacas='" . $objetoSala->getNumeroButacas() ."',
            numeroFilas='" . $objetoSala->getNumeroFilas() ."',
            ocupada='" . $objetoSala->getOcupada() ."',
            idPelicula='" . $objetoSala->getIdPelicula() . "' where numeroSala='$campoNumeroSala';";
        $this->bd->setConsulta($sql);
    }

}

?>