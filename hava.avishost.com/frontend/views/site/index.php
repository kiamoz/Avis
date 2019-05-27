<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;
use \yii\helpers\ArrayHelper;
use common\widgets\Alert;
use common\models\Post;
use common\models\PostHasCategory;
use common\models\Category;
use common\models\CategoryHasCategory;
use common\models\Product;
use common\models\ProductPrice;
use common\models\ProductCategory;
use common\models\ProductHasCategory;
use common\models\Persian;
use kartik\select2\Select2;

$site_base = dirname(dirname(dirname(dirname(__FILE__)))) . "/backend/web/";
$this->title = "هوا";
?>   


<!--Banner-->
<section class="banner">

    <!--Background-->
    <div class="bg-parallax bg-1"></div>
    <!--End Background-->

    <div class="container">

        <div class="logo-banner text-center">
            <a href="" title="">
                <img src="images/logo-banner.png" alt="">
            </a>
        </div>

        <!-- Banner Content -->
        <div class="banner-cn">

            <!-- Tabs Cat Form -->
            <ul class="tabs-cat text-center row">
                <li class="cate-item col-xs-2">
                    <a data-toggle="tab" href="#form-flight" title="">
                        <span>پرواز</span>
                        <img src="images/icon-flight.png" alt="">
                    </a>
                </li>

                <li class="cate-item col-xs-2">
                    <a data-toggle="tab" href="#form-package" title=""><span>چمدان</span><img src="images/icon-tour.png" alt=""></a>
                </li>

            </ul>
            <!-- End Tabs Cat -->

            <!-- Tabs Content -->
            <div class="tab-content">

                <!-- Search Hotel -->
                <div class="form-cn form-hotel tab-pane active in" id="form-flight">
                    <h2>Where would you like to go?</h2>
                    <div class="form-search clearfix">
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                            <div class="form-submit" style="width: 33%">
                                <button type="submit" class="awe-btn awe-btn-lager awe-search">بررسی غرامت</button>
                            </div>
                            <div class="form-field field-date" style="width: 33%">

                                <?PHP
                                $url = \yii\helpers\Url::to(['/site/list']);


                                echo $form->field($model, 'to_id')->widget(Select2::classname(), [
                                    'language' => 'en',
                                    'initValueText' => '', // set the initial display text
                                    'options' => ['placeholder' => 'مقصد'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'minimumInputLength' => 1,
                                        'language' => [
                                            'errorLoading' => new JsExpression("function () { return 'please wait . . . '; }"),
                                        ],
                                        'ajax' => [
                                            'url' => $url,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                        ],
                                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                                    ],
                                ]);
                                ?>

                            </div>
                            <div class="form-field field-destination" style="width: 33%">

                               <?php
                               
                                 echo $form->field($model, 'from_id')->widget(Select2::classname(), [
                                    'language' => 'en',
                                    'initValueText' => '', // set the initial display text
                                    'options' => ['placeholder' => 'مبدا'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'minimumInputLength' => 1,
                                        'language' => [
                                            'errorLoading' => new JsExpression("function () { return 'please wait . . . '; }"),
                                        ],
                                        'ajax' => [
                                            'url' => $url,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                        ],
                                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                                    ],
                                ]);
                                 
                                 ?>
                            </div>
                       <?php ActiveForm::end(); ?>



                    </div>
                </div>
                <!-- End Search Hotel -->

                <!-- Search Car -->

                <!-- End Search Car -->

                <!-- Search Cruise-->

                <!-- End Search Cruise -->

                <!-- Search Flight-->

                <!-- End Search Flight -->

                <!-- Search Package -->
                <div class="form-cn form-package tab-pane" id="form-package">
                    <h2>Where would you like to go?</h2>
                    <ul class="form-radio">
                        <li>
                            <div class="radio-checkbox">
                                <input type="radio" name="radio-1" id="radio-1" class="radio">
                                <label for="radio-1">Flight + Hotel</label>
                            </div>
                        </li>
                        <li>
                            <div class="radio-checkbox">
                                <input type="radio" name="radio-1" id="radio-2" class="radio">
                                <label for="radio-2">Flight + Hotel +Car</label>
                            </div>
                        </li>
                        <li>
                            <div class="radio-checkbox">
                                <input type="radio" name="radio-1" id="radio-3" class="radio">
                                <label for="radio-3">Hotel +Car</label>
                            </div>
                        </li>
                        <li>
                            <div class="radio-checkbox">
                                <input type="radio" name="radio-1" id="radio-4" class="radio">
                                <label for="radio-4">Flight +Car</label>
                            </div>
                        </li>

                    </ul>
                    <div class="form-search clearfix">
                        <div class="form-field field-from">
                            <label for="filghtfrom"><span>Flight From:</span> Airport...</label>
                            <input type="text" id="filghtfrom" class="field-input">
                        </div>
                        <div class="form-field field-to">
                            <label for="flightto"><span>To:</span> Country, Airport</label>
                            <input type="text" id="flightto" class="field-input">
                        </div>
                        <div class="form-field field-date">
                            <input type="text" class="field-input calendar-input" placeholder="Departing">
                        </div>
                        <div class="form-field field-date">
                            <input type="text" class="field-input calendar-input" placeholder="Returning">
                        </div>
                        <div class="form-field field-select field-adults">
                            <div class="select">
                                <span>Adults</span>
                                <select>
                                    <option>Adults</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-field field-select field-children">
                            <div class="select">
                                <span>Children</span>
                                <select>
                                    <option>Children</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="awe-btn awe-btn-medium awe-search">Search</button>
                        </div>
                    </div>
                </div>
                <!-- End Search Package -->

                <!-- Search Tour-->
                <div class="form-cn form-tour tab-pane" id="form-tour">
                    <h2>Where would you like to go?</h2>
                    <div class="form-search clearfix">
                        <div class="form-field field-select field-region">
                            <div class="select">
                                <span>Region: <small>Wourldwide, africa..</small></span>
                                <select>
                                    <option>Africa</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-field field-select field-country">
                            <div class="select">
                                <span>Country</span>
                                <select>
                                    <option>Country</option>
                                    <option>Viet Nam</option>
                                    <option>Thai Lan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-field field-select field-style">
                            <div class="select">
                                <span>Tour Style</span>
                                <select>
                                    <option>Style One</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="awe-btn awe-btn-medium awe-search">Search</button>
                        </div>
                    </div>
                </div>
                <!-- End Search Tour -->

            </div>
            <!-- End Tabs Content -->

        </div>
        <!-- End Banner Content -->

    </div>

</section>
<!--End Banner-->

<!-- Sales -->

<!-- End Sales -->

<!-- Travel Destinations -->
<section class="destinations">

    <!-- Title -->
    <div class="title-wrap">
        <div class="container">
            <div class="travel-title " style="text-align: center;">
                <h1 >شعار اصلی پایین اسلایدر </h1>
            </div>

        </div>
    </div>
    <!-- End Title -->

    <!-- Destinations Content -->
    <div class="destinations-cn">

        <!-- Background -->
        <div class="bg-parallax bg-2"></div>
        <!-- End Background -->

        <div class="container">
            <div class="row">
                <!-- Destinations Filter -->

                <!-- End Destinations Filter -->
                <!-- Destinations Grid -->
                <div class="col-md-12 ">
                    <div class="tab-content destinations-grid">
                        <!-- Tab One -->
                        <div id="destinations-1" class="clearfix tab-pane fade active in ">
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item ">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">London - UK</a>
                                        </div>
                                        <span class="properties-nb">
                                            <ins>1289</ins> properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-1.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Paris - France</a>
                                        </div>
                                        <span class="properties-nb">
                                            239 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-2.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Rome - Italy</a>
                                        </div>
                                        <span class="properties-nb">
                                            478 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-3.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Barcelona - Spain</a>
                                        </div>
                                        <span class="properties-nb">
                                            452 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-4.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Madrid - Spain</a>
                                        </div>
                                        <span class="properties-nb">
                                            794 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-5.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Vienna - Austria</a>
                                        </div>
                                        <span class="properties-nb">
                                            1289 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-6.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                        </div>
                        <!-- End Tab One -->
                        <!-- Tab Two -->
                        <div id="destinations-2" class="clearfix tab-pane fade">
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item ">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">London - UK</a>
                                        </div>
                                        <span class="properties-nb">
                                            <ins>1289</ins> properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-1.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Paris - France</a>
                                        </div>
                                        <span class="properties-nb">
                                            239 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-2.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Rome - Italy</a>
                                        </div>
                                        <span class="properties-nb">
                                            478 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-3.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Barcelona - Spain</a>
                                        </div>
                                        <span class="properties-nb">
                                            452 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-4.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Madrid - Spain</a>
                                        </div>
                                        <span class="properties-nb">
                                            794 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-5.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                            <!-- Destinations Item -->
                            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                                <div class="destinations-item">
                                    <div class="destinations-text">
                                        <div class="destinations-name">
                                            <a href="" title="">Vienna - Austria</a>
                                        </div>
                                        <span class="properties-nb">
                                            1289 properties
                                        </span>
                                    </div>
                                    <figure class="destinations-img">
                                        <a href="" title="">
                                            <img src="images/destinations/img-6.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <!-- End Destinations Item -->
                        </div>
                        <!-- End Tab Two -->
                    </div>
                </div>
                <!-- ENd Destinations Grid -->
            </div>
        </div>
    </div>
    <!-- End Destinations Content -->
</section>
<!-- End Travel Destinations -->

<!-- Travel Magazine -->
<section class="magazine">
    <!-- Title -->
    <div class="title-wrap">
        <div class="container">
            <div class="travel-title float-left">
                <h2>Travel Magazine</h2>
            </div>
            <a href="#" title="" class="awe-btn awe-btn-5 arrow-right awe-btn-lager text-uppercase float-right">view all</a>
        </div>
    </div>
    <!-- End Title -->
    <!-- Magazine Content -->
    <div class="container">
        <div class="magazine-cn">
            <div class="row">
                <!-- Magazine Descript -->
                <div class="col-lg-6">
                    <div class="magazine-ds">
                        <div id="owl-magazine-ds">
                            <!-- Magazine Descript Item -->
                            <div class="magazine-item">
                                <div class="magazine-header">
                                    <h2>Five festivals to look forward to this year</h2>
                                    <ul>
                                        <li>by <a href="" title="">Admin</a></li>
                                        <li>03.5.2014</li>
                                    </ul>
                                    <hr class="hr">
                                </div>
                                <div class="magazine-body">
                                    <p>
                                        Suspendisse ullamcorper lacus et commodo laoreet. Sed sodales aliquet felis, quis volutpat massa imperdiet in. Praesent rutrum malesuada risus, ullamcorper pretium tortor. Mauris lacinia nisl id massa consectetur, eu tempus mauris lacinia. Fusce commodo porttitor sapien quis condimentum.
                                    </p>
                                    <p>
                                        Curabitur sollicitudin magna sed sem blandit sodales. Integer in eros sit amet tellus vulputate laoreet ut in purus. Nullam quis lacus nisl. <br>
                                        Sed venenatis commodo leo, ac pulvinar ipsum mattis vitae. Suspendisse eu libero odio.
                                    </p>

                                    <p>
                                        Curabitur sollicitudin magna sed sem blandit sodales. Integer in eros sit amet tellus vulputate laoreet ut in purus. Nullam quis lacus nisl. <br>
                                        Sed venenatis commodo leo, ac pulvinar ipsum mattis vitae.
                                    </p>
                                </div>
                                <div class="magazine-footer clearfix">
                                    <div class="post-share magazine-share float-left">
                                        <a href="" title=""><i class="fa fa-facebook"></i></a>
                                        <a href="" title=""><i class="fa fa-twitter"></i></a>
                                        <a href="" title=""><i class="fa fa-google-plus"></i></a>
                                    </div>
                                    <a href="" title="" class="awe-btn awe-btn-5 arrow-right awe-btn-lager text-uppercase float-right">view more</a>
                                </div>
                            </div>
                            <!-- End Magazine Descript Item -->
                            <!-- Magazine Descript Item -->
                            <div class="magazine-item">
                                <div class="magazine-header">
                                    <h2>Five festivals to look forward to this year</h2>
                                    <ul>
                                        <li>by <a href="" title="">Admin</a></li>
                                        <li>03.5.2014</li>
                                    </ul>
                                    <hr class="hr">
                                </div>
                                <div class="magazine-body">
                                    <p>
                                        Suspendisse ullamcorper lacus et commodo laoreet. Sed sodales aliquet felis, quis volutpat massa imperdiet in. Praesent rutrum malesuada risus, ullamcorper pretium tortor. Mauris lacinia nisl id massa consectetur, eu tempus mauris lacinia. Fusce commodo porttitor sapien quis condimentum.
                                    </p>
                                    <p>
                                        Curabitur sollicitudin magna sed sem blandit sodales. Integer in eros sit amet tellus vulputate laoreet ut in purus. Nullam quis lacus nisl. <br>
                                        Sed venenatis commodo leo, ac pulvinar ipsum mattis vitae. Suspendisse eu libero odio.
                                    </p>

                                    <p>
                                        Curabitur sollicitudin magna sed sem blandit sodales. Integer in eros sit amet tellus vulputate laoreet ut in purus. Nullam quis lacus nisl. <br>
                                        Sed venenatis commodo leo, ac pulvinar ipsum mattis vitae.
                                    </p>
                                </div>
                                <div class="magazine-footer clearfix">
                                    <div class="post-share magazine-share float-left">
                                        <a href="" title=""><i class="fa fa-facebook"></i></a>
                                        <a href="" title=""><i class="fa fa-twitter"></i></a>
                                        <a href="" title=""><i class="fa fa-google-plus"></i></a>
                                    </div>
                                    <a href="" title="" class="awe-btn awe-btn-5 arrow-right awe-btn-lager text-uppercase float-right">view more</a>
                                </div>
                            </div>
                            <!-- End Magazine Descript Item -->
                            <!-- Magazine Descript Item -->
                            <div class="magazine-item">
                                <div class="magazine-header">
                                    <h2>Five festivals to look forward to this year</h2>
                                    <ul>
                                        <li>by <a href="" title="">Admin</a></li>
                                        <li>03.5.2014</li>
                                    </ul>
                                    <hr class="hr">
                                </div>
                                <div class="magazine-body">
                                    <p>
                                        Suspendisse ullamcorper lacus et commodo laoreet. Sed sodales aliquet felis, quis volutpat massa imperdiet in. Praesent rutrum malesuada risus, ullamcorper pretium tortor. Mauris lacinia nisl id massa consectetur, eu tempus mauris lacinia. Fusce commodo porttitor sapien quis condimentum.
                                    </p>
                                    <p>
                                        Curabitur sollicitudin magna sed sem blandit sodales. Integer in eros sit amet tellus vulputate laoreet ut in purus. Nullam quis lacus nisl. <br>
                                        Sed venenatis commodo leo, ac pulvinar ipsum mattis vitae. Suspendisse eu libero odio.
                                    </p>

                                    <p>
                                        Curabitur sollicitudin magna sed sem blandit sodales. Integer in eros sit amet tellus vulputate laoreet ut in purus. Nullam quis lacus nisl. <br>
                                        Sed venenatis commodo leo, ac pulvinar ipsum mattis vitae.
                                    </p>
                                </div>
                                <div class="magazine-footer clearfix">
                                    <div class="post-share magazine-share float-left">
                                        <a href="" title=""><i class="fa fa-facebook"></i></a>
                                        <a href="" title=""><i class="fa fa-twitter"></i></a>
                                        <a href="" title=""><i class="fa fa-google-plus"></i></a>
                                    </div>
                                    <a href="" title="" class="awe-btn awe-btn-5 arrow-right awe-btn-lager text-uppercase float-right">view more</a>
                                </div>
                            </div>
                            <!-- End Magazine Descript Item -->
                            <!-- Magazine Descript Item -->
                            <div class="magazine-item">
                                <div class="magazine-header">
                                    <h2>Five festivals to look forward to this year</h2>
                                    <ul>
                                        <li>by <a href="" title="">Admin</a></li>
                                        <li>03.5.2014</li>
                                    </ul>
                                    <hr class="hr">
                                </div>
                                <div class="magazine-body">
                                    <p>
                                        Suspendisse ullamcorper lacus et commodo laoreet. Sed sodales aliquet felis, quis volutpat massa imperdiet in. Praesent rutrum malesuada risus, ullamcorper pretium tortor. Mauris lacinia nisl id massa consectetur, eu tempus mauris lacinia. Fusce commodo porttitor sapien quis condimentum.
                                    </p>
                                    <p>
                                        Curabitur sollicitudin magna sed sem blandit sodales. Integer in eros sit amet tellus vulputate laoreet ut in purus. Nullam quis lacus nisl. <br>
                                        Sed venenatis commodo leo, ac pulvinar ipsum mattis vitae. Suspendisse eu libero odio.
                                    </p>

                                    <p>
                                        Curabitur sollicitudin magna sed sem blandit sodales. Integer in eros sit amet tellus vulputate laoreet ut in purus. Nullam quis lacus nisl. <br>
                                        Sed venenatis commodo leo, ac pulvinar ipsum mattis vitae.
                                    </p>
                                </div>
                                <div class="magazine-footer clearfix">
                                    <div class="post-share magazine-share float-left">
                                        <a href="" title=""><i class="fa fa-facebook"></i></a>
                                        <a href="" title=""><i class="fa fa-twitter"></i></a>
                                        <a href="" title=""><i class="fa fa-google-plus"></i></a>
                                    </div>
                                    <a href="" title="" class="awe-btn awe-btn-5 arrow-right awe-btn-lager text-uppercase float-right">view more</a>
                                </div>
                            </div>
                            <!-- End Magazine Descript Item -->
                        </div>
                    </div>
                </div>
                <!-- End Magazine Descript -->
                <!-- Magazine Thumnail -->
                <div class="col-lg-6">
                    <div class="magazine-thum" id="magazine-thum">
                        <!--Thumnail Item-->
                        <div class="thumnail-item active clearfix">
                            <figure class="float-left">
                                <img src="images/magazine/img-1.jpg" alt="">
                            </figure>
                            <div class="thumnail-text">
                                <h4>Thailand by Train with Eastern and Oriental Express</h4>
                                <span>03.5.2014</span>
                            </div>
                        </div>
                        <!--End Thumnail Item-->
                        <!--Thumnail Item-->
                        <div class="thumnail-item clearfix">
                            <figure class="float-left">
                                <img src="images/magazine/img-2.jpg" alt="">
                            </figure>
                            <div class="thumnail-text">
                                <h4>Thailand by Train with Eastern and Oriental Express</h4>
                                <span>03.5.2014</span>
                            </div>
                        </div>
                        <!--End Thumnail Item-->
                        <!--Thumnail Item-->
                        <div class="thumnail-item clearfix">
                            <figure class="float-left">
                                <img src="images/magazine/img-3.jpg" alt="">
                            </figure>
                            <div class="thumnail-text">
                                <h4>Thailand by Train with Eastern and Oriental Express</h4>
                                <span>03.5.2014</span>
                            </div>
                        </div>
                        <!--End Thumnail Item-->
                        <!--Thumnail Item-->
                        <div class="thumnail-item clearfix">
                            <figure class="float-left">
                                <img src="images/magazine/img-4.jpg" alt="">
                            </figure>
                            <div class="thumnail-text">
                                <h4>Thailand by Train with Eastern and Oriental Express</h4>
                                <span>03.5.2014</span>
                            </div>
                        </div>
                        <!--End Thumnail Item-->
                    </div>
                </div>
                <!-- End Magazine Thumnail -->
            </div>
        </div>
    </div>
    <!-- End Magazine Content -->
</section>
<!-- End Travel Magazine -->

<!-- Confidence and Subscribe  -->
<section class="confidence-subscribe">
    <!-- Background -->
    <div class="bg-parallax bg-3"></div>
    <!-- End Background -->
    <div class="container">
        <div class="row cs-sb-cn">

            <!-- Confidence -->
            <div class="col-md-6">
                <div class="confidence">
                    <h3>Book with confidence</h3>
                    <ul>
                        <li>
                            <span class="label-nb">01</span>
                            <h5>No booking charges</h5>
                            <p>We don't charge you an extra fee for booking a hotel room with us</p>
                        </li>
                        <li>
                            <span class="label-nb">02</span>
                            <h5>No cancellation fees</h5>
                            <p>We don't charge you a cancellation or modification fee in case plans change</p>
                        </li>
                        <li>
                            <span class="label-nb">03</span>
                            <h5>Instant confirmation</h5>
                            <p>Instant booking confirmation whether booking online or via the telephone</p>
                        </li>
                        <li>
                            <span class="label-nb">04</span>
                            <h5>Flexible booking</h5>
                            <p>You can book up to a whole year in advance until the moment of your stay</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Confidence -->
            <!-- Subscribe -->
            <div class="col-md-6">
                <div class="subscribe">
                    <h3>Subscribe to our newsletter</h3>
                    <p>Enter your email address and we’ll send you our regular promotional emails, packed with special offers, great deals, and huge discounts</p>
                    <!-- Subscribe Form -->
                    <div class="subscribe-form">
                        <form action="#" method="get">
                            <input type="text" name="" value="" placeholder="Your email" class="subscribe-input">
                            <button type="submit" class="awe-btn awe-btn-5 arrow-right text-uppercase awe-btn-lager">subcrible</button>
                        </form>
                    </div>
                    <!-- End Subscribe Form -->
                    <!-- Follow us -->
                    <div class="follow-us">
                        <h4>Follow us</h4>
                        <div class="follow-group">
                            <a href="" title=""><i class="fa fa-facebook"></i></a>
                            <a href="" title=""><i class="fa fa-twitter"></i></a>
                            <a href="" title=""><i class="fa fa-pinterest"></i></a>
                            <a href="" title=""><i class="fa fa-linkedin"></i></a>
                            <a href="" title=""><i class="fa fa-instagram"></i></a>
                            <a href="" title=""><i class="fa fa-google-plus"></i></a>
                            <a href="" title=""><i class="fa fa-digg"></i></a>
                        </div>
                    </div>
                    <!-- Follow us -->
                </div>
            </div>
            <!-- End Subscribe -->

        </div>
    </div>
</section>
<!-- End Confidence and Subscribe  -->

