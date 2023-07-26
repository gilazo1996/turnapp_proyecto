<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property int $id
 * @property int $id_cliente
 * @property int $id_profesional
 * @property int|null $id_sala
 * @property string|null $codigo_turno
 * @property string|null $detalle
 * @property string $fecha_turno
 * @property int $prioridad
 * @property string $estado
 * @property string $horario
 * @property string $ambito
 */
class Turno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'turno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_profesional', 'prioridad', 'estado'], 'safe'],
            [['id_cliente', 'id_profesional', 'id_sala', 'prioridad'], 'integer'],
            [['fecha_turno'], 'safe'],
            [['codigo_turno'], 'string', 'max' => 15],
            [['detalle','oauth_uid','nombre_profesional','estado','horario'], 'string', 'max' => 140],
            [['estado','cliente'], 'string', 'max' => 50],
          //  [['cliente'], 'string'],
           // [['horario'], 'safe'],
            [['ambito'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cliente' => 'Cliente',
            'id_profesional' => 'Profesional',
            'id_sala' => 'Sala',
            'codigo_turno' => 'Codigo del turno',
            'detalle' => 'Detalle',
            'fecha_turno' => 'Fecha del turno',
            'prioridad' => 'Prioridad',
            'estado' => 'Estado',
            'horario' => 'Horario',
            'ambito'=> 'Ambito',
        ];
    }
}
