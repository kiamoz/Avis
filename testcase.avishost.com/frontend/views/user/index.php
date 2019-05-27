<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\User;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1>لیست کاربران</h1>

<p>
        <?= Html::a('ثبت شاخص جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'overflow: auto; word-wrap: break-word;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name_and_family',
            'username',
            'password',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                ],
            ],
        ],
    ]);
    ?>




</div>
