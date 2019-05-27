<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
use kartik\select2\Select2;
use dosamigos\tinymce\TinyMce;
use dosamigos\fileupload\FileUploadUI;
use kartik\file\FileInput;
use yii\helpers\Url;
use common\models\Post;



/* @var $this yii\web\View */  
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">
    <div class="col-lg-8">
    <?php $form = ActiveForm::begin(); ?>
   
    
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => 200]) ?>
    <?= $form->field($model, 'summery')->textInput(['maxlength' => 200]) ?>
        
    <?= $form->field($model, 'link')->textInput(['maxlength' => 500]) ?>
<?PHP
        if ($model->id) {
            $m = \common\models\TagHasPost::find()->where('post_id=' . $model->id)->all();
            //echo count($m);
            $TAGLISX = "";
            foreach ($m as $taglist) {
                //echo $taglist->tag_id."***";
              //  $TAGLISX .= "-" . common\models\Tag::getTagName($taglist->tag_id);
            }
            if (isset($TAGLISX)) {
                $model->tag = $TAGLISX;
            }
        }
        ?>  
        
 <?= $form->field($model, 'tag')->textInput() ?>
        <script src="image/ckeditor/ckeditor.js"></script>
    <?= Html::activeLabel($model, 'body'); ?>
    <textarea class="container" style="height: 500px;" name="Post[body]" id="editor1" ><?= $model->body ?></textarea>
    <?= Html::error($model, 'body'); ?>
    







    

  






    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

   

</div>
</div>

<div class="col-lg-4">
<?PHP

$b  = Category::find()->all();
$date = array();
foreach( $b as $category){
$data[$category->id] = $category->name;

}
if($_GET['id']){


$m = common\models\PostHasCategory::find()
     //->with('post')
     ->where('post_id='.$_GET['id'])
     ->all();
$arr_select = array();
echo count($m);
foreach($m as $list){
    
    $arr_select[] = $list->category_id;
}

}



echo Html::activeLabel($model,'cats');


echo Select2::widget([
    'name' => 'Post[cats]',
    'data' => $data,
    'options' => ['placeholder' => 'Select ....', 'multiple' => true],
    'value' => $arr_select, // initial value
    'pluginOptions' => [
        'tags' => true,
        'maximumInputLength' => 10
    ],
]);

    

echo Html::error($model,'cats');


?>






     <?php  echo FileInput::widget([
    'name' => 'file[]',
    'options'=>[
	'multiple'=>true
],
    'pluginOptions' => [
	'uploadUrl' => Url::to(['upload']),
	'uploadExtraData' => [
	    'insert_id' => $last_id,
	    ],
	 'maxFileCount' => 2
	],
    
    ]);
?>
           <?= $form->field($model, 'file')->fileInput(['id' => 'file_id']) ?>

 <?php ActiveForm::end(); ?>	
</div>
<script>

 //editor = CKEDITOR.replace('editor1');




          editor = CKEDITOR.replace('editor1', {
            extraPlugins: 'lineutils,widget,image2',
            height: '800px',
            toolbar: [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
	{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
	'/',
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
	'/',
	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
	{ name: 'others', items: [ '-' ] },
	{ name: 'about', items: [ 'About' ] }
            ]


                    // NOTE: Remember to leave 'toolbar' property with the default value (null).
        });



        editor.addCommand("mySimpleCommand", {
            exec: function (edt) {
                // alert("X");


                var start_element = edt.getSelection().getStartElement().getOuterHtml();
                em = start_element.slice(0, 4);

                if (em == "<img") {
                    editor.insertHtml("&nbsp;<p style='text-align:center'>" + start_element + "</p>");
                }

            }
        });



        /* editor.ui.addButton('C', {
         label: "CENTER",
         command: 'mySimpleCommand',
         icon: 'http://24news.ir/img/Center-icon.png'
         }); */



    </script>
    <script type="text/javascript">
    function openKCFinder(div) {
        window.KCFinder = {
            callBack: function (url) {
                // alert(url);
                $('#fimage').val(url);
                window.KCFinder = null;
                div.innerHTML = '<div style="margin:5px">Loading...</div>';
                var img = new Image();
                img.src = url;
                img.onload = function () {
                    div.innerHTML = '<img id="img" src="' + url + '" />';
                    var img = document.getElementById('img');
                    var o_w = img.offsetWidth;
                    var o_h = img.offsetHeight;
                    var f_w = div.offsetWidth;
                    var f_h = div.offsetHeight;
                    if ((o_w > f_w) || (o_h > f_h)) {
                        if ((f_w / f_h) > (o_w / o_h))
                            f_w = parseInt((o_w * f_h) / o_h);
                        else if ((f_w / f_h) < (o_w / o_h))
                            f_h = parseInt((o_h * f_w) / o_w);
                        img.style.width = f_w + "px";
                        img.style.height = f_h + "px";
                    } else {
                        f_w = o_w;
                        f_h = o_h;
                    }
                    img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                    img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                    img.style.visibility = "visible";
                }
            }
        };
        window.open('http://penarts.net/frontend/web/kcfinder/browse.php?type=images&dir=images/public',
                'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                );
    }
</script>