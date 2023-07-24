<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%peso}}".
 *
 * @property int $id
 * @property string|null $peso
 * @property int|null $status
 * @property string|null $dt_create
 * @property string|null $dt_update
 * @property string|null $dt_delete
 * @property int $user_id
 *
 * @property Proporcao[] $proporcaos
 * @property User $user
 */
class Peso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%peso}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'user_id'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
            [['user_id'], 'required'],
            [['peso'], 'string', 'max' => 5],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'peso' => Yii::t('app', 'Peso'),
            'status' => Yii::t('app', 'Status'),
            'dt_create' => Yii::t('app', 'Data'),
            'dt_update' => Yii::t('app', 'Dt Update'),
            'dt_delete' => Yii::t('app', 'Dt Delete'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[Proporcaos]].
     *
     * @return \yii\db\ActiveQuery|ProporcaoQuery
     */
    public function getProporcaos()
    {
        return $this->hasMany(Proporcao::class, ['peso_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return PesoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PesoQuery(get_called_class());
    }
}
