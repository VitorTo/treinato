<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Semana]].
 *
 * @see Semana
 */
class SemanaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Semana[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Semana|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
