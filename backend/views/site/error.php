<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

//$this->title = $name;
$this->title = "No Iniciado";
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode("Seccion en Desarrollo")) ?>
        <?php //nl2br(Html::encode($message)) ?>
    </div>

    <?= Html::img('@web/img/foquita_loca.png', ['alt' => 'My logo', 'width'=>'256px']) ?>

    <br><br>
    <p>
        <!-- The above error occurred while the Web server was processing your request. -->
        La seccion a la que intenta acceder aun no se encuentra disponible hasta llegar a su
        correspondiente etapa de desarrollo y por consiguiente su testeo.
    </p>
    <p>
        <!-- Please contact us if you think this is a server error. Thank you. -->
        Vuelva a inicio.
    </p>

</div>


<style>
    body {
        background-image: url("../../../css/fondo.png");
        background-attachment: fixed;
        color: white;
    }

    .colorizado table thead 
    {
        background-color: #343a40;
    }

    h1
    {
        color: black;
    }
</style>

