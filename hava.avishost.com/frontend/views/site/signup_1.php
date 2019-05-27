<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<section class="checkout-section ptb-70">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="row justify-content-center">
                  <div class="col-md-6 ">
                      
                       <?php $form = ActiveForm::begin(['id' => 'form-signup','class'=>'main-form full']); ?>
<div class="heading-part heading-bg">
                          <h2 class="heading">ثبت نام</h2>
                        </div>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری(شماره همراه)') ?>

                <?= $form->field($model, 'email')->label('ایمیل ') ?>
            

                <?= $form->field($model, 'password')->passwordInput()->label('گذرواژه ') ?>

                <div class="form-group">
                    <?= Html::submitButton('عضویت', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?> 
                  
                </div>
                  
                <div class="col-md-6 ">
                    
                   <?php $form = ActiveForm::begin(['id' => 'form-login','class'=>'main-form full']); ?>

                        <div class="heading-part heading-bg">
                          <h2 class="heading">ورود اعضا</h2>
                        </div>
                   
                <?= $form->field($login_model, 'username')->textInput(['autofocus' => true])->label('نام کاربری(شماره همراه)') ?>

                <?= $form->field($login_model, 'password')->passwordInput()->label('گذرواژه ') ?>

                <div class="form-group">
                    <?= Html::submitButton('ورود', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                    
                     <div class="col-12"> <a title="Forgot Password" class="forgot-password mtb-20" href="javascript:void(0)">Forgot your password?</a>
                        <hr>
                      </div>

            <?php ActiveForm::end(); ?>   
                    
                  
                </div>
                  
                  
              </div>
            </div>
          </div>
        </div>
      </section>



