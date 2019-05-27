<?php

use yii\helpers\Html;
use yii\web\View;
use common\models\Price;
use common\models\Order;
use common\models\Item;
use common\models\ItemHasOrder;
use common\models\Product;
use yii\helpers\Url;
use yii\widgets\Pjax;

$site_base = dirname(dirname(dirname(dirname(__FILE__))));
$this->title = 'نمایش جزئیات سفارش ';
?>
<article id="post-78" class="post-78 post type-post status-publish format-standard has-post-image hentry category-blog tag-best tag-cappuccino tag-coffee text-page-wrap">
    <!-- .entry-content -->
    <div class="entry-content container">
        <div class="row">

            <div class="col-md-12">
                <div class="area-title bdr">
                    <h2>نمایش جزئیات سفارش </h2>
                </div>
                <div class="table-area dektop_table">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr class="c-head">
                                    <th></th>
                                    <th>نام محصول</th>
                                    <th>قیمت</th>
                                    <th>تعداد</th>
                                    <th>مجموع</th>

                                </tr>
                            </thead>
                            <?php
                            foreach ($order_d as $item) {
                                $_product_item = Product::findOne($item->product_id);
                                $total_weight += (Product::findOne($item->product_id)->weight) * $item->qty;
                                if ($item->variant_id) {
                                    $variant_pice = \common\models\Variant::findOne($item->variant_id);
                                    $total += (($variant_pice->price) * $item->qty);
                                } else {
                                    $total += (Product::get_price($item->product_id,FALSE,FALSE) * $item->qty);
                                }
                                
                                ?>
                                <tr>
                                    <td class="c-img">
                                        <a href="<?php echo Url::to(['product/view', 'id' => $_product_item->id]) ?>">
                                            <?php
                                            $th = Product::findOne($item->product_id);


                                            ?>
                                            <img src="<?PHP echo \common\models\Post::resize_img($site_base . '/backend/web/' . $th->image, 100, 100, "_banner" . $item->product_id); ?>" alt=""></a>
                                        

                                    </td>
                                    <td class="c-name">
                                        <a href="<?php echo Url::to(['product/view', 'id' => $_product_item->id]) ?>"><?PHP echo Product::getName($item->product_id) ?> </a>
                                        <br>
                                        <?php if($model->status==3){ ?>
                                         <a href="/backend/web/<?php echo $_product_item->link ?>"> دانلود فایل </a>
                                        <?php } ?>
                                        
                                    </td>
                                    <td class="c-price"> <?PHP
                                      
                                       
                                            
                                                echo Product::get_price($item->product_id);
                                            
                                        
                                        ?> 
                                    </td>
                                    <td class="c-qty">
                                        <?php echo \common\models\Post::arabic_w2e($item->qty); ?>



                                    </td>
                                    <td class="c-price"> 
                                        <?php
                                        if ($item->variant_id) {
                                            echo common\models\Post::arabic_w2e(number_format(($variat_items->price) * $item->qty)) . 'تومان';
                                        } else {
                                            $_p1 = Product::get_price($item->product_id,FALSE,FALSE) * $item->qty;
                                            if ($_p1 > 0) {
                                                echo common\models\Post::arabic_w2e(number_format($_p1)) . 'تومان';
                                            }
                                        }
                                        ?> 
                                    </td>

                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article> 


