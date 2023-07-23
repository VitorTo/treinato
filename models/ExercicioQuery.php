<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Exercicio]].
 *
 * @see Exercicio
 */
class ExercicioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Exercicio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Exercicio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
