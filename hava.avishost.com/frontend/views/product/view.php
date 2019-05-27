<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\ProductCategory;
use common\models\Post;
use common\models\Product;



$this->title = $product->english_name  ? $product->english_name : $product->name;
$this->params['desc'] = $product->body;
?>


<?php $tit = \common\models\ProductCategory::find()->where(['id' => Product::getProductCats($product->id)[0]])->one(); ?>




<div class="banner inner-banner1 " style="background-image: url(/backend/web/<?= $tit->img2 ?>);">
        <div class="container">
          <section class="banner-detail center-xs">
            <h1 class="banner-title right-side"><?php echo $product->name ?></h1>
            <div class="bread-crumb  float-none-xs">
              <ul>
                
                <li>/<a href="/">خانه</a></li>
                <li><span><?php echo $product->name ?></span></li>
              </ul>
            </div>
          </section>
        </div>
      </div>



<section class="pt-70">
        <div class="container">
            <div class="row" id="mob_felex">
            
            
                
              <div class="col-lg-7 col-md-7" id="b">
                  <div class="row">
                    <div class="col-12">
                      <div class="product-detail-main">
                        <div class="product-item-details">
                          <h2 class="product-item-name"><?php echo $product->name ?></h2>
                          
                          <div class="price-box"> <span class="price"><?= Product::get_price($product->id); ?></span> <del class="price old-price">$620.00</del> </div>
                          <div class="product-info-stock-sku">
                              
                              <div style="display: none;">
                              <label>Availability: </label>
                              <span class="info-deta">In stock</span> 
                            </div>
                            
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          <p><?= $product->summery ?></p>
                          
                          <hr class="mb-20"> 
                          
                          <?php $unavl_obj = Product::get_unavl_text($product->id) ?>
                          
                          <?php if($unavl_obj['status']){ ?> 
                          <div class="mb-20">
                            <div class="row">
                             
                                
                                
                             
                              <div class="col-12">
                                <div class="row right-side qtysec">
                                  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-3">
                                    <span>تعداد:</span>
                                  </div>
                                  <div class="col-xl-9 col-lg-8 col-md-8 col-sm-9">
                                    <div class="custom-qty">
                                      <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
                                      <input type="text" class="input-text qty" title="Qty" value="1" maxlength="8" id="qty" name="qty">
                                      <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                
                               
                                
                                
                            </div>
                          </div>
                          <hr class="mb-20">
                          <div class="bottom-detail cart-button right-side">
                            <ul>
                                
                              <li class="pro-cart-icon">
                                
                                  <button title="Add to Cart" class="btn-color add_to_card_ajax_avis" data-id='<?= $product->id ?>' data-stay='1' > <i class="fa fa-shopping-basket" style="margin-left: 10px"></i>اضافه به سبد خرید </button>
                                
                              </li>
                              
                            </ul>
                          </div>
                          
                           <?php }else{ ?>
                          
                          <button   class="<?= $unavl_obj['class']  ?>" data-id='<?= $product->id ?>' data-stay='1' ><?= $unavl_obj['text']  ?></button>
                                
                          
                           <?php } ?>
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
              <div class="col-lg-5 col-md-5 mb-xs-30" id="a">
                  
                  
                

                                                
                  
                  <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native"> 
                    <a href="#"><img src="<?= '/backend/web/'.$product->image ?>" alt="Roadie"></a> 
                    
                    <?php 
                    
                    $product->gallery = trim($product->gallery);
                                if ($product->gallery) {
                                    $product->gallery = trim($product->gallery);
                                    $gallery_array = explode("\n", $product->gallery);
                                }
                    
                    foreach ((array) $gallery_array as $img) {
                        
                        $img = trim($img);
                        if($img == "")
                        continue;
                        
                        
                    ?>

                                                     <a href="#"><img src="<?= $img ?>" alt="Roadie"></a> 
                    <?php } ?>  
                  
              
                  </div>
                </div>
         
           
            
          </div>
        </div>
      </section>

      <!--tab_content Start -->
      <section class="ptb-70">
        <div class="container">
          <div class="product-detail-tab">
            <div class="row">
              <div class="col-lg-12">
                <div id="tabs">
                  <ul class="nav nav-tabs">
                     <li><a class="tab-Reviews selected" title="Reviews">نقد و بررسی</a></li>
                    <li><a class="tab-Product-Tags" title="Product-Tags">مشخصات فنی</a></li>
                   
                    
                    <li><a class="tab-Description " title="Description"> ویدیوهای محصول</a></li>
                  </ul>
                </div>
                <div id="items">
                  <div class="tab_content">
                    <ul>
                      <li>
                        <div class="items-Description  ">
                          <div class="Description">
                          <?= $product->box ?>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="items-Product-Tags">
                            <?= $product->fani ?>
                        </div>
                      </li>
                      <li>
                        <div class="items-Reviews selected">
                          
                            <?= $product->naghd ?>
                          
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--tab_content End -->

      <!--Related Products Start -->
      <section class="pb-70">
        <div class="container">
          <div class="product-listing">
            <div class="row">
              <div class="col-12">
                <div class="heading-part align-center mb-30">
                  <h2 class="main_title heading"><span>محصولات مرتبط</span></h2>
                </div>
              </div>
            </div>
            <div class="pro_cat">
              <div class="row">
                <div class="owl-carousel pro-cat-slider">
                  <?php
                  
                  $related_productS = Product::get_related_product($product->id, 5);
                                        foreach ((array)$related_productS as $related_product) {
                                            $src = $site_base . $related_product->product->image;
                                            $url = Url::to(['/product/view'])."/".$related_product->product->slug;
                                            ?>
                  <div class="item">
                    <div class="product-item">
                     
                      <div class="product-image"> 
                        <a href="<?= $url ?>"> <img src="<?= Post::resize_img("../../backend/web/" . $related_product->product->image, 411, 411, "_" . $related_product->product->id . $related_product->product->auto_update); ?>" alt="Roadie"> </a>
                      </div>
                      <div class="product-details">
                        <div class="product-item-details">
                          <div class="product-item-name"> 
                            <a href="<?= $url ?>"><?= $related_product->product->name; ?></a> 
                          </div>
                         
                          <div class="price-box"> 
                            <span class="price"><?= Product::get_price( $related_product->product->id); ?></span> 
                            <del class="price old-price">$620.00</del> 
                          </div>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                             
                                 <?php if(Product::get_unavl_text($related_product->product->id)['status']){ ?> 
                                    <li class="pro-cart-icon">
                                      <form> 
                                        <button title="Add to Cart" class="add_to_card_ajax_avis" data-id='<?= $related_product->product->id ?>' data-stay='0' ></button>
                                      </form>
                                    </li>
                                    
                                  <?php } ?>
                              
                              <li class="pro-quick-view-icon"><a title="quick-view" href="#product_popup" class="popup-with-product"></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    
                                        <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


