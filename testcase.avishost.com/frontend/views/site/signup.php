<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ثبت نام';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
   

    

    <div class="row">
        
        <div class="col-lg-8">
            
              <img src="/_old/iran2.jpg" style="width: 100%"/>
           
          
        </div>
        
        <div class="col-lg-4">
             <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'name_and_family') ?>
             
            
             
             
     
                <?= $form->field($model, 'b_name') ?>
             
             
             
        

                <?= $form->field($model, 'password')->passwordInput() ?>
               

                <div class="form-group">
                    <?= Html::submitButton('ثبت نام', ['class' => 'btn btn-lg btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
