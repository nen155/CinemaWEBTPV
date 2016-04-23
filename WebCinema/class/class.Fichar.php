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
class Fichar {
 //definicion de las variables
   private $loginFichar;
   private $ficharEntrada;
   private $ficharSalida;
   
   //define el constructor
   function __construct($loginFichar=null, $ficharEntrada=null, $ficharSalida=null) {
        $this->loginFichar =$loginFichar;
        $this->ficharEntrada = $ficharEntrada;
        $this->ficharSalida = $ficharSalida;        
    }
    //inserta el objeto
    function setObjeto($arrobj) {
        $this->loginFichar =$arrobj[0];
        $this->ficharEntrada = $arrobj[1];
        $this->ficharSalida = $arrobj[2];
    }
    
    //propiedades
    function setLoginFichar($loginFichar){
        $this->loginFichar=$loginFichar;
    }
    function getLoginFichar(){
        return $this->loginFichar;
    }
    function setFicharEntrada($ficharEntrada){
        $this->ficharEntrada=$ficharEntrada;
    }
    function getFicharEntrada(){
        return $this->ficharEntrada;
    }
    function setFicharSalida($ficharSalida){
        $this->ficharSalida=$ficharSalida;
    }
    function getFicharSalida(){
        return $this->ficharSalida;
    }
}
?>
