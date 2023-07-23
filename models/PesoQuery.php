<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Peso]].
 *
 * @see Peso
 */
class PesoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Peso[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Peso|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
