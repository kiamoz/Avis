<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FarayandDetail */

$this->title = 'Create Farayand Detail';
$this->params['breadcrumbs'][] = ['label' => 'Farayand Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
