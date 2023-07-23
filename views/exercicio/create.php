<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Exercicio $model */

$this->title = Yii::t('app', 'Criar Exercício');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exercícios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercicio-create">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Criando exercício para um treino</span>
    </div>

    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
