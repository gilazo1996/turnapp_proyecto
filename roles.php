<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turnapp - roles</title>
</head>
<body>

<div style="font-size: 32px">

<h1 >Cambio de rol - Turnapp</h1>

<h2>
  <label for="usuario">Usario</label>

  <select name="usuario" id="usuario">
    <option value="defecto" selected>seleccione un usuario</option>
    <option value="ivan">PEREZ, Ivan</option>
    <option value="esther">BONFIRE, esther</option>
    <option value="david">David Cardozo</option>
  </select>

<br>

  <label for="rol">Rol</label>

  <select name="rol" id="rol">
    <option value="rol" selected>seleccione un rol</option>
    <option value="cliente">Cliente</option>
    <option value="proveedor">Proveedor</option>
  </select>
</h2>

<a href="http://localhost/turnapp_proyecto/backend/web/site/indexadmin">
        <input type="button" value="Guardar" />
    </a>

</div>



</body>
</html>