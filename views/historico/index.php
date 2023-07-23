<?php

use app\models\Historico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\HistoricoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Historicos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Historico'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'foto:ntext',
            'status',
            'dt_create',
            'dt_update',
            //'dt_delete',
            //'treino_id',
            //'proporcao_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Historico $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'treino_id' => $model->treino_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
