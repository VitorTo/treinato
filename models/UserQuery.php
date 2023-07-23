<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[User]].
 *
 * @see User
 */
class UserQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
      return $this->andWhere('[[status]]=1');
    }
    
    public function all($db = null)
    {
      return parent::all($db);
    }

    public function one($db = null)
    {
      return parent::one($db);
    }
}
