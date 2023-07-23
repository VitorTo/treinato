<?php

namespace app\controllers;

use app\models\Historico;
use app\models\HistoricoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HistoricoController implements the CRUD actions for Historico model.
 */
class HistoricoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Historico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HistoricoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Historico model.
     * @param int $id ID
     * @param int $treino_id Treino ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $treino_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $treino_id),
        ]);
    }

    /**
     * Creates a new Historico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Historico();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'treino_id' => $model->treino_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Historico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $treino_id Treino ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $treino_id)
    {
        $model = $this->findModel($id, $treino_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'treino_id' => $model->treino_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Historico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $treino_id Treino ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $treino_id)
    {
        $this->findModel($id, $treino_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Historico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $treino_id Treino ID
     * @return Historico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $treino_id)
    {
        if (($model = Historico::findOne(['id' => $id, 'treino_id' => $treino_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
