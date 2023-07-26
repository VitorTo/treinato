<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%exercicio}}".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $peso
 * @property string|null $observacao
 * @property int|null $status
 * @property string|null $dt_create
 * @property string|null $dt_update
 * @property string|null $dt_delete
 *
 * @property TreinoHasExercicio[] $treinoHasExercicios
 * @property Treino[] $treinos
 */
class Exercicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%exercicio}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['observacao'], 'string'],
            [['status'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
            [['nome'], 'string', 'max' => 255],
            [['peso'], 'string', 'max' => 5],
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
            'peso' => Yii::t('app', 'Peso'),
            'observacao' => Yii::t('app', 'Observação'),
            'status' => Yii::t('app', 'Status'),
            'dt_create' => Yii::t('app', 'Dt Create'),
            'dt_update' => Yii::t('app', 'Dt Update'),
            'dt_delete' => Yii::t('app', 'Dt Delete'),
        ];
    }

    /**
     * Gets query for [[TreinoHasExercicios]].
     *
     * @return \yii\db\ActiveQuery|TreinoHasExercicioQuery
     */
    public function getTreinoHasExercicios()
    {
        return $this->hasMany(TreinoHasExercicio::class, ['exercicio_id' => 'id']);
    }

    /**
     * Gets query for [[Treinos]].
     *
     * @return \yii\db\ActiveQuery|TreinoQuery
     */
    public function getTreinos()
    {
        return $this->hasMany(Treino::class, ['id' => 'treino_id'])->viaTable('{{%treino_has_exercicio}}', ['exercicio_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ExercicioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExercicioQuery(get_called_class());
    }
}
