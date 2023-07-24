<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%proporcao}}".
 *
 * @property int $id
 * @property int|null $status
 * @property string|null $dt_create
 * @property string|null $dt_update
 * @property string|null $dt_delete
 * @property int $user_id
 * @property int $peso_id
 * @property int $altura_id
 *
 * @property Altura $altura
 * @property Historico[] $historicos
 * @property Peso $peso
 * @property User $user
 */
class Proporcao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%proporcao}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'user_id', 'peso_id', 'altura_id'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
            [['user_id', 'peso_id', 'altura_id'], 'required'],
            [['altura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Altura::class, 'targetAttribute' => ['altura_id' => 'id']],
            [['peso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Peso::class, 'targetAttribute' => ['peso_id' => 'id']],
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
            'status' => Yii::t('app', 'Status'),
            'dt_create' => Yii::t('app', 'Dt Create'),
            'dt_update' => Yii::t('app', 'Dt Update'),
            'dt_delete' => Yii::t('app', 'Dt Delete'),
            'user_id' => Yii::t('app', 'User ID'),
            'peso_id' => Yii::t('app', 'Peso ID'),
            'altura_id' => Yii::t('app', 'Altura ID'),
        ];
    }

    /**
     * Gets query for [[Altura]].
     *
     * @return \yii\db\ActiveQuery|AlturaQuery
     */
    public function getAltura()
    {
        return $this->hasOne(Altura::class, ['id' => 'altura_id']);
    }

    /**
     * Gets query for [[Historicos]].
     *
     * @return \yii\db\ActiveQuery|HistoricoQuery
     */
    public function getHistoricos()
    {
        return $this->hasMany(Historico::class, ['proporcao_id' => 'id']);
    }

    /**
     * Gets query for [[Peso]].
     *
     * @return \yii\db\ActiveQuery|PesoQuery
     */
    public function getPeso()
    {
        return $this->hasOne(Peso::class, ['id' => 'peso_id']);
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
     * @return ProporcaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProporcaoQuery(get_called_class());
    }
}
