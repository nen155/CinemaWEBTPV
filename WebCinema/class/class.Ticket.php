<?php

class Ticket {

    private $idTicket;
    private $fechaExpedicion;
    private $tipoExpedicion;
    private $tipoCobro;
    private $fechaSesion;
    private $horaSesion;
    private $idPelicula;
    private $salaProyeccion;
    private $fila;
    private $butaca;
    private $precioTotal;
    private $comprobado;
    private $loginFichar;
    private $compra;

   function __construct($idTicket=null, $fechaExpedicion=null, $tipoExpedicion=null, $tipoCobro=null, $fechaSesion=null, $horaSesion=null,
    $idPelicula=null, $salaProyeccion=null, $fila=null, $butaca=null, $precioTotal=null, $comprobado=null, $loginFichar=null, $compra=null) {
        $this->idTicket = $idTicket;
        $this->fechaExpedicion = $fechaExpedicion;
        $this->tipoExpedicion = $tipoExpedicion;
        $this->tipoCobro = $tipoCobro;
        $this->fechaSesion = $fechaSesion;
        $this->horaSesion = $horaSesion;
        $this->idPelicula = $idPelicula;
        $this->salaProyeccion = $salaProyeccion;
        $this->fila = $fila;
        $this->butaca = $butaca;
        $this->precioTotal = $precioTotal;
        $this->comprobado = $comprobado;
        $this->loginFichar = $loginFichar;
        $this->compra = $compra;
    }

    function set($array) {
        $this->idTicket = $array[0];
        $this->fechaExpedicion = $array[1];
        $this->tipoExpedicion = $array[2];
        $this->tipoCobro = $array[3];
        $this->fechaSesion = $array[4];
        $this->horaSesion = $array[5];
        $this->idPelicula = $array[6];
        $this->salaProyeccion = $array[7];
        $this->fila = $array[8];
        $this->butaca= $array[9];
        $this->precioTotal = $array[10];
        $this->comprobado = $array[11];
        $this->loginFichar = $array[12];
        $this->compra = $array[13];
    }
    
    function setButacas($array){
        $this->fila = $array[0];
        $this->butaca = $array[1];
    }

    function setIdTicket($idTicket) {
        $this->idTicket = $idTicket;
    }

    function setFechaExpedicion($fechaExpedicion) {
        $this->fechaExpedicion = $fechaExpedicion;
    }

    function setTipoExpedicion($tipoExpedicion) {
        $this->tipoExpedicion = $tipoExpedicion;
    }

    function setTipoCobro($tipoCobro) {
        $this->tipoCobro = $tipoCobro;
    }

    function setFechaSesion($fechaSesion) {
        $this->fechaSesion = $fechaSesion;
    }

    function setHoraSesion($horaSesion){
        $this->horaSesion = $horaSesion;
    }

    function setIdPelicula($idPelicula){
        $this->idPelicula = $idPelicula;
    }

    function setSalaProyeccion($salaProyeccion){
        $this->salaProyeccion = $salaProyeccion;
    }

    function setFila($fila){
        $this->fila = $fila;
    }

    function setButaca($butaca){
        $this->butaca = $butaca;
    }

    function setPrecioTotal($precioTotal){
        $this->precioTotal = $precioTotal;
    }

    function setComprobado($comprobado){
        $this->comprobado = $comprobado;
    }

    function setLoginFichar($loginFichar){
        $this->loginFichar = $loginFichar;
    }

    function setCompra($compra){
        $this->compra = $compra;
    }

    function getIdTicket() {
        return $this->idTicket;
    }

    function getFechaExpedicion() {
        return $this->fechaExpedicion;
    }

    function getTipoExpedicion() {
        return $this->tipoExpedicion;
    }

    function getTipoCobro() {
        return $this->tipoCobro;
    }

    function getFechaSesion() {
        return $this->fechaSesion;
    }

    function getHoraSesion(){
        return $this->horaSesion;
    }

    function getIdPelicula(){
        return $this->idPelicula;
    }

    function getSalaProyeccion(){
        return $this->salaProyeccion;
    }

    function getFila(){
        return $this->fila;
    }

    function getButaca(){
        return $this->butaca;
    }

    function getPrecioTotal(){
        return $this->precioTotal;
    }

    function getComprobado(){
        return $this->comprobado;
    }

    function getLoginFichar(){
        return $this->loginFichar;
    }

    function getCompra(){
        return $this->compra;
    }
}
?>