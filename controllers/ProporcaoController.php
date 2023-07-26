<?php

namespace app\controllers;

use app\models\Altura;
use app\models\Peso;
use app\models\Proporcao;
use app\models\ProporcaoSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProporcaoController implements the CRUD actions for Proporcao model.
 */
class ProporcaoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => 'app\filters\TrataracessoFilter',
                'except' => [],
            ],
        ];
    }

    /**
     * Lists all Proporcao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProporcaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proporcao model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionPesoaltura()
    {
        $post = Yii::$app->request->post();
        
        $user_id = Yii::$app->user->identity->id;

        $modelAltura = Altura::findOne(['altura' => $post['Altura']['altura'], 'user_id' => $user_id]);
        $modelPeso = Peso::findOne(['peso' => $post['Peso']['peso'], 'user_id' => $user_id]);

        // verifica existe altura
        if(empty($modelAltura)) {
            Altura::updateAll([ 'status' => -1 ], 'user_id = :user_id', [':user_id' => $user_id]);
            $modelAltura = new Altura();
            $modelAltura->attributes = $post['Altura'];
            $modelAltura->user_id = $user_id;
            $modelAltura = Yii::$app->uteis->dateCreate($modelAltura);
            $modelAltura->save(false);

        } 

        // verifica existe peso
        if(empty($modelPeso)) {
            Peso::updateAll([ 'status' => -1 ], 'user_id = :user_id', [':user_id' => $user_id]);
            $modelPeso = new Peso();
            $modelPeso->attributes = $post['Peso'];
            $modelPeso->user_id = $user_id;
            $modelPeso = Yii::$app->uteis->dateCreate($modelPeso);
            $modelPeso->save(false);
        }
        
        // pegando ids peso e altura
        $peso = !empty($modelPeso->id) ? $modelPeso->id : '';
        $altura = !empty($modelAltura->id) ? $modelAltura->id : '';
        
        // verifica se existe proporção
        $modelProporcao = Proporcao::findOne(['status' => 1, 'user_id' => $user_id, 'peso_id' => $peso, 'altura_id' => $altura]);
        if(empty($modelProporcao)) {
            Proporcao::updateAll([ 'status' => -1 ], 'user_id =:user_id', [':user_id' => $user_id]);
            $modelProporcao = new Proporcao();
            $modelProporcao->peso_id = $peso;
            $modelProporcao->altura_id = $altura;
            $modelProporcao->user_id = $user_id;
            $modelProporcao = Yii::$app->uteis->dateCreate($modelProporcao);
            $modelProporcao->save(false);
        }

        // define alert
        if (!empty($modelProporcao->id)) {
            Yii::$app->uteis->setAlert('success', 'Proporção: criada com sucesso!');
        } else {
            Yii::$app->uteis->setAlert('error', 'Algo deu errado ao inserir a proporção ');
        }        
        
        return $this->redirect(['site/index']);
    }
    /**
     * Creates a new Proporcao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Proporcao();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $post = Yii::$app->request->post();

                // salva treino, define data e status
                $model = Yii::$app->uteis->dateCreate($model);
                $model->user_id = Yii::$app->user->identity->id;
                $model->save();
                $idProporcao = !empty($model->id) ? $model->id : '';
                
                // define alert
                if(!empty($idProporcao)) {
                    Yii::$app->uteis->setAlert('success', 'Proporção: '.$model->nome.' criado com sucesso!');
                } else {
                    Yii::$app->uteis->setAlert('error', 'Algo deu errado ao inserir o proporção');
                }

                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Proporcao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Proporcao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proporcao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Proporcao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proporcao::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
