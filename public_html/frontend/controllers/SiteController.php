<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use common\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use yii\base\Security;
use \common\models\Order;
use yii\widgets\Pjax;
use common\models\Item;
use common\models\Price;
use common\models\Product;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public $jsFile;

    
  
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'ad_to_card'],
                'rules' => [
                        [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                        [
                        'actions' => ['logout', 'ad_to_card'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    
    public function actionVidarchive() {


        $connection = \Yii::$app->db;
        $p1 = $connection->createCommand('SELECT * FROM `post` where id IN(select post_id from post_has_category where category_id = 6) ORDER BY  id DESC')->queryAll();



        return $this->render('vid_archive', [
                    'all_vid' => $p1
        ]);
    }

    public function actionPostarchive($page = 1) {


        $p2 = $page * 26;
        $p1 = $p2 - 26;

        $connection = \Yii::$app->db;
        $p1 = $connection->createCommand('SELECT * FROM `post` where id IN(select post_id from post_has_category where category_id IN(1,2,3,4)) ORDER BY  id DESC limit ' . $p1 . ',26')->queryAll();

        //$p1 = $connection->createCommand('SELECT * FROM `post` where id IN(select post_id from post_has_category where category_id IN(1,2,3,4)) ORDER BY  id DESC limit 4,8')->queryAll();



        return $this->render('post_archive', [
                    'all_vid' => $p1
        ]);
    }

    public function actionFill_top_cart() {



        $arr = array();
        $arr['htmlx'] = Order::get_cart_items_html();
        ;

        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    public function actionProduct($p_id) {
        $this_p = \frontend\models\Product::find()
                ->where('id=' . $p_id)
                ->one();



        return $this->render('product', [
                    'this_product' => $this_p
        ]);
    }

    public function actionRadio_ajax($shipping_id) {
        $totalx = Order::cal_ship_price($shipping_id);
        echo $totalx;
    }

    public function actionAdd_to_card_ajax($product_id, $qty) {



        if ($product_id) {
            $order_id = 0;
            $flag = 0;
            $count = 0;
            $m = Order::check_order();

            if ($m) {
                $order_id = $m;
            } else {
                $order_id = Order::add_new_order();
            }



            for ($i = 0; $i < $qty; $i++) {
                $m2 = Item::add_new_item_to_order($order_id, $product_id, $_POST['att_id'], $_POST['ext']);
            }
            if ($m2) {
                $count = \common\models\Order::get_order_count();
                $flag = 1;
            }
        }

        $arr = array();
        $arr['flag'] = $flag;
        $arr['count'] = $count;
        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    public function actionAjaxx($id) {
        $a = \common\models\Contact::findOne($id);
        $arr['name'] = ($a->name);
        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    public function actionAd_to_card($p_id, $brand_id = NULL) {


        if ($brand_id) {
            $b_id = $brand_id;
        }
        return $this->render('add_to_card', [
                    'this_post' => $this_p,
                    'brand' => $b_id
        ]);
    }

    public function actionPayment() {



        return $this->render('payment', [
                    'this_post' => $this_p
        ]);
    }

    public function actionGermanHosting() {
        return $this->render('hosting_germany', []);
    }
    public function actionUsaHosting() {
        return $this->render('hosting_usa', []);
    }

    public function actionHosting() {



        return $this->render('hosting', [
        ]);
    }

    public function actionIrHosting() {



        return $this->render('ir-hosting', [
        ]);
    }

    public function actionIrVps() {



        return $this->render('ir-vps', [
        ]);
    }

    public function actionVps() {



        return $this->render('vps', [
        ]);
    }
    
    public function actionGermanVps() {
        return $this->render('vps_germany', [
        ]);
    }
    
  
    

    public function actionWordpressHosting() {



        return $this->render('wp-hosting', [
        ]);
    }

    public function actionJoomlaHosting() {



        return $this->render('joomla-hosting', [
        ]);
    }

    public function actionSsl() {


        return $this->render('ssl', [
        ]);
    }

    public function actionConfig() {



        return $this->render('config', [
        ]);
    }
    public function actionTeam() {



        return $this->render('team', [
        ]);
    }
  public function actionDedicated() {



        return $this->render('dedicated', [
        ]);
    }
    public function actionDedicatedHosting() {



        return $this->render('dedicated-hosting', [
        ]);
    }
     public function actionSharedHosting() {



        return $this->render('shared-hosting', [
        ]);
    }
     public function actionCloudHosting() {



        return $this->render('cloud-hosting', [
        ]);
    }
     public function actionEnterpriseHosting() {



        return $this->render('enterprise-hosting', [
        ]);
    }
    public function actionFormSubmission() {



        return $this->render('form-submission', [
                    'stringHash' => $string,
        ]);
    }

    public function actionEditprofile($id) {

        $user = \common\models\User::find()
                ->where('id=' . $id)
                ->one();

        if ($_POST) {
            //echo $_POST['User']['location'];
            //exit();
            $user->username = $_POST['User']['name'];
            $user->location = $_POST['User']['location'];
        }
        $user->save();
        //print_r($user);
        return $this->render('editprofile', [
                    'user' => $user
        ]);
    }

    public function actionCard() {

        $qty = Yii::$app->request->post('qty');
        $qty_id = Yii::$app->request->post('qty_id');
        $del_id = Yii::$app->request->post('delete_id');


        $peyk = Yii::$app->request->post('peyk');
        if ($peyk > 0) {


            $has_id = \common\models\Order::check_order();








            $order = \common\models\Order::findOne($has_id);

            $order->ship = $peyk;
            $order->save(FALSE);
        }

        if ($del_id) {
            $m = \common\models\Order::remove_item($del_id);
        }
        if ($qty and $qty_id and $qty > 0) {
            $m = \common\models\Order::update_item_qty($qty_id, $qty);
        }
        return $this->render('card', [
                    'this_post' => $this_p,
                    'stringHash' => $peyk . "..*",
        ]);
    }

    public function actionCompare($p_id) {



        return $this->render('compare', [
                    'this_post' => $this_p
        ]);
    }

    public function actionPost($p_id) {

        $this_p = \frontend\models\Post::find()->where('id=' . $p_id)->one();

        return $this->render('post', [
                    'this_post' => $this_p
        ]);
    }

    public function actionThankyou() {



        //$o_id = Order::submit_order();


        return $this->render('thankyou');
    }

    public function actionRules() {



        //$o_id = Order::submit_order();


        return $this->render('rules');
    }

    public function actionOrder() {
        $searchModel = new \common\models\Orders();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('order', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionBlog() {
        return $this->render('blog');
    }
    
    public function actionSitemap() {
        return $this->render('sitemap');
    }

    public function actionBlogpost($id) {
        return $this->render('blogpost', [
                    'model' => \common\models\Post::findOne($id)
        ]);
    }

    public function actionSubmit_order2() {






        return $this->render('submit_order_2');
    }

    public function actionProtest() {
        return $this->render('protest');
    }

    public function actionIndex() {


        $this->enableCsrfValidation = false;
        return $this->render('index', [
        ]);
    }
    
    public function actionIndex1() {


        $this->enableCsrfValidation = false;
        return $this->render('index1', [
        ]);
    }
    
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {

            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($model->login()) {
                return $this->redirect(['site/index']);
            } else {
                return $this->render('login', [
                            'model' => $model,
                ]);
            }
            // print_r($_POST);
            // echo "X";
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->redirect(['site/index']);
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionShekayat() {
        return $this->render('shekayat');
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect(['site/addinfo', 'id' => $user->id]);
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionAddinfo($id) {

        $model = \common\models\User::findOne($id);
        if ($_POST['User']) {

            //   print_r($_POST['User']['location']);
            //exit();
            $model->name_and_fam = $_POST['User']['name_and_fam'];
            $model->location = $_POST['User']['location'];

            $model->email = $_POST['User']['email'];
            $model->phone_number = $_POST['User']['phone_number'];
            $model->cell_number = $_POST['User']['cell_number'];
            $model->gender = $_POST['User']['gender'];
            $model->address = $_POST['User']['address'];
            $model->postal_code = $_POST['User']['postal_code'];
            $model->card_number = $_POST['User']['card_number'];
            $model->social_code = $_POST['User']['social_code'];
            $model->birth = $_POST['User']['year'] . "/" . $_POST['User']['month'] . "/" . $_POST['User']['day'];
            //echo $model->location; exit();

            $model->save();


            return $this->render('addinfo', [
                        'model' => $model,
            ]);
        } else {

            // $model = \common\models\User::findOne($id);
            return $this->render('addinfo', [
                        'model' => $model,
            ]);
        }
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    /*
      public function actionAd_to_card($p_id)
      {



      return $this->render('add_to_card',[
      'product_id'=>$b_id
      ]);

      } */

    public function actionGallerypicture() {
        return $this->render('gallerypicture', [
        ]);
    }

    public function findModel($id) {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionResult() {

        //exit();
        $a = \common\models\Product::find()
                ->where(['like', 'name', $_POST['search']])
                ->orWhere(['like', 'description', $_POST['search']])
                ->all();



        return $this->render('result', [
                    'result' => $a
        ]);
    }

}
