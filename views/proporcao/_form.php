<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Proporcao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="proporcao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'dt_create')->textInput() ?>

    <?= $form->field($model, 'dt_update')->textInput() ?>

    <?= $form->field($model, 'dt_delete')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'peso_id')->textInput() ?>

    <?= $form->field($model, 'altura_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
