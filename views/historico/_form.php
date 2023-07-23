<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Historico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="historico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'foto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'dt_create')->textInput() ?>

    <?= $form->field($model, 'dt_update')->textInput() ?>

    <?= $form->field($model, 'dt_delete')->textInput() ?>

    <?= $form->field($model, 'treino_id')->textInput() ?>

    <?= $form->field($model, 'proporcao_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
