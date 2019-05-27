
<?php

use yii\helpers\Url;
use common\models\Post;
use common\models\Category;
use yii\widgets\LinkPager;
use common\models\PostHasCategory;
use common\models\Persian;

$tit = Category::findOne($id);
$this->title = $tit->name;
?>


<div class="banner inner-banner1 " style="background-image: url(/backend/web/<?= $tit->img ?>);">
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


<!-- Bread Crumb END -->

<!-- CONTAIN START -->
<section class="ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-listing">
                    <div class="row">
                        <?php
                        foreach ($post_array as $post) {
                            $url =Url::to(['post/view'])."/".$post->post->slug
                            ?>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="blog-item">
                                    <div class="blog-media mb-20">
                                        <img src="<?= Post::resize_img("../../backend/web/" . $post->post->thumb_nail, 413, 257, "_" . $post->post->id . $post->post->auto_update); ?>" alt="Roadie">
                                        <div class="blog-effect"></div> 
                                        <a href="<?= $url ?>" title="Click For Read More" class="read">&nbsp;</a>  
                                    </div>
                                    <div class="blog-detail">
                                        <span class="post-date"><?= Persian::convert_date_to_fa($post->post->date, TRUE) ?></span>
                                        <div class="blog-title"><a href="<?= $url ?>"><?= $post->post->title ?></a></div>
                                        <p><?= Post::limitword($post->post->summery, 50) ?></p>


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



                </div>
            </div>
        </div>
    </div>
</section>


