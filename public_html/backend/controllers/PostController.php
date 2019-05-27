<?php

namespace backend\controllers;

use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\web\Uploads;
use common\models\PostHasCategory;
use common\models\Category;
use yii\filters\AccessControl;
use common\models\Tag;
use common\models\TagHasPost;
use common\models\Comment;
/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                     [
                        'actions' => ['unlock','index','create','delete','view','lvl','update','index2','f1','bulk','bulk2','save','drafts','urldl','slug','logout'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return (\Yii::$app->user->identity->lvl == 1);
                        }
                        
                    ],
                ],
            ],
            ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    
   public function actionCreate()
    {
        $tag = new Tag;
        $model = new Post();
       $model->author_id =  Yii::$app->user->id;
        $model->date =  date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()))  { 
	    
 $model->file = UploadedFile::getInstance($model,'file');
 
            
            if($model->file->basename){
            
            $basfname = "uploads/".$this->generateRandomString(15);
	    $model->file->saveAs($basfname. '.'.$model->file->extension);
	    $model->thumb_nail = $basfname. '.'.$model->file->extension;
            }
            $model->slug = Post::getSlug($model->title);
	 	   $model->save();


            
        
                if($_POST['Post']['cat']){
              
                foreach($_POST['Post']['cat'] as $depe){
                    
                    $dep = new PostHasCategory();
                    $dep->post_id = $model->id;
                    
         
                    $dep->category_id = ($depe);
                    $dep->save();
                } 
                
                }
                if ($_POST['Post']['tag']) {
                    
            $m = explode("-", $_POST['Post']['tag']); 
            
            foreach($m as $taggg){

                if($taggg == ""){
                    continue; 
                }
                $tagx = Tag::find()->where('name="'.$taggg.'"')->One();
                $taxid = $tagx->id;
                if(!$taxid){
                $tag1 = new Tag;
                $tag1->name =  $taggg;
                $tag1->save();
                $taxid = $tag1->id;
                }
                
                $tag2 = new TagHasPost();
                $tag2->tag_id = $taxid;
                $tag2->post_id = $model->id;
                $tag2->save();
                 
            } 
              
        }
         if($_POST['Post']['cats']){
//            /  print_r($_POST);exit();
              
                foreach($_POST['Post']['cats'] as $q2){
                    
                    $q = new \common\models\PostHasCategory();
                    $q->post_id = $model->id;
                    #echo $q->question_id;exit();
                    $q->category_id = ($q2);
                    #echo $q->category_id;exit();
                    #print_r($q);exit();
                    $q->save();
                } 
                
                }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,'tag' => $tag
            ]);
        }
    }
public function actionUpload()
    {
     
 
         
         
        //echo json_encode(['last_id'=>'no file found for upload.']);
	//    return; 
	if (empty($_FILES['file'])) {
	    echo json_encode(['eror'=>'no file found for upload.']);
	    return;
	}
	$files = $_FILES['file'];
	$success = null;
	$paths= [];
        $list = "";
	$filenames = $files['name'];
	//$folder = md5(uniqid());
	//if (!file_exists('/home/naptad/public_html/ppp'.DIRECTORY_SEPARATOR. $folder)) {
	//    mkdir('/home/naptad/public_html/ppp'.DIRECTORY_SEPARATOR. $folder, 0777,true);
	//}
	for($i=0; $i < count($filenames); $i++){
            
	    $ext = explode('.', basename($filenames[$i]));
	    $target = "/home/berdaryc/public_html/frontend/web/upload" . DIRECTORY_SEPARATOR .  $filenames[$i]  ;
	    if (move_uploaded_file($files['tmp_name'][$i],$target)){
                
        
                
		//$list.="|".$target;
		$success = true;
		$paths[] = $target;
	    }else {
		$success = false;
		
		break;
		
		
	    }
	}
        
	
	if($succes == true) {
         
	    $output = ['eror'=>'File Uploaded'];
		  
	
    }elseif ($success === false) {
	
	$output = ['eror'=>'eror while Uploading Images'];
	foreach ($paths as $file) {
	unlink($file);	
	}
    }  else {
	$output = ['eror'=>'No File Were Processed'];
    }

    echo json_encode($output);
    }
    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $tag = new Tag;
        $model = $this->findModel($id);

if ($model->load(Yii::$app->request->post()))  { 
    
     $model->body = $model->body;
    
    
           
          
    $model->date =  date('Y-m-d H:i:s');
	       $model->file = UploadedFile::getInstance($model,'file');
            
            if($model->file->basename){
            
            $basfname = "uploads/".$this->generateRandomString(15);
	    $model->file->saveAs($basfname. '.'.$model->file->extension);
	    $model->thumb_nail = $basfname. '.'.$model->file->extension;
            }
            $model->slug = Post::getSlug($model->title);
	    $model->save(False);
            
                $m = PostHasCategory::deleteAll('post_id='.$model->id);
                if($_POST['Post']['cat']){
               
                foreach($_POST['Post']['cat'] as $depe){
                    
                    $dep = new PostHasCategory();
                    $dep->post_id = $model->id;
                    
         
                    $dep->category_id = ($depe);
                    $dep->save();
                } 
                
                }
                if ($_POST['Post']['tag']) {
            
            
            $m = explode("-", $_POST['Post']['tag']); 
            
            //print_r($m) ;
           // exit();
            
            
             
            
            
            
            TagHasPost::deleteAll('post_id='.$model->id); 
            
            
           
          
            
            foreach($m as $taggg){
                
                
              //  echo $taggg."<br>";
                if($taggg == ""){
                    continue; 
                }
                $tagx = Tag::find()->where('name="'.$taggg.'"')->One();
                
                //echo $tagx->id."<br>";
                $taxid = $tagx->id;
                if(!$taxid){
                $tag1 = new Tag;
                $tag1->name =  $taggg;
                $tag1->save();
                $taxid = $tag1->id;
                }
                //echo $taxid."*";
                $tag2 = new TagHasPost();
                $tag2->tag_id = $taxid;
                $tag2->post_id = $model->id;
                $tag2->save();
                 
            } 
            }
            $m = \common\models\PostHasCategory::deleteAll('post_id='.$model->id);
            if($_POST['Post']['cats']){
            
              
                foreach($_POST['Post']['cats'] as $q2){
                    
                    $q = new \common\models\PostHasCategory();
                    $q->post_id = $model->id;
                    #echo $q->question_id;exit();
                    $q->category_id = ($q2);
                    #echo $q->category_id;exit();
                    #print_r($q);exit();
                    $q->save();
            }}
            if($model->cat){
		 
            $len = count($model->cat);
            
             
            for($i=0;$i<$len;$i++){
                $p2 = new \common\models\PostHasCategory();
	        $p2->post_id = $model->cats[$i];
		$p2->category_id = $model->id;
                $p2->save(FALSE);
		
            }
                
                }
             
           //exit();
           
          
            
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tag' => $tag,
            ]);
        }
    }
    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionSlug()
    {
        $p = Post::find()->all();
        foreach ($p as $post){
            
            $post->slug = Post::getSlug($post->title);
            $post->save();
        }
}
}
