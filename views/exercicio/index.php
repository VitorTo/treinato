<?php

use app\models\Exercicio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ExercicioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Exercícios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercicio-index">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Visualize seus exercícios, crie novos e exclua os antigos.</span>
        <p class="col-md-3 mt-3">
            <?= Html::a(Yii::t('app', '<i class="fas fa-dumbbell"></i> Criar Exercício'), ['create'], ['class' => 'btn btn-success w-100']) ?>
        </p>
    </div>

    <hr>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">

        <?= GridView::widget([
            'dataProvider' => $dataProvider, 
            'summary' => " <div style='display: flex; justify-content: space-between;'> <div class='div-content-summary-showing' > Mostrando <strong>{begin}-{end}</strong> de <strong>{totalCount}</strong> itens </div>  <div class='div-content-sumarry-page'> Página <strong>{page}</strong> de <strong>{pageCount}</strong></div></div> ",
            'columns' => [

                'nome',
                'peso',
                'observacao:ntext',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $valor = ' <span class="badge bg-danger">Desativado</span>';
                        if($model->status == 1) {
                            $valor = ' <span class="badge bg-success">Ativo</span>';
                        }

                        return $valor;
                    }
                ],

                [
                    'class' => ActionColumn::className(),
                    'header' => 'Ações',
                    'options' => ['style' => 'width: 40px; justify-content: center;'],
                    'buttonOptions' => ['class' => 'btn btn-outline-primary'],
                    'template' => '<div class="btn-group-vertical btn-group-sm text-center" > {delete} {update} </div>',
                    'urlCreator' => function ($action, Exercicio $model, $key, $index, $column) {
            
                        if($action == 'delete') {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                        
                        if($action == 'update') {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    }
                ],
            ],
        ]); ?>

    </div>

    <?php Pjax::end(); ?>

</div>
