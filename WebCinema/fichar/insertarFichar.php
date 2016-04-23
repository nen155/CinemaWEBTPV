<form name="insertarFichar" action="insertarFicharTabla.php?" method="POST" enctype="multipart/form-data">
    <table border="1" width="5" cellspacing="2" cellpadding="4">
        <thead>
            <tr>
                <th colspan="2" >FICHAR PERSONAL</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Login</td>
                <td><input type="text" id="loginFichar" size="10" name="loginFichar"/></td>
            </tr>
            <tr>
                <td>Fichaje Entrada</td>
                <td><input type="text" id="ficharEntrada" size="50" name="ficharEntrada"/></td>
            </tr>

            <tr>
                <td>Fichaje Salida</td>
                <td><input type="text" id="ficharSalida" size="50" name="ficharSalida"/></td>
            </tr>
        </tbody>
    </table>
    <input type="Submit" value="Enviar" name="insertarFichar" />&nbsp;&nbsp;<a href="borrarFichar.php?loginFichar=<?php echo $_GET["loginFichar"] ?> "><input  type="button" value="Cancelar"/></a>
</form>
