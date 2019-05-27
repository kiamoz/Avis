<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Farayand */

$this->title = 'ثبت فرایند جدید';
$this->params['breadcrumbs'][] = ['label' => 'Farayands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
