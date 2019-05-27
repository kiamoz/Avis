<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'تماس با ما';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="wrapper-boxed"> 
  <div class="site-wrapper">
      
      <div class="container">
      <div class="row">
    <h1><?= Html::encode($this->title) ?></h1>

  

    <div class="row">
        <div class="col-lg-4">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
         <div class="col-lg-8">
             
                 <div id="map"></div>
                 <row>
                     <div class="col-lg-6">
                         مرکز تماس و فروش :02125154572<br>
                      مرکز تماس و فروش :02125154627
                     </div>
                     <div class="col-lg-6">
                     پشتیبانی شبانه روزی
                     09125399421
                     
                     <br>
                      پشتیبانی اداری
                      02126154572
                      
                      
                     
                     </div>
                     
                 </row>
         </div>
    </div>

</div>
      </div>
  </div></div>
<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width:100%;
        margin-bottom: 30px;
       }
    </style>
  </head>
  <body>
   

    <script>
      function initMap() {
          
          var styles = [
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "invert_lightness": true
            },
            {
                "hue": "#435158"
            },
            {
                "saturation": 10
            },
            {
                "lightness": 30
            },
            {
                "gamma": 0.5
            }
        ],
    },{
        "featureType": "transit.line",
        "elementType": "all",
        "stylers": [
            {
                "invert_lightness": false
            },
            {
                "color": "#ff0000"
            },
            {
                "weight": 0.43
            }
        ]
    },
]												
          
        
        var avis = {lat:  35.800802, lng: 51.484206};
        var center = {lat:  35.801014, lng: 51.456649};
        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: avis,
          //disableDefaultUI: true,
	  scrollwheel: false,
	
	  styles: styles
        });
        var marker = new google.maps.Marker({
          position: avis,
          map: map
        });
        var contentString = '<div id="content">'+
			  '<div id="siteNotice">'+
			  '</div>'+
			  '<h4>We Are Here</h4>'+
			  '<p>Description' +
			  '</p>'+
			  '</div>';

		  var infowindow = new google.maps.InfoWindow({
			  content: contentString
		  });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtCVpuWqSG6ajSbhhSosnxA0Xz-G_h8RA&callback=initMap">
    </script>
  </body>
</html>


