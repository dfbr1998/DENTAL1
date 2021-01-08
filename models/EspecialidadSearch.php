<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Especialidad;

/**
 * EspecialidadSearch represents the model behind the search form of `app\models\Especialidad`.
 */
class EspecialidadSearch extends Especialidad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddato_especialidad'], 'integer'],
            [['nombre_especialidad', 'descripcion_especialidad', 'nivel_dificultad_especialidad', 'anios_min_experiencia'], 'safe'],
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
        $query = Especialidad::find();

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
            'iddato_especialidad' => $this->iddato_especialidad,
        ]);

        $query->andFilterWhere(['like', 'nombre_especialidad', $this->nombre_especialidad])
            ->andFilterWhere(['like', 'descripcion_especialidad', $this->descripcion_especialidad])
            ->andFilterWhere(['like', 'nivel_dificultad_especialidad', $this->nivel_dificultad_especialidad])
            ->andFilterWhere(['like', 'anios_min_experiencia', $this->anios_min_experiencia]);

        return $dataProvider;
    }
}
