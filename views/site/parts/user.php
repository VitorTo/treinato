    
<?php 

use yii\helpers\Url;
use yii\helpers\Html;

$user_id = Yii::$app->user->identity->id;

if(!empty($dadosAtuais)) {
    $dadoUser['Peso'] = Yii::$app->uteis->findModelValue('app\models\Peso', $dadosAtuais->peso_id, 'peso');
    $dadoUser['Altura'] = Yii::$app->uteis->findModelValue('app\models\Altura', $dadosAtuais->altura_id, 'altura');
}

?>
<div class="content">
    
    <!-- form altura/peso -->
    <form id="formPesoAltura" action="<?= Url::to(['proporcao/pesoaltura']) ?>" method="POST">
        <div class="row">
            <input type="text" name="_csrf" value='<?= Html::csrfMetaTags() ?>' hidden />
            <div class="card pb-4">
                <div class="col-md-12 mt-2">
                    <h5>Proporção atual</h5>
                    <small>Preencha suas proporções e clique em <?= !empty($dadoUser) ? 'atualizar' : 'salvar' ?> proporção</small>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="Peso">Peso</label>
                        <input type="text" name="Peso[peso]" id="Peso" class="form-control" placeholder="Ex: 80kg" value="<?= !empty($dadoUser['Peso']) ? $dadoUser['Peso'] : '' ?>" />
                    </div>
                    <div class="col-md-4">
                        <label for="Altura">Altura</label>
                        <input type="text" name="Altura[altura]" id="Altura" class="form-control" placeholder="Ex: 180cm" value="<?= !empty($dadoUser['Altura']) ? $dadoUser['Altura'] : '' ?>" />
                    </div>
                    <div class="col-md-4 btn-div">
                        <button class="btn btn-success w-100" type="submit"> <i class="fas fa-check"></i> <?= !empty($dadoUser) ? 'Atualizar' : 'Salvar'  ?> medidas</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <br>

</div>
