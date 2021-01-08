<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medicos;

/**
 * MedicosSearch represents the model behind the search form of `app\models\Medicos`.
 */
class MedicosSearch extends Medicos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_medico', 'iddato_especialidad'], 'integer'],
            [['nom_ape_medico', 'telefono_medico', 'universidad_medico'], 'safe'],
            [['sueldo_base'], 'number'],
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
        $query = Medicos::find();

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
            'id_medico' => $this->id_medico,
            'iddato_especialidad' => $this->iddato_especialidad,
            'sueldo_base' => $this->sueldo_base,
        ]);

        $query->andFilterWhere(['like', 'nom_ape_medico', $this->nom_ape_medico])
            ->andFilterWhere(['like', 'telefono_medico', $this->telefono_medico])
            ->andFilterWhere(['like', 'universidad_medico', $this->universidad_medico]);

        return $dataProvider;
    }
}
