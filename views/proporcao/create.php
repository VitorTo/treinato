<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Proporcao $model */

$this->title = Yii::t('app', 'Create Proporcao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proporcaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proporcao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
