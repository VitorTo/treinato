<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Treino $model */

$this->title = Yii::t('app', 'Atualizar: {name}', [
    'name' => $model->nome,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Semanas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $model->nome.'');
?>
<div class="treino-create">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Renomeie e adicione exercícios antes de salvar ou cancele para <b>manter inalterado</b>.</span>
    </div>
    
    <hr>

    <?= $this->render('_update', [
        'model' => $model,
        'modelExercicio' => $modelExercicio
    ]) ?>

</div>