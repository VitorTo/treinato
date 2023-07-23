<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%treino_has_exercicio}}".
 *
 * @property int $treino_id
 * @property int $exercicio_id
 * @property int|null $status
 * @property string|null $dt_create
 * @property string|null $dt_update
 * @property string|null $dt_delete
 *
 * @property Exercicio $exercicio
 * @property Treino $treino
 */
class TreinoHasExercicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%treino_has_exercicio}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['treino_id', 'exercicio_id'], 'required'],
            [['treino_id', 'exercicio_id', 'status'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
            [['treino_id', 'exercicio_id'], 'unique', 'targetAttribute' => ['treino_id', 'exercicio_id']],
            [['exercicio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exercicio::class, 'targetAttribute' => ['exercicio_id' => 'id']],
            [['treino_id'], 'exist', 'skipOnError' => true, 'targetClass' => Treino::class, 'targetAttribute' => ['treino_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'treino_id' => Yii::t('app', 'Treino ID'),
            'exercicio_id' => Yii::t('app', 'Exercicio ID'),
            'status' => Yii::t('app', 'Status'),
            'dt_create' => Yii::t('app', 'Dt Create'),
            'dt_update' => Yii::t('app', 'Dt Update'),
            'dt_delete' => Yii::t('app', 'Dt Delete'),
        ];
    }

    /**
     * Gets query for [[Exercicio]].
     *
     * @return \yii\db\ActiveQuery|ExercicioQuery
     */
    public function getExercicio()
    {
        return $this->hasOne(Exercicio::class, ['id' => 'exercicio_id']);
    }

    /**
     * Gets query for [[Treino]].
     *
     * @return \yii\db\ActiveQuery|TreinoQuery
     */
    public function getTreino()
    {
        return $this->hasOne(Treino::class, ['id' => 'treino_id']);
    }

    /**
     * {@inheritdoc}
     * @return TreinoHasExercicioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TreinoHasExercicioQuery(get_called_class());
    }
}
