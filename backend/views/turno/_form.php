<?php

namespace backend\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var backend\models\Turno $model */
/** @var yii\widgets\ActiveForm $form */

use yii\helpers\ArrayHelper;

//arrays provisorios...
$cliente = ['0'=>'Juan Maswick'];
//$profesional = ['0'=>'PEREZ, Ivan', '1'=>'BONFIRE, Esther'];
//$sala = ['0'=>'001', '1'=>'002'];
/*$horario = ['0'=> '06:00','1'=> '07:00','2'=> '08:00','3'=> '09:00'
,'4'=> '10:00','5'=> '11:00','6'=> '12:00','7'=> '13:00','8'=> '14:00'
,'9'=> '15:00','10'=> '16:00','11'=> '17:00','12'=> '18:00','13'=> '19:00'
,'14'=> '20:00','15'=> '21:00','16'=> '22:00'];*/
$ambito = ['0'=>'Centro medico', '1'=>'Banco','2'=>'Otros'];
?>

<br>
<div class="turno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_paciente')->dropDownList(($cliente), ['prompt' => 'Seleccione el cliente' ]); ?>

    <?= $form->field($model, 'id_profesional')->dropDownList((ArrayHelper::map(Profesional::find()->all(), 'id', 'nombre')), ['prompt' => 'Seleccione el profesional' ]); ?>

    <?= $form->field($model, 'fecha_turno')->widget(\yii\jui\DatePicker::className(), [
        
    // if you are using bootstrap, the following line will set the correct style of the input field
    'options' => ['class' => 'form-control','defaultDate' => date('Y-m-d')],
    'dateFormat' => 'yyyy-MM-dd', 
    /*  ... you can configure more DatePicker properties here */])->textInput(['placeholder' => 'Seleccione la fecha',
    'from_date', 'default']) ?>

    <!-- ?= $form->field($model, 'horario')->dropDownList(($horario), ['prompt' => 'Seleccione el horario' ]); ?> -->

    <?= $form->field($model, 'horario')->dropDownList((ArrayHelper::map(Horario::find()->all(), 'id', 'hora')), ['prompt' => 'Seleccione el horario' ]); ?>

    <?= $form->field($model, 'ambito')->dropDownList(($ambito), ['prompt' => 'Seleccione el ambito' ]); ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true, 'placeholder' => 'Agregue sus notas personales']); ?>  
    
    <br>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Url::toRoute(["turno/index"]);?>" class="btn btn-danger">Cancelar</a>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<style>  
    label
    {
        color:white;

    }

    .help-block
    {
        background-color: red;
        color:white;

    }

    .table
    {
        color:black;
        background-color: white;

    }

    body {
        background-image: url("../../../css/fondo.png");
        background-attachment: fixed;
    }
</style>