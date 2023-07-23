<?php

use app\models\Treino;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */
/** @var yii\widgets\ActiveForm $form */

$user_id = Yii::$app->user->identity->id;

?>

<div class="semana-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-3">

            <?= $form->field($model, 'segunda')->dropDownList(
                ArrayHelper::map(
                    Treino::find()->where(['status' => 1, 'user_id' => $user_id])->asArray()->all(),
                    function ($model) {
                        return $model['id'];
                    },
                    function ($model) {
                        return $model['nome'];
                    }
                ),
                ['prompt' => 'Selecione um treino..']
            ) ?>

        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'terca')->dropDownList(
                ArrayHelper::map(
                    Treino::find()->where(['status' => 1, 'user_id' => $user_id])->asArray()->all(),
                    function ($model) {
                        return $model['id'];
                    },
                    function ($model) {
                        return $model['nome'];
                    }
                ),
                ['prompt' => 'Selecione um treino..']
            ) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'quarta')->dropDownList(
                ArrayHelper::map(
                    Treino::find()->where(['status' => 1, 'user_id' => $user_id])->asArray()->all(),
                    function ($model) {
                        return $model['id'];
                    },
                    function ($model) {
                        return $model['nome'];
                    }
                ),
                ['prompt' => 'Selecione um treino..']
            ) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'quinta')->dropDownList(
                ArrayHelper::map(
                    Treino::find()->where(['status' => 1, 'user_id' => $user_id])->asArray()->all(),
                    function ($model) {
                        return $model['id'];
                    },
                    function ($model) {
                        return $model['nome'];
                    }
                ),
                ['prompt' => 'Selecione um treino..']
            ) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'sexta')->dropDownList(
                ArrayHelper::map(
                    Treino::find()->where(['status' => 1, 'user_id' => $user_id])->asArray()->all(),
                    function ($model) {
                        return $model['id'];
                    },
                    function ($model) {
                        return $model['nome'];
                    }
                ),
                ['prompt' => 'Selecione um treino..']
            ) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'sabado')->dropDownList(
                ArrayHelper::map(
                    Treino::find()->where(['status' => 1, 'user_id' => $user_id])->asArray()->all(),
                    function ($model) {
                        return $model['id'];
                    },
                    function ($model) {
                        return $model['nome'];
                    }
                ),
                ['prompt' => 'Selecione um treino..']
            ) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'repeticao')->textInput(['maxlength' => true, 'placeholder' => 'Ex: 4x12']) ?>
        </div>

        <div class="col-md-3 btn-div">
            <div class="form-group w-100">
                <?= Html::submitButton(Yii::t('app', '<i class="fas fa-check"></i> Salvar'), ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>