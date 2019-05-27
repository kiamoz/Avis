<?php

namespace frontend\controllers;

use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
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
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
   

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
   
   
    
    
    public function actionView($id)
    {
        
      
        if(!is_numeric($id)){

            //$id = \common\models\Post::getPostId($id);
            $post_object = Post::findOne(['slug'=>$id]);
            if(!$post_object->id){
                return $this->redirect(['site/index']);
            }
        }else{
            
            $post_object = Post::findOne($id);
            
        }
        
        $b = new \common\models\PostView();
        $b->post_id = $id;
        $b->ip = $_SERVER['REMOTE_ADDR'];
        $b->save();

        return $this->render('view', [
            'model' => $post_object,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
  

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
   

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
    
    
     public function actionCategory($id=0)
    { 
         if(!is_numeric($id)){

            $id = \common\models\Category::getCategoryId($id);
            if(!$id){
                return $this->redirect(['site/index']);
            }
         }
//        
//	$queryy =  \common\models\PostHasCategory::find()
//        ->where('category_id=16')
//        ->with('post')
//        ->orderBy(['category_id' => SORT_DESC]);
//        $countQueryy = clone $queryy;
//        $pagess = new Pagination(['totalCount' => $countQueryy->count(),'defaultPageSize' =>2]);
//       
//        $cats  = $queryy->offset($pagess->offset)
//        ->limit(2)
//        ->all();
//       
//    
      //$models = $query->offset($pages->offset)
       // ->limit(40)
        //->all();
         if($id==0){
             $queryy =\common\models\PostHasCategory::find()->with('post')
             ->groupBy('post_id')        
             ->orderBy(['post_id' => SORT_DESC]); 
         }else{
        $queryy =\common\models\PostHasCategory::find()
        ->where('category_id=16')
        ->with('post')
        ->orderBy(['post_id' => SORT_DESC]);
         }
        $countQueryy = clone $queryy;
        //print_r($countQueryy);
        //exit();
        $pagess = new Pagination(['totalCount' => $countQueryy->count(),'defaultPageSize' =>9]);
       //print_r($pagess);
       //exit();
       $cats  = $queryy->offset($pagess->offset)
        ->limit(9)
        ->all();
            return $this->render('category', [
          'pages' => $pages,
          'pagess' => $pagess,
         
          'cate' => $cats,       

        ]);
    }
    public function actionTag($id)
    {

	 
	 $cats1 = TagHasPost::find()
    ->with('post')
    ->where('tag_id='.$id)
    ->all();

			  
			   		    
        return $this->render('tag', [
            
   'cate' => $cats1,       

        ]);
    }
}
