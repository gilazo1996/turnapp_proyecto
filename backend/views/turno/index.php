<?php

use backend\models\Turno;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TurnoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Turnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <br>
    <p>
        <?= Html::a('Crear nuevo Turno', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_paciente',
            'id_profesional',
            'id_sala',
            //'codigo_turno',
            'detalle',
            'fecha_turno',
            //'prioridad',
            'estado',
            //No results found.
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Turno $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>

<style>
    .table
    {
        color:black;
    }

    .filters
    {
        background-color: gray;
    }

    table>thead>tr>th>a
    {
        color:black;
    }

    table>a
    {
        color:gray;
    }
</style>

<script></script>
