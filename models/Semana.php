<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%semana}}".
 *
 * @property int $id
 * @property int|null $segunda
 * @property int|null $terca
 * @property int|null $quarta
 * @property int|null $quinta
 * @property int|null $sexta
 * @property int|null $sabado
 * @property string|null $repeticao
 * @property int|null $status
 * @property string|null $dt_create
 * @property string|null $dt_update
 * @property string|null $dt_delete
 */
class Semana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%semana}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'status'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
            [['repeticao'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'segunda' => Yii::t('app', 'Segunda'),
            'terca' => Yii::t('app', 'Terca'),
            'quarta' => Yii::t('app', 'Quarta'),
            'quinta' => Yii::t('app', 'Quinta'),
            'sexta' => Yii::t('app', 'Sexta'),
            'sabado' => Yii::t('app', 'Sabado'),
            'repeticao' => Yii::t('app', 'Repeticao'),
            'status' => Yii::t('app', 'Status'),
            'dt_create' => Yii::t('app', 'Data'),
            'dt_update' => Yii::t('app', 'Dt Update'),
            'dt_delete' => Yii::t('app', 'Dt Delete'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SemanaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SemanaQuery(get_called_class());
    }
}
