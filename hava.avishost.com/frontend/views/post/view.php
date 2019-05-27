<?php


use yii\helpers\Url;
use common\models\Post;
use common\models\Category;
use yii\widgets\LinkPager;
use common\models\PostHasCategory;
use common\models\Persian;
$this->params['desc'] = $post->summery;
$this->title = $post->title;
$site_base = dirname(dirname(dirname(dirname(__FILE__)))) . "/backend/web/";

  $src = $site_base . $post->thumb_nail;

?>

               <!-- CONTAIN START -->
      <section class="ptb-70">
        <div class="container">
          <div class="row">
            <div class="col-lg-9">
              <div class="row">
                <div class="col-12 mb-60 post_in">
                    
                    <h1> <?= $post->title; ?></h1>
                 
                      <?php if($post->thumb_nail){?>
                    <img style="margin: 0 auto;    display: block;" src="/backend/web/<?= $post->thumb_nail; ?>" alt="Roadie"> 
                      <?php } ?>
                  
                  <div class="blog-detail ">
                    <div class="post-info">
                      <ul>
                        <li><span class="post-date"><?= Persian::convert_date_to_fa($post->date, TRUE) ?></span></li>
                        
                      </ul>
                    </div>
                   
                    <?= $post->body; ?>
                    <hr>
                  </div>
                </div>
              </div>
              
            </div>
              
              
              
            <div class="col-lg-3">
              <div class="sidebar-block">
                
                
               
                <div class="sidebar-box sidebar-item sidebar-item-wide"> <span class="opener plus"></span>
                  <div class="sidebar-title">
                    <h3><span>پست های مرتبط</span></h3>
                  </div>
                  <div class="sidebar-contant">
                    <ul>
                        <?php foreach(Post::related_posts($post->id, 10) as $posts){ ?>
                      <li>
                        <div class="pro-media"> <a href="<?= Url::to(['post/view'])."/".$posts->post->slug ?>"><img alt="T-shirt" src="<?= Post::resize_img("../../backend/web/" . $posts->post->thumb_nail, 150, 150, "_" . $posts->post->id . $posts->post->auto_update); ?>"></a> </div>
                        <div class="pro-detail-info"> <a href="<?= Url::to(['post/view'])."/".$posts->post->slug ?>"><?= $posts->post->title ?></a>
                          <div class="post-info"><?= Persian::convert_date_to_fa($posts->post->date, TRUE) ?></div>
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
         