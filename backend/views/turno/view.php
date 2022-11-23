<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Turno $model */

$this->title = "Turno: ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="turno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'cliente',
            //'id_profesional',
            'nombre_profesional',
           // 'id_sala',
           // 'codigo_turno',
            
            'fecha_turno',
            'horario',
            //'prioridad',
            'ambito',
            'estado',
        ],
    ]) ?>

</div>



<!--HTML FORMULARIO POPUP-->

<!-- A button to open the popup form -->
<button class="btn btn-danger" onclick="openForm()">Dar de baja</button>

<!-- The form -->
<div class="form-popup" id="myForm" onfocus="onFocus()" onfocusout="onFocusOut()">
  <form action="/action_page.php" class="form-container">
    <h1>Baja de turno</h1>

    <label for="motivo"><b>(Opcional)</b></label>
    <input type="text" placeholder="Ingrese el motivo" name="motivo">

    <button type="button" class="btn popup" onclick="closeForm()">Confirmar</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
  </form>
</div>

<!--CSS-->
<style>

    {box-sizing: border-box;}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 20%;
  right: 30%;
  border: 3px solid black;
  z-index: 5;
  text-align: center;
  background-image: url("../../../css/fondo.png");

}

/* Add styles to the form container */
.form-container {
  max-width: 1000px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

</style>

<!--JS-->
<script>
    function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

</script>
<!--Tabla mockup-->
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