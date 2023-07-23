<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */

$this->title = Yii::t('app', 'Criar Semana de treino');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Semanas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semana-create">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Selecione os treinos para cada dia</span>
    </div>

    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
