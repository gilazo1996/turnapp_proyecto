<?php
require "../../rbac/sesion.php";
$esInvitado = sesion();
$mostrar=0;

use backend\models\Turno;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;

require "../../rbac/control.php";
require "../../rbac/errores.php";

/** @var yii\web\View $this */
/** @var backend\models\TurnoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\data\ActiveDataProvider;

$this->title = 'Turnos';
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

<div class="turno-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-striped table-hover table-borderless myTable'],
        'options' => [
            'class' => 'colorizado',
         ],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'id_cliente',
            'cliente',
            'nombre_profesional',
            //'id_sala',
            //'codigo_turno',
            'detalle',
            'fecha_turno',
            'prioridad',
            'estado',
            //No results found.
            [
                'class' => ActionColumn::className(),
                //'header'=>"Ver",
                'template' => '{view} {update}',
                'urlCreator' => function ($action, Turno $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>

<?php } ?>

<style>
    .table {
        color: black;
        background-color: white;
        text-align: center;
    }

    .filters {
        background-color: #243a40;
    }

    table>thead>tr>th>a {
        color: white;
    }

    table>p {
        color: black;
    }

    body {
        background-image: url("../../../css/fondo.png");
        background-attachment: fixed;
    }

    .colorizado table thead {
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
    function changeColor() {
        var td = $(".myTable" + " td");
        $.each(td, function (i) {

            if ($(td[i]).html() == 'pendiente') {
                $(td[i]).addClass("blue");
            } else if ($(td[i]).html() == 'cancelado') {
                $(td[i]).addClass("red");
            } else if ($(td[i]).html() == 'finalizado') {
                $(td[i]).addClass("green");
            }

        });
    }

    changeColor();
</script>
<!--Colorear tabla-->