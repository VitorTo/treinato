<?php

namespace app\components;

use Yii;
use yii\base\Component;

class Uteis extends Component 
{
    public function dateCreate(object $model)
    {
        // define horário br
        date_default_timezone_set('America/Sao_Paulo');

        // pega data atual
        $data = date('Y-m-d H:i:s');

        // adiciona data no model e status
        $model->dt_create = $data;
        $model->status = 1;

        return $model;
    }

    public function dateUpdate(object $model)
    {
        // define horário br
        date_default_timezone_set('America/Sao_Paulo');

        // pega data atual
        $data = date('Y-m-d H:i:s');

        // adiciona data no model
        $model->dt_update = $data;

        return $model;
    }

    public function dateDelete(object $model)
    {
        // define horário br
        date_default_timezone_set('America/Sao_Paulo');

        // pega data atual
        $data = date('Y-m-d H:i:s');

        // adiciona data no model e status
        $model->dt_delete = $data;
        $model->status = -1;

        return $model;
    }

    public function setAlert($tipo, $mensagem, $timer = null) 
    {   
        $this->setFlashValue('tipo', $tipo);
        $this->setFlashValue('mensagem', $mensagem);
        if($timer != null) {
            $this->setFlashValue('timer', $timer);
        }

        return true;
    }

    private function setFlashValue($name, $value)
    {
        Yii::$app->session->setFlash($name, $value);
        return true;
    }

    public function findModelValue($object, $id, $attr)
    {
        $model = $object::findOne($id);
   
        if(empty($model->$attr)) return 'indefinido';

        return $model->$attr;

    }


}






?>