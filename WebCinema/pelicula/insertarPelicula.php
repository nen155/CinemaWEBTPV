<form name="insertarPeliculaTabla" action="insertarPeliculaTabla.php?" method="POST" enctype="multipart/form-data">
    <table border="1" width="5" cellspacing="2" cellpadding="4">
        <thead>
            <tr>
                <th colspan="2" >DATOS DE LA PELICULA</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Id de la Pelicula</td>
                <td><input type="hidden" id="idPelicula" size="10" name="idPelicula"/></td>
            </tr>
            <tr>
                <td>Titulo de la Pelicula</td>
                <td><input type="text" id="nombrePelicula" size="50" name="nombrePelicula"/></td>
            </tr>

            <tr>
                <td>Descripción de la Pelicula</td>
                <td><textarea name="descripcion" rows="4" cols="38" id="descripcion" ></textarea></td>
            </tr>
            <tr>
                <td>Cartel de la pelicula</td>
                <td><input type="text" id="foto" size="50" name="foto" /></td>
                <td><input type="file" id="imagen" name="imagen"/></td>
            </tr>
            <tr>
                <td>Genero de la pelicula</td>
                <td><input type="text" id="genero" size="50" name="genero"/></td>
            </tr>
            <tr>
                <td>Director de la pelicula</td>
                <td><input type="text" id="director" name="director" size="50"/></td>
            </tr>
            <tr>
                <td>Interpretes</td>
                <td><input type="text" id="interpretes" size="50" name="interpretes" /></td>
            </tr>
            <tr>
                <td>Calificación de la pelicula</td>
                <td><input type="text" id="calificacion" size="50" name="calificacion"/></td>
            </tr>
            <tr>
                <td>Trailer de la pelicula</td>
                <td><input type="text" id="trailer" size="50" name="trailer" /></td>
            </tr>
            <tr>
                <td>Duración de la pelicula</td>
                <td><input type="text" id="genero" size="50" name="genero"/></td>
            </tr>
            <tr>
                <td>Pelicula 3D</td>
                <td><input type="text" id="tresd" name="tresd" size="5"/></td>
            </tr>
            <tr>
                <td>Versión ogirinal</td>
                <td><input type="text" id="vo" size="5" name="vo" /></td>
            </tr>
            <tr>
                <td>Versión ogirinal subtitulada</td>
                <td><input type="text" id="vos" size="5" name="vos"/></td>
            </tr>
            <tr>
                <td>Versión doblada</td>
                <td><input type="text" id="vd" size="5" name="vd"/></td>
            </tr>
            <tr>
                <td>Pelicula 35 mm</td>
                <td><input type="text" id="trentaycincomm" name="trentaycincomm" size="5"/></td>
            </tr>
            <tr>
                <td>Versión digital</td>
                <td><input type="text" id="digital" size="5" name="digital" /></td>
            </tr>
            <tr>
                <td>Fecha inicio proyección</td>
                <td><input type="text" id="fechaInicio" size="20" name="fechaInicio"/></td>
            </tr>
            <tr>
                <td>Fecha final proyección</td>
                <td><input type="text" id="fechaFin" size="20" name="fechaFin"/></td>
            </tr>
            <tr>
                <td>Sala Proyección</td>
                <td><input type="text" id="salaProyeccion" size="20" name="salaProyeccion"/></td>
            </tr>
        </tbody>
    </table>
    <input type="Submit" value="Enviar" name="insertarPeliculaTabla" />&nbsp;&nbsp;<a href="borrarPelicula.php?idPelicula=<?php echo $_GET["idPelicula"] ?> "><input  type="button" value="Cancelar"/></a>
</form>
