<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'فراموشی رمز ورود';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<style>
    label {
    text-align: right;
    width: 100%;
}
</style>

<section class="checkout-section ptb-70">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-8 ">
                    <form class="main-form full" method="POST">
                    <div class="row">
                      <div class="col-12 mb-20">
                        <div class="heading-part heading-bg">
                          <h2 class="heading">فراموشی رمز ورود</h2>
                        </div>
                      </div>
                       
                      <div class="col-12">
                        <div class="input-box">
                          <label for="login-email">لطفا شماره همراه خود را وارد کنید در صورت صحت و وجود شماره تلفن رمز جدید به شما پیامک می شود</label>
                           <input class="active-form" name="number"  type="text"/>
                          
                          
                        </div>
                      </div>
                      
                        <button name="submit" type="submit" class="btn-color right-side">ارسال رمز جدید</button>
                      
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



    


