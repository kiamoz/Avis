<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FarayandDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Farayand Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            'farayand_id',
          
            'karkonan:ntext',
            'karkonan_fam:ntext',
            'omom_moshtari:ntext',
            'moshtari_vije:ntext',
            'moshtari_family:ntext',
            'sazman_moshtari:ntext',
            'karkona_sazman:ntext',
            'moshtarian_sazman:ntext',
            'omome_jame:ntext',
            'jame_gogra:ntext',
            'jame_sharay:ntext',
            'sazman_saham:ntext',
            'sherkat_zir:ntext',
            'modir_sazman:ntext',
            
        ],
    ]) ?>

</div>
