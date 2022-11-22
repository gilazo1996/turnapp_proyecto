<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Turno $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="turno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Dar de baja', ['', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            /*'data' => [
                'confirm' => 'Seguro desea eliminar este turno?',
                'method' => 'post',
            ],*/
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'id_paciente',
            'id_profesional',
           // 'id_sala',
           // 'codigo_turno',
            
            'fecha_turno',
            'horario',
            //'prioridad',
            'estado',
            'ambito',
            'detalle',
        ],
    ]) ?>

</div>


<style>
    .table
    {
        color:black;
        background-color: white;
        text-align: center;
    }

    .filters
    {
        background-color: #243a40;
    }

    table>thead>tr>th>a
    {
        color:white;
    }

    table>p
    {
        color:black;
    }
    
    body {
        background-image: url("../../../css/fondo.png");
        background-attachment: fixed;
    }
</style>
