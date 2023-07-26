<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profesional".
 *
 * @property int $id
 * @property int|null $dni
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string|null $fecha_nacimiento
 * @property int|null $id_especialidad
 */
class Profesional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profesional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'id_especialidad'], 'integer'],
            [['nombre', 'apellido', 'email'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['nombre'], 'string', 'max' => 50],
            [['apellido', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dni' => 'Dni',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'id_especialidad' => 'Id Especialidad',
        ];
    }
}
