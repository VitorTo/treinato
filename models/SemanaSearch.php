<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Semana;

/**
 * SemanaSearch represents the model behind the search form of `app\models\Semana`.
 */
class SemanaSearch extends Semana
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'status'], 'integer'],
            [['repeticao', 'dt_create', 'dt_update', 'dt_delete'], 'safe'],
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
        $query = Semana::find();

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
            'segunda' => $this->segunda,
            'terca' => $this->terca,
            'quarta' => $this->quarta,
            'quinta' => $this->quinta,
            'sexta' => $this->sexta,
            'sabado' => $this->sabado,
            'status' => $this->status,
            'dt_create' => $this->dt_create,
            'dt_update' => $this->dt_update,
            'dt_delete' => $this->dt_delete,
        ]);

        $query->andFilterWhere(['like', 'repeticao', $this->repeticao]);

        return $dataProvider;
    }
}
