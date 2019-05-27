<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

//$this->context->layout = 'main_login';
$this->title = 'صفحه ورود';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="center-vertical">
    <div class="center-content row">

 <div class="col-md-8 col-sm-12  clearfix center-margin">
    
     
  
            <div class="row">
                

                <div class="col-md-12 col-12">

                   <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="content-box">
                           
                            <div class="content-box-wrapper">
                                <?php  if (count($b_list) > 0) {  ?>
                                
                                 <div class="alert alert-default animated fadeIn" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    </button> <strong>توجه:</strong>  شناسه شما در چند ساختمان ثبت شده است لطفا ساختمان مورد نظر را انتخاب و سپس وارد شوید</div>
                                
                                
                                <?php 
                                    
                                    
                                    
                                    $list = array();
                foreach ((array)$b_list as $user) {
                    $list[$user->building_id] = common\models\Building::findOne($user->building_id)->name;
                }
                
                 echo $form->field($model, 'building_id')->widget(Select2::classname(), [
        'data' => $list,
        'language' => 'fa',
        'options' => ['placeholder' => 'لطفا ساختمانی که میخواهید به آن وارد شوید را انتخاب کنید'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
                                    
                                    
                                } ?>
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'password')->passwordInput() ?>
                                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                <a href="yahoo.com">
                                <div class="btn btn-yellow" style="margin-bottom: 10px;">بازیابی رمز عبور</div>
                                </a>
                                
                                <button class="btn btn-success btn-block">ورود اعضا</button>
                            </div>
                        </div>
                   <?php ActiveForm::end(); ?>
                </div>
            </div>
 
        
    </div>
    
</div>



