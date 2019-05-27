<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
use common\models\Post;
use common\models\PostHasCategory;
use common\models\Category;
use common\models\CategoryHasCategory;
use common\models\Product;
use common\models\ProductPrice;
use common\models\ProductCategory;
use common\models\ProductHasCategory;
use common\models\Persian;
use kartik\select2\Select2;

$site_base = dirname(dirname(dirname(dirname(__FILE__)))) . "/backend/web/";
$this->title = "هوا";
?>   


<!--Banner-->
<section class="banner">

    <!--Background-->
    <div class="bg-parallax bg-1"></div>
    <!--End Background-->

    <div class="container">

        <div class="logo-banner text-center">
            <a href="" title="">
                <img src="images/logo-banner.png" alt="">
            </a>
        </div>

        <!-- Banner Content -->
        <div class="banner-cn">

        
            <!-- End Tabs Cat -->

            <!-- Tabs Content -->
            <div class="tab-content">

                <!-- Search Hotel -->
                <div class="form-cn form-hotel tab-pane active in" id="form-flight">
                    <h2>Where would you like to go?</h2>
                    <div class="form-search clearfix">
                        <form  action="<?= Url::to(['step2']) ?>">
                        <div class="form-submit" style="width: 100%">
                            
                            <a>
                                <button   class="awe-btn awe-btn-lager awe-search mini_">تاخیر پرواز</button>
                            </a>
                            <a>
                                <button   class="awe-btn awe-btn-lager awe-search mini_">لغور پرواز</button>
                            </a>
                            <a>
                                <button   class="awe-btn awe-btn-lager awe-search mini_">جلو گیری از سوار شدن </button>
                            </a>
                            <a>
                                <button   class="awe-btn awe-btn-lager awe-search mini_">از دست دادن کانکشن</button>
                            </a>
                            <a>
                                <button   class="awe-btn awe-btn-lager awe-search mini_">گم شدن چمدان</button>
                            </a>
                            <a>
                                <button   class="awe-btn awe-btn-lager awe-search mini_">دیر رسیدن چمدان</button>
                            </a>
                            <a>
                                <button   class="awe-btn awe-btn-lager awe-search mini_">آسیب به چمدان</button>
                            </a>
                            
                        </div>
                        
                        </form>
                        
                        
                        
                    </div>
                </div>
                <!-- End Search Hotel -->

                <!-- Search Car -->
                
                <!-- End Search Car -->

                <!-- Search Cruise-->
                
                <!-- End Search Cruise -->

                <!-- Search Flight-->
                
                <!-- End Search Flight -->

               
                <!-- End Search Package -->

                <!-- Search Tour-->
                

            </div>
            <!-- End Tabs Content -->

        </div>
        <!-- End Banner Content -->

    </div>

</section>
<!--End Banner-->

<!-- Sales -->

<!-- End Sales -->

<!-- Travel Destinations -->
