<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property int $id
 * @property int $id_paciente
 * @property int $id_profesional
 * @property int|null $id_sala
 * @property string|null $codigo_turno
 * @property string|null $detalle
 * @property string $fecha_turno
 * @property int $prioridad
 * @property string $estado
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
            [['id_paciente', 'id_profesional', 'prioridad', 'estado'], 'required'],
            [['id_paciente', 'id_profesional', 'id_sala', 'prioridad'], 'integer'],
            [['fecha_turno'], 'safe'],
            [['codigo_turno'], 'string', 'max' => 15],
            [['detalle'], 'string', 'max' => 140],
            [['estado'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_paciente' => 'Cliente',
            'id_profesional' => 'Profesional',
            'id_sala' => 'Sala',
            'codigo_turno' => 'Codigo Turno',
            'detalle' => 'Detalle',
            'fecha_turno' => 'Fecha Turno',
            'prioridad' => 'Prioridad',
            'estado' => 'Estado',
        ];
    }
}
