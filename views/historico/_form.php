<?php

use app\models\Proporcao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Treino;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Historico $model */
/** @var yii\widgets\ActiveForm $form */


$user_id = Yii::$app->user->identity->id;
?>

<div class="historico-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <div class="row">
        <div class="card pb-4">
            <div class="col-md-12 mt-2">
                <h5>Foto e treino atual</h5>
                <small>Preencha seus dados e clique em salvar</small>
            </div>
            <hr>
            <div class="row">

                <div class="col-md-6">
                    <?= $form->field($model, 'foto')->input('file', [ 'accept' => "image/*", 'capture' => "camera", 'id' => "cameraInput", 'multiple' => 'true']) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'treino_id')->dropDownList(
                        ArrayHelper::map(
                            Treino::find()->where(['status' => 1, 'user_id' => $user_id])->asArray()->all(),
                            function ($model) {
                                return $model['id'];
                            },
                            function ($model) {
                                return $model['nome'];
                            }
                        ),
                        ['prompt' => 'Selecione um treino..', 'required' => true]
                    ) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'proporcao_id')->dropDownList(
                        ArrayHelper::map(
                            Proporcao::find()->where(['status' => 1, 'user_id' => $user_id])->asArray()->all(),
                            function ($model) {
                                return $model['id'];
                            },
                            function ($model) {

                                $altura = Yii::$app->uteis->findModelValue('app\models\Altura', $model['altura_id'], 'altura');
                                $peso = Yii::$app->uteis->findModelValue('app\models\Peso', $model['peso_id'], 'peso');

                                return $peso.' - '.$altura;
                            }
                        ),
                        ['prompt' => 'Selecione um treino..', 'required' => true]
                    ) ?>
                </div>

                <div class="col-md-3 btn-div">
                    <div class="form-group w-100">
                        <?= Html::submitButton(Yii::t('app', '<i class="fas fa-check"></i> Salvar'), ['class' => 'btn btn-success w-100']) ?>
                    </div>
                </div>

            </div>

        </div>

    </div>



    <?php ActiveForm::end(); ?>

</div>


<script>
    // Adicione o evento para capturar as fotos após a seleção.
    document.getElementById('cameraInput').addEventListener('change', function(e) {
        const files = e.target.files;
        const imagePreview = document.getElementById('imagePreview');

        // Limpar visualizações anteriores, se houver.
        imagePreview.innerHTML = '';

        // Iterar sobre os arquivos selecionados.
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(event) {
                // Criar elemento de imagem para visualização.
                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.maxWidth = '200px';
                img.style.margin = '10px';
                imagePreview.appendChild(img);
            };

            // Ler o arquivo como URL de dados (base64).
            reader.readAsDataURL(file);
        }
    });
</script>