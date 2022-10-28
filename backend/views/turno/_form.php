<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Turno $model */
/** @var yii\widgets\ActiveForm $form */

//arrays provisorios...
$cliente = ['0'=>'Juan Maswick'];
$profesional = ['0'=>'PEREZ, Ivan', '1'=>'BONFIRE, Esther'];
$sala = ['0'=>'001', '1'=>'002'];
?>

<br>
<div class="turno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_paciente')->dropDownList(($cliente), ['prompt' => 'Seleccione cliente' ]); ?>
    <?php //$form->field($model, 'id_paciente')->textInput() ?>

    <?= $form->field($model, 'id_profesional')->dropDownList(($profesional), ['prompt' => 'Seleccione profesional' ]); ?>
    <?php //$form->field($model, 'id_profesional')->textInput() ?>

    <?= $form->field($model, 'id_sala')->dropDownList(($sala), ['prompt' => 'Seleccione sala' ]); ?>
    <?php //$form->field($model, 'id_sala')->textInput() ?>

    <?php //$form->field($model, 'codigo_turno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'fecha_turno')->widget(\yii\jui\DatePicker::className(), [
    // if you are using bootstrap, the following line will set the correct style of the input field
    'options' => ['class' => 'form-control'],
    'dateFormat' => 'yyyy-MM-dd',
    /*  ... you can configure more DatePicker properties here */]) ?>


    <?php //$form->field($model, 'fecha_turno')->textInput() ?>

    <?php //$form->field($model, 'prioridad')->textInput() ?>

    <?php //$form->field($model, 'estado')->textInput(['maxlength' => true]) ?>
    
    <br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-danger']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
