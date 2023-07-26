<?php

namespace app\controllers;

use app\models\Exercicio;
use app\models\Treino;
use app\models\TreinoHasExercicio;
use app\models\TreinoSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreinoController implements the CRUD actions for Treino model.
 */
class TreinoController extends Controller
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
     * Lists all Treino models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TreinoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Treino model.
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
     * Creates a new Treino model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Treino();
        $modelExercicio = Exercicio::findAll(['status' => 1]);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $post = Yii::$app->request->post();

                // salva treino, define data e status
                $model = Yii::$app->uteis->dateCreate($model);
                $model->user_id = Yii::$app->user->identity->id;
                $model->save();
                $idTreino = !empty($model->id) ? $model->id : '';
                
                // salva exercicio, define data e status
                foreach($post['Exercicio'] as $key => $exercicio_id) {

                    $modelTreinoExercicio = new TreinoHasExercicio();
                    $modelTreinoExercicio->treino_id = $idTreino;
                    $modelTreinoExercicio->exercicio_id = $exercicio_id;
                    $modelTreinoExercicio = Yii::$app->uteis->dateCreate($modelTreinoExercicio);
                    $modelTreinoExercicio->save();

                }

                // define alert
                if(!empty($idTreino)) {
                    Yii::$app->uteis->setAlert('success', 'Treino: '.$model->nome.' criado com sucesso!');
                } else {
                    Yii::$app->uteis->setAlert('error', 'Algo deu errado ao inserir o treino: '.$this->request->post()['Treino']['nome']);
                }

                return $this->redirect(['index']);
                // return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelExercicio' => $modelExercicio
        ]);
    }

    /**
     * Updates an existing Treino model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelExercicio = Exercicio::findAll(['status' => 1]);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $post = Yii::$app->request->post();

            // define data e status
            $model = Yii::$app->uteis->dateUpdate($model);            

            $model->update();

            $idTreino = !empty($model->id) ? $model->id : '';
            
            // excluir treino antigo
            $antigoHas = TreinoHasExercicio::findAll(['treino_id' => $idTreino]);
            // Itera sobre os registros encontrados e exclui um por um
            foreach ($antigoHas as $exercicio) {
                $exercicio->delete();
            }

            // salva exercicio, define data e status
            foreach($post['Exercicio'] as $key => $exercicio_id) {

                $modelTreinoExercicio = new TreinoHasExercicio();
                $modelTreinoExercicio->treino_id = $idTreino;
                $modelTreinoExercicio->exercicio_id = $exercicio_id;
                $modelTreinoExercicio = Yii::$app->uteis->dateCreate($modelTreinoExercicio);
                $modelTreinoExercicio->save();

            }

            // define alert
            if (!empty($model->id)) {
                Yii::$app->uteis->setAlert('success', 'Treino: ' . $model->nome . ' atualizado com sucesso!');
            } else {
                Yii::$app->uteis->setAlert('error', 'Algo deu errado ao atualizar o treino: ' . $model->nome);
            }
    
            return $this->redirect(['index']);
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelExercicio' => $modelExercicio
        ]);
    }

    /**
     * Deletes an existing Treino model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // busca o treino
        $user_id = Yii::$app->user->identity->id;
        $model = Treino::find()->where(['id' => $id, 'user_id' => $user_id])->one();

        if(empty($model)) return $this->redirect(['index']);

        $treinoNome = !empty($model->nome) ? $model->nome : '';

        Yii::$app->uteis->dateDelete($model);
        $model->save();

        // define alert
        if (!empty($model->id)) {
            Yii::$app->uteis->setAlert('success', 'Treino: ' . $treinoNome . ' deletado com sucesso!');
        } else {
            Yii::$app->uteis->setAlert('error', 'Algo deu errado ao deletar o treino: ' . $treinoNome);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Treino model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Treino the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Treino::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
