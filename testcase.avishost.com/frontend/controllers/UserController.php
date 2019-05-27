<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use common\models\UserHasSemat;
use common\models\UserHasPermission;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

    public function beforeAction($action) {
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl
        if ($action->id == 'delete')
            $this->enableCsrfValidation = false;

        if (!parent::beforeAction($action)) {
            return false;
        }

        // other custom code here

        return true; // or false to not run the action
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models. 
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);






        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'title' => $title
        ]);
    }

    public function actionIndex_admin() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 1);

        return $this->render('index_admin', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionSms_single($id) {



        $user = User::findOne($id);
        $send = new \sendAPI('tasbitlaw.com', '88795996');
        $mobiles = array($user->username);
        $body = 'سلام ';
        $body .= 'رمز ورود شما در سامانه تثبیت عبارت است از' . ' ' . $user->password . " ";

        $body .= "آدرس ورود  "
                . "http://charge.tasbitlaw.com ";


        $result = $send->send($mobiles, $body);
        Yii::$app->session->setFlash('success', 'رمز کاربر ارسال شد');
        return $this->redirect(['index', 'type' => 2]);
    }

    public function actionSms_all($building_id) {



        foreach (User::find()->where(['building_id' => $building_id])->all() as $single_user) {

//echo $single_user->id."<br>";

            $user = $single_user;
            $send = new \sendAPI('tasbitlaw.com', '88795996');
            $mobiles = array($user->username);
            $body = 'سلام ';
            $body .= 'رمز ورود شما در سامانه تثبیت عبارت است از' . ' ' . $user->password . " ";

            $body .= "آدرس ورود  "
                    . "http://charge.tasbitlaw.com ";


            $result = $send->send($mobiles, $body);
        }


        Yii::$app->session->setFlash('success', 'رمز کاربر ارسال شد');
        return $this->redirect(['index', 'type' => 2]);
    }

    public function actionOwner() {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {




            $model->type = "2";
            $aaaa = rand(1000, 9999);
            $model->password = $aaaa;
            $model->username = $model->username;
            $model->setPassword($aaaa);
            $model->building_id = Yii::$app->user->identity->building_id;

            $model->generateAuthKey();
            $model->save();
            return $this->redirect(['index', 'type' => 2]);
        } else {
            return $this->render('owner', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLe() {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {




            $model->type = "3";
            $aaaa = rand(1000, 9999);
            $model->password = $aaaa;
            $model->username = $model->username;
            $model->setPassword($aaaa);
            $model->building_id = Yii::$app->user->identity->building_id;

            $model->generateAuthKey();
            $model->save();
            return $this->redirect(['index', 'type' => 3]);
        } else {
            return $this->render('le', [
                        'model' => $model,
            ]);
        }
    }

    public function actionOther() {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {




            $model->type = "5";
            $aaaa = rand(1000, 9999);
            $model->password = $aaaa;
            $model->username = $model->username;
            $model->setPassword($aaaa);
            $model->building_id = Yii::$app->user->identity->building_id;

            $model->generateAuthKey();
            $model->save();
            if ($_GET['back_id']) {

                Yii::$app->getSession()->setFlash('success', $model->name_and_family . " با  موفقیت ثبت شد");

                return $this->redirect(['/' . $_GET['back_id']]);
            }
             return $this->redirect(['index','UserSearch[type]'=>5,'hide_sms'=>1]);
        } else {
            return $this->render('other', [
                        'model' => $model,
            ]);
        }
    }

    public function actionStuff() {
        
        
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {





            if ($model->admin_postion) {
                $model->type = "4";
            } else {
                $model->type = "4";
            }

            $aaaa = rand(1000, 9999);
            $model->password = $aaaa;

            $model->username = $model->username;
            $model->setPassword($aaaa);
            $model->building_id = Yii::$app->user->identity->building_id;

            $model->generateAuthKey();
            $model->save();
            return $this->redirect(['index','UserSearch[type]'=>4]);
        } else {
            return $this->render('stuff', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();

        $model->scenario = User::new_reg_by_user;
        if ($model->load(Yii::$app->request->post())) {




            $model->admin_type = "1";
            $aaaa = rand(1000, 9999);
            $model->password = $aaaa;
            $model->username = $model->username;
            $model->setPassword($aaaa);

            $model->building_id = Yii::$app->user->identity->building_id;
            $model->generateAuthKey();
            if ($model->save()) {


                $date_time = date('Y-m-d H:i:s');

                foreach ((array) $model->semats as $semat) {
                    $model_semats = new UserHasSemat();
                    $model_semats->semat_id = $semat;
                    $model_semats->user_id = $model->id;
                    $model_semats->date_time = $date_time;
                    $model_semats->save();
                }
                foreach ((array) $model->permissions as $permiss) {
                    $model_semats = new UserHasPermission();
                    $model_semats->permission_id = $permiss;
                    $model_semats->user_id = $id;
                    $model_semats->date_time = $date_time;
                    $model_semats->save();
                }


                return $this->redirect(['index']);
            }
        }


        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {


            $model->setPassword($model->password);
            if (count($model->semats))
                $model->admin_type = "1";

            $model->save();


            $date_time = date('Y-m-d H:i:s');


            UserHasSemat::deleteAll(['user_id' => $model->id]);

            foreach ((array) $model->semats as $semat) {
                $model_semats = new UserHasSemat();
                $model_semats->semat_id = $semat;
                $model_semats->user_id = $id;
                $model_semats->date_time = $date_time;
                $model_semats->save();
            }

            foreach ((array) $model->permissions as $permiss) {
                $model_semats = new UserHasPermission();
                $model_semats->permission_id = $permiss;
                $model_semats->user_id = $id;
                $model_semats->date_time = $date_time;
                $model_semats->save();
            }


            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionList($q = null, $id = null, $type = '4,5') {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        //$q = str_replace(array('ی', 'ک'), array('ي', 'ك'), $q);

        if (!is_null($q)) {
            $query = new Query;
            $query
                    // ->select(['CONCAT(name,"(",type_desc,")") AS text', 'type.id',])
                    ->select(['CONCAT(name_and_family) AS text', 'id',])
                    ->from('user')
                    ->orWhere(['like', 'name_and_family', $q])
                    ->orWhere(['like', 'username', $q])
                    ->andWhere('(building_id=' . Yii::$app->user->identity->building_id . '  and type IN(' . $type . '))')
                    //->orderBy('update_date')
                    ->limit(20);
            //echo $query;


            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }


        return $out;
    }

    public function actionGet_user_number($id) {

        return json_encode(array('cell_number' => User::findOne($id)->username), JSON_UNESCAPED_UNICODE);
    }

    public function actionList_all($q = null, $id = null) {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        //$q = str_replace(array('ی', 'ک'), array('ي', 'ك'), $q);

        if (!is_null($q)) {
            $query = new Query;
            $query
                    // ->select(['CONCAT(name,"(",type_desc,")") AS text', 'type.id',])
                    ->select(['CONCAT(name_and_family) AS text', 'id',])
                    ->from('user')
                    ->orWhere(['like', 'name_and_family', $q])
                    ->orWhere(['like', 'username', $q])
                    ->andWhere('(building_id=' . Yii::$app->user->identity->building_id . '  ) ')
                    //->orderBy('update_date')
                    ->limit(20);
            //echo $query;


            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }


        return $out;
    }

}
