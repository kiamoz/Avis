<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Farayand */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Farayands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ثبت مخاطبان ذي نفع ', ['/farayand-detail/create', 'farayand_id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
