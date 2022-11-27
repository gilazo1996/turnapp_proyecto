<?php
require "../../rbac/sesion.php";
$esInvitado = sesion();
$mostrar=0;

use backend\models\Cliente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

require "../../rbac/control.php";
require "../../rbac/errores.php";

/** @var yii\web\View $this */
/** @var backend\models\ClienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php //rbac, redireccion si el usuario no es admin
if (isset($_SESSION['userData']))
{
    $id_google = $_SESSION['userData']['oauth_uid'];
    $mostrar = mostrar($id_google); 
    if ($mostrar==1) errorAdmin();
}
?>

<?php if ( $mostrar==2 ) { ?>

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
        'tableOptions' => ['class' => 'table table-striped table-hover table-borderless myTable'],
        'options' => [
            'class' => 'colorizado',
        ],
        'columns' => [
           /* ['class' => 'yii\grid\SerialColumn'],

            'id',*/
            /*'dni',*/
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

<?php } ?>

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

.yellow {
  background-color: #FCF3CF !important;
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
        
            if ($(td[i]).html() == 'Proveedor') {
            $(td[i]).addClass("blue");
            } else if ($(td[i]).html() == 'Admin'){
            $(td[i]).addClass("yellow");
            }else if ($(td[i]).html() == 'Cliente'){
            $(td[i]).addClass("green");
            }
            
        });
    }

changeColor();
</script>
<!--Colorear tabla-->