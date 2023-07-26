<?php

namespace app\controllers;

use app\models\Exercicio;
use app\models\ExercicioSearch;
use app\models\Treino;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExercicioController implements the CRUD actions for Exercicio model.
 */
class ExercicioController extends Controller
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
     * Lists all Exercicio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExercicioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exercicio model.
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

    /**
     * Creates a new Exercicio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Exercicio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // define data e status
                $model = Yii::$app->uteis->dateCreate($model);
                $model->user_id = Yii::$app->user->identity->id;
                $model->save();

                // define alert
                if (!empty($model->id)) {
                    Yii::$app->uteis->setAlert('success', 'Exercício: ' . $model->nome . ' criado com sucesso!');
                } else {
                    Yii::$app->uteis->setAlert('error', 'Algo deu errado ao inserir o exercício: ' .$model->nome);
                }

                return $this->redirect(['index']);
                // return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Exercicio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            // define data e status
            $model = Yii::$app->uteis->dateUpdate($model);

            $model->save();

            // define alert
            if (!empty($model->id)) {
                Yii::$app->uteis->setAlert('success', 'Exercício: ' . $model->nome . ' atualizado com sucesso!');
            } else {
                Yii::$app->uteis->setAlert('error', 'Algo deu errado ao atualizar o ecercício: ' . $model->nome);
            }
    
            return $this->redirect(['index']);
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Exercicio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $user_id = Yii::$app->user->identity->id;
        $model = Exercicio::find()->where(['id' => $id, 'user_id' => $user_id])->one();

        if(empty($model)) return $this->redirect(['index']);

        $exercicioNome = !empty($model->nome) ? $model->nome : '';

        Yii::$app->uteis->dateDelete($model);
        $model->save();

        // define alert
        if (!empty($model->id)) {
            Yii::$app->uteis->setAlert('success', 'Exercício: ' . $exercicioNome . ' deletado com sucesso!');
        } else {
            Yii::$app->uteis->setAlert('error', 'Algo deu errado ao deletar o exercício: ' . $exercicioNome);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Exercicio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Exercicio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exercicio::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
