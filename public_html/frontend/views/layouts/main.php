<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir="rtl">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>آویس هاست |<?= Html::encode($this->title) ?></title>
        <meta name="keywords" content="" />

        <?php
        if ($this->params['desc']) {
            ?>
            <meta name="description" content="<?= $this->params['desc'] ?>">
            <?php
        } else {
            ?>
            <meta name="description" content="امن ترین هاستینگ ایران با سابقه طولانی در نگه داری اطلاعات اشخاص  و ارگان ها - سرور مجازی - سرورو اختصاصی - وی پی اس  تبلغیات در گوگل">
            <?php
        }
        ?>

        <meta name="author" content="">

        <!-- Mobile view -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <meta property="og:title" content="<?= Html::encode($this->title) ?>" />
        <meta property="og:site_name" content="Avishost Ltd. | آویس هاست  "/>
        <meta property="og:description" content="امن ترین هاستینگ ایران با سابقه طولانی در نگه داری اطلاعات اشخاص  و ارگان ها - سرور مجازی - سرورو اختصاصی - وی پی اس  تبلغیات در گوگل">
        <meta property="og:image" content="/fav.png" />
        <style>

            @media screen and (max-width:400px) {

                .topbar-left-items{
                    float: right !important;
                }
                a.logo.style-2.mar-4 {
                    float: left;
                }

                .mozmoz {
                    width: 100%;
                    right: unset !important;
                }


            }


            .mega-menu{
                width: 880px !important;

            }
            .mega-menu li{
                float: right;
                width: 25%;
            }
        </style>
        <link rel="shortcut icon" href="/fav.png" />

        <meta charset="<?= Yii::$app->charset ?>">

        <?= Html::csrfMetaTags() ?>

        <?php $this->head() ?>
        <link rel="stylesheet" type="text/css" href="/css/all.css?ver=90">
        <link rel="stylesheet/less" type="text/css" href="/less/skin.less">
        <link rel="stylesheet" href="/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="/fonts/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
        <link rel="stylesheet" href="/fonts/et-line-font/et-line-font.css">



        <!-- Template's stylesheets END -->

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


        <!-- Style Customizer's stylesheets END -->



    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="topbar primary topbar-padding">
            <div class="container">
                <div class="topbar-left-items">
                    <ul class="toplist toppadding pull-left paddtop1">

                        <li>021-26154627</li>
                        <li class="rightl">صدای مشتری:</li>
                        <li class="right"> <a href="<?= Url::to(['site/contact']) ?>">تماس با ما</a></li>

                    </ul>
                </div>
                <!--end left-->

                <div class="topbar-right-items pull-right">
                    <ul class="toplist toppadding">
                        <li class="lineright "><a href="<?= url::to(['post/category', 'id' => 1]); ?>"> وبلاگ خاطرات</a></li>
                        <li class="lineright "><a href="<?= url::to(['post/category']); ?>"> وبلاگ آموزشی</a></li>
                        <li class="lineright "><a href="https://avishost.com/frontend/web/billing/knowledgebase.php"> مرکز آموزش مشتریان</a></li>

                        <li class="lineright"><a href="https://avishost.com/frontend/web/billing/register.php">ثبت نام</a></li>
                        <li class="lineright"><a href="https://avishost.com/frontend/web/billing/clientarea.php">ورود</a></li>


                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>

                    </ul>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!--end topbar-->


        <div class="col-md-12 nopadding">
            <div class="header-section white style1 pin-style">
                <div class="container">
                    <div class="mod-menu">
                        <div class="row">
                            <div class="col-sm-2"> <a href="/" title="" class="logo style-2 mar-4"> <img src="/imgx/avis-logo.png" alt="آویس هاست"> </a> </div>
                            <div class="col-sm-10">
                                <div class="main-nav">
                                    <ul class="nav navbar-nav top-nav">
                                        <li class="search-parent"> <a href="javascript:void(0)" title=""><i aria-hidden="true" class="fa fa-search"></i></a>
                                            <div class="search-box ">
                                                <div class="content">
                                                    <div class="form-control">
                                                        <input type="text" placeholder="Type to search" />
                                                        <a href="#" class="search-btn mar-1"><i aria-hidden="true" class="fa fa-search"></i></a> </div>
                                                    <a href="#" class="close-btn mar-1">x</a> </div>
                                            </div>
                                        </li>

                                        <li class="visible-xs menu-icon"> <a href="javascript:void(0)" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false"> <i aria-hidden="true" class="fa fa-bars"></i> </a> </li>
                                    </ul>
                                    <div id="menu" class="collapse">
                                        <ul class="nav navbar-nav">
                                            <li class="right active"> <a href="/">صفحه اصلی</a> <span class="arrow"></span></li>



                                            <li> <a href="#">میزبانی وب</a> <span class="arrow"></span>





                                                <ul class="dm-align-2 mega-menu">
                                                    <li> <a href="<?= url::to(['site/enterprise-hosting']); ?>">هاست سازمانی </a> </li>
                                                    <li class="active"> <a href="<?= url::to(['site/shared-hosting']); ?>">هاست اشتراکی </a> </li>
                                                    <li> <a href="https://avishost.com/هاست-ابری">هاست ابری </a> </li>
                                                    <li> <a href="<?= url::to(['site/joomla-hosting']); ?>">هاست جوملا </a> </li>
                                                    <li> <a href="<?= url::to(['site/dedicated-hosting']); ?>">هاست اختصاصی </a> </li>
                                                    <li> <a href="<?= url::to(['site/ir-hosting']); ?>">هاست ایران </a> </li>
                                                    <li> <a href="https://avishost.com/هاست-آلمان">هاست خارج آلمان </a> </li> 
                                                    <li> <a href="https://avishost.com/هاست-آمریکا">هاست آمریکا </a> </li> 
                                                </ul>
                                            </li>
                                            <li> <a href="#">سرور مجازی  <i class="fa fa-cloud" aria-hidden="true"></i></a> <span class="arrow"></span>
                                                <ul class="dm-align-2">

                                                    <li> <a href="<?= url::to(['site/ir-vps']); ?>">سرور مجازی ایران</a> </li>
                                                    <li> <a href="https://avishost.com/سرور-مجازی-آلمان">سرور مجازی آلمان</a> </li>
                                                    <li> <a href="<?= url::to(['site/vps']); ?>">سرور مجازی آمریکا</a> </li>

                                                </ul>
                                            </li>


                                            <li class="right"> <a href="<?= Url::to(['site/wordpress-hosting']) ?>">هاست وردپرس <i class="fa fa-wordpress" aria-hidden="true"></i></a></li>
                                            <li class="right"> <a href="<?= Url::to(['site/dedicated']) ?>">سرور اختصاصی <i class="fa fa-cloud" aria-hidden="true"></i></a></li>



                                            <li class="right"> <a href="https://avishost.com/خرید-ssl">گواهینامه SSL <span class="icon-lock"></span> </a></li>
                                            <li class="right"> <a href="https://avishost.com/کانفیگ-سرور">کانفیگ سرور</a></li>
                                            <li class="right"> <a href="<?= Url::to(['site/team']) ?>">تیم و تکنولوژی<span class=icon-people"></span></a></li>



                                        </ul>
                                        <h6>آویس هاست : ارائه سریع ترین هاست بدون محدودیت ؛ سرعت یکسان برای تمام کاربران </h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end menu--> 

        </div>

        <div class="container">
            <?=
            Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>
<?= Alert::widget() ?>
        </div>

<?= $content ?>




        <section class="section-dark sec-padding">





            <div class="container ">
                <div class="row"> <br/>
                    <div class="col-md-3 col-sm-12 col-xs-12 clearfix margin-bottom" >
                        <h4 class="less-mar3 font-weight-4 text-white">سرور مجازی</h4>
                        <div class="clearfix"></div>
                        <div class="footer-title-bottomstrip white"></div>
                        <ul class="footer-quick-links-4">
                            <li><a href="<?= Url::to(['site/ir-vps']) ?>"> سرور مجازی  ایران</a></li>
                            <li><a href="https://avishost.com/سرور-مجازی-آلمان"> سرور مجازی آلمان</a></li>
                            <li><a href="<?= Url::to(['site/vps']) ?>"> سرور مجازی امریکا</a></li>

                        </ul>
                        <div class="clearfix"></div>
                        <br/>
                        <ul class="ce-sc-icons">
                            <li><a class="twitter" href="https://twitter.com/avis_host"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/avis.host.16"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="active" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://nl.pinterest.com/avishost/"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <!--end item-->

                    <div class="col-md-3 col-sm-12 col-xs-12 clearfix margin-bottom" >
                        <h4 class="less-mar3 font-weight-4 text-white">هاستنیگ</h4>
                        <div class="clearfix"></div>
                        <div class="footer-title-bottomstrip white"></div>
                        <ul class="footer-quick-links-4">
                            <li><a href="<?= url::to(['site/ir-hosting']); ?>"> هاست پر سرعت ایران</a></li>
                            <li><a href="https://avishost.com/%D9%87%D8%A7%D8%B3%D8%AA-%D8%A2%D9%84%D9%85%D8%A7%D9%86"> هاست پر سرعت آلمان</a></li>
                            <li><a href="<?= url::to(['site/hosting']); ?>"> هاست پر سرعت  آمریکا</a></li>
                            <li><a href="<?= Url::to(['site/wordpress-hosting']) ?>"> هاست پر سرعت وردپرس</a></li>
                            <li><a href="<?= Url::to(['site/joomla-hosting']) ?>"> هاست پر سرعت جوملا</a></li>

                        </ul>
                    </div>
                    <!--end item-->
                    <!-- livezilla.net code (PLEASE PLACE IN BODY TAG) -->

                    <!-- http://www.livezilla.net -->
                    <div class="col-md-3 col-sm-12 col-xs-12 bmargin clearfix margin-bottom">
                        <div class="item-holder">
                            <h4 class="less-mar3 font-weight-4 text-white">آخرین مقالات</h4>
                            <div class="footer-title-bottomstrip white"></div>
                            <div class="clearfix"></div>
                            <div class="fo-posts">
                                <div class="text-box-right">
                                    <h6 class="less-mar3 nopadding"><a href="#" class="text-white"> </a></h6>
                                    <p></p>
                                    <div class="post-info"> <span> </span><span></span> </div>
                                </div>
                            </div>
                            <div class="col-divider-margin-1"></div>

                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-3 col-sm-12 col-xs-12 clearfix margin-bottom">
                        <h4 class="less-mar3 font-weight-4 text-white">لینک های اصلی</h4>
                        <div class="clearfix"></div>
                        <div class="footer-title-bottomstrip white"></div>
                        <ul class="footer-quick-links-4">
                            <li><a href="<?= Url::to(['site/protest']) ?>"> ثبت شکایات</a></li>
                            <li><a href="<?= Url::to(['site/rules']) ?>"> قوانین و مقررات</a></li>
                            <li><a href="<?= Url::to(['site/payment']) ?>"> شماره حساب های شرکت</a></li>

                        </ul>
                    </div>
                    <!--end item-->

                    <div class="clearfix"></div>
                    <div class="col-divider-margin-4"></div>
                    <div class="divider-line solid white opacity-2"></div>
                    <div class="col-divider-margin-4"></div>

                    <!--end item-->


                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 bmargin">
                            <ul class="footer-payment-logo-list">
                                <li>
                                    <p> ما تمامی روش های پرداخت زیر را قبول میکنم برای روش های پرداخت بین المللی با آی پی غیر از ایران وارد شوید </p>
                                </li>
                                <li>
                                    <img src="/imgx/pay.png" alt="پرداخت آنلاین آویس هاست" />
                                    <img src="/banksaman.png" alt="بانک سامان آویس هاست " class="banksaman"/> 
                                </li>


                            </ul>
                        </div>
                        <!--end item-->
                        <div class="col-md-2 col-sm-12 col-xs-12 bmargin">
                            <img src="https://trustseal.enamad.ir/logo.aspx?id=61801&amp;p=N9oAGl7AoYDPPaeE" alt="اینماد" onclick="window.open( & quot; https://trustseal.enamad.ir/Verify.aspx?id=61801&amp;p=N9oAGl7AoYDPPaeE&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)"  id="N9oAGl7AoYDPPaeE">


                        </div>


                        <div class="col-md-2 col-sm-12 col-xs-12 bmargin">
                            <ul class="footer-payment-logo-list">
                                <div class="col-md-3 margin-bottom"> <img src="/imgx/avis-logo.png" alt="آویس هاست"/> </div>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 bmargin">
                            <ul class="footer-payment-logo-list">
                                <div class="col-md-3 margin-bottom"> <a href="https://avis-design.com"><img src="/imgx/made_by_avis.png" alt="آویس دیزاین"/></a> </div>

                            </ul>
                        </div>
                        <!--end item-->


                        <!--end item--> 
                    </div>

                    <div class="clearfix"></div>
                    <div class="divider-line solid  opacity-1"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center sec-moreless-padding"> <span>Copyright © <?= date("Y") ?> AVIS LTD. All rights reserved.</span></div>
                        </div>
                    </div>
                    </section>

                </div>

            </div>
        </section>
        <div class="clearfix"></div>
        <!-- BEGIN JIVOSITE CODE {literal} -->
        <script type='text/javascript'>
            (function () {
                var widget_id = 'OctWEi3Zqe';
                var d = document;
                var w = window;
                function l() {
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = '//code.jivosite.com/script/widget/' + widget_id;
                    var ss = document.getElementsByTagName('script')[0];
                    ss.parentNode.insertBefore(s, ss);
                }
                if (d.readyState == 'complete') {
                    l();
                } else {
                    if (w.attachEvent) {
                        w.attachEvent('onload', l);
                    } else {
                        w.addEventListener('load', l, false);
                    }
                }
            })();</script>
        <!-- {/literal} END JIVOSITE CODE -->


        <script src="/js/jquery/jquery.js"></script> 
        <script src="/js/megamenu/js/main.js"></script> 


        <script type="application/ld+json">
<?php if ($this->params['type'] == 'article') { ?>
        
<?php } ?>   
<?php if ($this->params['type'] == 'product') { ?>

                {
                "@context": "http://schema.org/",
                "@type": "Product",
                "name": "<?= $this->title ?>",
                "image": [
                "https://example.com/photos/1x1/photo.jpg",
                "https://example.com/photos/4x3/photo.jpg",
                "https://example.com/photos/16x9/photo.jpg"
                ],
                "description": "<?= $this->params['desc'] ?>",
                "mpn": "925872",
                "brand": {
                "@type": "Thing",
                "name": "ACME"
                },
                "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.4",
                "reviewCount": "89"
                },
                "offers": {
                "@type": "Offer",
                "priceCurrency": "USD",
                "price": "119.99",
                "priceValidUntil": "2020-11-05",
                "itemCondition": "http://schema.org/UsedCondition",
                "availability": "http://schema.org/InStock",
                "seller": {
                "@type": "Organization",
                "name": "AvisHOST LTD"
                }
                }
                }
<?php } ?>
        </script>
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106768416-2"></script>
    <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-106768416-2');
    </script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)},
                    i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-128793855-1', 'auto');
        ga('send', 'pageview');
    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
