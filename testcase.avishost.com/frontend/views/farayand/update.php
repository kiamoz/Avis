<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Farayand */

$this->title = 'ویرایش: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Farayands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="farayand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
