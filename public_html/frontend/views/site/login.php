<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper-boxed">
  <div class="site-wrapper">
<section class="sec-padding">
    <div class="container">
    <div class="row">
        <div class="col-lg-5" style="float: right">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true , 'float' => 'right'])->label('نام کاربری') ?>

                <?= $form->field($model, 'password')->passwordInput([ 'float' => 'left'])->label('رمز') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('مرا به خاطر بسپار') ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('ورود', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
   
</div>
  </div>
  </div>
</section>
</div>