<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FarayandMoalefe */

$this->title = 'ثبت معلفه جدید';
$this->params['breadcrumbs'][] = ['label' => 'Farayand Moaleves', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-moalefe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
