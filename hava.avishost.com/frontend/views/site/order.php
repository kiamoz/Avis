<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\Product;
use yii\widgets\LinkPager;
use common\models\Post;

$this->title = 'سفارشات';
$this->params['breadcrumbs'][] = $this->title;
?>
<article id="post-78" class="post-78 post type-post status-publish format-standard has-post-thumbnail hentry category-blog tag-best tag-cappuccino tag-coffee text-page-wrap">
    <!-- .entry-content -->
    <div class="entry-content container">
        <div class="row">

            <div class="col-md-12">
                <div class="area-title bdr">
                    <h2 style="text-align: right">سفارشات شما </h2>
                </div>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="c-head">
                            <th> </th>
                            <th> شماره سفارش </th>

                            <th>مبلغ سفارش</th>
                           
                            <th>تاریخ</th>
                            <th>وضعیت</th>
                           
                            <th> جزئیات</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    foreach ($ord as $order) {
                        $i++;
                        ?>
                        <tr>
                            <td class="c-img">
                                <?php echo Post::arabic_w2e($i); ?>
                            </td>

                            <td class="order_id">
                                <?php echo Post::arabic_w2e(number_format($order->id)) ?>
                            </td>

                            <td class="c-price"> 
                                <?php echo Post::arabic_w2e(number_format($order->price)) . ' ' ?><span>ریال </span>
                            </td>
                            
                            <td class="c-price"> 
                                <?php echo Post::arabic_w2e($order->date_farsi); ?>
                            </td>
                            <td class="c-price"> 
                                <?php if ($order->status != 3 and $order->status != 5) { ?>

                                    <a href="<?php echo Url::to(['site/payment_req', 'id' => $order->id, 'pay' => 1]) ?>" class="btn btn-xs btn-info floatr">پرداخت</a>
                                    <?php
                                }
                                ?>
                                <?= \common\models\Order::status_text[$order->status]; ?>
                                    <?php if ($order->status >= 5) { ?>
                                    <br>
                                    کد پیگیری پستی :<?= $order->ship_code  ?>
                                    
                                     <?php
                                }
                                ?>
                            </td>
                            
                            <td class="trash-btn">
                                <a class="btn btn-xs btn-info" href="<?php echo Url::to(['site/details', 'id' => $order->id]) ?>">
                                    نمایش 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
                <?php
                echo LinkPager::widget([
                    'firstPageLabel' => 'ابتدا',
                    'lastPageLabel' => 'انتها',
                    'pagination' => $pages,
                ]);
                ?> 

            </div>


        </div>
    </div>
</article>

