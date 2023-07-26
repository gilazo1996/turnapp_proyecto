<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

//$this->title = $name;
$this->title = "Error";
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode("Uy 404, no existe la pagina o el framework se rompio :(")) ?>
        <?php //nl2br(Html::encode($message)) ?>
    </div>

    <?= Html::img('@web/img/meme_error.jpg', ['alt' => 'My logo', 'width'=>'512px']) ?>

    <br><br>
    <p>
        <!-- The above error occurred while the Web server was processing your request. -->
    </p>
    <p>
        <!-- Please contact us if you think this is a server error. Thank you. -->
    </p>

</div>


<style>
    body {
        background-image: url("../../../css/fondo.png");
        background-attachment: fixed;
        color: white;
    }

    h1
    {
        color: black;
    }
</style>

