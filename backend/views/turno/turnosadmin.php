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
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;

/** @var yii\web\View $this */
/** @var backend\models\TurnoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\data\ActiveDataProvider;

$this->title = 'Turnos';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php 
            $mostrar=0;
            $id = $_SESSION['userData']['oauth_uid'];

            echo "<br>";
            $conn = new mysqli('localhost', 'root', '', 'turn_app_base');
            $sql = mysqli_query($conn," SELECT * FROM usuarios WHERE oauth_uid = '$id' ");

            $filaSql=mysqli_fetch_array($sql, MYSQLI_ASSOC);

            if ($filaSql["rol"] == "admin")
            {
                echo " <h1> USUARIO: " . $_SESSION['userData']['first_name'].
                "<br> ROL: ADMIN </h1>"; 

                $mostrar=1;
            }
            else 
            {
                echo " <h1> USUARIO: " . $_SESSION['userData']['first_name'].
                "<br> ROL: CLIENTE <br>
                ERROR: PAGINA DE ADMIN</h1>"; 

                echo "<h1>" . $filaSql["rol"] .
                "<br></h1>"; 

            }
        ?> 


<?php if ( $mostrar==1 ) { ?> 


<div class="turno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <br>
    <p>
        <?php //Html::a('Crear nuevo Turno', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    
<?php

$clave = "22";


//$sql = new SqlDataProvider(['sql' => 'SELECT * FROM turno ']);
//$sql = new SqlDataProvider(['sql' => 'SELECT * FROM turno WHERE oauth_uid = @clave']);
//$sql = 'SELECT * FROM turno';
//$sql = 'SELECT * FROM turno WHERE oauth_uid = @clave';
//$sql = 'SELECT * FROM turno WHERE oauth_uid = $clave';
//$sql = 'SELECT * FROM turno WHERE oauth_uid = "$clave"';
//$sql = 'SELECT * FROM turno WHERE oauth_uid = :clave';
$sql = 'SELECT * FROM turno WHERE oauth_uid = 22';
//$sql = 'SELECT * FROM turno WHERE oauth_uid = "22"';
//$sql = mysqli_query("SELECT * FROM turno WHERE oauth_uid = '$clave'");
$dataProvider = new SqlDataProvider(['sql' => $sql]);


//$sqld = mysqli_query("SELECT * FROM turno WHERE oauth_uid = '$clave'");
//var_dump($clave);
/*
  $sq = new SqlDataProvider([
    'sql' => 'SELECT Name, Title, COUNT(ArticleTags.ID) AS TagCount ' . 
             'FROM Authors ' .
             'INNER JOIN Articles ON (Authors.ID = Articles.AuthorID) ' .
             'INNER JOIN ArticleTags ON (Articles.ID = ArticleTags.ID) ' .
             'WHERE Name=:author' .
             'GROUP BY ArticleID',
    'params' => [':author' => 'Arno Slatius'],
]);
*/
?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //$sql = mysqli_query($conn," SELECT * FROM usuarios WHERE oauth_uid = '$id' "),
        //'dataProvider' => $sq,
        


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
           /* [
                'class' => ActionColumn::className(),
                //'header'=>"Ver",
                'template' => '{view}',
                'urlCreator' => function ($action, Turno $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],*/
        ],
    ]); ?>

</div>

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