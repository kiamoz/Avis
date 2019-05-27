<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FarayandDetail_serach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="farayand-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'farayand_id') ?>

    <?= $form->field($model, 'shakhes_id') ?>

    <?= $form->field($model, 'karkonan') ?>

    <?= $form->field($model, 'karkonan_fam') ?>

    <?php // echo $form->field($model, 'omom_moshtari') ?>

    <?php // echo $form->field($model, 'moshtari_vije') ?>

    <?php // echo $form->field($model, 'moshtari_family') ?>

    <?php // echo $form->field($model, 'sazman_moshtari') ?>

    <?php // echo $form->field($model, 'karkona_sazman') ?>

    <?php // echo $form->field($model, 'moshtarian_sazman') ?>

    <?php // echo $form->field($model, 'omome_jame') ?>

    <?php // echo $form->field($model, 'jame_gogra') ?>

    <?php // echo $form->field($model, 'jame_sharay') ?>

    <?php // echo $form->field($model, 'sazman_saham') ?>

    <?php // echo $form->field($model, 'sherkat_zir') ?>

    <?php // echo $form->field($model, 'modir_sazman') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
