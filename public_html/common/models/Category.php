<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $paretnt_id
 *
 * @property PostHasCategory[] $postHasCategories
 * @property Post[] $posts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'paretnt_id'], 'string', 'max' => 200],
            [['desc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'name' => 'نام',
            'paretnt_id' => 'Paretnt ID',
            'desc' =>'توضیحات',
            'date' => 'تاریخ',
            'tooltip' => 'تولتیپ'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostHasCategories()
    {
        return $this->hasMany(PostHasCategory::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('post_has_category', ['category_id' => 'id']);
    }
    public static  function  getCategoryId($slug)
{
        
        return Category::find()->where('slug="'.$slug.'"')->One()->id;
            
}
public static  function  getSlug($title)
{
         
            $title = str_replace(":","", $title);
            $title = str_replace("»","", $title);
            $title = str_replace('"',"", $title);
            $title = str_replace("«","", $title);
            $title = str_replace(".","", $title);
            $title = str_replace("!","", $title);
            $title = str_replace("؟","", $title);
            $title = str_replace("،","", $title);
            $title = str_replace("?","", $title);
            $title = str_replace(" ","-", $title);
            $title = str_replace("/","-", $title);
            $title = str_replace("+","-", $title);
            $title = str_replace("--","-", $title);
            $title = str_replace("---","-", $title);
            return $title;
         
     }
     public static function getCatName($id){
        $m = Category::findOne($id);
        if(isset($m)){
         return $m->name;
        }
    }
}
