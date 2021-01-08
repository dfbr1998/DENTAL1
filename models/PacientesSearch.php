<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pacientes;

/**
 * PacientesSearch represents the model behind the search form of `app\models\Pacientes`.
 */
class PacientesSearch extends Pacientes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paciente', 'edad_paciente'], 'integer'],
            [['nom_ape_paciente', 'direccion_paciente', 'telefono_paciente', 'correo_paciente'], 'safe'],
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
        $query = Pacientes::find();

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
            'id_paciente' => $this->id_paciente,
            'edad_paciente' => $this->edad_paciente,
        ]);

        $query->andFilterWhere(['like', 'nom_ape_paciente', $this->nom_ape_paciente])
            ->andFilterWhere(['like', 'direccion_paciente', $this->direccion_paciente])
            ->andFilterWhere(['like', 'telefono_paciente', $this->telefono_paciente])
            ->andFilterWhere(['like', 'correo_paciente', $this->correo_paciente]);

        return $dataProvider;
    }
}
