<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%historico}}".
 *
 * @property int $id
 * @property string|null $foto
 * @property int|null $status
 * @property string|null $dt_create
 * @property string|null $dt_update
 * @property string|null $dt_delete
 * @property int $treino_id
 * @property int $proporcao_id
 *
 * @property Proporcao $proporcao
 * @property Treino $treino
 */
class Historico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%historico}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['foto'], 'string'],
            [['status', 'treino_id', 'proporcao_id'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
            [['treino_id', 'proporcao_id'], 'required'],
            [['proporcao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proporcao::class, 'targetAttribute' => ['proporcao_id' => 'id']],
            [['treino_id'], 'exist', 'skipOnError' => true, 'targetClass' => Treino::class, 'targetAttribute' => ['treino_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'foto' => Yii::t('app', 'Foto'),
            'status' => Yii::t('app', 'Status'),
            'dt_create' => Yii::t('app', 'Dt Create'),
            'dt_update' => Yii::t('app', 'Dt Update'),
            'dt_delete' => Yii::t('app', 'Dt Delete'),
            'treino_id' => Yii::t('app', 'Treino ID'),
            'proporcao_id' => Yii::t('app', 'Proporcao ID'),
        ];
    }

    /**
     * Gets query for [[Proporcao]].
     *
     * @return \yii\db\ActiveQuery|ProporcaoQuery
     */
    public function getProporcao()
    {
        return $this->hasOne(Proporcao::class, ['id' => 'proporcao_id']);
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
     * @return HistoricoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HistoricoQuery(get_called_class());
    }
}
