<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TreinoHasExercicio]].
 *
 * @see TreinoHasExercicio
 */
class TreinoHasExercicioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TreinoHasExercicio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TreinoHasExercicio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
