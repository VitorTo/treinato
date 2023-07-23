<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Altura $model */

$this->title = Yii::t('app', 'Create Altura');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="altura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
