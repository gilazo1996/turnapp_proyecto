<?php
require "../../rbac/sesion.php";
$esInvitado = sesion();
$mostrar=0;

use yii\helpers\Url;
use yii\bootstrap4\Html;
/** @var yii\web\View $this */

require "../../rbac/control.php";
require "../../rbac/errores.php";

$this->title = Yii::$app->name;
?>

<?php //rbac, redireccion si el usuario no es admin
if (isset($_SESSION['userData']))
{
    $id_google = $_SESSION['userData']['oauth_uid'];
    $mostrar = mostrar($id_google); 
    if ($mostrar==1) errorAdmin();
}
?>

<?php if ( $mostrar==2 ) { ?>

<div class="site-index" style="margin-top: 0%;">

    <div class="jumbotron text-center bg-transparent" style="padding-bottom: 0rem; padding: 0.5rem 0rem;">
        <h1 class="display-4">Panel de administracion</h1>
    </div>

</div>

<div class="text-center bg-transparent md-col-3" style="flex-wrap:wrap; display:flex; justify-content:center; align-items:center">

    <div class="card" style="height:220px; width:300px; margin:3%; background-color:rgb(50,58,64);">
        <div class="card-header">
            <h4 class="card-title text-white"> TURNOS </h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->
            <p class="card-text text-white"> Visualice los turnos agendados.</p>
        </div>
        <a href="<?php echo Url::toRoute(["turno/turnosadmin"]);?>" class="btn btn-primary">Ver turnos</a>
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
<!--////////////////////////////////////////////////////////////////////////////////////-->
    <div class="card" style="height:220px; width:300px; margin:3%; background-color: rgb(50,58,64);">
            <div class="card-header">
            <h4 class="card-title text-white"> LECTOR QR </h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->
            <p class="card-text text-white"> Escanee el codigo QR para validar turnos.</p>
        </div>
        <a href="<?php echo Url::toRoute(["*"]);?>" class="btn btn-primary">Ver</a>
    </div>
    
</div>
<!------------------------------------------------------------------------------------------------------------->
<div class="text-center bg-transparent md-col-3" style="flex-wrap:wrap; display:flex; justify-content:center; align-items:center">

    <div class="card" style="height:220px; width:300px; margin:3%; background-color:rgb(50,58,64);">
        <div class="card-header">
            <h4 class="card-title text-white"> REPORTES </h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->
            <p class="card-text text-white"> Controle la lista de turnos creados.</p>
        </div>
        <a href="<?php echo Url::toRoute(["turno/turnosreport"]);?>" class="btn btn-primary">Ver reporte</a>
    </div>
<!--////////////////////////////////////////////////////////////////////////////////////-->
    <div class="card" style="height:220px; width:300px; margin:3%; background-color: rgb(50,58,64);">
        <div class="card-header">
            <h4 class="card-title text-white"> LISTA DE USUARIOS </h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->
            <p class="card-text text-white"> Controle la lista de usuarios.</p>
        </div>
        <a href="<?php echo Url::toRoute(["cliente/index"]);?>" class="btn btn-primary">Ver</a>
    </div>
<!--////////////////////////////////////////////////////////////////////////////////////-->
    <div class="card" style="height:220px; width:300px; margin:3%; background-color: rgb(50,58,64);">
            <div class="card-header">
            <h4 class="card-title text-white"> ASIGNAR PROVEEDORES </h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->
            <p class="card-text text-white"> Gestione rol de usuarios.</p>
        </div>
        <a href="<?php echo Url::toRoute(["*"]);?>" class="btn btn-primary">Ver</a>
    </div>
    
</div>

<?php } ?>

<style>
    body {
        background-image: url("../../../css/fondo.png");
        background-attachment: fixed;
    }
    h1
    {
        color: black;
    }
</style>