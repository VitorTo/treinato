<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Exercicio $model */

$this->title = Yii::t('app', 'Alterar Exercício: {name}', [
    'name' => $model->nome,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exercicios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="exercicio-update">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Altere o exercício e clique em salvar exercícios.</span>
    </div>

    <hr>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>