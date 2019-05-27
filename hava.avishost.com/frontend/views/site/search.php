<?php

use yii\helpers\Url;
use common\models\Post;
use yii\widgets\LinkPager;
use common\models\ProductCategory;
use common\models\Product;
$site_base = dirname(dirname(dirname(dirname(__FILE__)))) . "/backend/web/";
?>



<section class="ptb-70">
        <div class="container">
          <div class="row">
            
            <div class="col-md-12">
             
<div class="product-listing grid-type">
                <div class="inner-listing">
                  <div class="row">
                    <?php if ($productS) { ?>
                     
                    <?php foreach ($productS as $related_product) { 
                        
                      
                                        
                        ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-6 item-width mb-30">
                      <div class="product-item">
                        <div class="row">
                          <div class="img-col col-12">
                            <div class="product-image"> 
                                
                              <a  href="<?php echo Url::to(['product/view', 'id' => $related_product->id, ]) ?>" >
                                  <img class="example-image" src="<?= Post::resize_img('../../backend/web/'. $related_product->image, 337,337, '_h2_2' . $related_product->auto_update); ?>" alt=""/>
                              </a>


                              
                            </div>
                          </div>
                          <div class="detail-col col-12">
                            <div class="product-details">
                              <div class="product-item-details">
                                <div class="product-item-name"> 
                                 <a  href="<?php echo Url::to(['product/view', 'id' => $related_product->id]) ?>" ><?= $related_product->name ?></a> 
                                </div>
                               <div class="price-box"> 
                                <span class="price"><?= Product::get_price($related_product->id); ?></span> 
                                <del class="price old-price">$620.00</del> 
                              </div>
                                
                               
                              </div>
                              <div class="product-detail-inner">
                                <div class="detail-inner-left">
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>    
                      </div>
                    </div>
                       <?php } ?>
                       <?php } ?>
                  </div>
                 
                </div>
              </div>
                
                
                <div class="product-listing grid-type">
                <div class="inner-listing">
                  <div class="row">
                
                 <?php
                    if($postS){
                    foreach ($postS as $post) {
                        $src = $site_base . $post->thumb_nail;
                        $url = Url::to(['/post/view', 'id' => $post->id])
                        ?>
                      <div class="col-xl-3 col-lg-4 col-md-4 col-6 item-width mb-30">
                      <div class="product-item">
                        <div class="row">
                          <div class="img-col col-12">
                            <div class="product-image"> 
                                
                              <a  href="<?php echo Url::to(['post/view', 'id' => $post->id, ]) ?>" >
                                  <img class="example-image" src="<?= Post::resize_img('../../backend/web/'. $post->thumb_nail, 337,337, '_h2_2' .$post->id."_".$post->auto_update); ?>" alt=""/>
                              </a>


                              
                            </div>
                          </div>
                          <div class="detail-col col-12">
                            <div class="product-details">
                              <div class="product-item-details">
                                <div class="product-item-name"> 
                                 <a  href="<?php echo Url::to(['post/view', 'id' => $post->id]) ?>" ><?= $post->title ?></a> 
                                </div>
                               <div class="price-box"> 
                                
                                <del class="price old-price">$620.00</del> 
                              </div>
                                
                               
                              </div>
                              <div class="product-detail-inner">
                                <div class="detail-inner-left">
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>    
                      </div>
                    </div>
                      
                       <?php } ?>
                       <?php } ?>
                      
                      
                  </div>
                </div>
                </div>
                
            </div>
          </div>
        </div>
</section>

                
                
                


