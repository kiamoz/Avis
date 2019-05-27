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
use common\models\User;
use common\models\Post;

$this->title = 'سبد خرید ';
$site_base = dirname(dirname(dirname(dirname(__FILE__))));
?>

<section class="ptb-70">
    <div class="container">

        <?php if ($order_items) { ?>
            <div class="row">
                <div class="col-12">


                    <div class="cart-item-table commun-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>نام محصول</th>
                                        <th>قیمت</th>
                                        <th>تعداد</th>
                                        <th>جمع</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ((array) $order_items as $item) {
                                        $row_p = Product::findOne($item->product_id);
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="<?= Url::to(['product/view','id'=>$row_p->id]) ?>">
                                                    <div class="product-image">
                                                        <img alt="<?= $row_p->name ?>" src="<?PHP echo Post::resize_img('../../backend/web/' . $row_p->image, 100, 100, "_cart" . $item->product_id); ?>">
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="product-title"> 
                                                    <a href="<?= Url::to(['product/view','id'=>$row_p->id]) ?>"><?= $row_p->name ?></a> 
                                                </div>
                                            </td>
                                            <td>


                                                <div class="base-price price-box"> 
                                                    <span class="price"><?= Product::get_price($row_p->id) ?></span> 
                                                </div>


                                            </td>
                                            <td>
                                                <div class="input-box select-dropdown">
                                                    <input type="number" min="1" class="number_qty contr qty_adjust" data-id="<?= $item->id ?>" value="<?= $item->qty ?>" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="total-price price-box"> 
                                                    <span class="price"><?= Product::get_price($row_p->id, FALSE, FALSE) * $item->qty . " " . \common\models\Sitesetting::get_currency_symbol(); ?></span> 
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?= Url::to(['product/remove_qty', 'item_id' => $item->id]) ?>"><i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i></a>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-30">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mt-30 mt-xs-15"> 

                        </div>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
            <hr>
            <div class="mtb-30">
                <div class="row">

                    <div class="col-md-6">
                        <div class="cart-total-table commun-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">جمع کل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>جمع بدون هزینه حمل</td>
                                            <td>
                                                <div class="price-box"> 
                                                    <span class="price"><?= Order::get_total_price(true); ?></span> 
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-30">
                <div class="row">
                    <div class="col-12">
                        <div class="right-side float-none-xs"> 
                            <a href="<?= Url::to(['index']) ?>" class="btn ">ادامه خرید
                                <span><i class="fa fa-angle-right"></i></span>
                            </a> 
                        </div>
                        <div class=" float-none-xs"> 
                            <a href="<?= Url::to(['address']) ?>" class="btn btn-color">
                                
                                
                                <span><i class="fa fa-angle-left"></i></span>
                                ثبت سفارش
                                
                               
                            </a> 
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="rdirection alert alert-info">
                <label class="font-size-13"> </label>
                <label></label>
                <label class="font-size-13">سبد خالی است</label>
            </div>
        <?php } ?>
    </div>
</section>









