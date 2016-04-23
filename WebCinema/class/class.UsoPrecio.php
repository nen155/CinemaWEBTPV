<?php

class UsoPrecio {

    private $bd = null;

    function __construct($bd) {
        $this->bd = $bd;
    }

    //Comprueba si existe el precio
    function existePrecio($fechaPrecio) {
        $this->bd->setConsulta("select * from Precio where fechaPrecio = '$fechaPrecio' ");
        if ($this->bd->getNumFilas() > 0) {
            return true;
        }
        return false;
    }

    //Devuelve el precio
    function getPrecio() {
        $fila = $this->bd->setConsulta("select * from Precio;");
        //$fila = $this->bd->getFila();
        $precio = new Precio();
        $precio->set($fila);
        return $precio;
    }

    //Borrar los precios indicados
    function borrarPrecio($fechaPrecio) {
        $this->bd->setConsulta("delete from Precio where fechaPrecio = '$fechaPrecio'");
    }

    //Inserta un nuevo precio en la tabla
    function insertarPrecio($precio) {
        $sql = "insert into Precio values('" 
                . $precio->getFechaPrecio() . "','"
                . $precio->getPrecioBase() . "','"
                . $precio->getMiercoles() . "','"
                . $precio->getGafas() . "','"
                . $precio->getEspecial() . "','"
                . $precio->getIva() . "');";
        $this->bd->setConsulta($sql);
    }

    //Modifica un precio
    function modificarPrecio($objetoPrecio, $campoFechaPrecio) {
        $sql = "update Precio set fechaPrecio='" . $objetoPrecio->getFechaPrecio() . "',
            precioBase='" . $objetoPrecio->getPrecioBase() ."',
            miercoles='" . $objetoPrecio->getMiercoles() ."',
            gafas='" . $objetoPrecio->getGafas() ."',
            especial='" . $objetoPrecio->getEspecial() . "',
            iva='" . $objetoPrecio->getIva() . "' where fechaPrecio='$campoFechaPrecio';";
        $this->bd->setConsulta($sql);
    }
}

?>