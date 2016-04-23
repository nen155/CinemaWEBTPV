<?php

class Pelicula {

    private $idPelicula;
    private $nombrePelicula;
    private $descripcion;
    private $foto;
    private $cartel;
    private $genero;
    private $director;
    private $interpretes;
    private $calificacion;
    private $trailler;
    private $duracion;
    private $tresD;
    private $vo;
    private $vos;
    private $vd;
    private $trentaycincomm;
    private $digital;
    private $fechaInicio;
    private $fechaFin;
    private $salaProyeccion;

    //define el constructor
    function __construct($idPelicula=null, $nombrePelicula=null, $descripcion=null, $foto=null, $cartel=null, $genero=null, $director=null, $interpretes=null, $calificacion=null, $trailler=null, $duracion=null, $tresD=null, $vo=null, $vos=null, $vd=null, $trentaycincomm=null, $digital=null, $fechaInicio=null, $fechaFin=null, $salaProyeccion=null) {
        $this->idPelicula = $idPelicula;
        $this->nombrePelicula = $nombrePelicula;
        $this->descripcion = $descripcion;
        $this->foto = $foto;
        $this->cartel = $cartel;
        $this->genero = $genero;
        $this->director = $director;
        $this->interpretes = $interpretes;
        $this->calificacion = $calificacion;
        $this->trailler = $trailler;
        $this->duracion = $duracion;
        $this->tresD = $tresD;
        $this->vo = $vo;
        $this->vos = $vos;
        $this->vd = $vd;
        $this->trentaycincomm = $trentaycincomm;
        $this->digital = $digital;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->salaProyeccion = $salaProyeccion;
    }

    function setObjeto($arrobj) {
        $this->idPelicula = $arrobj[0];
        $this->nombrePelicula = $arrobj[1];
        $this->descripcion = $arrobj[2];
        $this->foto = $arrobj[3];
        $this->cartel = $arrobj[4];
        $this->genero = $arrobj[5];
        $this->director = $arrobj[6];
        $this->interpretes = $arrobj[7];
        $this->calificacion = $arrobj[8];
        $this->trailler = $arrobj[9];
        $this->duracion = $arrobj[10];
        $this->tresD = $arrobj[11];
        $this->vo = $arrobj[12];
        $this->vos = $arrobj[13];
        $this->vd = $arrobj[14];
        $this->trentaycincomm = $arrobj[15];
        $this->digital = $arrobj[16];
        $this->fechaInicio = $arrobj[17];
        $this->fechaFin = $arrobj[18];
        $this->salaProyeccion = $arrobj[19];
    }

    //Array de objeto pelicula para los estrenos
    function setEstrenos($arrobj) {
        $this->idPelicula = $arrobj[0];
        $this->nombrePelicula = $arrobj[1];
        $this->descripcion = $arrobj[2];
        $this->cartel = $arrobj[3];
        $this->genero = $arrobj[4];
        $this->interpretes = $arrobj[5];
        $this->salaProyeccion = $arrobj[6];
    }
    
    //Array de objeto de pelicula cartelera
    function setCartelera($arrobj){
        $this->idPelicula = $arrobj[0];
        $this->nombrePelicula = $arrobj[1];
        $this->descripcion = $arrobj[2];
        $this->foto = $arrobj[3];
        $this->sala = $arrobj[4];
    }

    //Array de objeto pelicula para devolver los proximos estrenos
    function setProximos($arrobj){
        $this->idPelicula = $arrobj[0];
        $this->nombrePelicula = $arrobj[1];
        $this->descripcion = $arrobj[2];
        $this->foto = $arrobj[3];
        $this->genero = $arrobj[4];
        $this->interpretes = $arrobj[5];
    }

    //propiedades
    function setIdPelicula($idPelicula) {
        $this->idPelicula = $idPelicula;
    }

    function getIdPelicula() {
        return $this->idPelicula;
    }

    function setNombrePelicula($nombrePelicula) {
        $this->nombrePelicula = $nombrePelicula;
    }

    function getNombrePelicula() {
        return $this->nombrePelicula;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function getFoto() {
        return $this->foto;
    }

    function setCatel($cartel) {
        $this->cartel = $cartel;
    }

    function getCartel() {
        return $this->cartel;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function getGenero() {
        return $this->genero;
    }

    function setDirector($director) {
        $this->director = $director;
    }

    function getDirector() {
        return $this->director;
    }

    function setInterpretes($interpretes) {
        $this->interpretes = $interpretes;
    }

    function getInterpretes() {
        return $this->interpretes;
    }

    function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }

    function getCalificacion() {
        return $this->calificacion;
    }

    function setTrailler($trailler) {
        $this->trailler = $trailler;
    }

    function getTrailler() {
        return $this->trailler;
    }

    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    function getDuracion() {
        return $this->duracion;
    }

    function setTresD($tresD) {
        $this->tresD = $tresD;
    }

    function getTresD() {
        return $this->tresD;
    }

    function setVo($vo) {
        $this->vo = $vo;
    }

    function getVo() {
        return $this->vo;
    }

    function setVos($vos) {
        $this->vos = $vos;
    }

    function getVos() {
        return $this->vos;
    }

    function setVd($vd) {
        $this->vd = $vd;
    }

    function getVd() {
        return $this->vd;
    }

    function setTrentaycincomm($trentaycincomm) {
        $this->trentaycincomm = $trentaycincomm;
    }

    function getTrentaycincomm() {
        return $this->trentaycincomm;
    }

    function setDigital($digital) {
        $this->digital = $digital;
    }

    function getDigital() {
        return $this->digital;
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function setSalaProyeccion($salaProyeccion) {
        $this->salaProyeccion = $salaProyeccion;
    }

    function getSalaProyeccion() {
        return $this->salaProyeccion;
    }

}

?>
