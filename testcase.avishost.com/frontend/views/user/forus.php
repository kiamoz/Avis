<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>
انتخاب نام /شماره واحد 
<br>
        <select class="select2_moz"  name="building[state]">
            <?php 
$bil = common\models\Unit::find()
        
        ->all();
foreach ($bil as $bll) {
?>
  <option value="<?PHP echo $bll->id ?>"><?PHP echo $bll->name ?></option>
  <?PHP } ?>

</select>
<br>
انتخاب مالک
<br>
        <select class="select2_moz"  name="building[state]">
            <?php 
$bil = common\models\Unit::find()
        
        ->all();
foreach ($bil as $bll) {
?>
  <option value="<?PHP echo $bll->id ?>"><?PHP echo $bll->name ?></option>
  <?PHP } ?>

</select>
   <?= $form->field($model, 'number')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 200]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
