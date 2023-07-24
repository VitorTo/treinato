<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Historico $model */

$this->title = Yii::t('app', 'Criar histórico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Históricos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historico-create">
    
    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Ajuste seu peso, adicione foto, treino e proporção..</span>
    </div>

    <hr>

    <?= $this->render('_form', [
        'model' => $model,
        'dadosAtuais' => $dadosAtuais
    ]) ?>

</div>