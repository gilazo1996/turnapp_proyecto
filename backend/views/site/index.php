<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
/** @var yii\web\View $this */

//include "../../css/defecto.css" ;
//$this->registerCssFile("../../css/defecto.css");


$this->title = Yii::$app->name;
//echo $_SESSION['userData'];
?>

<?php //var_dump(Url::toRoute(["turno/index"])); die; ?>

<div class="site-index" style="margin-bottom: 0%;">

    <div class="jumbotron text-center bg-transparent" style="padding-bottom: 0%;">
        <h1 class="display-4">Bienvenido! <?php echo $_SESSION['userData']['first_name']; ?></h1>

        <p class="lead">Sistema y Gestión de Turnos.</p>
    </div>

</div>

<div class="text-center bg-transparent md-col-3"
    style="flex-wrap:wrap; display:flex; justify-content:center; align-items:center">

    <div class="card" style="height:220px; width:300px; margin:3%; background-color: rgb(50,58,64);">
        <div class="card-header">
            <h4 class="card-title text-white"> CREAR TURNO </h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->
            <p class="card-text text-white"> Realice un nuevo turno que necesite.</p>
        </div>
        <a href="<?php echo Url::toRoute(["turno/create"]);?>" class="btn btn-primary">Crear turno</a>
    </div>
    <!--////////////////////////////////////////////////////////////////////////////////////-->
    <div class="card" style="height:220px; width:300px; margin:3%; background-color:rgb(50,58,64);">
        <div class="card-header">
            <h4 class="card-title text-white"> MIS TURNOS </h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->
            <p class="card-text text-white"> Visualice los turnos ya agendados.</p>
        </div>
        <a href="<?php echo Url::toRoute(["turno/index"]);?>" class="btn btn-primary">Ver mis turnos</a>
    </div>
    <!--////////////////////////////////////////////////////////////////////////////////////-->
    <div class="card" style="height:220px; width:300px; margin:3%; background-color: rgb(50,58,64);">
        <div class="card-header">
            <h4 class="card-title text-white"> CALENDARIO </h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->
            <p class="card-text text-white"> Visualice los turnos en modo calendario.</p>
        </div>
        <a href="<?php echo Url::toRoute(["*"]);?>" class="btn btn-primary">Ver</a>
    </div>

</div>

<style>
    body {
        background-image: url("../../css/fondo.png");
        background-attachment: fixed;
    }
</style>

<!-- <div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Bienvenido!</h1>

        <p class="lead">Sistema y Gestión de Turnos.</p>

        <p></p>
        <p><a class="btn btn-lg btn-primary col-5" href="<?php echo Url::toRoute(["producto/index"]);?>">Lista de productos</a></p>
        <p><a class="btn btn-lg btn-success col-5" href="<?php echo Url::toRoute(["venta/index"]);?>">Ventas</a></p>
        <p><a class="btn btn-lg btn-warning col-5" href="<?php echo Url::toRoute(["venta/reporte"]);?>">Reportes</a></p>
    </div>

</div> -->