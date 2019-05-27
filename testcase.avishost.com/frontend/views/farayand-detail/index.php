<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FarayandDetail_serach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'لیست  مخطابان فرآیند';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'farayand_id',
            [
                'attribute' => 'shakhes_id',
                'format' => 'raw',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'shakhes_id',
                    'data' => \yii\helpers\ArrayHelper::map(\common\models\FarayandShakhes::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'فیلتر شاخص'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'value' => function ($model) {
                    return \common\models\FarayandShakhes::findOne($model->shakhes_id)->name;
                },
            ],
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'user_id',
                    'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->all(), 'id', 'name_and_family'),
                    'options' => ['placeholder' => 'فیلتر ثبت کننده'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'value' => function ($model) {
                    return \common\models\User::findOne($model->user_id)->name_and_family;
                },
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'status',
                    'data' => \common\models\Farayand::status_text,
                    'options' => ['placeholder' => 'فیلتر وضعیت'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'value' => function ($model) {
                    return \common\models\Farayand::status_text[$model->status];
                },
            ],
           
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
