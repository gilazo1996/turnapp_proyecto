<?php
    $conexion=mysqli_connect('localhost','root','','turn_app_base');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnapp - estado de turno</title>
</head>

<body>

    <div style="font-size: 28px">

       
<h1>Cambiar estado del turno</h1>
    <h2>(Mostrando ultimo turno)</h2>


        <table>
            <tr>
                <td>id</td>
                <td>cliente</td>
                <td>fecha</td>
                <td>estado</td>
            </tr>

            <tr>
                <td>12</td>
                <td>David Cardozo</td>
                <td>2023-04-01</td>
                <td>pendiente</td>
            </tr>

        </table>

<br>

        <label for="estado">estado</label>

        <select name="estado" id="estado">
        <option value="estado" selected>seleccione un estado</option>
        <option value="finalizado">Finalizado</option>
        <option value="cancelado">Cancelado</option>
        </select>

<br>

    <a href="http://localhost/turnapp_proyecto/backend/web/site/indexadmin">
        <input type="button" value="Guardar" />
    </a>

    </div>

<style>
    table,td {
	border: 1px solid black;
    padding: 7px;
}
</style>

</body>

</html>