<?php

class UsoTicket {

    private $bd = null;

    function __construct($bd) {
        $this->bd = $bd;
    }

    //Comprueba si existe el ticket
    function existeTicket($idTicket) {
        $this->bd->setConsulta("select * from Ticket where idTicket = '$idTicket' ");
        if ($this->bd->getNumFilas() > 0) {
            return true;
        }
        return false;
    }

    //Comprueba el ticket
     function compruebaTicket($idPelicula,$fechaSesion,$horaSesion,$fila,$butaca,$sala) {
        $this->bd->setConsulta("select * from Ticket where idPelicula = '$idPelicula' AND fechaSesion = '$fechaSesion' AND horaSesion = '$horaSesion'
        AND fila = '$fila' AND butaca = '$butaca' AND salaProyeccion = '$sala';");
        if ($this->bd->getNumFilas() > 0) {
            return true;
        }
        return false;
    }

    //Devuelve el ticket
    function getTicket($idTicket) {
        $this->bd->setConsulta("select * from Ticket where idTicket = '$idTicket' ");
        $fila = $this->bd->getFila();
        $ticket = new Ticket();
        $ticket->set($fila);
        return $ticket;
    }

    //Borrar el ticket indicado
    function borrarTicket($idTicket) {
        $this->bd->setConsulta("delete from Ticket where idTicket = '$idTicket'");
    }

    //Inserta un nuevo ticket en la tabla
    function insertarTicket($ticket) {
        $sql = "insert into Ticket values('" 
                . $ticket->getIdTicket() . "','"
                . $ticket->getFechaExpedicion() . "','"
                . $ticket->getTipoExpedicion() . "','"
                . $ticket->getTipoCobro() . "','"
                . $ticket->getFechaSesion() . "','"
                . $ticket->getHoraSesion() . "','"
                . $ticket->getIdPelicula() . "','"
                . $ticket->getSalaProyeccion() . "','"
                . $ticket->getFila() . "','"
                . $ticket->getButaca() . "','"
                . $ticket->getPrecioTotal() . "','"
                . $ticket->getComprobado() . "','"
                . $ticket->getLoginFichar() . "','"
                . $ticket->getCompra() ."');";
        $this->bd->setConsulta($sql);
    }

    //Modifica un ticket
    function modificarTicket($objetoTicket, $campoIdTicket) {
        $sql = "update Ticket set idticket='" . $objetoTicket->getIdTicket() . "',
            fechaExpedicion='" . $objetoTicket->getFechaExpedicion() ."',
            tipoExpedicion='" . $objetoTicket->getTipoExpedicion() ."',
            tipoCobro='" . $objetoTicket->getTipoCobro() ."',
            fechaSesion='" . $objetoTicket->getFechaSesion() . "',
            horaSesion='" . $objetoTicket->getHoraSesion() . "',
            idPelicula='" . $objetoTicket->getIdPelicula() . "',
            salaProyeccion='" . $objetoTicket->getSalaProyeccion() ."',
            fila='" . $objetoTicket->getFila() . "',
            butaca='" . $objetoTicket->getButaca() . "',
            precioTotal='" . $objetoTicket->getPrecioTotal() . "',
            comprobado='" . $objetoTicket->getComprobado() . "',
            loginFichar='" . $objetoTicket->getLoginFichar() ."' where idTicket='$campoIdTicket';";
        $this->bd->setConsulta($sql);
    }
}

?>