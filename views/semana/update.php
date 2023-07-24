<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */

$this->title = Yii::t('app', 'Atualizar {name}º Semana', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Semanas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $model->id.'º Semana');
?>
<div class="semana-update">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Atualizar os treinos de sua semana.</span>
    </div>

    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
