/*===================================================================================*/
/*  Blue Color
/*===================================================================================*/
<?php
header('Content-Type: text/css');
$sitesetting =  \Yii::$app->params['site_setting'];
?>
::-moz-selection,::selection{}

.header-top,.header-right-link > ul > li > a span,.header-right-link ul li.cart-icon > a span small.cart-notification,.btn-color,.owl-pagination .owl-page.active > span, .owl-pagination .owl-page:hover > span
,.copy-right-bg
{
background-color: <?= '#' . $sitesetting->main_color ?> !important; 
}


.price-box .price,.price{
color:  <?= '#' . $sitesetting->main_color ?> !important; 
}


.footer .title > span{
    border-bottom: 2px solid <?= '#' . $sitesetting->hover_color ?> !important; 
}

.navbar-nav > li.dropdown > a::after{
    border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0)  <?= '#' . $sitesetting->hover_color ?> !important; 
}

.megamenu{
   border-top: 2px solid  <?= '#' . $sitesetting->hover_color ?> !important; 
}

.owl-pagination .owl-page > span{
border: 2px solid  <?= '#' . $sitesetting->hover_color ?> !important; 
}
a:hover,.navbar-nav > li:hover > a,.megamenu .level2 > a,.address-footer i.fa {
color:  <?= '#' . $sitesetting->hover_color ?> !important; 
}

<?php exit(); ?>