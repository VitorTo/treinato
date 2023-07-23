<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%treino}}".
 *
 * @property int $id
 * @property string|null $nome
 * @property int|null $status
 * @property string|null $dt_create
 * @property string|null $dt_update
 * @property string|null $dt_delete
 *
 * @property Exercicio[] $exercicios
 * @property Historico[] $historicos
 * @property TreinoHasExercicio[] $treinoHasExercicios
 */
class Treino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%treino}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
            [['nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Nome'),
            'status' => Yii::t('app', 'Status'),
            'dt_create' => Yii::t('app', 'Dt Create'),
            'dt_update' => Yii::t('app', 'Dt Update'),
            'dt_delete' => Yii::t('app', 'Dt Delete'),
        ];
    }

    /**
     * Gets query for [[Exercicios]].
     *
     * @return \yii\db\ActiveQuery|ExercicioQuery
     */
    public function getExercicios()
    {
        return $this->hasMany(Exercicio::class, ['id' => 'exercicio_id'])->viaTable('{{%treino_has_exercicio}}', ['treino_id' => 'id']);
    }

    /**
     * Gets query for [[Historicos]].
     *
     * @return \yii\db\ActiveQuery|HistoricoQuery
     */
    public function getHistoricos()
    {
        return $this->hasMany(Historico::class, ['treino_id' => 'id']);
    }

    /**
     * Gets query for [[TreinoHasExercicios]].
     *
     * @return \yii\db\ActiveQuery|TreinoHasExercicioQuery
     */
    public function getTreinoHasExercicios()
    {
        return $this->hasMany(TreinoHasExercicio::class, ['treino_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TreinoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TreinoQuery(get_called_class());
    }
}
