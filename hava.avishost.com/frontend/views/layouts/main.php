
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
use common\models\Category;
use common\models\Post;
use common\models\Sitesetting;
use common\models\Order;

//$sitesetting = Sitesetting::findone(1);
$site_base = dirname(dirname(dirname(dirname(__FILE__)))) . "/backend/web/";
?>
<!DOCTYPE html>
<?php
$this->beginPage();
$patchx = Yii::$app->controller->id . "/" . Yii::$app->controller->action->id;
?>

<html>
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Font Google -->
        <!-- End Font Google -->
        <!-- Library CSS -->
        <link rel="stylesheet" href="/css/library/font-awesome.min.css">
        <link rel="stylesheet" href="/css/library/bootstrap.min.css">
        <link rel="stylesheet" href="/css/library/jquery-ui.min.css">
        <link rel="stylesheet" href="/css/library/owl.carousel.css">
        <link rel="stylesheet" href="/css/library/jquery.mb.YTPlayer.min.css">
        <!-- End Library CSS -->
        <link rel="stylesheet" href="/css/style.css">
       
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
        <title><?= $sitesetting->title . " | " . Html::encode($this->title) ?></title>


        <?php
        if ($this->params['desc']) {
            $desc = $this->params['desc'];
        } else {
            $desc = $sitesetting->description;
        }
        ?>

        <meta content="<?= strip_tags($desc) ?>" name="description"/>


        <link rel="stylesheet" type="text/css" href="/css/rtl.css?ver=<?= rand(1, 999999) ?>">


        <link rel='stylesheet' type='text/css'   href='<?= Url::to(['/site/color']) ?>'  media='all' />

        <link rel="shortcut icon" href="<?= '/backend/web/' . $sitesetting->fav ?>">
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div id="preloader">
            <div class="tb-cell">
                <div id="page-loading">
                    <div></div>
                    <p>Loading</p>
                </div>
            </div>
        </div>
        <!-- Wrap -->
        <div id="wrap">

            <!-- Header -->
            <header id="header" class="header">
                <div class="container">
                    <!-- Logo -->
                    <div class="logo float-left">
                        <a href="/" title=""><img src="/images/logo-header.png" alt=""></a>
                    </div>
                    <!-- End Logo -->
                    <!-- Bars -->
                    <div class="bars" id="bars"></div>
                    <!-- End Bars -->

                    <!--Navigation-->
                    <nav class="navigation nav-r" id="navigation" data-menu-type="4000">
                        <div class="nav-inner">
                            <a href="#" class="bars-close" id="bars-close">Close</a>
                            <div class="tb">
                                <div class="tb-cell">
                                    <ul class="menu-list text-uppercase">
                                        <li class="current-menu-parent">
                                            <a href="/" title="">صفحه اصلی</a>

                                        </li>
                                        <li>
                                            <a href="#">منو یک</a>
                                            <ul class="sub-menu">

                                                <li><a href="about.html" title="">زیر مجموعه</a></li>


                                                <li><a href="comingsoon.html" title="">تماس با ما</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" title="">حساب کاربری</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="user-booking.html" title="">User Booking</a>
                                                </li>
                                                <li>
                                                    <a href="user-profile.html" title="">User Profile</a>
                                                </li>
                                                <li>
                                                    <a href="user-setting.html" title="">User Setting</a>
                                                </li>
                                                <li>
                                                    <a href="user-review.html" title="">User Review</a>
                                                </li>
                                                <li>
                                                    <a href="user-signup.html" title="">User Signup</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="user-signup.html" title="">تماس با ما</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!--End Navigation-->
                </div>
            </header>




            <?= Alert::widget() ?>
            <?= $content ?>




            <footer>
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-md-4">
                            <div class="logo-foter">
                                <a href="index.html" title=""><img src="/images/logo-header.png" alt=""></a>
                            </div>
                        </div>
                        <!-- End Logo -->
                        <!-- Navigation Footer -->
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <div class="ul-ft">
                                <ul>
                                    <li><a href="about.html" title="">About</a></li>
                                    <li><a href="blog.html" title="">Blog</a></li>
                                    <li><a href="fqa.html" title="">FQA</a></li>
                                    <li><a href="careers.html" title="">Carrers</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Navigation Footer -->
                        <!-- Navigation Footer -->
                        <div class="col-xs-6 col-sm-3 col-md-2">
                            <div class="ul-ft">
                                <ul>
                                    <li><a href="contact.html" title="">Contact Us</a></li>
                                    <li><a href="#" title="">Privacy Policy</a></li>
                                    <li><a href="#" title="">Term of Service</a></li>
                                    <li><a href="#" title="">Security</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Navigation Footer -->
                        <!-- Footer Currency, Language -->
                        <div class="col-sm-6 col-md-4">
                            <!-- Language -->
                            <div class="currency-lang-bottom dropdown-cn float-left">
                                <div class="dropdown-head">
                                    <span class="angle-down"><i class="fa fa-angle-down"></i></span>
                                </div>
                                <div class="dropdown-body">
                                    <ul>
                                        <li class="current"><a href="#" title="">English</a></li>
                                        <li><a href="#" title="">Bahasa Melayu</a></li>
                                        <li><a href="#" title="">Català</a></li>
                                        <li><a href="#" title="">Dansk</a></li>
                                        <li><a href="#" title="">Deutsch</a></li>
                                        <li><a href="#" title="">Francais</a></li>
                                        <li><a href="#" title="">Italiano</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Language -->
                            <!-- Currency -->
                            <div class="currency-lang-bottom dropdown-cn float-left">
                                <div class="dropdown-head">
                                    <span class="angle-down"><i class="fa fa-angle-down"></i></span>
                                </div>
                                <div class="dropdown-body">
                                    <ul>
                                        <li class="current"><a href="#" title="">US</a></li>
                                        <li><a href="#" title="">ARS</a></li>
                                        <li><a href="#" title="">ADU</a></li>
                                        <li><a href="#" title="">CAD</a></li>
                                        <li><a href="#" title="">CHF</a></li>
                                        <li><a href="#" title="">CNY</a></li>
                                        <li><a href="#" title="">CZK</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Currency -->
                            <!--CopyRight-->
                            <p class="copyright">
                                © 2009 – 2014 Bookyourtrip™ All rights reserved.
                            </p>
                            <!--CopyRight-->
                        </div>
                        <!-- End Footer Currency, Language -->
                    </div>
                </div>
            </footer>

        </div>

          <script type="text/javascript" src="/js/library/jquery-1.11.0.min.js"></script>
        <?php $this->endBody() ?>

        <?php $this->endPage() ?>



      

        <script type="text/javascript" src="/js/library/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/library/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/library/owl.carousel.min.js"></script>
        <script type="text/javascript" src="/js/library/parallax.min.js"></script>
        <script type="text/javascript" src="/js/library/jquery.nicescroll.js"></script>
        <script type="text/javascript" src="/js/library/jquery.ui.touch-punch.min.js"></script>
        <script type="text/javascript" src="/js/library/jquery.mb.YTPlayer.min.js"></script>
        <script type="text/javascript" src="/js/library/SmoothScroll.js"></script>
        <!-- End Library JS -->
        <!-- Main Js -->
        <script type="text/javascript" src="/js/script.js"></script>
        <script type="text/javascript" src="/js.js?ver=<?= rand(1, 222) ?>"></script>

        <?= Yii::$app->params['site_setting']->js_code; ?>
        <!-- End Main Js -->
    </body>
</html>





