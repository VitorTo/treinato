<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Peso $model */

$this->title = Yii::t('app', 'Create Peso');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pesos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
