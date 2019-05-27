<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '/مدیران';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= \common\models\Building::findOne(Yii::$app->user->identity->building_id)->name.Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'name_and_family',
            'username',
            'password',
            
            'admin_type_human',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('ثبت مدیر جدید', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>
  
    
</div>
