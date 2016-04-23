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
class UsoPelicula {

//put your code here
    // solo una variable de tipo de la clase BaseDatos
    private $bd = null;

    //constructor se le pasa la base de datos
    function __construct($bd) {

        $this->bd = $bd;
    }

    //si existe la pelicula segun el nombre
    function existePelicula($nombrePelicula) {
        $this->bd->setConsulta("select * from Pelicula where nombrePelicula='$nombrePelicula' ");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }

    //si existe la pelicula segun el id
    function existePeliculaIdPelicula($idPelicula) {
        $this->bd->setConsulta("select * from Pelicula where idPelicula='$idPelicula' ");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }

    //si existe la pelicula segun el nombre y el director
    function existePeliculaDirector($nombrePelicula, $director) {
        $this->bd->setConsulta("select * from Pelicula where nombrePelicula='$nombrePelicula'
                                and director='$director' ");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }

    //si existe la pelicula segun el nombre y los interpretes
    function existePeliculaInterpretes($nombrePelicula, $interpretes) {
        $this->bd->setConsulta("select * from Pelicula where nombrePelicula='$nombrePelicula' 
                                and interpretes='$interpretes'");
        if ($this->bd->getNumFiles() > 0)
            return true;
        return false;
    }

    //devuelve la pelicula segun el nombre 
    function getPeliculaNombre($nombrePelicula) {
        $this->bd->setConsulta("select * from Pelicula where nombrePelicula='$nombrePelicula' ");
        $fila = $this->bd->getFila();
        $pelicula = new Pelicula();
        $pelicula->setObjeto($fila);
        return $pelicula;
    }

    //devuelve la pelicula segun la sala 
    function getPeliculaSala($sala) {
        if ($this->bd->setConsulta("select * from Pelicula where salaProyeccion='" . $sala . "'")) {
            $fila = $this->bd->getFila();
            $pelicula = new Pelicula();
            $pelicula->setObjeto($fila);
            return $pelicula;
        }
    }

    //devuelve la pelicula segun el idPelicula 
    function getPeliculaIdPelicula($idPelicula) {
        $this->bd->setConsulta("select * from Pelicula where idPelicula='$idPelicula' ");
        $fila = $this->bd->getFila();
        $pelicula = new Pelicula();
        $pelicula->setObjeto($fila);
        return $pelicula;
    }

    //devuelve la pelicula segun el idPelicula 
    function getPeliculaJuan($idPelicula) {
        $fila = $this->bd->setConsulta("select * from Pelicula where idPelicula='$idPelicula' ");
        $pelicula = new Pelicula();
        $pelicula->setObjeto($fila);
        return $pelicula;
    }

    //devuelve la pelicula segun el nombre y el director
    function getPeliculaNombrePeliculaDirector($nombrePelicula, $director) {
        $this->bd->setConsulta("select * from Pelicula where nombrePelicula='$nombrePelicula'
                              and director='$director' ");
        $fila = $this->bd->getFila();

        $pelicula = new Pelicula();
        $pelicula->setObjeto($fila);
        return $pelicula;
    }

    //devuelve la pelicula segun la sala y la fecha
    function getFotoPeliculaSalaFecha($sala, $fecha) {
      //  $this->bd->setConsulta("select * from Pelicula where salaProyeccion='$sala'
      //                          and fechaInicio='$fecha' ");
       // $fila = $this->bd->getFila();
       $fila=$this->bd->setConsulta("select * from Pelicula where salaProyeccion='$sala'
                                and fechaInicio='$fecha' ");
        $pelicula = new Pelicula();
        $pelicula->setObjeto($fila);
        return $pelicula;
    }
//Devuelve las peliculas que hay en cartelera ahora mismo para la pÃ¡gina de index
	function obtenerCarteleraSala($sala){
                $this->bd->setConsulta("SELECT * FROM Pelicula WHERE salaProyeccion='$sala' AND fechaFin > CURDATE() AND DATEDIFF(fechaInicio,CURDATE())<30;");
           	$fila = $this->bd->getFila();
                $pelicula = new Pelicula();
                $pelicula->setObjeto($fila);
		//$pelicula->setEstrenos($fila);
		return $pelicula;
	}
    //borra la pelicula segun el idPelicula
    function borrarIdPelicula($idPelicula) {
        if ($this->bd->setConsulta("delete from Pelicula where idPelicula='$idPelicula"))
            return true;
        return false;
    }

    //borra la pelicula segun el nombrePelicula y el director
    function borrarPeliculaNombreDirector($nombrePelicula, $director) {
        if ($this->bd->setConsulta("delete from Pelicula where nombrePelicula='$nombrePelicula' 
                                    and director='$director'"))
            return true;
        return false;
    }

    //borra la pelicula segun condicion aleatoria
    function borrarPeliculaCondicionAleatoria($condicion) {
        if ($this->bd->setConsulta("delete from Pelicula where '$condicion'"))
            return true;
        return false;
    }

    //actualiza los datos de unapelicula segun el idPelicula
    function setIdPelicula($objetopelicula, $idpelicula) {
        $sql = "update Pelicula set nombrePelicula='" . $objetopelicula->getNombrePelicula() . "',
                                    descripcion='" . $objetopelicula->getDescripcion() . "',
                                    foto='" . $objetopelicula->getFoto() . "',
                                    genero='" . $objetopelicula->getGenero() . "',
                                    director='" . $objetofichar->getDirector() . "',
                                    interpretes='" . $objetofichar->getInterpretes() . "',
                                    calificacion='" . $objetopelicula->getCalificacion() . "',
                                    trailler='" . $objetofichar->getTrailler() . "',
                                    duracion='" . $objetofichar->getDuracion() . "',
                                    tresD='" . $objetopelicula->getTresD() . "',
                                    vo='" . $objetofichar->getVo() . "',
                                    vos='" . $objetofichar->getVos() . "',
                                    vd='" . $objetofichar->getVd() . "',
                                    trentaycincomm='" . $objetofichar->getTrentaycincomm() . "',
                                    digital='" . $objetopelicula->getDigital() . "',
                                    fechaInicio='" . $objetofichar->getFechaInicio() . "',
                                    fechaFin='" . $objetofichar->getFechaFin() . "',
                                    salaProyeccion='" . $objetopelicula->getSalaProyeccion() . "'
                                    where idPelicula = '$idpelicula' ";

        $this->bd->setConsulta($sql);
    }

    //inserta una pelicula en la bd
    function insertarpelicula($pelicula) {
        $sql = "insert into Pelicula values (null,
                '" . $pelicula->getNombrePelicula() . "',
                '" . $pelicula->getDescripcion() . "',
                '" . $pelicula->getFoto() . "',
                '" . $pelicula->getGenero() . "',
                '" . $pelicula->getDirector() . "',
                '" . $pelicula->getInterpretes() . "',
                '" . $pelicula->getCalificacion() . "',
                '" . $pelicula->getTrailler() . "',
                '" . $pelicula->getDuracion() . "',
                '" . $pelicula->getTresD() . "',
                '" . $pelicula->getVo() . "',
                '" . $pelicula->getVod() . "',
                '" . $pelicula->getVd() . "',
                '" . $pelicula->getTrentaycincomm() . "',
                '" . $pelicula->getDigital() . "',
                '" . $pelicula->getFechaInicio() . "',
                '" . $pelicula->getFechaFin() . "',
                '" . $pelicula->getSalaProyeccion() . "'
        )";
        $this->bd->setConsulta($sql);
    }

    //escribe tabla de las peliculas 
    function escribePelicula() {
        echo "<div>";
        echo "<h3>Edición Tabla Peliculas </h3>";
        echo "<table id=\"pelicula\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>IdPelicula</th>";
        echo "<th>Titulo</th>";
        echo "<th>Descripcíon</th>";
        echo "<th>Foto</th>";
        echo "<th>Genero</th>";
        echo "<th>Director</th>";
        echo "<th>Interpretes</th>";
        echo "<th>Calificación/th>";
        echo "<th>Trailler</th>";
        echo "<th>Duración</th>";
        echo "<th>3 D</th>";
        echo "<th>V.O.</th>";
        echo "<th>V.O.S.</th>";
        echo "<th>V.Digital</th>";
        echo "<th>35 Mm</th>";
        echo "<th>Digital</th>";
        echo "<th>Fecha Inicio</th>";
        echo "<th>Fecha Fin</th>";
        echo "<th>Sala de Proyeccion<th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $estilofila = "par";
        //hace la consulta
        $this->bd->setConsulta("select * from Pelicula");
        //recoge el resultado
        while ($fila = $this->bd->getFila()) {
            $pelicula = new Pelicula();
            $pelicula->setObjeto($fila);
            //escribe el empleado
            echo "<tr class=\"$estilofila\">";
            echo "<td>" . $pelicula->getIdPelicula() . "</td>";
            echo "<td>" . $pelicula->getDescripcion() . "</td>";
            echo "<td>" . $pelicula->getFoto() . "</td>";
            echo "<td>" . $pelicula->getGenero() . "<td>";
            echo "<td>" . $pelicula->getDirector() . "</td>";
            echo "<td>" . $pelicula->getInterpretes() . "</td>";
            echo "<td>" . $pelicula->getCalificacion() . "</td>";
            echo "<td>" . $pelicula->getTrailer() . "<td>";
            echo "<td>" . $pelicula->getTresD() . "</td>";
            echo "<td>" . $pelicula->getVo() . "</td>";
            echo "<td>" . $pelicula->getVos() . "</td>";
            echo "<td>" . $pelicula->getTrentaycincomm() . "<td>";
            echo "<td>" . $pelicula->getDigital() . "</td>";
            echo "<td>" . $pelicula->getFechaInicio() . "</td>";
            echo "<td>" . $pelicula->getFechaFin() . "</td>";
            echo "<td>" . $pelicula->getSalaProyeccion() . "<td>";
            echo "</tr>";

            if ($estilofila == "par")
                $estilofila = "impar";
            else
                $estilofila = "par";
        }
        echo "</tbody>";
        echo "</table>";
        //permite volver al index de la web
        // echo "<a href="index.php?'><input type='button' value='Mapa'/></a>";
        echo "</div>";
    }

    function escribePeliculaPaginado($page = "", $ver = "") {
        if ($ver == "")
            $ver = 10;
        // por defecto la pagina es 0 y con visualizar 10 registros
        echo "<div id=\"peliculaPaginado\">";
        echo "<h3>Edición Tabla Paginada Pelicula </h3>";
        echo "<table id=\"pelicula\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>IdPelicula</th>";
        echo "<th>Titulo</th>";
        echo "<th>Descripcíon</th>";
        echo "<th>Foto</th>";
        echo "<th>Genero</th>";
        echo "<th>Director</th>";
        echo "<th>Interpretes</th>";
        echo "<th>Calificación/th>";
        echo "<th>Trailler</th>";
        echo "<th>Duración</th>";
        echo "<th>3 D</th>";
        echo "<th>V.O.</th>";
        echo "<th>V.O.S.</th>";
        echo "<th>V.Digital</th>";
        echo "<th>35 Mm</th>";
        echo "<th>Digital</th>";
        echo "<th>Fecha Inicio</th>";
        echo "<th>Fecha Fin</th>";
        echo "<th>Sala de Proyeccion<th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $estilofila = "par";
        //consulta
        $this->bd->setConsulta("select * from Fichar ");
        $numreg = $this->bd->getNumFiles();
        //si el resultado es mayor que 10 fichajes
        if ($numreg > 10) {
            $totalpaginas = ceil($numreg / $ver);
            if ($page < 0)
                $page = 1;
            //A VER SI ESTA BIEN FONCCIONABA POR EL VINO
            if ($page >= $totalpaginas)
                $page = $totalpaginas - 1;
            $this->bd->setConsulta("select * from Fichar limit "
                    . $page * $ver . "," . $ver);
        }else
            $totalpaginas = 1;
        //recoge el resultado
        while ($fila = $this->bd->getFila()) {
            $fichar = new Fichar();
            $fichar->setObjeto($fila);
            echo "<tr class=\"$estilofila\">";
            echo "<td>" . $pelicula->getIdPelicula() . "</td>";
            echo "<td>" . $pelicula->getDescripcion() . "</td>";
            echo "<td>" . $pelicula->getFoto() . "</td>";
            echo "<td>" . $pelicula->getGenero() . "<td>";
            echo "<td>" . $pelicula->getDirector() . "</td>";
            echo "<td>" . $pelicula->getInterpretes() . "</td>";
            echo "<td>" . $pelicula->getCalificacion() . "</td>";
            echo "<td>" . $pelicula->getTrailer() . "<td>";
            echo "<td>" . $pelicula->getTresD() . "</td>";
            echo "<td>" . $pelicula->getVo() . "</td>";
            echo "<td>" . $pelicula->getVos() . "</td>";
            echo "<td>" . $pelicula->getTrentaycincomm() . "<td>";
            echo "<td>" . $pelicula->getDigital() . "</td>";
            echo "<td>" . $pelicula->getFechaInicio() . "</td>";
            echo "<td>" . $pelicula->getFechaFin() . "</td>";
            echo "<td>" . $pelicula->getSalaProyeccion() . "<td>";
            echo "</tr>";

            if ($estilofila == "par")
                $estilofila = "impar";
            else
                $estilofila = "par";
        }
        echo "</tbody>";
        echo "</table>";
        //permite volver al inicio de la web 
        // echo "<a href='index.php?'><input type='button' value='Home'/></a>";
        echo "&nbsp";
        echo"<table class=\"index\">";
        echo "<tr>";
        echo "<td><a href='?page=0&ver=10'>&nbsp;&nbsp;&nbsp;&lt;&lt;
            &nbsp;</a></td>";

        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";

        if ($page > 0) {
            echo "<td><a href='?pagina=pag12&page=" . ($page - 1) . "&ver=5'>&nbsp;
                                                &nbsp;&nbsp;&lt;&nbsp;</a></td>";
        }
        else
            echo "<td><a href='#'>&nbsp;&nbsp;&nbsp;&lt;&nbsp;</a></td>";

        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;Pagina Nº
                <input type=\"text\" size=\"2\" value='" . ($page + 1) . "' readonly=\"readonly\"/>
                De<input type=\"text\" size=\"2\" value='" . ($totalpaginas) . "'/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";

        if ($page < $totalpaginas - 1)
            echo "<td><a href='?page=" . ($page + 1) . "&ver=5'>&nbsp;
                                                &nbsp;&nbsp;&gt;&nbsp;</a></td>";
        else
            echo "<td><a href='#'>&nbsp;&nbsp;&nbsp;&gt;&nbsp;</a></td>";

        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";

        echo "<td><a href='?page=" . ($totalpaginas - 1) . "&ver=5'>
                                        &nbsp;&nbsp;&nbsp;&gt;&gt;&nbsp;</a></td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    }

    function escribeSelectPelicula($condicion = "") {
        echo "<select name=\"nombre\" id=\"nombre\">";
        echo"<option value=\"\">Selecciona Fichaje</option>";
        $this->bd->setConsulta("select * from Pelicula  $condicion");
        while ($fila = $this->bd->getFila()) {
            $pelicula = new Pelicula();
            $pelicula->setObjeto($fila);
            echo "<option value=\"" . $pelicula->getNombrePelicula() . "\">";
            echo $pelicula->getNombrePelicula();
            echo "</option>";
        }
        echo "</select>";
    }

    //si quiere una consulta por ajax
    function mostrarAjax($condicion = "") {
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<peliculas>';
        $this->bd->setConsulta("select * from Pelicula $condicion");
        while ($fila = $this->bd->getFila()) {
            echo "<pelicula>";
            $pelicula = new Pelicula();
            $pelicula->setObjeto($fila);
            echo "<idPelicula>" . $pelicula->getIdPelicula() . "</idPelicula>";
            echo "<nombrePelicula>" . $pelicula->getNombrePelicula() . "</nombrePelicula>";
            echo "<descripcion>" . $pelicula->getDescripcion() . "</descripcion>";
            echo "<foto>" . $pelicula->getFoto() . "</foto>";
            echo "<genero>" . $pelicula->getGenero() . "</genero>";
            echo "<director>" . $pelicula->getDirector() . "</director>";
            echo "<interpretes>" . $pelicula->getInterpretes() . "</interpretes>";
            echo "<calificacion>" . $pelicula->getCalificacion() . "</calificacion>";
            echo "<trailler>" . $pelicula->getTrailer() . "</trailler>";
            echo "<duracion>" . $pelicula->getDuracion() . "</duracion>";
            echo "<tresD>" . $pelicula->getTresD() . "</tresD>";
            echo "<vo>" . $pelicula->getVo() . "</vo>";
            echo "<vos>" . $pelicula->getVos() . "</vos>";
            echo "<vd>" . $pelicula->getVd() . "</vd>";
            echo "<trentaycincomm>" . $pelicula->getTrentaycincomm() . "</trentaycincomm>";
            echo "<digital>" . $pelicula->getDigital() . "</digital>";
            echo "<fechaInicio>" . $pelicula->getFechaInicio() . "</fechaInicio>";
            echo "<fechaFin>" . $pelicula->getFechaFin() . "</fechaFin>";
            echo "<salaProyeccion>" . $pelicula->getSalaProyeccion() . "</salaProyeccion>";
            echo "</pelicula>";
        }
        echo '</peliculas>';
    }
    	//Devuelve los estrenos en un intervalo de 7 dÃ­as
	function obtenerEstrenos() {
		$fila = $this->bd->setConsulta("SELECT idPelicula,nombrePelicula,descripcion,cartel,genero,interpretes,salaProyeccion FROM Pelicula WHERE DATEDIFF(fechaInicio,CURDATE())<=7 AND salaproyeccion IS NOT NULL AND fechaFin>CURDATE() LIMIT 3;");
		$pelicula = new Pelicula();
		$pelicula->setEstrenos($fila);
		return $pelicula;
	}

	//Devuelve las peliculas que se proyectarÃ¡n proximamente
	//Esto es si la fecha de inicio de proyeccion es mayor que la fecha actual en 30 dÃ­as
	function obtenerProximos() {
		$fila = $this->bd->setConsulta("SELECT idPelicula,nombrePelicula,descripcion,foto,genero,interpretes FROM Pelicula WHERE DATEDIFF(fechaInicio,CURDATE())>30 LIMIT 3;");
		$pelicula = new Pelicula();
		$pelicula->setProximos($fila);
		return $pelicula;
	}

    //Devuelve las peliculas que hay en cartelera ahora mismo para la pÃ¡gina de index
    function obtenerCartelera(){
           $fila = $this->bd->setConsulta("SELECT idPelicula,nombrePelicula,descripcion,foto,salaProyeccion FROM Pelicula WHERE salaProyeccion IS NOT NULL AND fechaFin > CURDATE() AND DATEDIFF(fechaInicio,CURDATE())<30 GROUP BY salaProyeccion ORDER BY salaProyeccion LIMIT 8;");
            $pelicula = new Pelicula();
            $pelicula->setCartelera($fila);
            return $pelicula;
    }

    	function getXml(){
		echo '<?xml version="1.0" encoding="utf-8"?>';
		echo '<peliculas>';
		$this->bd->setConsulta("SELECT idPelicula,nombrePelicula,cartel FROM pelicula WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= fechaInicio LIMIT 3;");
		while ($fila = $this->bd->getFila()) {
			//Obtiene las peliculas de estreno
			echo "<estrenos>";
			$pelicula = new Pelicula();
			$pelicula->setEstrenos($fila);
			echo "<idPelicula>" . $pelicula->getIdPelicula() . "</idPelicula>";
			echo "<nombrePelicula>" . $pelicula->getNombrePelicula() . "</nombrePelicula>";
			echo "<cartel>" . $pelicula->getCartel() . "</cartel>";
			echo "</estrenos>";
		}
		$this->bd->setConsulta("SELECT idPelicula,nombrePelicula,foto FROM Pelicula WHERE DATEDIFF(fechaInicio,CURDATE())>30 LIMIT 4;");
		while ($fila = $this->bd->getFila()) {
			//Obtiene las peliculas de estreno
			echo "<proximos>";
			$pelicula = new Pelicula();
			$pelicula->setProximos($fila);
			echo "<idPelicula>" . $pelicula->getIdPelicula() . "</idPelicula>";
			echo "<nombrePelicula>" . $pelicula->getNombrePelicula() . "</nombrePelicula>";
			echo "<foto>" . $pelicula->getFoto() . "</foto>";
			echo "</proximos>";
		}
		echo '</peliculas>';
	}
}

?>
