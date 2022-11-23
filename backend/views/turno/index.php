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
        <?= Html::a('Crear Turno', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'showHeader' => false,
        'summary' => '',
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'colorizado',
         ],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_paciente',
           // 'id_profesional',
            //'id_sala',
            //'codigo_turno',
            'fecha_turno',
            'detalle',
            //'prioridad',
            'estado',
            //No results found.
            [
                //'class' => ActionColumn::className(),
                'class' => 'yii\grid\ActionColumn',
                //'header'=>"Ver",
                'template' => '{view}',
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
        background-color: white;
        text-align: center;
    }

    .filters
    {
<<<<<<< HEAD
        background-color: #243a40;
=======
        background-color: green;
>>>>>>> login2
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

    .colorizado table thead 
    {
<<<<<<< HEAD
        background-color: #343a40;
=======
        color:green;
>>>>>>> login2
    }

</style>
