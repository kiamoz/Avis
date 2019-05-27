<?php

use yii\helpers\Url;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;

$this->title = 'انتخاب روش پرداخت';
?>
<style>
    .lh.mtb10 {
        text-align: right;
    }

</style>
<section  class="product-single ">
    <div class="container" style="padding-top: 50px;">

        <section class="main-blog vc-main-blog">
            <div class="container">
                <h2>
                    <?= $this->title ?>
                </h2>

                <div class="col-md-12 direction_rtl mb20">

                    <?php $form = ActiveForm::begin(['action' => ['site/tracking']]); ?>
                    <?php
                    $paymentS = common\models\PaymentMethod::find();
                    if ($_GET['digi'] == 1) {
                        $paymentS = $paymentS->where(['id' => 1]);
                    }
                    $paymentS = $paymentS->all();
                    foreach ($paymentS as $payment) {
                        ?>
                        <div class="lh mtb10" >  
                            <input value="<?= $payment->id ?>" name="payment" type="radio" class="paymethod" <?php if ($payment->id == 1) {
                        echo 'checked="check"';
                    } ?>  > 
                            <span> <?= $payment->name ?> </span>  
                        </div> 
<?php } ?> 


                    <table id="calc_send" class="table-striped" >

                        <tr >
                            <td><h3 class="inlinedis lineheight5"> قابل پرداخت :   </h3></td>
                            <td><label id="jamekol" class="inlinedis lineheight5"><?= $order . \common\models\Sitesetting::get_currency_symbol(); ?></label>  </td>
                        </tr>



                    </table>





                </div>
                <div class="col-md-12 mt20">
                    <a href="<?php echo Url::to(['site/tracking']) ?>">  


                        <button class="btn btn-primary" type="submit" style="margin-top: 20px;">پرداخت  

                          
                        </button> 
                    </a>

                </div>


<?php ActiveForm::end(); ?>


                <!-- Modal content-->



        </section>
    </div>

</section>
