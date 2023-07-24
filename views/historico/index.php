<?php

use app\models\Historico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\HistoricoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Históricos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historico-index">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Visualize seus históricos e crie novos.</span>
        <p class="col-md-3 mt-3">
            <?= Html::a(Yii::t('app', '<i class="fas fa-dumbbell"></i> Criar Históricos'), ['create'], ['class' => 'btn btn-success w-100']) ?>
        </p>
    </div>

    <hr>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="table-responsive">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => " <div style='display: flex; justify-content: space-between;'> <div class='div-content-summary-showing' > Mostrando <strong>{begin}-{end}</strong> de <strong>{totalCount}</strong> itens </div>  <div class='div-content-sumarry-page'> Página <strong>{page}</strong> de <strong>{pageCount}</strong></div></div> ",
            'columns' => [

                [
                    'attribute' => 'foto',
                    'label' => false, //'Histórico',
                    // 'label' => 'Histórico',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $valor = '';
                        if (!empty($model->foto)) {

                            $datahistorico = date_format(date_create($model->dt_create, timezone_open('America/Sao_Paulo')), 'd/m/Y');

                            // busca peso e altura
                            $proporcao = Yii::$app->uteis->findModelValue('app\models\Proporcao', $model->proporcao_id, 'attributes');
                            $peso = Yii::$app->uteis->findModelValue('app\models\Peso', $proporcao['peso_id'], 'peso');
                            $altura = Yii::$app->uteis->findModelValue('app\models\Altura', $proporcao['altura_id'], 'altura');

                            // verifica proporção
                            if (empty($proporcao)) return '
                            <div class="alert alert-danger" role="alert">
                                Histórico não encontrado. ' . $datahistorico . '
                            </div>';

                            // busca nome do treino
                            $treino = Yii::$app->uteis->findModelValue('app\models\Treino', $model->treino_id, 'nome');

                            // busca nome dos exercicios
                            $treinoExercicio = Yii::$app->uteis->findModelValueAll('app\models\TreinoHasExercicio', ['treino_id' => $model->treino_id], 'exercicio_id', 'array');
                            $exercicios = '';
                            foreach ($treinoExercicio as $value) {
                                $exercicioNome = Yii::$app->uteis->findModelValue('app\models\Exercicio', $value, 'nome');
                                $exercicioPeso = Yii::$app->uteis->findModelValue('app\models\Exercicio', $value, 'peso');
                                $exercicios .= $exercicioNome . ' - ' . $exercicioPeso . '<br/>';
                            }

                            // descriptografar foto
                            $imgUrl = Yii::$app->uteis->descriptografar($model->foto, 'totech');

                            // preenche card com os dados
                            $valor .= ' 
                                <div class="card mb-3" style="max-width: 100%;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img onerror="this.errored=true;" src="data:image/*;base64,' . $imgUrl . '" class="img-fluid rounded-start" alt="Foto progresso">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">'.$treino.' </h5>
                                                <p class="card-text">' . $exercicios . '</p>
                                                <p class="card-text"><small class="text-body-secondary">Peso: ' . $peso. ' Altura:'.$altura.' - ' . $datahistorico . '</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            ';
                        }

                        return $valor;
                    }
                ],

            ],
        ]); ?>

    </div>

    <?php Pjax::end(); ?>

</div>


<!-- 
    < ?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        
        [
            'attribute' => 'dt_create',
            'format' => ['datetime', 'php:d/m/Y']
        ],
        [
            'attribute' => 'foto',
            'format' => 'raw',
            'value' => function($model) {
                $valor

            }
        ],
        [
            'attribute' => 'treino_id',
            'format' => 'raw',
            'value' => function($model) {

            }
        ],
        [
            'attribute' => 'proporcao_id',
            'format' => 'raw',
            'value' => function($model) {

            }
        ],

        [
            'class' => ActionColumn::className(),
            'header' => 'Ações',
            'options' => ['style' => 'width: 40px; justify-content: center;'],
            'buttonOptions' => ['class' => 'btn btn-outline-danger'],
            'template' => '<div class="btn-group-vertical btn-group-sm text-center" > {delete} </div>',
            'urlCreator' => function ($action, Semana $model, $key, $index, $column) {

                if ($action == 'delete') {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            }
        ],
    ],
]); 
?> -->