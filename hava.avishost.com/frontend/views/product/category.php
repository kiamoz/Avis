
<?php

use yii\helpers\Url;
use common\models\Post;
use common\models\Product;
use yii\widgets\LinkPager;
?>

<?php $tit = \common\models\ProductCategory::find()->where(['id' => $id])->one(); 

$this->title =  $tit->name;
if($tit->seo_title)
   $this->title =  $tit->seo_title; 
$this->params['desc'] = $tit->description;
?>


<div class="banner inner-banner1 " style="background-image: url(/backend/web/<?= $tit->img2 ?>);">
        <div class="container">
          <section class="banner-detail center-xs">
            <h1 class="banner-title right-side"><?php echo $tit->name ?></h1>
            <div class="bread-crumb  float-none-xs">
              <ul>
                
                <li>/<a href="/">خانه</a></li>
                <li><span><?php echo $tit->name ?></span></li>
              </ul>
            </div>
          </section>
        </div>
      </div>


<section class="ptb-70">
        <div class="container">
          <div class="row">
            
            <div class="col-xl-10 col-lg-9 col-xl-80per">
              <div class="shorting mb-30">
                <div class="row">
                  <div class="col-xl-6">
                    <div class="view">
                      <div class="list-types grid active "> 
                        <a>
                          <div class="grid-icon list-types-icon"></div>
                        </a> 
                      </div>
                      <div class="list-types list"> 
                        <a>
                          <div class="list-icon list-types-icon"></div>
                        </a> 
                      </div>
                    </div>
                   
                  </div>
                 
                </div>
              </div>
              <div class="product-listing grid-type">
                <div class="inner-listing">
                  <div class="row">
                      <div>
                        <?= $tit->before_product; ?>
                    </div>
                    <?php foreach ($cats as $cat) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-6 item-width mb-30">
                      <div class="product-item">
                        <div class="row">
                          <div class="img-col col-12">
                            <div class="product-image"> 
                                
                              <a  href="<?php echo Url::to(['view' ])."/".$cat->product->slug ?>" >
                                  <img class="example-image" src="<?= Post::resize_img('../../backend/web/'. $cat->product->image, 337,337, '_h2_2' . $cat->product->auto_update); ?>" alt=""/>
                              </a>


                              
                            </div>
                          </div>
                          <div class="detail-col col-12">
                            <div class="product-details">
                              <div class="product-item-details">
                                <div class="product-item-name"> 
                                    <h2><a  href="<?php echo Url::to(['view' ])."/".$cat->product->slug ?>" ><?= $cat->product->name  ?></a></h2>
                                </div>
                               <div class="price-box"> 
                                <span class="price"><?= Product::get_price($cat->product->id); ?></span> 
                                <del class="price old-price">$620.00</del> 
                              </div>
                                
                                <div class="product-des">
                                    <p><?= strip_tags($cat->product->summery)   ?></p>
                                </div>
                              </div>
                              <div class="product-detail-inner">
                                <div class="detail-inner-left">
                                  <ul>
                                      <?php if(Product::get_unavl_text($cat->product->id)['status']){ ?> 
                                    <li class="pro-cart-icon">
                                      <form> 
                                        <button title="Add to Cart" class="add_to_card_ajax_avis" data-id='<?= $cat->product->id ?>' data-stay='0' ></button>
                                      </form>
                                    </li>
                                    
                                      <?php } ?>
                                    
                                    <li class="pro-quick-view-icon"><a title="quick-view" href="<?php echo Url::to(['view' ])."/".$cat->product->slug ?>" class="popup-with-product"></a></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>    
                      </div>
                    </div>
                       <?php } ?>
                  </div>
                    
                    <div class="col-12 mb-sm-30">
                     <?php
                        echo LinkPager::widget([
                            'firstPageLabel' => 'ابتدا',
                            'lastPageLabel' => 'انتها',
                            'prevPageLabel' => 'قبلی', // Set the label for the "previous" page button
                            'nextPageLabel' => 'بعدی',
                            'maxButtonCount' => 10,
                            'pagination' => $page_setup,
                        ]);
                        ?>
                        
                    </div>
                    
                    <div>
                        <?= $tit->body; ?>
                    </div>
                    
                    
                 
                </div>
              </div>
            </div>
              
              <div class="col-xl-2 col-lg-3 mb-sm-30 col-xl-20per">
              <div class="sidebar-block">
                
                
                
                <div class="sidebar-box sidebar-item"> <span class="opener plus"></span>
                  <div class="sidebar-title">
                    <h3><span>آخرین محصولات</span></h3> 
                  </div>
                  <div class="sidebar-contant">
                    <ul>
                      <?php foreach(Product::find()->limit(6)->orderBy(['id'=>SORT_DESC])->all() as $products){ ?>
                      <li>
                        <div class="pro-media"> <a href="<?= Url::to(['view','id'=>$products->id]) ?>"><img alt="T-shirt" src="<?= Post::resize_img("../../backend/web/" . $products->image,  103,103, "_" . $products->id . $products->auto_update); ?>"></a> </div>
                        <div class="pro-detail-info"> <a href="<?= Url::to(['view'])."/".$products->slug ?>"><?= $products->name; ?></a>
                          
                          <div class="price-box"> <span class="price"><?= Product::get_price($products->id); ?></span> </div>
                         
                        </div>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
              
              
          </div>
        </div>
      </section>
