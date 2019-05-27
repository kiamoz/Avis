<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Farayand_serach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'فرایند';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ثبت فرآیند جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{detail} {link} {update} {delete} {view} ',
                'buttons' => [
                    'link' => function ($url, $model, $key) {

                        
                            return Html::a('<button type="button" class="btn btn-success btn m-r-10 m-b-10 ">ثبت مخاطبان ذي نفع </button>', Url::to(['/farayand-detail/create', 'farayand_id' => $model->id]), $options);
                    },
                             'detail' => function ($url, $model, $key) {

                        
                            return Html::a('<button type="button" class="btn btn-success btn m-r-10 m-b-10 ">لیست مخاطبان ذي نفع </button>', Url::to(['/farayand-detail/index', 'FarayandDetail_serach[farayand_id]' => $model->id]), $options);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
