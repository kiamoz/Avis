<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->title = \common\models\Building::findOne(Yii::$app->user->identity->building_id)->name."/"."ثبت  ساکن جدید";

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-lg-6">

   <?= $form->field($model, 'name_and_family')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 200]) ?>

<div class="col-lg-4">

<?php
use faravaghi\jalaliDatePicker\jalaliDatePicker;

echo $form->field(
		$model, 
		'time_az'
	)
	->widget(
		jalaliDatePicker::className(), [
		'options' => array(
			'format' => 'yyyy/mm/dd',
			'viewformat' => 'yyyy/mm/dd',
			'placement' => 'left',
			'todayBtn'=> 'linked',
		),
		'htmlOptions' => [
			'id' => 'date1',
			'class'	=> 'form-control'
		]
	]);


?></div>

<div class=col-lg-4>
<?php

echo $form->field(
		$model, 
		'time_to'
	)
	->widget(
		jalaliDatePicker::className(), [
		'options' => array(
			'format' => 'yyyy/mm/dd',
			'viewformat' => 'yyyy/mm/dd',
			'placement' => 'left',
			'todayBtn'=> 'linked',
		),
		'htmlOptions' => [
			'id' => 'date',
			'class'	=> 'form-control'
		]
	]);


?>
</div>


<br><br><br><br>
 <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ثبت' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>        
</div>

    <?php ActiveForm::end(); ?>

</div>
