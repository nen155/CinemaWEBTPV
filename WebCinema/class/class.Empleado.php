<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author Asus
 */
class Empleado {
    //definicion de las variables
   private $login;
   private $clave;
   private $dni;
   private $nombre;
   private $apellidos;
   
   //define el constructor
   function __construct($login=null, $clave=null, $nombre=null, $apellidos=null,
                        $dni=null) {
        $this->login =$login;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        
    }
    //inserta el objeto
    function setObjeto($arrobj) {
        $this->login =$arrobj[0];
        $this->clave = $arrobj[1];
        $this->nombre = $arrobj[2];
        $this->apellidos = $arrobj[3];
        $this->dni = $arrobj[4];
    }
    
    //propiedades
    function setLogin($login){
        $this->login=$login;
    }
    function getLogin(){
        return $this->login;
    }
    function setClave($clave){
        $this->clave=$clave;
    }
    function getClave(){
        return $this->clave;
    }
    function setNombre($nombre){
        $this->nombre=$nombre;
    }
    function getNombre(){
        return $this->nombre;
    }
    function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }
    function getApellidos(){
        return $this->apellidos;
    }
    function setDni($dni){
        $this->dni=$dni;
    }
    function getDni(){
        return $this->dni;
    }
}

?>
