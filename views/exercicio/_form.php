<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Exercicio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="exercicio-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-md-2">
            <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-md-3">
            <?= $form->field($model, 'observacao')->textarea(['rows' => 1]) ?>
        </div>

        <div class="col-md-3 btn-div">
            <div class="form-group w-100">
                <?= Html::submitButton(Yii::t('app', '<i class="fas fa-check"></i> Salvar exercício'), ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>

    </div>
    
    

    <?php ActiveForm::end(); ?>

</div>
