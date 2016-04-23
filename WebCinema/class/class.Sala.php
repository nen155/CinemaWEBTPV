<?php

class Sala {

    private $numeroSala;
    private $numeroButacas;
    private $numeroFilas;
    private $ocupada;
    private $idPelicula;

   function __construct($numeroSala=null, $numeroButacas=null, $numeroFilas=null, $ocupada=null, $idPelicula=null) {
        $this->numeroSala = $numeroSala;
        $this->numeroButacas = $numeroButacas;
        $this->numeroFilas = $numeroFilas;
        $this->ocupada = $ocupada;
        $this->idPelicula = $idPelicula;
    }

    function set($array) {
        $this->numeroSala = $array[0];
        $this->numeroButacas = $array[1];
        $this->numeroFilas = $array[2];
        $this->ocupada = $array[3];
        $this->idPelicula = $array[4];
    }

    function setNumeroSala($numeroSala) {
        $this->numeroSala = $numeroSala;
    }

    function setNumeroButacas($numeroButacas) {
        $this->numeroButacas = $numeroButacas;
    }

    function setNumeroFilas($numeroFilas) {
        $this->numeroFilas = $numeroFilas;
    }

    function setOcupada($ocupada) {
        $this->ocupada = $ocupada;
    }

    function setIdPelicula($idPelicula) {
        $this->idPelicula = $idPelicula;
    }

    function getNumeroSala() {
        return $this->numeroSala;
    }

    function getNumeroButacas() {
        return $this->numeroButacas;
    }

    function getNumeroFilas() {
        return $this->numeroFilas;
    }

    function getOcupada() {
        return $this->ocupada;
    }

    function getIdPelicula() {
        return $this->idPelicula;
    }
}
?>