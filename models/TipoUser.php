<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tipo_user}}".
 *
 * @property int $id
 * @property string|null $nome
 * @property int|null $status
 * @property string|null $dt_create
 * @property string|null $dt_update
 * @property string|null $dt_delete
 *
 * @property User[] $users
 */
class TipoUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tipo_user}}';
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
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['tipo_user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TipoUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoUserQuery(get_called_class());
    }
}
