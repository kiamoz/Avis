<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const new_reg_by_user = "reg_by_user";

    public $semats, $permissions;
    public $type_human, $admin_type_human, $date_x, $date_y;
    
    public static $_acccess = [
        
        1 => 'ثبت کننده',
        10 => 'مدیر ارشد',
        
    ];

  

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /*     * bargh_num
     * @inheritdoc
     */

    public function rules() {
        return [
                [['admin_type', 'semats', 'permissions', 'type'], 'safe'],
                ['status', 'default', 'value' => self::STATUS_ACTIVE],
                ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
                [['name_and_family', 'number_resident', 'unit_number', 'username', 'admin_postion', 'extra_info'], 'safe'],
                [['username'], 'match', 'pattern' => '/09(0[1-2]|1[0-9]|3[0-9]|2[0-1]|9[0-1])-?[0-9]{7,7}$/', 'message' => 'لطفا شماره تلفن همراه معتبر وارد کنید'],
                ['username', 'filled_some', 'on' => self::new_reg_by_user],
        ];
    }

    public function filled_some($attribute, $params) {

        if (User::find()->where(['username' => $this->username, 'building_id' => Yii::$app->user->identity->building_id])->exists()) {
            $this->addError('username', 'این شماره قبلا در این ساختمان ثبت شده است');
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public function attributeLabels() {
        return [
            'username' => 'نام کاربری (شماره همراه)  ',
            'email' => 'ایمیل',
            'password' => 'پسورد',
            'lvl' => 'سمت',
            'name' => 'نام و نام خانوادگی',
            'start' => 'تاریخ انتخاب',
            'expire' => 'تاریخ خاتمه',
            'number' => 'تعداد نفرات',
            'name_and_family' => 'نام و نام خانوادگی',
            'phone' => ' شماره موبایل',
            'number_resident' => 'تعداد ساکنین',
            'time_az' => 'مدت اجاره از تاریخ',
            'time_to' => 'تا تاریخ',
            'type_human' => 'نوع کاربری',
            'admin_type' => 'سمت',
            'admin_type_human' => 'سمت',
            'date_x' => 'تاریخ شروع گزارش',
            'date_y' => 'تاریخ پایان گزارش',
            'admin_postion' => 'سمت کارمندان',
            'type' => 'نوع',
            'extra_info' => 'اطلاعات اضافه یا حرفه کار',
            'conditional' => 'ثبت نام مشروط',
            'status' => 'وضعیت فعال بودن کاربر',
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {

            return true;
        } else {
            return false;
        }
    }

    public function afterFind() {

        parent::afterFind();

    }

    public function getUserhassemat() {
        return $this->hasMany(UserHasSemat::className(), ['user_id' => 'id']);
    }

    public static function setPassword1($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public static function set_user_msg_alert($msg) {
        $user = User::findOne(Yii::$app->user->id);
        $user->alert_msg = $msg;
        $user->save();
    }

    public static function get_user_msg_alert() {
        $user = User::findOne(Yii::$app->user->id);
        return $user->alert_msg;
    }

    public static function remove_user_msg_alert() {
        $user = User::findOne(Yii::$app->user->id);
        $user->alert_msg = "";
        $user->save();
    }

}
