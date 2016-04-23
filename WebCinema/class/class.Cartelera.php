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
class Cartelera {

//put your code here
    //indica la hora y minuto base para calcular la proxima sesion
            private $hora, $minuto;
             //indica la hora y minuto base para calcular la proxima sesion
            private $horasesion, $minutosesion;
    //variables para saber la duracion de la pelicula con descanso incluido
            private $horaduracion, $minutoduracion, $duracion;
    //formato hora sesion cartelera3
    private $horayepes;
    private $fechayepes;
    //formato fecha
    private $fecha = ""; //date("d/m");
    //variables para calcular los dias, y mes de la semana
    private $dias = array("DOMINGO", "LUNES", "MARTES", "MIÉRCOLES", "JUEVES", "VIERNES", "SÁBADO");
    private $jour, $mois,$annee;
    //variablede la sesion
    private $sesion;

    //propiedades
    //devuelve el formato para cartelera03 (ticket)
    function getHoraYepes() {
        return $this->horayepes;
    }
//propiedades
    //devuelve el formato para cartelera03 (ticket)
    function getFechaYepes() {
        return $this->fechayepes;
    }
    /*
      function getFechaYepes() {
      return $this->fecha;
      }
     */

    
    //devuelve el dia de la semana en nº
    function getJour() {
        return $this->jour;
    }

    //devuelve el mes en nº
    function getMois() {
        return $this->mois;
    }

    //devuelve el dia de la semana en nº
    function getAnnee() {
        return $this->annee;
    }
    //establece  y devuelve la hora base para calcular la nueva sesion
    function setHora($hora) {
        $this->hora = $hora;
    }

    function getHora() {
        return $this->hora;
    }

    //establece  y devuelve los minutos base para calcular la nueva sesion
    function setMinuto($minuto) {
        $this->minuto = $minuto;
    }

    function getMinuto() {
        return $this->minuto;
    }

    function getSesion() {
        return $this->sesion;
    }

    //establece  y devuelve la hora duracion de la peli para calcular la nueva sesion
    function setHoraDuracion($horaduracion) {
        $this->horaduracion = $horaduracion;
    }

    function getHoraDuracion() {
        return $this->horaduracion;
    }

   
    //establece  y devuelve los minutos duracion para calcular la nueva sesion
    function setMinutoDuracion($minutoduracion) {
        $this->minutoduracion = $minutoduracion;
    }

    function getMinutoDuracion() {
        return $this->minutoduracion;
    }

    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    ////establece  y devuelve la duarcion de la peli con el descanso para calcular la nueva sesion
    function getDuracion() {
        return $this->duracion;
    }

    //metodos
    //verifica si el nº del dia corresponde con el mes
    function chequearNumDia($n) {
        $m = date("m");
          
        if (($n > 31 && $m == "01") || ($n > 31 && $m == "03") || ($n > 31 && $m == "05") ||
                ($n > 31 && $m == "07") || ($n > 31 && $m == "08") || ($n > 31 && $m == "10") ||
                ($n > 31 && $m == "12")) {
            switch ($n) {
                case "32":
                    $this->jour = "01";
                    break;
                case "33":
                    $this->jour = "02";
                    break;
                case "34":
                    $this->jour = "03";
                    break;
                case "35":
                    $this->jour = "04";
                    break;
                case "36":
                    $this->jour = "05";
                    break;
                case "37":
                    $this->jour = "06";
                    break;
                default:
                    break;
            }
            switch ($m) {
                case "01":
                    $this->mois = "02";
                    break;
                case "03":
                    $this->mois = "04";
                    break;
                case "05":
                    $this->mois = "07";
                    break;
                case "07":
                    $this->mois = "08";
                    break;
                case "08":
                    $this->mois = "09";
                    break;
                case "10":
                    $this->mois = "11";
                    break;
                case "12":
                    $this->mois = "01";
                    break;
                default:
                    break;
            }
            $this->fechayepes = $this->annee . "-" . $this->mois."-" .$this->jour;
           return $this->fecha = $this->jour. "-" . $this->mois;
        } elseif (($n > 30 && $m == "04") || ($n > 30 && $m == "06") || ($n > 30 && $m == "09") ||
                ($n > 30 && $m == "10")) {
            switch ($n) {
                case "31":
                    $this->jour = "01";
                    break;
                case "32":
                    $this->jour = "02";
                    break;
                case "33":
                    $this->jour = "03";
                    break;
                case "34":
                    $this->jour = "04";
                    break;
                case "35":
                    $this->jour = "05";
                    break;
                case "36":
                    $this->jour = "06";
                    break;
                default:
                    break;
            }
            switch ($m) {
                case "04":
                    $this->mois = "05";
                    break;
                case "06":
                    $this->mois = "07";
                    break;
                case "09":
                    $this->mois = "10";
                    break;
                case "11":
                    $this->mois = "12";
                    break;
                default:
                    break;
            }
                  $this->fechayepes = $this->annee . "-" . $this->mois."-" .$this->jour;
           return $this->fecha = $this->jour. "-" . $this->mois;
        } elseif ($n > 28 && $m == "02") {
            switch ($n) {
                case "29":
                    $this->jour = "01";
                    break;
                case "30":
                    $this->jour = "02";
                    break;
                case "31":
                    $this->jour = "03";
                    break;
                case "32":
                    $this->jour = "04";
                    break;
                case "33":
                    $this->jour = "05";
                    break;
                case "35":
                    $this->jour = "06";
                    break;
                default:
                    break;
            }
            $this->mois = "03";
            $this->fechayepes = $this->annee . "-" . $this->mois."-" .$this->jour;
           return $this->fecha = $this->jour. "-" . $this->mois;
        }else{
            $this->annee=  date("Y");
            $this->mois=date("m");
            $this->jour=$n;
           $this->fechayepes = $this->annee . "-" . $this->mois."-" .$this->jour;
          // echo $this->fecha = $this->jour. "-" . $this->mois; 
           return $this->fecha = $this->jour. "-" . $this->mois; 
        }
    }

    //calcula los nº del dia pra rellenar la tabla semanal
    function getNumDia($day) {
        
        $d = date("l");
        $n = date("d");
        switch ($d) {
            case "Sunday":
                switch ($day) {
                    case "DOMINGO":
                        $this->jour = $n;
                        break;
                    case "LUNES":
                        $this->jour = ($n + 1);
                        break;
                    case "MARTES":
                        $this->jour = ($n + 2);
                        break;
                    case "MIÉRCOLES":
                        $this->jour = ($n + 3);
                        break;
                    case "JUEVES":
                        $this->jour = ($n + 4);
                        break;
                    case "VIERNES":
                        $this->jour = ($n + 5);
                        break;
                    case "SÁBADO":
                        $this->jour = ($n + 6);
                        break;
                    default:
                        break;
                }
                break;
            case "Monday":
                switch ($day) {
                    case "DOMINGO":
                        $this->jour = ($n + 6);
                        break;
                    case "LUNES":
                        $this->jour = $n;
                        break;
                    case "MARTES":
                        $this->jour = ($n + 1);
                        break;
                    case "MIÉRCOLES":
                        $this->jour = ($n + 2);
                        break;
                    case "JUEVES":
                        $this->jour = ($n + 3);
                        break;
                    case "VIERNES":
                        $this->jour = ($n + 4);
                        break;
                    case "SÁBADO":
                        $this->jour = ($n + 5);
                        break;
                    default:
                        break;
                }
                break;
            case "Tuesday":
                switch ($day) {
                    case "DOMINGO":
                        $this->jour = ($n + 5);
                        break;
                    case "LUNES":
                        $this->jour = ($n + 6);
                        break;
                    case "MARTES":
                        $this->jour = $n;
                        break;
                    case "MIÉRCOLES":
                        $this->jour = ($n + 1);
                        break;
                    case "JUEVES":
                        $this->jour = ($n + 2);
                        break;
                    case "VIERNES":
                        $this->jour = ($n + 3);
                        break;
                    case "SÁBADO":
                        $this->jour = ($n + 4);
                        break;
                    default:
                        break;
                }
                break;
            case "Wednesday":
                switch ($day) {
                    case "DOMINGO":
                        $this->jour = ($n + 4);
                        break;
                    case "LUNES":
                        $this->jour = ($n + 5);
                        break;
                    case "MARTES":
                        $this->jour = ($n + 6);
                        break;
                    case "MIÉRCOLES":
                        $this->jour = $n;
                        break;
                    case "JUEVES":
                        $this->jour = ($n + 1);
                        break;
                    case "VIERNES":
                        $this->jour = ($n + 2);
                        break;
                    case "SÁBADO":
                        $this->jour = ($n + 3);
                        break;
                    default:
                        break;
                }
                break;
            case "Thursday":
                switch ($day) {
                    case "DOMINGO":
                        $this->jour = ($n + 3);
                        break;
                    case "LUNES":
                        $this->jour = ($n + 4);
                        break;
                    case "MARTES":
                        $this->jour = ($n + 5);
                        break;
                    case "MIÉRCOLES":
                        $this->jour = ($n + 6);
                        break;
                    case "JUEVES":
                        $this->jour = $n;
                        break;
                    case "VIERNES":
                        $this->jour = ($n + 1);
                        break;
                    case "SÁBADO":
                        $this->jour = ($n + 2);
                        break;
                    default:
                        break;
                }
                break;
            case "Friday":
                switch ($day) {
                    case "DOMINGO":
                        $this->jour = ($n + 2);
                        break;
                    case "LUNES":
                        $this->jour = ($n + 3);
                        break;
                    case "MARTES":
                        $this->jour = ($n + 4);
                        break;
                    case "MIÉRCOLES":
                        $this->jour = ($n + 5);
                        break;
                    case "JUEVES":
                        $this->jour = ($n + 6);
                        break;
                    case "VIERNES":
                        $this->jour = $n;
                        break;
                    case "SÁBADO":
                        $this->jour = ($n + 1);
                        break;
                    default:
                        break;
                }
                break;
            case "Saturday":
                switch ($day) {
                    case "DOMINGO":
                        $this->jour = ($n + 1);
                        break;
                    case "LUNES":
                        $this->jour = ($n + 2);
                        break;
                    case "MARTES":
                        $this->jour = ($n + 3);
                        break;
                    case "MIÉRCOLES":
                        $this->jour = ($n + 4);
                        break;
                    case "JUEVES":
                        $this->jour = ($n + 5);
                        break;
                    case "VIERNES":
                        $this->jour = ($n + 6);
                        break;
                    case "SÁBADO":
                        $this->jour = $n;
                        break;
                    default:
                        break;
                }
                break;

            default:
                break;
        }
        
        if ($this->jour < 28) {
            $this->mois = date("m");
            $this->annee = date ("Y");
            $this->fechayepes = $this->annee . "-" . $this->mois."-" .$this->jour;
           return $this->fecha = $this->jour. "-" . $this->mois;
        }else
           return $this->chequearNumDia($this->jour);
    }

    //calcula la fecha de la sesion semanal
    function getFechaSesion($day) {
        //$this->fecha = date("d/m");
        $this->fecha = date("d-m");
        $this->fechayepes = date("Y-m-d");
        if ($this->dias[date('w')] == $day)
            return $this->fecha;
        else
            return $this->getNumDia($day);
        
    }
/*
    //calcula la hora completa de cada sesion
    function getNuevaSesion() {
        $this->minuto = $this->getMinutoSesion($this->minutoduracion)+$this->getMinuto();
        $this->hora = $this->getHoraSesion($this->hora)+$this->getHora();
        $this->horayepes = $this->hora . ":" . $this->minuto . ":00";
        return $this->sesion = $this->hora . ":" . $this->minuto;
    }
*/
    
    function getNuevaSesion(){
        
       // return ($this->getHora()+$this->getHoraDuracion()).":".($this->getMinuto()+$this->getMinutoDuracion());
        $this->minuto=$this->chequearMinutoSesion($this->getMinuto()+$this->getMinutoDuracion());
        $this->hora=$this->chequearHoraSesion($this->getHora()+$this->getHoraDuracion());
        $this->horayepes = $this->hora . ":" . $this->minuto . ":00";
        $this->sesion= $this->getHora().":".$this->getMinuto();
    }
    
    //calcula los minutos para la nueva sesion
    function getMinutoSesion($m) {
     return  $m = $this->minutoduracion + $m;
     //  return $this->chequearMinutoSesion($m);
        
    }

    //completa el calculo de los minutos de la nueva sesion
    function chequearMinutoSesion($m) {
        $mold = $m;
        if ($m<=59){
          $this->minuto = $m;  
        }elseif($m==60){
            $this->minuto = "00";
            $this->hora = $this->hora + 1;
        }elseif($m>=60){
            $m =  $mold - 60;
            $this->minuto = $m;
            $this->hora = $this->hora + 1;
        }/*
        if ($m > 59) {
            $m =  $mold - 60;
            $this->minuto = $m;
            $this->hora = $this->hora + 1;
        }else
            $this->minuto = $m;
        if ($this->minuto >= 1 && $this->minuto <= 9)
            $this->minuto = 10;
        elseif ($this->minuto >= 11 && $this->minuto <= 19)
            $this->minuto = 20;
        elseif ($this->minuto >= 21 && $this->minuto <= 29)
            $this->minuto = 30;
        elseif ($this->minuto >= 31 && $this->minuto <= 39)
            $this->minuto = 40;
        elseif ($this->minuto >= 41 && $this->minuto <= 49)
            $this->minuto = 50;
        elseif ($this->minuto >= 51 && $this->minuto <= 59) {
            $this->minuto = "00";
            $this->hora = $this->hora + 1;
        }
        if ($this->minuto==0){
            $this->minuto="00";
        }*/
        return $this->minuto;
    }

    //calcula la hora para la nueva sesion
    function getHoraSesion($h) {
        $h = $this->horaduracion + $h;
        return $this->chequearHoraSesion($h);
    }

    //completa el calculo para la nueva sesion
    function chequearHoraSesion($h) {
        switch ($h) {
            case 25:
                $h = "01";
                break;
            case 26:
                $h = "02";
                break;
            case 27:
                $h = "03";
                break;
            case 28:
                $h = "04";
                break;
            case 29:
                $h = "05";
                break;
            case 30:
                $h = "06";
                break;
            default:
                break;
        }
        $this->hora = $h;
        return $this->hora;
    }

}

?>
