<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Turno $model */
/** @var yii\widgets\ActiveForm $form */

//arrays provisorios...
/*
$cliente = ['0'=>'Juan Maswick'];
$profesional = ['0'=>'PEREZ, Ivan', '1'=>'BONFIRE, Esther'];
//$sala = ['0'=>'001', '1'=>'002'];
$horario = ['0'=> '06:00','1'=> '07:00','2'=> '08:00','3'=> '09:00'
,'4'=> '10:00','5'=> '11:00','6'=> '12:00','7'=> '13:00','8'=> '14:00'
,'9'=> '15:00','10'=> '16:00','11'=> '17:00','12'=> '18:00','13'=> '19:00'
,'14'=> '20:00','15'=> '21:00','16'=> '22:00'];
$ambito = ['0'=>'Salud', '1'=>'Banco','2'=>'Otros'];
*/
?>

<br>
<div class="turno-form">

    <h3>Cliente: <b>David Cardozo</b> </h3>

    <?php $form = ActiveForm::begin(); ?>

    <label for="language">Select a Programming Language:</label>
<select name="language" id="language">
  <option value="javascript">JavaScript</option>
  <option value="python">Python</option>
  <option value="c++" disabled>C++</option>
  <option value="java" selected>Java</option>
</select>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true, 'placeholder' => 'Agregue sus notas personales']); ?>  
    
  
    <?php ActiveForm::end(); ?>

    

    <a href="http://localhost/turnapp_proyecto/backend/web/site/indexadmin">
   <input type="button" value="Guardar" />
</a>

</div>
