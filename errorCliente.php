<?php
    $output = '<a href="backend/web/site/indexadmin" class="btn btn-primary">Ir a la pagina principal</a>';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Turnapp - Error</title>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

</head>
<body>
<div class="container"></div>
<div class="container colGray">
<div class="jumbotron text-center bg-transparent">  
    <div class="card-header"><h1 class="display-4 text-white">Error, la pagina es solo para clientes</h1></div>
    <h2 class="lead text-white"></h2>
</div>
</div>
<div class="containera">
        <?php echo $output; ?>
</div>
</body>
<footer class="footer mt-auto py-3 text-muted" id="footer">
    <div class="container">
        <div class="row">
        <p class="float-start">&copy; Turnapp 2022</p></div>

    </div>
</footer>
</html>

<style>
    body {
        background-image: url("css/fondo.png");
        background-attachment: fixed;
    }

.containera {
  font-family: arial;
  font-size: 24px;
  margin: 10% 0px 0px 0px;
  width: 350px;
  height: 200px;
  position: relative;
  top: 10%;
  left: 45%;
}

</style>