<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Honorarios;

/**
 * HonorariosSearch represents the model behind the search form of `app\models\Honorarios`.
 */
class HonorariosSearch extends Honorarios
{


    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //  [['id_honorarios', 'id_procedimientos'], 'integer'],
          //  [['porcentaje_hon', 'total_honor_medico'], 'number'],
            [['fecha_procedimiento', 'id_honorarios', 'id_procedimientos'], 'safe'],
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
        $query = Honorarios::find();

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

        /* grid filtering conditions
        $query->andFilterWhere([
            'id_honorarios' => $this->id_honorarios,
            'id_procedimientos' => $this->id_procedimientos,
            'porcentaje_hon' => $this->porcentaje_hon,
            'total_honor_medico' => $this->total_honor_medico,
            'fecha_procedimiento' => $this->fecha_procedimiento,
        ]);*/

        return $dataProvider;
    }
}
