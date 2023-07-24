<?php

use app\models\Exercicio;
use app\models\TreinoHasExercicio;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Treino $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Treinos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="treino-view">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Visualize o seu treino.</span>
    </div>
    
    <hr>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'nome',
            [
                'attribute' => 'nome',
                'label' => 'Exercícios',
                'format' => 'raw',
                'value' => function ($model) {

                    $treinoExercicio = TreinoHasExercicio::findAll(['status' => 1, 'treino_id' => $model->id]);

                    $exercicios = '';
                    foreach ($treinoExercicio as $value) {

                        $exercicio = Exercicio::findOne($value['exercicio_id']);

                        if (empty($exercicio)) continue;

                        $exercicios .= $exercicio['nome'] . ' - ' . $exercicio['peso'] . '<br />';
                    }

                    return $exercicios;
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    $valor = ' <span class="badge bg-danger">Desativado</span>';
                    if ($model->status == 1) {
                        $valor = ' <span class="badge bg-success">Ativo</span>';
                    }

                    return $valor;
                }
            ],
        ],
    ]) ?>

</div>