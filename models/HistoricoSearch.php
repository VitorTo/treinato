<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Historico;

/**
 * HistoricoSearch represents the model behind the search form of `app\models\Historico`.
 */
class HistoricoSearch extends Historico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'treino_id', 'proporcao_id'], 'integer'],
            [['foto', 'dt_create', 'dt_update', 'dt_delete'], 'safe'],
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
        $query = Historico::find();

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
            'treino_id' => $this->treino_id,
            'proporcao_id' => $this->proporcao_id,
        ]);

        $query->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
