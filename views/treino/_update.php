<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Treino $model */
/** @var yii\widgets\ActiveForm $form */
?>
<link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/css/form-treino.css?v=<?= date('YmdHis')?>">

<div class="treino-form">

    <form action="<?= Url::to(['treino/update', 'id' => $model->id]) ?>" method="post">

        <input type="text" name="_csrf" value='<?= Html::csrfMetaTags() ?>' hidden />

        <div class="row">

            <div class="col-md-8">
                <label for="inputNome">Nome treino</label>
                <input class="form-control" type="text" name="Treino[nome]" id="inputNome" placeholder="Ex: Ombro" required value="<?= $model->nome ?>" />
            </div>

            <div class="col-md-4 btn-div">
                <div class="form-group w-50">
                    <button class="btn btn-success w-100 mt-4" type="submit"> <i class="fas fa-check"></i> Salvar</button>
                </div>
                <div class="form-group w-50">
                    <a class="btn btn-danger w-100 mt-4" > <i class="fas fa-ban"></i> Cancelar alteração</a>
                </div>
            </div>

            <div class="col-md-12">

                <div class="row  ">

                    <div class="col-md-6">

                        <div class="row" style="height: 20em;">

                            <div class="card border-success col-md-12 pb-2">

                                <div class="card-title text-bold" style="border-bottom: 1px solid #198754;">Exercícios selecionados:</div>
                                <div style="display: flex; flex-direction: column;" class="card-body" id="selecionado"></div>

                            </div>

                        </div>

                    </div>

                    <?php if (!empty($modelExercicio)) { ?>

                        <div class="col-md-6 ">

                            <div class="row">

                                <div class="col-md-12 d-flex ">
                                    <input type="text" class="form-control" id="inputSearch" placeholder="Pesquise aqui" />
                                    <button id="btnSearch" type="button" style="width: 38px; height: 38px; display: flex; justify-content: center; flex-direction: column; flex-wrap: nowrap; align-items: center;" class="btn btn-success"> <i class="fas fa-search"></i> </button>
                                </div>

                                <div class="conteudo">

                                    <ul class="list-group list-group-numbered col-md-12 barra-rolagem  " style="overflow-x:auto; height:17.5em; padding-right: 10px !important;">

                                        <?php foreach ($modelExercicio as $exercicio) {

                                            $idExercicio = $exercicio['id'];
                                            $nome = !empty($exercicio['nome']) ? $exercicio['nome'] : 'nome indefinido';
                                            $obs = !empty($exercicio['observacao']) ? $exercicio['observacao'] : 'observação indefinida';
                                            $peso = !empty($exercicio['peso']) ? $exercicio['peso'] : 'Xkg';

                                        ?>
                                            <div class="buscar">

                                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-start" id="li<?= $idExercicio ?>">
                                                    <div class="ms-2 me-auto name ">
                                                        <div class="fw-bold nome"><?= $nome ?></div>
                                                        Obs: <?= $obs ?>
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill peso"><?= $peso ?></span>
                                                </li>

                                            </div>

                                        <?php } ?>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            </div>

        </div>

    </form>

</div>

<script src="<?= Yii::getAlias('@web')?>/js/form-treino.js?v=<?= date('YmdHis')?>"></script>