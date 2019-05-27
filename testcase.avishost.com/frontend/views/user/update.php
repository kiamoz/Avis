<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'ویرایش: ' . $model->name_and_family;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_and_family, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    
    
    
     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <?php if(2>3){ ?>
 <?php $form = ActiveForm::begin(); ?>
     <?= $form->field($model, 'name_and_family')->textInput(['maxlength' => 200]) ?>
   <?= $form->field($model, 'username')->textInput(['maxlength' => 200]) ?>
 <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ثبت' : 'ویرایش', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>        


    <?php ActiveForm::end(); ?>
    
    <?php } ?>
    
</div>
</div>
