<?php

use backend\models\Turno;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TurnoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reporte de turnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turno-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table">
            <tr>
                    <td> <b>id</b> </td>
                    <td><b>cliente</b></td>
                    <td><b>fecha</b></td>
                    <td><b>estado</b></td>
                    <td><b>motivo</b></td>
            </tr>

            <tr>
                <td>11</td>
                <td>David Cardozo</td>
                <td>2022-11-12</td>
                <td>cancelado</td>
                <td>no puedo asistir</td>
            </tr>

        </table>




<style>
    table>thead>tr>th>a
    {
        color:black;
    }

    table>tr
    {
        color:gray;
    }
</style>

<script></script>
