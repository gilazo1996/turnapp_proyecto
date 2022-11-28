<?php
require "../../rbac/sesion.php";
$esInvitado = sesion();
$mostrar=0;

use backend\models\Turno;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\SqlDataProvider;

require "../../rbac/control.php";
require "../../rbac/errores.php";
require "../../rbac/conexion.php";

/** @var yii\web\View $this */
/** @var backend\models\TurnoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\data\ActiveDataProvider;

$this->title = 'Turnos';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php //rbac, redireccion si el usuario no es cliente
if (isset($_SESSION['userData']))
{
    $id_google = $_SESSION['userData']['oauth_uid'];
    $mostrar = mostrar($id_google);
    $tabla_id =  $id_google;
    if ($mostrar==2) errorCliente();
}
?>

<?php if ( $mostrar==1 ) { ?>

<div class="turno-index">

    <h1><?= Html::encode($this->title) ?></h1> <br>
    <?= Html::a('Crear Turno', ['create'], ['class' => 'btn btn-primary'])?> <br> <br>

<?php
// Below is optional, remove if you have already connected to your database.
//$mysqli = mysqli_connect('localhost', 'root', '', 'tablesort');
$mysqli=mysqli_connect("localhost","root","","turn_app_base");


// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('fecha_turno','detalle','estado','accion');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// Get the result...
if ($result = $mysqli->query('SELECT * FROM turno ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>

	<html>
		<head>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">	
		</head>
		<body>
			<table class="spacing-table">
				<tr >
					<th><a href="index?column=fecha_turno&order=<?php echo $asc_or_desc; ?>">fecha_turno<i class="fas fa-sort<?php echo $column == 'fecha_turno' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="index?column=detalle&order=<?php echo $asc_or_desc; ?>">detalle<i class="fas fa-sort<?php echo $column == 'detalle' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="index?column=estado&order=<?php echo $asc_or_desc; ?>">estado<i class="fas fa-sort<?php echo $column == 'estado' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th>Accion</th>
                </tr>
				
				<?php while ($row = $result->fetch_assoc()): ?>
                    <?php if ( $row['oauth_uid']==$tabla_id ) { ?>
                            <td  <?php echo $column == 'fecha_turno' ? $add_class : ''; ?>><?php echo $row['fecha_turno']; ?></td> 
                            <td<?php echo $column == 'detalle' ? $add_class : ''; ?>><?php echo $row['detalle']; ?></td>
                            <td<?php echo $column == 'estado' ? $add_class : ''; ?>><?php echo $row['estado']; ?></td>
                            <td<?php echo $column == 'accion' ? $add_class : ''; ?>><?php echo '<a href="view?id='.$row['id'].'">'.'ver turno'.'</a>'; ?></td>
                        </tr>
                <?php } ?>

				<?php endwhile; ?>
			</table>

		</body>
	</html>
	<?php
	$result->free();
}
?>

</div>

<?php } ?>

<style>
    .spacing-table {
  font-family: 'Helvetica', 'Arial', sans-serif;
  font-size: 1em;
  border-collapse: separate;
  table-layout: fixed;
  width: 100%;
  text-align: center;

}

.spacing-table td {
  width: 50%;
  color: #454545;
  padding: 25px;
  margin: 50px;
  border-spacing: 2em;
}
.spacing-table tr {
    border-spacing: 2em;
    margin: 50px;
}

.spacing-table td:first-child {
  border-radius: 15px 0 0 15px;
  border-spacing: 2em;
}
.spacing-table td:last-child {
  border-right-width: 3px;
  border-radius: 0 15px 15px 0;
  margin: 50px;
  border-spacing: 2em;
}
.spacing-table thead {
  display: table;
  table-layout: fixed;
  width: 100%;
}
.spacing-table tbody {
  display: table;
  table-layout: fixed;
  width: 100%;
  border-spacing: 0 30px;
}

.spacing-table tr {
    background: white;
}

.spacing-table tr:hover, tr:active {
    background: #D6DBDF;
}

.spacing-table th {
  padding: 10px;
  border-spacing: 1em;
  background: #D6EAF8;

}
</style>

<style>
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

tr:nth-child(even) {
    td {
     background-color: #D5F5E3;

    }
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
        //var td = $(".myTable" + " td");
        var td = $(" td");
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