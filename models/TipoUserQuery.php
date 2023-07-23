<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipoUser]].
 *
 * @see TipoUser
 */
class TipoUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TipoUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TipoUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
