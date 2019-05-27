<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->title = \common\models\Building::findOne(Yii::$app->user->identity->building_id)->name."/"."ثبت کارمند جدید";
?>
 
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-lg-6">

   <?= $form->field($model, 'name_and_family')->textInput(['maxlength' => 200]) ?>
   <?= $form->field($model, 'username')->textInput(['maxlength' => 200]) ?>
  
       <?= $form->field($model, 'admin_postion')->textInput(['maxlength' => 200]) ?>
 <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ثبت' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>        
</div>

    <?php ActiveForm::end(); ?>

</div>
