<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proporcao;

/**
 * ProporcaoSearch represents the model behind the search form of `app\models\Proporcao`.
 */
class ProporcaoSearch extends Proporcao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'user_id', 'peso_id', 'altura_id'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
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
        $query = Proporcao::find();

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
            'status' => $this->status,
            'dt_create' => $this->dt_create,
            'dt_update' => $this->dt_update,
            'dt_delete' => $this->dt_delete,
            'user_id' => $this->user_id,
            'peso_id' => $this->peso_id,
            'altura_id' => $this->altura_id,
        ]);

        return $dataProvider;
    }
}
