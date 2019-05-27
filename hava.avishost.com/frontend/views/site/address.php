<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use common\models\User;
use common\models\Post;
use common\models\location;
use yii\widgets\ActiveForm;

$this->title = "ثبت آدرس";
?>
<section  class="product-single ">
    <div class="container" style="padding-top: 50px;">

        <style>

            ul#select2-order-address_id-results li:last-child {
                background: orange;
                color: #fff;
            }

        </style>

        <section class="account-content">
            <div class="account-content-wrapper">
                <div class="container">
                    <div class="row">
                         <div class="col-md-12 ">
                        <?php $form = ActiveForm::begin(['action' => ['site/address']]); ?>
                        <div class="account-content-inner">
                            <div id="customer-account">
                                <div id="customer_orders">
                                    <div class="mb20  codediv adressdiv ">
                                        <?php if ($msg) {
                                            ?>
                                            <div class="rdirection alert alert-info">
                                                <label class="font-size-13"> <?php echo $msg; ?></label>
                                            </div>
                                        <?php } ?>
                                        <div class="rdirection alert alert-info">
                                            <?php //$addresss=\common\models\User::findOne(Yii::$app->user->identity->id); 
                                            ?>
                                            <label class="font-size-13"> </label>
                                            <label><?php //echo $addresss->address;                 ?></label>
                                            <label class="font-size-13">انتخاب یا ثبت آدرس جدید</label>
                                        </div>
                                        <?php
                                        
                                         if ($address_object->scenario != 'new_address') {
                                        $usr_address = \common\models\Address::find()->where('user_id=' . Yii::$app->user->identity->id)->all();
                                        foreach ($usr_address as $usr_address1) {
                                            $data_add[$usr_address1->id] = $usr_address1->address;
                                        }
                                         }



                                        $data_add[-2] = "ثبت آدرس جدید";

                                        
                                        if ($address_object->scenario == 'new_address') {
                                            $order->address_id = -2;
                                        } 
                                        
                                      

                                        echo $form->field($order, 'address_id')->widget(Select2::classname(), [
                                            'data' => $data_add,
                                            'options' => ['placeholder' => 'یک آدرس انتخاب کنید'],
                                        ]);
                                        
                                        
                                      
                                        ?>           



                                    </div>
                                    
                                    
                                    <?php  if ($address_object->scenario == 'new_address') { ?>
                                   
                                    <div class="mb20 " id="hide_address"  >
                                        <?php
                                        $_state = \common\models\State::find()->all();
                                        $data = array();
                                        foreach ($_state as $state) {
                                            $data[$state->id] = $state->name;
                                        }

                                        echo $form->field($address_object, 'state_id')->widget(Select2::classname(), [
                                            'data' => $data,
                                            'options' => ['placeholder' => 'یک استان انتخاب کنید'],
                                        ]);
                                        ?>
                                        <!--                                                                                                                            /*************** location js-->
                                        <br>
                                        <?php
                                        if ($address_object->city_id)
                                            $arr[$address_object->city_id] = location::findOne($address_object->city_id)->name;

                                        echo $form->field($address_object, 'city_id')->widget(Select2::classname(), [
                                            'data' => $arr,
                                            'options' => ['placeholder' => 'یک شهر انتخاب کنید'],
                                        ]);
                                        ?>
                                        <br>

                                     
                                        <?php
                                        echo $form->field($address_object, 'name_and_fam');
                                        echo $form->field($address_object, 'address')->textarea();
                                         echo $form->field($address_object, 'postal_code');
                                        echo $form->field($address_object, 'cell_number');
                                       
                                       
                                        echo $form->field($address_object, 'description')->textarea();
                                        ?>  




                                        



                                    </div>
                                    
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="mb20 col-lg-12 mt20">

                                <div class="right-side float-none-xs"> 
                                      <a href="<?php echo Url::to(['site/cart']) ?>"> 
                                        <div  class="btn btn-default">بازگشت به سبد خرید</div>
                                    </a>
                                </div>
                                
                                <div class=" float-none-xs"> 
                                     <?= Html::submitButton('ثبت سفارش', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                </div>
                                
                                


                                <?php ActiveForm::end(); ?>


                                </a>
                            </div>
                        </div>
                             
                         </div>
                    </div>



                </div>

        </section>
    </div>

</section>

