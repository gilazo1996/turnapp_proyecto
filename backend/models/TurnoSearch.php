<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Turno;

/**
 * TurnoSearch represents the model behind the search form of `backend\models\Turno`.
 */
class TurnoSearch extends Turno
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_paciente', 'id_profesional', 'id_sala', 'prioridad'], 'integer'],
            [['codigo_turno', 'detalle', 'fecha_turno', 'estado','nombre_paciente','nombre_profesional'], 'safe'],
            [['nombre_paciente','nombre_profesional'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Turno::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'id_paciente' => $this->id_paciente,
            //'id_profesional' => $this->id_profesional,
            //'id' => $this->id,
            'nombre_paciente' => $this->nombre_paciente,
            'nombre_profesional' => $this->nombre_profesional,
            'id_sala' => $this->id_sala,
            'fecha_turno' => $this->fecha_turno,
            'prioridad' => $this->prioridad,
        ]);

        $query->andFilterWhere(['like', 'codigo_turno', $this->codigo_turno])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
