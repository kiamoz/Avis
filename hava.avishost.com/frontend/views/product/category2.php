
<?php

use yii\helpers\Url;
use common\models\Post;
use common\models\Product;
?>

<?php $tit = \common\models\ProductCategory::find()->where(['id' => $id])->one(); 
$this->title =  $tit->name;
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
                    <?php foreach ($cate as $cat) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-6 item-width mb-30">
                      <div class="product-item">
                        <div class="row">
                          <div class="img-col col-12">
                            <div class="product-image"> 
                                
                              <a  href="<?php echo Url::to(['category', 'id' => $cat->productCategory->id, 'cat_id' => $id]) ?>" >
                                  <img class="example-image" src="<?= Post::resize_img('../../backend/web/'. $cat->productCategory->img, 337,337, '_h2_2' . $cat->productCategory->auto_update); ?>" alt=""/>
                              </a>


                              
                            </div>
                          </div>
                          <div class="detail-col col-12">
                            <div class="product-details">
                              <div class="product-item-details">
                                <div class="product-item-name"> 
                                 <a  href="<?php echo Url::to(['category', 'id' => $cat->productCategory->id, 'cat_id' => $id]) ?>" ><?= $cat->productCategory->name  ?></a> 
                                </div>
                               
                                
                                <div class="product-des">
                                  <p><?= $cat->productCategory->description  ?></p>
                                </div>
                              </div>
                              <div class="product-detail-inner">
                                <div class="detail-inner-left">
                                  <ul>
                                    
                                    
                                    <li class="pro-quick-view-icon"><a title="quick-view" href="<?php echo Url::to(['category', 'id' => $cat->productCategory->id, 'cat_id' => $id]) ?>" class="popup-with-product"></a></li>
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
                        <div class="pro-media"> <a href="javascript:void(0)"><img alt="T-shirt" src="<?= Post::resize_img("../../backend/web/" . $products->image,  103,103, "_" . $products->id . $products->auto_update); ?>"></a> </div>
                        <div class="pro-detail-info"> <a href="javascript:void(0)"><?= $products->name; ?></a>
                          
                          <div class="price-box"> <span class="price">$520.00</span> </div>
                          <div class="cart-link">
                            <form>
                              <button title="Add to Cart">Add To Cart</button>
                            </form>
                          </div>
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
