<?php
require "../../rbac/sesion.php";
$esInvitado = sesion();
$mostrar;
//namespace backend\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var backend\models\Turno $model */
/** @var yii\widgets\ActiveForm $form */

use yii\helpers\ArrayHelper;
use backend\models\Profesional;
use backend\models\Horario;

require "../../rbac/control.php";
require "../../rbac/errores.php";

$ambito = ['Hospital'=>'Hospital', 'Banco'=>'Banco','Otros'=>'Otros'];
$horario=['06:00'=>'06:00', '07:00'=>'07:00', '08:00'=>'08:00', '09:00'=>'09:00', 
'10:00'=>'10:00', '11:00'=>'11:00', '12:00'=>'12:00', '13:00'=>'13:00', '14:00'=>'14:00', 
'15:00'=>'15:00', '16:00'=>'16:00', '17:00'=>'17:00', '18:00'=>'18:00', '19:00'=>'19:00', '20:00'=>'20:00',];
?>

<?php 
    $mostrar=0;
    if (isset($_SESSION['userData']))
{
    $id_google = $_SESSION['userData']['oauth_uid'];
    $cliente = $_SESSION['userData']['first_name'];
    $mostrar = mostrar($id_google); 
}
?>

<!--cliente-->
<?php if ( $mostrar==1 ) { ?>
    <?= "<h2>Cliente: " .$cliente."</h2>"?>

<br>
<div class="turno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cliente')->textInput(['maxlength' => true, 'placeholder' => '']); ?>  


    <?= $form->field($model, 'nombre_profesional')->dropDownList((ArrayHelper::map(Profesional::find()->all(), 'nombre', 'nombre')), ['prompt' => 'Seleccione el profesional' ]); ?>

    <?= $form->field($model, 'fecha_turno')->widget(\yii\jui\DatePicker::className(), [
        
    // if you are using bootstrap, the following line will set the correct style of the input field
    'options' => ['class' => 'form-control','defaultDate' => date('Y-m-d')],
    'dateFormat' => 'yyyy-MM-dd', 
    /*  ... you can configure more DatePicker properties here */])->textInput(['placeholder' => 'Seleccione la fecha',
    'from_date', 'default']) ?>

     <?= $form->field($model, 'horario')->dropDownList(($horario), ['prompt' => 'Seleccione el horario' ]); ?>

    <!-- <= $form->field($model, 'horario')->dropDownList((ArrayHelper::map(Horario::find()->all(), 'id', 'hora')), ['prompt' => 'Seleccione el horario' ]); ?>
    -->

    <?= $form->field($model, 'ambito')->dropDownList(($ambito), ['prompt' => 'Seleccione el ambito' ]); ?>

    
    <?= $form->field($model, 'oauth_uid')->hiddenInput(['value'=> $id_google])->label(false); ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true, 'placeholder' => 'Agregue sus notas personales']); ?>  


    <br>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Url::toRoute(["turno/index"]);?>" class="btn btn-danger">Cancelar</a>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php } ?>

<!--admin-->
<?php if ( $mostrar==2) { ?>

<br>
<div class="turno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true, 'placeholder' => 'Cambie el estado del turno']); ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Url::toRoute(["turno/turnosadmin"]);?>" class="btn btn-danger">Cancelar</a>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php } ?>


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