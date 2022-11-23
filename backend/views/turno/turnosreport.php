<?php

use backend\models\Turno;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TurnoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reporte de turnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <br>
    <p>
        <?php //Html::a('Crear nuevo Turno', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-hover table-borderless myTable'],
        'summary' => '',
        'options' => [
            'class' => 'colorizado',
         ],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cliente',
            //'id_sala',
            //'codigo_turno',
            //'detalle',
            'fecha_turno',
            'horario',
            //'prioridad',
            'nombre_profesional',
            'estado',
            //No results found.
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
</style>

<script></script>


<!--Colorear tabla-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
td:last-child {
  border-right: 0px;
}
.green {
  background-color: #D5F5E3 !important;
}

.white {
  background-color: white !important;
}

.red {
  background-color: #F5B7B1 !important;
}
.blue {
  background-color: #AED6F1 !important;
}
</style>

<script>
    function changeColor() 
    {
        var td = $(".myTable" + " td");
        $.each(td, function(i) {
        
            if ($(td[i]).html() == 'pendiente') {
            $(td[i]).addClass("blue");
            } else if ($(td[i]).html() == 'cancelado'){
            $(td[i]).addClass("red");
            }else if ($(td[i]).html() == 'finalizado'){
            $(td[i]).addClass("green");
            }
            
        });
    }

changeColor();
</script>
<!--Colorear tabla-->