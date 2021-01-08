<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Procedimientos;

/**
 * ProcedimientosSearch represents the model behind the search form of `app\models\Procedimientos`.
 */
class ProcedimientosSearch extends Procedimientos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_procedimientos', 'id_paciente', 'id_medico'], 'integer'],
            [['detalle_procedim', 'fecha_procedim'], 'safe'],
            [['costo_procedim', 'porcentaje_comi'], 'number'],
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
        $query = Procedimientos::find();

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
            'id_procedimientos' => $this->id_procedimientos,
            'id_paciente' => $this->id_paciente,
            'id_medico' => $this->id_medico,
            'costo_procedim' => $this->costo_procedim,
            'porcentaje_comi' => $this->porcentaje_comi,
            'fecha_procedim' => $this->fecha_procedim,
        ]);

        $query->andFilterWhere(['like', 'detalle_procedim', $this->detalle_procedim]);

        return $dataProvider;
    }
}
