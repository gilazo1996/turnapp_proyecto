<?php
//CUIDADO, CODIGO INESTABLE
if(!isset($_SESSION)) 
{ 
    session_name('s');
    session_set_cookie_params(0, '/');
    session_start(); 
} 
//CUIDADO, CODIGO INESTABLE

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

    <h2> 
        <?php 
            $mostrar=0;

            echo $_SESSION['userData']['first_name']; 
            echo "<br>";
            $conn = new mysqli('localhost', 'root', '', 'turn_app_base');
            $sql = mysqli_query($conn,"SELECT * FROM usuarios");

            $filaSql=mysqli_fetch_array($sql, MYSQLI_ASSOC);

            if ($filaSql["rol"] == "cliente")
            {
                echo "<br> Rol: CLIENTE";
                $mostrar = 1;
            }
            else 
            {
                echo "<br> ERROR, Rol: ADMIN";
            }
        ?> 
    </h2>
    
    <br>
    <p>

    <?= $is_admin = ($mostrar == 1) ? 
        Html::a('Crear Turno', ['create'], ['class' => 'btn btn-primary'])  
        : false;
    ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'showHeader' => false,
        'summary' => '',
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-hover table-borderless myTable'],
        'options' => [
            'class' => 'colorizado'
         ],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_cliente',
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
        background-color: #243a40;
        border-radius: 20px;
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
        border-radius: 20px;
    }

</style>

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