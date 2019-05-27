<?php

use yii\helpers\Url;
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Building;
use common\models\User;
use common\models\IncomeOutcome;
use common\models\Persian;

AppAsset::register($this);
$patchx = Yii::$app->controller->id . "/" . Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html> 
<style>
    span.select2-selection.select2-selection--single {
        margin-top: 22px;

    }
    span.bs-badge.badge-danger {
        float: left;
        position: absolute;
        left: 8px;
        width: 12px;
    }
    div#page-content {
        overflow: scroll;
    }
</style>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?>  برنامه فرایند ها </title>

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="theme/images/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="theme/images/icons/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="theme/images/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="theme/images/icons/apple-touch-icon-57-precomposed.png">
        <link rel="stylesheet" href="css/moz.css?ver=<?= rand(2, 9999); ?>">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="theme/bootstrap/css/bootstrap.css">


        <!-- HELPERS -->

        <link rel="stylesheet" type="text/css" href="theme/helpers/animate.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/backgrounds.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/boilerplate.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/border-radius.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/grid.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/page-transitions.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/spacing.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/typography.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/utils.css">
        <link rel="stylesheet" type="text/css" href="theme/helpers/colors.css">

        <!-- ELEMENTS -->

        <link rel="stylesheet" type="text/css" href="theme/elements/badges.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/buttons.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/content-box.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/dashboard-box.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/forms.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/images.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/info-box.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/invoice.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/loading-indicators.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/menus.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/panel-box.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/response-messages.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/responsive-tables.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/ribbon.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/social-box.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/tables.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/tile-box.css">
        <link rel="stylesheet" type="text/css" href="theme/elements/timeline.css">



        <!-- ICONS -->

        <link rel="stylesheet" type="text/css" href="theme/icons/fontawesome/fontawesome.css">
        <link rel="stylesheet" type="text/css" href="theme/icons/linecons/linecons.css">
        <link rel="stylesheet" type="text/css" href="theme/icons/spinnericon/spinnericon.css">


        <!-- WIDGETS -->

        <link rel="stylesheet" type="text/css" href="theme/widgets/accordion-ui/accordion.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/calendar/calendar.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/carousel/carousel.css">

        <link rel="stylesheet" type="text/css" href="theme/widgets/charts/justgage/justgage.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/charts/morris/morris.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/charts/piegage/piegage.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/charts/xcharts/xcharts.css">

        <link rel="stylesheet" type="text/css" href="theme/widgets/chosen/chosen.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/colorpicker/colorpicker.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/datatable/datatable.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/datepicker/datepicker.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/datepicker-ui/datepicker.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/dialog/dialog.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/dropdown/dropdown.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/dropzone/dropzone.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/file-input/fileinput.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/input-switch/inputswitch.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/input-switch/inputswitch-alt.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/ionrangeslider/ionrangeslider.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/jcrop/jcrop.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/jgrowl-notifications/jgrowl.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/loading-bar/loadingbar.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/maps/vector-maps/vectormaps.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/markdown/markdown.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/modal/modal.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/multi-select/multiselect.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/multi-upload/fileupload.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/nestable/nestable.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/noty-notifications/noty.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/popover/popover.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/pretty-photo/prettyphoto.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/progressbar/progressbar.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/range-slider/rangeslider.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/slidebars/slidebars.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/slider-ui/slider.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/tabs-ui/tabs.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/theme-switcher/themeswitcher.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/timepicker/timepicker.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/tocify/tocify.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/tooltip/tooltip.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/touchspin/touchspin.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/uniform/uniform.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/wizard/wizard.css">
        <link rel="stylesheet" type="text/css" href="theme/widgets/xeditable/xeditable.css">

        <!-- SNIPPETS -->


        <link rel="stylesheet" type="text/css" href="theme/snippets/chat.css">
        <link rel="stylesheet" type="text/css" href="theme/snippets/files-box.css">
        <link rel="stylesheet" type="text/css" href="theme/snippets/login-box.css">
        <link rel="stylesheet" type="text/css" href="theme/snippets/notification-box.css">
        <link rel="stylesheet" type="text/css" href="theme/snippets/progress-box.css">
        <link rel="stylesheet" type="text/css" href="theme/snippets/todo.css">
        <link rel="stylesheet" type="text/css" href="theme/snippets/user-profile.css">
        <link rel="stylesheet" type="text/css" href="theme/snippets/mobile-navigation.css">

        <!-- APPLICATIONS -->

        <link rel="stylesheet" type="text/css" href="theme/applications/mailbox.css">

        <!-- Admin theme -->

        <link rel="stylesheet" type="text/css" href="theme/themes/admin/layout.css">
        <link rel="stylesheet" type="text/css" href="theme/themes/admin/color-schemes/default.css">

        <!-- Components theme -->

        <link rel="stylesheet" type="text/css" href="theme/themes/components/default.css">
        <link rel="stylesheet" type="text/css" href="theme/themes/components/border-radius.css">

        <link rel="stylesheet" href="datef/bootstrap-datepicker.min.css" />

        <!-- Admin responsive -->



        <!-- JS Core -->

        <script type="text/javascript" src="theme/js-core/jquery-core.js"></script>
        <script type="text/javascript" src="theme/js-core/jquery-ui-core.js"></script>
        <script type="text/javascript" src="theme/js-core/jquery-ui-widget.js"></script>
        <script type="text/javascript" src="theme/js-core/jquery-ui-mouse.js"></script>
        <script type="text/javascript" src="theme/js-core/jquery-ui-position.js"></script>
        <!--<script type="text/javascript" src="theme/js-core/transition.js"></script>-->
        <script type="text/javascript" src="theme/js-core/modernizr.js"></script>
        <script type="text/javascript" src="theme/js-core/jquery-cookie.js"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


        <!-- JS Core -->

        <!-- jQueryUI Tabs -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/tabs-ui/tabs.css">-->
        <script type="text/javascript" src="../../assets/widgets/tabs-ui/tabs.js"></script>
        <script type="text/javascript">
            /* jQuery UI Tabs */

            $(function() { "use strict";
            $(".tabs").tabs();
            });
            $(function() { "use strict";
            $(".tabs-hover").tabs({
            event: "mouseover"
            });
            });
        </script>

        <!-- Boostrap Tabs -->

        <script type="text/javascript" src="../../assets/widgets/tabs/tabs.js"></script>

        <!-- Tabdrop Responsive -->

        <script type="text/javascript" src="../../assets/widgets/tabs/tabs-responsive.js"></script>
        <script type="text/javascript">
            /* Responsive tabs */
            $(function() { "use strict";
            $('.nav-responsive').tabdrop();
            });
        </script>

        <link rel="stylesheet" type="text/css" href="../../assets/widgets/tabs-ui/tabs.css">



        <script type="text/javascript">
            $(window).load(function () {
            setTimeout(function () {
            $('#loading').fadeOut(400, "linear");
            }, 300);
            });
        </script>

        <style>
            /* Loading Spinner */
            .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}

            #page-sidebar{
                float: right !important;
                margin-left: -100% !important;
                margin-right: 0 !important;
            }
            #header-logo ,  #page-sidebar li a .glyph-icon, #page-sidebar li ul li a:before, #page-sidebar li a .glyph-icon{
                float:  right !important;
            }
            #page-sidebar li a.sf-with-ul:after{
                left: 5px !important;
                right:  unset !important;
                transform: rotate(180deg);
            }

            #header-nav-left {
                float: right !important;

            }


            @media screen and (min-width: 768px) 
            {
                #page-content{
                    margin-right: 260px !important;
                    margin-left: 0px !important;
                }
            }

            .grid-view td{
                white-space:unset !important;
            }

            p{
                direction: rtl;
                text-align: justify;
            }

            h3.content-box-header.bg-blue.text-left {
                text-align: right !important;
            }

            span.icon-separator img {
                position: relative;
                top: -8px;
                left: 10px;
            }



        </style>

        <style>
            /* Loading Spinner */
            .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}




        </style>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
    <body>
        <div id="sb-site">





            <div id="page-wrapper">

                <?php if (Yii::$app->user->id) { ?>
                    <div id="page-header" class="bg-gradient-1">

                        <div id="header-logo" class="logo-bg">
                            <a href="/" target="_blank"  class="logox" title="Avis Product ">



                            </a>
                            <br>


                        </div>

                        <div id="header-nav-left">

                            <div class="user-account-btn dropdown">
                                <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                                    <img width="28" src="admin.png" alt="Profile image">
                                    <span class="user_info"> <?= Yii::$app->user->identity->name_and_family . " " . Yii::$app->user->identity->username ?></span>
                                    <i class="glyph-icon icon-angle-down"></i>
                                </a>
                                <div class="dropdown-menu float-left">
                                    <div class="box-sm">
                                        <div class="login-box clearfix">
                                            <div class="user-img">

                                                <img src="admin.png" alt="">


                                            </div>
                                            <div class="user-info">

                                            </div>
                                        </div>
                                        <div class="divider"></div>

                                        <div class="pad5A button-pane button-pane-alt text-center">
                                            <a href="<?php echo Url::to(['site/logout']) ?>" class="btn display-block font-normal btn-danger">
                                                <i class="glyph-icon icon-power-off"></i>
                                                خروج از سیستم
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- #header-nav-left -->
                        <div id="header-nav-right">


                            <a href="#" class="hdr-btn" id="fullscreen-btn" title="Fullscreen">
                                <i class="glyph-icon icon-arrows-alt"></i>
                            </a>
                            <?php
//echo Yii::$app->user->identity->type;

                            if (Yii::$app->user->identity->id) {


                                $class_n = "none";
                                ?>
                                <div class="dropdown" id="notifications-btn">
                                    <a data-toggle="dropdown" href="#" title="" aria-expanded="false">
                                        <?php
                                        if (count($notif) > 0) {
                                            $class_n = "block";
                                            ?>
                                            <span class="small-badge bg-yellow"></span>
                                        <?php } ?>
                                        <i class="glyph-icon icon-linecons-megaphone"></i>
                                    </a>



                                    <div class="dropdown-menu box-md float-right" style="display: <?= $class_n ?>;">

                                        <div class="popover-title display-block clearfix pad10A">
                                            اعلانات

                                        </div>
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 150px;"><div class="scrollable-content scrollable-slim-box" style="overflow-y: scroll; width: auto; height: 150px;">
                                                <ul class="no-border notifications-box">

                                                    <?php
                                                    $notif = array();
                                                    foreach ($notif as $notifs) {
                                                        ?>
                                                        <a href='<?= Url::to([$notifs->link, 'id' => $notifs->link_id]) ?>'  data-id='<?= $notifs->id ?>' >
                                                            <li>
                                                                <span class="bg-danger icon-notification glyph-icon icon-bullhorn"></span>
                                                                <span class="notification-text"><b><?= Book::getref($notifs->link_id) ?></b>:<?= $notifs->msg ?></span><br>
                                                                <span class="notification-text"><?= $notifs->body ?></span><br>
                                                                <span style="font-size: 10px;"><?= common\models\User::findOne($notifs->from_id)->name_and_fam ?></span>
                                                                <div class="notification-time">
                                                                    <?=
                                                                    common\models\Book::get_time_ago(strtotime($notifs->date));
                                                                    ?>
                                                                    <span class="glyph-icon icon-clock-o"></span>
                                                                </div>
                                                            </li>
                                                        </a>
                                                    <?php } ?>
                                                </ul>
                                            </div><div class="slimScrollBar" style="background: rgb(141, 160, 170); width: 6px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 118.147px;"></div><div class="slimScrollRail" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        <div class="pad10A button-pane button-pane-alt text-center">
                                            <a href="<?= Url::to(['user-has-notice/index']) ?> " class="btn btn-primary" title="View all notifications">
                                                نمایش تمام اعلانات
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>


                            <div class="dropdown" id="dashnav-btn">
                                <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="" data-original-title="منو دسترسی سریع">
                                    <i class="glyph-icon icon-linecons-cog"></i>
                                </a>
                                <div class="dropdown-menu float-right">
                                    <div class="box-sm">
                                        <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                                            <a href="#" class="btn vertical-button hover-blue-alt" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-dashboard opacity-80 font-size-20"></i>
                                                </span>
                                                Dashboard
                                            </a>
                                            <a href="#" class="btn vertical-button hover-green" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                                                </span>
                                                Widgets
                                            </a>
                                            <a href="#" class="btn vertical-button hover-orange" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                                                </span>
                                                Tables
                                            </a>
                                            <a href="#" class="btn vertical-button hover-orange" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                                                </span>
                                                Charts
                                            </a>
                                            <a href="#" class="btn vertical-button hover-purple" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                                                </span>
                                                Buttons
                                            </a>
                                            <a href="#" class="btn vertical-button hover-azure" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                                                </span>
                                                Panels
                                            </a>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                                            <a href="#" class="btn vertical-button remove-border btn-info" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-dashboard opacity-80 font-size-20"></i>
                                                </span>
                                                Dashboard
                                            </a>
                                            <a href="#" class="btn vertical-button remove-border btn-danger" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                                                </span>
                                                Widgets
                                            </a>
                                            <a href="#" class="btn vertical-button remove-border btn-purple" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                                                </span>
                                                Tables
                                            </a>
                                            <a href="#" class="btn vertical-button remove-border btn-azure" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                                                </span>
                                                Charts
                                            </a>
                                            <a href="#" class="btn vertical-button remove-border btn-yellow" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                                                </span>
                                                Buttons
                                            </a>
                                            <a href="#" class="btn vertical-button remove-border btn-warning" title="">
                                                <span class="glyph-icon icon-separator-vertical pad0A medium">
                                                    <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                                                </span>
                                                Panels
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="header-btn"  id="logout-btn"  title="  YOU ARE securely logged in and all you actiity is monitoring ">
                                <i class="glyph-icon icon-linecons-lock"></i>
                            </a>


                        </div>

                        <!-- #header-nav-right -->

                    </div>



                    <div id="page-sidebar">
                        <div class="scroll-sidebar">

                            <ul class="l1 list-unstyled section-content"   >





                                <ul id="sidebar-menu">






                                    <li>
                                        <a class="sideline"  href="/"  data-id="dashboards6" >  
                                            <i class=" pull-right building" aria-hidden="true"></i>  <span class="title">صفحه اصلی </span> 
                                        </a>
                                    </li>
                                    
                                    

                                    <li>





                                        <a class="sideline" href="/"  data-id="dashboards41" > 


                                            <i class=" pull-right puzzle-piece" aria-hidden="true"></i>   <span class="title">فرایند ها</span> 


                                        </a>
                                        <div class="sidebar-submenu">
                                            <ul>



                                                <li>
                                                    <a class="sideline"  href="<?= Url::to(['/farayand']) ?>"  data-id="dashboards6" >  
                                                        <i class=" pull-right building" aria-hidden="true"></i>  <span class="title">فرایند ها</span> 
                                                    </a>
                                                </li>



                                                <li>
                                                    <a class="sideline"  href="<?= Url::to(['/farayand-bod']) ?>"  data-id="dashboards6" >  
                                                        <i class=" pull-right building" aria-hidden="true"></i>  <span class="title">بعد ها</span> 
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="sideline"  href="<?= Url::to(['/farayand-moalefe']) ?>"  data-id="dashboards6" >  
                                                        <i class=" pull-right building" aria-hidden="true"></i>  <span class="title">معلفه ها</span> 
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="sideline"  href="<?= Url::to(['/farayand-shakhes']) ?>"  data-id="dashboards6" >  
                                                        <i class=" pull-right building" aria-hidden="true"></i>  <span class="title">شاخص ها</span> 
                                                    </a>
                                                </li>








                                            </ul>
                                        </div>
                                    </li>
                                    
                                    
                                    <li>
                                        <a class="sideline"  href="<?= Url::to(['/user']) ?>"  data-id="dashboards6" >  
                                            <i class=" pull-right building" aria-hidden="true"></i>  <span class="title">مدیریت کاربران</span> 
                                        </a>
                                    </li>




                                    




                                </ul><!-- #sidebar-menu -->


                        </div>
                    </div>

                <?php } else { ?>
                    <style>
                        div#page-content {
                            width: 100% !important;
                        }
                    </style>
                <?php } ?>
                <div id="page-content-wrapper">
                    <div id="page-content">

                        <div class="container">
                            <?php
                            $msg = User::get_user_msg_alert();

                            if ($msg) {
                                Yii::$app->session->setFlash('success', $msg);
                            }
                            ?>

                            <?= Alert::widget() ?>

                            <?= $content ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </body>

    <!-- WIDGETS -->

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script type="text/javascript" src="../../assets/tether/js/tether.js"></script>
<script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.js"></script>

<!-- Bootstrap Dropdown -->

<!-- <script type="text/javascript" src="../../assets/widgets/dropdown/dropdown.js"></script> -->

<!-- Bootstrap Tooltip -->

<!-- <script type="text/javascript" src="../../assets/widgets/tooltip/tooltip.js"></script> -->

<!-- Bootstrap Popover -->

<!-- <script type="text/javascript" src="../../assets/widgets/popover/popover.js"></script> -->

<!-- Bootstrap Progress Bar -->

<script type="text/javascript" src="../../assets/widgets/progressbar/progressbar.js"></script>

<!-- Bootstrap Buttons -->

<!-- <script type="text/javascript" src="../../assets/widgets/button/button.js"></script> -->

<!-- Bootstrap Collapse -->

<!-- <script type="text/javascript" src="../../assets/widgets/collapse/collapse.js"></script> -->

<!-- Superclick -->

<script type="text/javascript" src="../../assets/widgets/superclick/superclick.js"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="../../assets/widgets/input-switch/inputswitch-alt.js"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="../../assets/widgets/slimscroll/slimscroll.js"></script>

<!-- Slidebars -->
<script type="text/javascript" src="../../assets/widgets/slidebars/slidebars.js"></script>
<script type="text/javascript" src="../../assets/widgets/slidebars/slidebars-demo.js"></script>
<script type="text/javascript" src="jsx/sel.js"></script>

<!-- PieGage -->

<script type="text/javascript" src="../../assets/widgets/charts/chart-js/chart-core.js"></script>

<script type="text/javascript" src="../../assets/widgets/charts/chart-js/chart-bar.js"></script>


<script type="text/javascript" src="../../assets/widgets/charts/chart-js/chart-demo.js?ver=<?= rand(1, 99999); ?>"></script>

<!-- Screenfull -->

<script type="text/javascript" src="../../assets/widgets/screenfull/screenfull.js"></script>

<!-- Content box -->

<script type="text/javascript" src="../../assets/widgets/content-box/contentbox.js"></script>

<!-- Overlay -->

<script type="text/javascript" src="../../assets/widgets/overlay/overlay.js"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="../../assets/js-init/widgets-init.js"></script>

<!-- Theme layout -->

<script type="text/javascript" src="../../assets/themes/admin/layout.js"></script>

<!-- Theme switcher -->

<script type="text/javascript" src="../../assets/widgets/theme-switcher/themeswitcher.js"></script>

<script src="jquery.nestable.js"></script>





<script src="scripts/jquery.validate.min.js"></script>


<script type="text/javascript" src="../../assets/widgets/sticky/sticky.js"></script>
<script type="text/javascript" src="../../assets/widgets/tocify/tocify.js"></script>

<script type="text/javascript">
            $(function() {
            var toc = $("#tocify-menu").tocify({context: ".toc-tocify", showEffect: "fadeIn", extendPage:false, selectors: "h2, h3, h4" });
            });
            jQuery(document).ready(function($) {

            /* Sticky bars */

            $(function() { "use strict";
            $('.sticky-nav').hcSticky({
            top: 50,
                    innerTop: 50,
                    stickTo: 'document'
            });
            });
            });</script>

<?php
if ($patchx == "site/chart_" or $patchx == "site/chart_user") {
    ?>

    <script type="text/javascript">

    <?php
    $this_month = Persian::get_today();

    $start_date_of_month = Persian::convert_date_to_en($this_month['start']);
    $end_date_of_month = Persian::convert_date_to_en($this_month['end']);

    $all_object = IncomeOutcome::get_all_outcome_object(Yii::$app->user->identity->building_id, $start_date_of_month, $end_date_of_month);

    $sum = $all_object->sum('amount');

    function generate_array($orgial_object) {

        $donut_array = array();
        $array_color = array();

        foreach ($orgial_object->all() as $out) {

            array_push($array_color, Persian::random_color());
            $key = array_search($out->type_id, array_column($donut_array, 'id'));
            if ($key) {
                $donut_array[$key]['value'] += $out->amount;
                $temp['formatted'] = number_format($donut_array[$key]['value']) . "ریال";
            } else {
                $temp = array();
                $temp['id'] = $out->type_id;
                $temp['value'] = $out->amount;
                $temp['formatted'] = number_format($temp['value']) . "ریال";
                $temp['label'] = \common\models\Type::findOne($out->type_id)->name;
                array_push($donut_array, $temp);
            }
        }
        $big = array();
        array_push($big, $donut_array);
        array_push($big, $array_color);
        return $big;
    }

    $donat_1 = generate_array($all_object);


// echo json_encode($donut_array);
    ?>

        $(function() {
        "use strict";
        Morris.Donut({
        element: 'donut_mah',
                backgroundColor: '#fff',
                labelColor: '#ccc',
                colors: <?= json_encode($donat_1[1]); ?>,
                data: <?= json_encode($donat_1[0]); ?>,
                formatter: function(x, data) {
                return data.formatted;
                }
        });
        });
        $(function() {
        "use strict";
        Morris.Donut({
        element: 'donut_sal',
                backgroundColor: '#fff',
                labelColor: '#ccc',
                colors: <?= json_encode($donat_1[1]); ?>,
                data: <?= json_encode($donat_1[0]); ?>,
                formatter: function(x, data) {
                return data.formatted;
                }
        });
        });
    <?php
    $bar_array = array();
    foreach ($all_object->all() as $out) {


        $key = array_search($out->type_id, array_column($bar_array, 'id'));
        if ($key) {
            $bar_array[$key]['y'] += $out->amount;
        } else {
            $temp = array();
            $temp['id'] = $out->type_id;
            $temp['y'] = $out->amount;
            $temp['x'] = \common\models\Type::findOne($out->type_id)->name;



            array_push($bar_array, $temp);
        }
    }
    ?>

















        $(function() {
        "use strict";
        Morris.Bar({
        element: 'color-bar',
                data: <?= json_encode($bar_array); ?>,
                xkey: 'x',
                ykeys: ['y'],
                labels: ['هزینه:'],
                barColors: function(row, series, type) {
                if (type === 'bar') {
                var red = Math.ceil(255 * row.y / this.ymax);
                return 'rgb(' + red + ',155,22)';
                } else {
                return '#000';
                }
                }
        });
        });</script>      


    <?php
}// end chart
if ($this->params['unit_nums']) {
    ?>

    <script>

        $().ready(function() {

        $("#signupForm").validate({
        rules: {



    <?php
    for ($p = 1; $p <= $this->params['unit_nums']; $p++) {
        ?>
            unit_mob1<?= $p ?>: {

            minlength: 11,
                    maxlength: 11,
                    number: true
            },
    <?php } ?>
    <?php
    for ($p = 1; $p <= $this->params['unit_nums']; $p++) {
        ?>
            unit_mob2<?= $p ?>: {

            minlength: 11,
                    maxlength: 11,
                    number: true
            },
    <?php } ?>

        },
                messages: {

    <?php
    for ($p = 1; $p <= $this->params['unit_nums']; $p++) {
        ?>
                    unit_mob1<?= $p ?>: {

                    minlength: "شماره تلفن باید دقیقا ۱۱ رقم باشد",
                            maxlength: "بیشتر از ۱۱ رقم وارد نکنید",
                            number:"شماره تلفن باید عدد صحیح باشد",
                    },
    <?php } ?>
    <?php
    for ($p = 1; $p <= $this->params['unit_nums']; $p++) {
        ?>
                    unit_mob2<?= $p ?>: {

                    minlength: "شماره تلفن باید دقیقا ۱۱ رقم باشد",
                            maxlength: "بیشتر از ۱۱ رقم وارد نکنید",
                            number:"شماره تلفن باید عدد صحیح باشد",
                    },
    <?php } ?>

                }
        });
        });</script>

    <?php
}
?>

<link rel="stylesheet" href="css/persian-datepicker.min.css"/>
<script src="js/persian-date.min.js"></script>
<script src="js/persian-datepicker.min.js"></script>

<style>


    input.year_s, .kiamozj {
        float: right;
        width: 88px !important;
        clear: unset !important;
        height: 33px;
    }

    .kiamozj span.select2-selection.select2-selection--single{
        margin-top:  unset !important;
    }
    .tac {
        clear: both;
    }
    .tac:child-nth(2){
        display: none;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {



    var object1 = [16, 19, 21, 24, 27, 25];
    object1.forEach(function(element) {
    $('.select2_id_' + element).html('<button type="button" class="btn btn-primary" data-target="#myModal' + element + '" data-toggle="modal"><i class="fa fa-question-circle" aria-hidden="true"></i></button>');
    });
    $('.example1').persianDatepicker({
    initialValue:true,
            initialValueType:"persian",
            calendarType:"persian",
            format: 'YYYY/MM/DD',
            persianDigit:false,
    });
    if ($('input[name=InvoiceSearch\\[info\\]]').length){

    var sel = $('<input type="checkbox" name="group_by" value="info"> گروه  سطر های تکراری<br>');
    $('input[name=InvoiceSearch\\[info\\]]').before(sel);
    }

    if ($('select[name=InvoiceSearch\\[type_id\\]]').length){

    var sel = $('<input type="checkbox" name="group_by" value="type_id"> گروه  سطر های تکراری<br>');
    $('select[name=InvoiceSearch\\[type_id\\]]').before(sel);
    }





    if ($('.first_date').length){


    var obj = [
    {id:"1", text:"فروردین"},
    {id:"2", text:"اردیبهشت"},
    {id:"3", text:"خرداد"},
    {id:"4", text:"تیر"},
    {id:"5", text:"مرداد"},
    {id:"6", text:"شهریور"},
    {id:"7", text:"مهر"},
    {id:"8", text:"آبان"},
    {id:"9", text:"آذر"},
    {id:"10", text:"دی"},
    {id:"11", text:"بهمن"},
    {id:"12", text:"اسفند"},
    ];
//Object.keys(obj).forEach((key)=>console.log(obj[key]));


    for (var i = 1; i < 3; i++){


    var year2 = '<?= $_GET['IncomeOutcomeSearch']['year2'] ?>';
    var month2 = '<?= $_GET['IncomeOutcomeSearch']['month2'] ?>';
    var year1 = '<?= $_GET['IncomeOutcomeSearch']['year1'] ?>';
    var month1 = '<?= $_GET['IncomeOutcomeSearch']['month1'] ?>';
    console.log(month2 + "month");
    n = "";
    var sel = $('<select id="month' + i + '" class="month_s" name="IncomeOutcomeSearch[month' + i + ']"></select>');
    $('.first_date').after(sel);
    $('.first_date').after("<input value='" + eval('year' + i) + "' class='year_s' placeholder='سال' name='IncomeOutcomeSearch[year" + i + "]' />")


            for (var key in obj) {

    console.log(obj[key]['id']);
    n += "<option value='" + obj[key]['id'] + "'>" + obj[key]['text'] + "</option>";
    }
    sel.append(n);
    $('#month' + i + '').val(eval('month' + i));
    $('#month' + i + '').select2();
    }

    $('.first_date').remove();
    allsel = $('.select2-container--default');
    allsel.removeClass();
    allsel.addClass('select2 select2-container select2-container--krajee kiamozj').ready(function () {


    allsel.after("<div class='tac'> تا تاریخ</div>").one();
    });
    }




    });</script>

<script src="jquery.maskMoney.min.js"></script>

<script src="datef/bootstrap-datepicker.min.js"></script>
<script src="datef/bootstrap-datepicker.fa.min.js"></script>
<script src="js.js?ver=<?= rand(1, 999) ?>"></script>
<script>
    $('.maskm').maskMoney({precision: '0'});
</script>







