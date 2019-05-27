<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FarayandShakhes */

$this->title = 'ثبت شاخص جدید';
$this->params['breadcrumbs'][] = ['label' => 'Farayand Shakhes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-shakhes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
