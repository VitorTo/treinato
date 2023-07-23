<?php

use app\models\Exercicio;
use app\models\Semana;
use app\models\TreinoHasExercicio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\SemanaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Semanas');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .badge:hover{
        cursor: pointer;
        background-color: #0D6EFD !important;
    }
</style>

<div class="semana-index" style="width: 95%;">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Visualize as suas semanas, crie novas e exclua as antigas.</span>
        <p class="col-md-3 mt-3">
            <?= Html::a(Yii::t('app', '<i class="fas fa-dumbbell"></i> Criar Semana'), ['create'], ['class' => 'btn btn-success w-100']) ?>
        </p>
    </div>

    <hr>

    <!-- < ?php Pjax::begin(); ?> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => " <div style='display: flex; justify-content: space-between;'> <div class='div-content-summary-showing' > Mostrando <strong>{begin}-{end}</strong> de <strong>{totalCount}</strong> itens </div>  <div class='div-content-sumarry-page'> Página <strong>{page}</strong> de <strong>{pageCount}</strong></div></div> ",
        'columns' => [

            [
                'attribute' => 'dt_create',
                'format' => ['datetime', 'php:d/m/Y']
            ],
            [
                'attribute' => 'segunda',
                'format' => 'raw',
                'value' => function ($model) {
                    $valor = '<span class="badge bg-danger">Indefinido</span>';
                    if(!empty($model->segunda)){
                        $nomeValor = Yii::$app->uteis->findModelValue('app\models\Treino', $model->segunda, 'nome');
                        $valor = '<span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#segunda">'.$nomeValor.'</span>';
                        
                        $treinoExercicio = TreinoHasExercicio::findAll(['status' => 1, 'treino_id' => $model->segunda]);

                        $exercicios = '';
                        foreach($treinoExercicio as $value) {

                            $exercicio = Exercicio::findOne($value['exercicio_id']);

                            if(empty($exercicio)) continue;

                            $exercicios .= $exercicio['nome'].' - '. $exercicio['peso'].'<br />';

                        }
         
                        $url = Url::to(['treino/view', 'id' => $model->segunda]);

                        $valor .= '
                            <!-- Modal -->
                            <div class="modal fade" id="segunda" tabindex="-1" aria-labelledby="segundaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="segundaLabel">'.$nomeValor.'</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        '.$exercicios.'
                                        <hr>
                                        <a class="btn btn-success btn-sm w-100" href="'.$url.'" target="_blank" rel="noopener noreferrer"> <i class="fas fa-eye"></i> Detalhes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                    return $valor;
                }

            ],
            [
                'attribute' => 'terca',
                'format' => 'raw',
                'value' => function ($model) {
                    $valor = '<span class="badge bg-danger">Indefinido</span>';
                    if(!empty($model->terca)){
                        $nomeValor = Yii::$app->uteis->findModelValue('app\models\Treino', $model->terca, 'nome');
                        $valor = '<span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#segunda">'.$nomeValor.'</span>';
                        
                        $treinoExercicio = TreinoHasExercicio::findAll(['status' => 1, 'treino_id' => $model->terca]);

                        $exercicios = '';
                        foreach($treinoExercicio as $value) {

                            $exercicio = Exercicio::findOne($value['exercicio_id']);

                            if(empty($exercicio)) continue;

                            $exercicios .= $exercicio['nome'].' - '. $exercicio['peso'].'<br />';

                        }
         
                        $url = Url::to(['treino/view', 'id' => $model->terca]);

                        $valor .= '
                            <!-- Modal -->
                            <div class="modal fade" id="terca" tabindex="-1" aria-labelledby="tercaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tercaLabel">'.$nomeValor.'</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        '.$exercicios.'
                                        <hr>
                                        <a class="btn btn-success btn-sm w-100" href="'.$url.'" target="_blank" rel="noopener noreferrer"> <i class="fas fa-eye"></i> Detalhes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                    return $valor;
                }

            ],
            [
                'attribute' => 'quarta',
                'format' => 'raw',
                'value' => function ($model) {
                    $valor = '<span class="badge bg-danger">Indefinido</span>';
                    if(!empty($model->quarta)){
                        $nomeValor = Yii::$app->uteis->findModelValue('app\models\Treino', $model->quarta, 'nome');
                        $valor = '<span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#segunda">'.$nomeValor.'</span>';
                        
                        $treinoExercicio = TreinoHasExercicio::findAll(['status' => 1, 'treino_id' => $model->quarta]);

                        $exercicios = '';
                        foreach($treinoExercicio as $value) {

                            $exercicio = Exercicio::findOne($value['exercicio_id']);

                            if(empty($exercicio)) continue;

                            $exercicios .= $exercicio['nome'].' - '. $exercicio['peso'].'<br />';

                        }
         
                        $url = Url::to(['treino/view', 'id' => $model->quarta]);

                        $valor .= '
                            <!-- Modal -->
                            <div class="modal fade" id="quarta" tabindex="-1" aria-labelledby="quartaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="quartaLabel">'.$nomeValor.'</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        '.$exercicios.'
                                        <hr>
                                        <a class="btn btn-success btn-sm w-100" href="'.$url.'" target="_blank" rel="noopener noreferrer"> <i class="fas fa-eye"></i> Detalhes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                    return $valor;
                }

            ],
            [
                'attribute' => 'quinta',
                'format' => 'raw',
                'value' => function ($model) {
                    $valor = '<span class="badge bg-danger">Indefinido</span>';
                    if(!empty($model->quinta)){
                        $nomeValor = Yii::$app->uteis->findModelValue('app\models\Treino', $model->quinta, 'nome');
                        $valor = '<span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#segunda">'.$nomeValor.'</span>';
                        
                        $treinoExercicio = TreinoHasExercicio::findAll(['status' => 1, 'treino_id' => $model->quinta]);

                        $exercicios = '';
                        foreach($treinoExercicio as $value) {

                            $exercicio = Exercicio::findOne($value['exercicio_id']);

                            if(empty($exercicio)) continue;

                            $exercicios .= $exercicio['nome'].' - '. $exercicio['peso'].'<br />';

                        }
         
                        $url = Url::to(['treino/view', 'id' => $model->quinta]);

                        $valor .= '
                            <!-- Modal -->
                            <div class="modal fade" id="quinta" tabindex="-1" aria-labelledby="quintaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="quintaLabel">'.$nomeValor.'</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        '.$exercicios.'
                                        <hr>
                                        <a class="btn btn-success btn-sm w-100" href="'.$url.'" target="_blank" rel="noopener noreferrer"> <i class="fas fa-eye"></i> Detalhes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                    return $valor;
                }

            ],
            [
                'attribute' => 'sexta',
                'format' => 'raw',
                'value' => function ($model) {
                    $valor = '<span class="badge bg-danger">Indefinido</span>';
                    if(!empty($model->sexta)){
                        $nomeValor = Yii::$app->uteis->findModelValue('app\models\Treino', $model->sexta, 'nome');
                        $valor = '<span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#segunda">'.$nomeValor.'</span>';
                        
                        $treinoExercicio = TreinoHasExercicio::findAll(['status' => 1, 'treino_id' => $model->sexta]);

                        $exercicios = '';
                        foreach($treinoExercicio as $value) {

                            $exercicio = Exercicio::findOne($value['exercicio_id']);

                            if(empty($exercicio)) continue;

                            $exercicios .= $exercicio['nome'].' - '. $exercicio['peso'].'<br />';

                        }
         
                        $url = Url::to(['treino/view', 'id' => $model->sexta]);

                        $valor .= '
                            <!-- Modal -->
                            <div class="modal fade" id="sexta" tabindex="-1" aria-labelledby="sextaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sextaLabel">'.$nomeValor.'</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        '.$exercicios.'
                                        <hr>
                                        <a class="btn btn-success btn-sm w-100" href="'.$url.'" target="_blank" rel="noopener noreferrer"> <i class="fas fa-eye"></i> Detalhes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                    return $valor;
                }

            ],
            [
                'attribute' => 'sabado',
                'format' => 'raw',
                'value' => function ($model) {
                    $valor = '<span class="badge bg-danger">Indefinido</span>';
                    if(!empty($model->sabado)){
                        $nomeValor = Yii::$app->uteis->findModelValue('app\models\Treino', $model->sabado, 'nome');
                        $valor = '<span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#segunda">'.$nomeValor.'</span>';
                        
                        $treinoExercicio = TreinoHasExercicio::findAll(['status' => 1, 'treino_id' => $model->sabado]);

                        $exercicios = '';
                        foreach($treinoExercicio as $value) {

                            $exercicio = Exercicio::findOne($value['exercicio_id']);

                            if(empty($exercicio)) continue;

                            $exercicios .= $exercicio['nome'].' - '. $exercicio['peso'].'<br />';

                        }
         
                        $url = Url::to(['treino/view', 'id' => $model->sabado]);

                        $valor .= '
                            <!-- Modal -->
                            <div class="modal fade" id="sabado" tabindex="-1" aria-labelledby="sabadoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sabadoLabel">'.$nomeValor.'</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        '.$exercicios.'
                                        <hr>
                                        <a class="btn btn-success btn-sm w-100" href="'.$url.'" target="_blank" rel="noopener noreferrer"> <i class="fas fa-eye"></i> Detalhes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                    return $valor;
                }

            ],
            'repeticao',
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
                'buttonOptions' => ['class' => 'btn btn-outline-danger'],
                'template' => '<div class="btn-group-vertical btn-group-sm text-center" > {delete} </div>',
                'urlCreator' => function ($action, Semana $model, $key, $index, $column) {
           
                    if($action == 'delete') {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                }
            ],

        ],
    ]); ?>

    </div>

    <!-- < ?php Pjax::end(); ?> -->

</div>