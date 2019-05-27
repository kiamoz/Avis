<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\UserHasSemat;
use common\models\UserHasPermission;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?> 

<div class="user-form">
    <style>
        label:nth-child(8) {
            display: block;
            margin-top: 16px;
            margin-bottom: 31px;
            color: #05c1ff;
        }

    </style>
    <?php $form = ActiveForm::begin(); ?> 
    <div class="col-lg-6">
        <?= $form->field($model, 'name_and_family')->textInput(['maxlength' => 200]) ?>
        <?php
        if (!$model->isNewRecord) {
            echo $form->field($model, 'password')->textInput(['maxlength' => 200]);
        }
        ?>
        

        <?= $form->field($model, 'username')->textInput(['maxlength' => 200]) ?>

        
        <?php 
            
        
        

        echo $form->field($model, 'type')->widget(Select2::classname(), [
            'data' => common\models\User::$_acccess,
            'options' => ['placeholder' => 'انتخاب سمت', ],
            'pluginOptions' => [
                'tokenSeparators' => [',', ' '],
                'maximumInputLength' => 10
            ],
        ])->label('سمت');

        
        ?>
        
       
        
        
       






        




        <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'ثبت' : 'ثبت', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

            <?php ActiveForm::end(); ?>

</div>
