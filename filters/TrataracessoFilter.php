<?php

namespace app\filters;

use yii;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;

class TrataracessoFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        $user_id = Yii::$app->user->identity->id;

        if(empty($user_id)) return Yii::$app->response->redirect(['site/deslogar'])->send();

        return parent::beforeAction($action);
        
        // $metodoAcessado = $action->actionMethod;
        
        // if ($metodoAcessado == 'actionCreate' || $metodoAcessado == 'actionViews')
        // {
        //     return parent::beforeAction($action);

        // } else {

        //     Yii::$app->response->redirect(['site/deslogar'])->send();

        // }

    }
}