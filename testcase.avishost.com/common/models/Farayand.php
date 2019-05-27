<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farayand".
 *
 * @property integer $id
 * @property string $name
 */
class Farayand extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    const status_text = [
        '0' => 'بررسی نشده',
        '1' => 'تایید شده',
        '-1' => 'رد شده'
    ];

    public static function tableName() {
        return 'farayand';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'شناسه',
            'name' => 'نام',
        ];
    }

}
