<?php

class Precio {

    private $fechaPrecio;
    private $precioBase;
    private $miercoles;
    private $gafas;
    private $especial;
    private $iva;

    function __construct($fechaPrecio=null, $precioBase=null, $miercoles=null, $gafas=null, $especial=null, $iva=null) {
        $this->fechaPrecio = $fechaPrecio;
        $this->precioBase = $precioBase;
        $this->miercoles = $miercoles;
        $this->gafas = $gafas;
        $this->especial = $especial;
        $this->iva = $iva;
    }

    function set($array) {
        $this->fechaPrecio = $array[0];
        $this->precioBase = $array[1];
        $this->miercoles = $array[2];
        $this->gafas = $array[3];
        $this->especial = $array[4];
        $this->iva = $array[5];
    }

    function setFechaPrecio($fechaPrecio) {
        $this->fechaPrecio = $fechaPrecio;
    }

    function setPrecioBase($precioBase) {
        $this->precioBase = $precioBase;
    }

    function setMiercoles($miercoles) {
        $this->miercoles = $miercoles;
    }

    function setGafas($gafas) {
        $this->gafas = $gafas;
    }

    function setEspecial($especial) {
        $this->especial = $especial;
    }

    function setIva($iva){
        $this->iva = $iva;
    }

    function getFechaPrecio() {
        return $this->fechaPrecio;
    }

    function getPrecioBase() {
        return $this->precioBase;
    }

    function getMiercoles() {
        return $this->miercoles;
    }

    function getGafas() {
        return $this->gafas;
    }

    function getEspecial() {
        return $this->especial;
    }

    function getIva(){
        return $this->iva;
    }
}
?>