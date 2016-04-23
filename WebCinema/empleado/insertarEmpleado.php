<form name="insertarEmpleado" action="insertarEmpleadoTabla.php?" method="POST" enctype="multipart/form-data">
    <table border="1" width="5" cellspacing="2" cellpadding="4">
        <thead>
            <tr>
                <th colspan="2" >FICHA EMPLEADO</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Login</td>
                <td><input type="text" id="login" size="50" name="login"/></td>
            </tr>
            <tr>
                <td>Clave</td>
                <td><input type="text" id="clave" size="50" name="clave"/></td>
            </tr>

            <tr>
                <td>Nombre del Empleado</td>
                <td><input type="text" id="nombre" size="50" name="nombre"/></td>
            </tr>
            <tr>
                <td>Apellidos del Empleado</td>
                <td><input type="text" id="apellidos" size="50" name="apellidos"/></td>
            </tr>

            <tr>
                <td>DNI del Empleado</td>
                <td><input type="text" id="dni" size="50" name="dni"/></td>
            </tr>
        </tbody>
    </table>
    <input type="Submit" value="Enviar" name="insertarEmpleado" />&nbsp;&nbsp;<a href="borrarEmpleado.php?login=<?php echo $_GET["login"] ?> "><input  type="button" value="Cancelar"/></a>
</form>
