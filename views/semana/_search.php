<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SemanaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'segunda') ?>

    <?= $form->field($model, 'terca') ?>

    <?= $form->field($model, 'quarta') ?>

    <?= $form->field($model, 'quinta') ?>

    <?php // echo $form->field($model, 'sexta') ?>

    <?php // echo $form->field($model, 'sabado') ?>

    <?php // echo $form->field($model, 'repeticao') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'dt_create') ?>

    <?php // echo $form->field($model, 'dt_update') ?>

    <?php // echo $form->field($model, 'dt_delete') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
