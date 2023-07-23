<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Treino $model */

$this->title = Yii::t('app', 'Criar Treino');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Treinos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treino-create">

    <div>
        <h1><?= Html::encode($this->title) ?></h1>
        <span>Defina o nome do treino e salve para adicionar exercícios a esse treino.</span>
    </div>
    
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
        'modelExercicio' => $modelExercicio
    ]) ?>

</div>