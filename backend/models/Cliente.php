<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property int $dni
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string|null $fecha_nacimiento
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'nombre', 'apellido', 'email'], 'required'],
            [['dni'], 'integer'],
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
        ];
    }
}
