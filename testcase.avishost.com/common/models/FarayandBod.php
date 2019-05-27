<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farayand_bod".
 *
 * @property integer $id
 * @property string $name
 */
class FarayandBod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'farayand_bod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
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
        ];
    }
}
