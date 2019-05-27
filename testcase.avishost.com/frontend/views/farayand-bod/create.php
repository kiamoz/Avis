<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FarayandBod */

$this->title = 'Create Farayand Bod';
$this->params['breadcrumbs'][] = ['label' => 'Farayand Bods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farayand-bod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
