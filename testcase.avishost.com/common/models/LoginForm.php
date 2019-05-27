<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model {

    public $username, $building_id;
    public $password;
    public $rememberMe = true;
    private $_user;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
                [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
                ['building_id', 'safe']
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login($buidling_id = 0,$rememberMe=FALSE) {


        if(!$rememberMe)
            $rememberMe = $this->rememberMe;
        if ($buidling_id) {
            
            

            $hash = User::find()->where('username="' . $this->username . '" and building_id=' . $buidling_id)->One();
        } else {

            $user_name_all = User::find()->where('username="' . $this->username . '"')->all();
            $user_name_count = count($user_name_all);
            
          

           
            if ($user_name_count > 1) {
               return $user_name_all;
            }

            $hash = User::find()->where('username="' . $this->username . '"')->One();
        }
        
        if(!$hash){
            return false;
        }

        $rememberMe = true; // rmeove badan
        if (Yii::$app->getSecurity()->validatePassword($this->password, $hash->password_hash)) {
            return Yii::$app->user->login($hash, $rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser() {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function attributeLabels() {
        return [
            'username' => 'شماره همراه',
            'password' => 'پسورد',
            'building_id' => 'ساختمان',
            'rememberMe' => 'مرا بخاطر بسپار',
        ];
    }

}
