<?php
require "../../rbac/sesion.php";
$esInvitado = sesion();
$mostrar;

/*
if (!session_id()) {
    session_id('s');
    session_set_cookie_params(0, "/");
    session_start();
}*/

use yii\helpers\Url;
use yii\bootstrap4\Html;
/** @var yii\web\View $this */

require "../../rbac/control.php";
require "../../rbac/errores.php";

 //rbac, redireccion si el usuario no es cliente
    /*$id_google = $_SESSION['userData']['oauth_uid'];
    $mostrar = mostrar($id_google); 
    if ($mostrar==2) errorCliente();*/


$this->title = Yii::$app->name;
?>

<?php //rbac, redireccion si el usuario no es admin
$nombre_="";
if (isset($_SESSION['userData']))
{
    $id_google = $_SESSION['userData']['oauth_uid'];
    $mostrar = mostrar($id_google); 
    if ($mostrar==2) errorCliente();
    $nombre_ = $_SESSION['userData']['first_name'];
}
?>

<div class="site-index" style="margin-bottom: 0%;">

    <div class="jumbotron text-center bg-transparent" style="padding-bottom: 0%;">
    <h1 class="display-4">Bienvenido <?php echo $nombre_; ?></h1>

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