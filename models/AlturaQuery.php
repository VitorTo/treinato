<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Altura]].
 *
 * @see Altura
 */
class AlturaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Altura[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Altura|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
