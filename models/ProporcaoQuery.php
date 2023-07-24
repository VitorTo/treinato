<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Proporcao]].
 *
 * @see Proporcao
 */
class ProporcaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Proporcao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Proporcao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
