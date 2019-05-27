<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property string $date
 * @property string $file_path
 * @property string $thumb_nail
 * @property string $summery
 *
 * @property PostHasCategory[] $postHasCategories
 * @property Category[] $categories
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
        public  $cat,$file;
        public $time_create;
        public $datefarsi;
        public  $tag;
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['date','file','link','slug'], 'safe'],
            [['title'], 'string', 'max' => 225],
            [['file_path'], 'string', 'max' => 2000],
            [['thumb_nail'], 'string', 'max' => 200],
            [['summery'], 'string', 'max' => 100],
	    [['file'],'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'date' => 'Date',
            'file_path' => 'File Path',
            'thumb_nail' => 'Thumb Nail',
            'summery' => 'Summery',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostHasCategories()
    {
        return $this->hasMany(PostHasCategory::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('post_has_category', ['post_id' => 'id']);
    }
 public static function resize_img($path,$w,$h,$name){
               
        
try {
    //echo $path;exit();
    Post::resize_crop_image($w,$h, $path, 'upload/'.$name.$w.$h.'mx.jpg');
   
    //$img->crop($w,$h,0,0)->save('upload/'.$name.$w.$h.'mx.png');
    
    return 'https://avishost.com/upload/'.$name.$w.$h.'mx.jpg';
} catch(Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
    }
    
       
    public static  function  arabic_w2e($str)
{
    $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($arabic_western, $arabic_eastern, $str);
}

public static function getPostHumanTime($id){
    $m = Post::findOne($id);
    date_default_timezone_set('Asia/Tehran');
    $time = strtotime($m->time);
    
    
    
    return Post::humanTiming($time)    ;
    
}


public static function humanTiming ($time)
{
    
    date_default_timezone_set('Asia/Tehran');
    //echo date('d M Y H:i:s',time());
    //exit();
    //echo time()."---". $time;
    //exit();
    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'سال ',
        2592000 => 'ماه ',
        604800 => 'هفته ',
        86400 => 'روز ',
        3600 => 'ساعت ',
        60 => ' دقیقه',
        1 => 'ثانیه '
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'');
    }

}


public static function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80){
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
    switch($mime){
        case 'image/gif':
            $image_create = "imagecreatefromgif";
            $image = "imagegif";
            break;
 
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 7;
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 80;
            break;
 
        default:
            return false;
            break;
    }
     
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
    if($width_new > $width){
        //cut point by height
        $h_point = (($height - $height_new) / 2);
        //copy image
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        //cut point by width
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }
     
    $image($dst_img, $dst_dir, $quality);
 
    if($dst_img)imagedestroy($dst_img);
    if($src_img)imagedestroy($src_img);
}


public static function getpostCats($id){
        
       
   
   
        if(Post::find()->where( [ 'id' => $id ] ) ->exists()){
        $category_arr = array();
        $m = \common\models\PostHasCategory::find()->
             with('post')->
             where('post_id='.$id)->all();
        foreach($m as $cats){
            array_push($category_arr, $cats->category_id);
        }
        return $category_arr;
        }
                
        
    }

public static function getpostCatsName($id){
        
        $list ="";
        $arr = Post::getpostCats($id);
       
        foreach($arr as $cats){
           $list.= "-". Category::getCatName($cats);
        }
        return $list;
                
        
    }


    public static function limitword($string, $limit){
    $words = explode(" ",$string);
    $output = implode(" ",array_splice($words,0,$limit));
    return $output;
}


public static function getPost_view_count($id){
       
          return PostView::find()->where('post_id='.$id)->count();
                
        
    }
//    public function afterFind()
//    {
//         parent::afterFind();
//       $dd =  $this->date;
//        $pieces_time = explode(" ", $dd);
//        
//        $pieces = explode("-", $dd);
//        $exdate = gregorian_to_jalali($pieces[0],$pieces[1],$pieces[2]);
// 
//        $this->date  = $pieces_time[1]." ".$exdate[0]."/".$exdate[1]."/".$exdate[2];
//        $this->date  = $exdate[0]."/".$exdate[1]."/".$exdate[2];
//       
//    }
    public static  function  getPostId($slug)
{
        
        return Post::find()->where('slug="'.$slug.'"')->One()->id;
            
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
    
}
