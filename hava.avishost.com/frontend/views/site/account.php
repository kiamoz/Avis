<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->title = 'اطلاعات حساب';
?>
<article id="post-78" class="post-78 post type-post status-publish format-standard has-post-image hentry category-blog tag-best tag-cappuccino tag-coffee text-page-wrap">
    <!-- .entry-content -->
    <div class="entry-content container">
        <div class="row">
            <div class="col-md-12 mt20 mb15 text-center">
                <a class="btn btn-primary" href="<?= Url::to(['site/addinfo', 'id' => Yii::$app->user->identity->id]); ?>">ویرایش اطلاعات</a>
                <a class="btn btn-info" href="<?= Url::to(['address/index', 'id' => Yii::$app->user->identity->id]); ?>"> مدیریت آدرس ها</a>
            </div>
        </div>
</article> 