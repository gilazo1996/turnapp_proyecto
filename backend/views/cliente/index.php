<?php

use backend\models\Cliente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ClienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'options' => [
            'class' => 'colorizado',
        ],
        'columns' => [
           /* ['class' => 'yii\grid\SerialColumn'],

            'id',*/
            'dni',
            'nombre',
            'apellido',
            'email',
            'rol',
            //'fecha_nacimiento',
           /* [
                //'class' => ActionColumn::className(),
                //'urlCreator' => function ($action, Cliente $model, $key, $index, $column) {
                    //return Url::toRoute([$action, 'id' => $model->id]);
                 //}
            ],*/
        ],
    ]); ?>

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

    .colorizado table thead 
    {
        background-color: #343a40;
    }

    .h1
    {
        color:black;
    }

</style>


</div>
