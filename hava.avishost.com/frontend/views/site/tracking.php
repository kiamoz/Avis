<?php

use yii\helpers\Url;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;

$this->title = 'پیگیری خرید';
?>
<section  class="product-single ">
    <div class="container" style="padding-top: 50px;">

        <section class="main-blog vc-main-blog">
            <div class="container">
                <h1>
                    <?= $this->title ?>
                </h1>
                
                <?php
                if($msg==1){
                ?>

            <div class=" alert alert-success rdirection text-center">
                سفارش شما با موفقیت ثبت شد. شماره سفارش : <?php echo $order; ?>

            </div>
                
                <?php
                }else{
                    
                    
                    if($msg==17){
                        
                     ?>

            <div class=" alert alert-danger rdirection text-center">
                شما از پرداخت منصرف شده اید. شماره سفارش : <?php echo $order; ?>

            </div>
                
                <?php
                        
                    }else{
                        
                     ?>

            <div class=" alert alert-danger rdirection text-center">
                سفارش شما با مشکل ثبت شد. شماره سفارش : <?php echo $order; ?>

            </div>
                
                <?php
                    }
                    
                    
                }
                ?>
        

        </section>
    </div>
    
</section>



