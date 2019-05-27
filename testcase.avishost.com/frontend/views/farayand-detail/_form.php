<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\FarayandDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="farayand-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'shakhes_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\FarayandShakhes::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'یک  شاخص انتخاب کنید'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?=
    $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => \common\models\Farayand::status_text,
        
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'karkonan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'karkonan_fam')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'omom_moshtari')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'moshtari_vije')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'moshtari_family')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sazman_moshtari')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'karkona_sazman')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'moshtarian_sazman')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'omome_jame')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jame_gogra')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jame_sharay')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sazman_saham')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sherkat_zir')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'modir_sazman')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ثبت' : 'ویرایش', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
