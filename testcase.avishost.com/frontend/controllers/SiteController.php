<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\UploadedFile;
use app\web\Uploads;
use common\models\User;
use common\models\Building;
use yii\helpers\Url;
use common\models\Persian;
use common\models\IncomeOutcome;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            
             [
                'class' => 'yii\filters\PageCache',
                'only' => ['chart_','chart_user'],
                'duration' => 86400,
            ],
            
            
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                        [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                        [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                // 'logout' => ['post'],
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
    
    
       public function actionClear()
    {
          Yii::$app->cache->flush();
          Yii::$app->session->setFlash('success', 'به روز رسانی اطلاعات آماری با موفقت انجام شد');
          return $this->goHome();
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($set_skip = null) {
        

        


        return $this->render('index');
    }
    
    
     public function actionChart_() {
          return $this->render('chart_');
     }
     
     public function actionChart_user() {
          return $this->render('chart_');
     }
     
    

    public function actionChart() {
        
        
        $this_year_start =  Persian::convert_date_to_en(Persian::get_current_date()[0]."/01/01");
        $this_year_end =  Persian::convert_date_to_en(Persian::get_current_date()[0]."/12/".Persian::get_last_day_of_month(12));
        
        
    $all_object = IncomeOutcome::get_all_outcome_object(Yii::$app->user->identity->building_id, $this_year_start, $this_year_end,1);

    $sum = $all_object->sum('amount');
    
    $all_object_out = IncomeOutcome::get_all_outcome_object(Yii::$app->user->identity->building_id, $this_year_start, $this_year_end);

    $sum_2 = $all_object_out->sum('amount');
    
    echo $sum."<br>".$sum_2;
    
    //exit();
    
        

        return $this->render('chart');
    }

    public function actionPre_signup() {
        return $this->render('pre_signup');
    }

    public function actionAsuser($uid) {

        $u = \common\models\User::findOne($uid);
        Yii::$app->getUser()->login($u, TRUE);


        return $this->render('index');
    }

    public function actionState($id = 0) {
        $loc1 = \common\models\Location::find()
                ->where('state_id=' . $id)
                ->all();

        $arr = array();
        foreach ($loc1 as $city) {
            $arr[$city->id] = $city->name;
        }
        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    public function actionBlock($id = 0) {
        $loc1 = \common\models\Block::find()
                ->where('building_id=' . $id)
                ->all();

        $arr = array();
        foreach ($loc1 as $city) {
            $arr[$city->id] = $city->name;
        }
        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    public function actionZone($id = 0) {
        $loc1 = \common\models\Zone::find()
                ->where('location_id=' . $id)
                ->all();

        $arr = array();
        foreach ($loc1 as $city) {
            $arr[$city->id] = $city->name;
        }
        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {


        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();


        if ($model->load(Yii::$app->request->post())) {




            $login_res = $model->login($model->building_id);



            if ($login_res === TRUE) {


                if (Yii::$app->user->identity->admin_type == 0) {
                    return $this->redirect(['index']);
                } else {
                    return $this->goBack();
                }
            } else {

                if (is_array($login_res)) {
                    return $this->render('login', [
                                'b_list' => $login_res,
                                'model' => $model,
                    ]);
                } else {
                    Yii::$app->session->setFlash('error', 'نام کاربری یا رمز عبرو اشتباه است اگر رمز خود را فراموش کرده اید میتوانید آن را بازیابی کنید');
                    return $this->render('login', [
                                'err' => 'رمز اشتباه است',
                                'model' => $model,
                    ]);
                }
            }
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {


        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionSexy() {
        return $this->render('sexy');
    }

    public function actionTest($arr) {

        $php_array = explode(",", $arr);


        $array = array('data' => count($php_array), 'flag' => 1);
        header('Content-type: application/json');
        echo json_encode($array);
    }

    /**
     * Signs user up.
     *
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

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');




            if ($user = $model->signup()) {

                //echo $user->id."*";
                //if (Yii::$app->getUser()->login($user)) {
                //echo Yii::$app->user->id;


                $send = new \sendAPI('tasbitlaw.com', '88795996');
                $mobiles = array($user->username);
                $body = 'سلام ';
                $body .= 'از ثبت نام شما در سامانه تثبیت متشکریم بزودی با شما  شما تماس خواهیم گرفت';

                if ($user->conditional)
                    $body .= "|به دلیل داشتن ساختمان قبلی ثبت نام شما به صورت مشروط صورت گرفته است و در  صورت موافقت حساب شما فعال می گردد.";


                $result = $send->send($mobiles, $body);


                Yii::$app->session->setFlash('success', 'ثبت نام شما انجام شد منتظر تماس کارشناس باشید');
                return $this->redirect(['login']);
                //}
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function Owner() {
        
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

}
