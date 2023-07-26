<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Turno $model */

$this->title = 'Crear Nuevo Turno';
$this->params['breadcrumbs'][] = ['label' => 'Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
