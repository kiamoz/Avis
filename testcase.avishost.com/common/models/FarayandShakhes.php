<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farayand_shakhes".
 *
 * @property integer $id
 * @property string $name
 * @property integer $moalefe_id
 */
class FarayandShakhes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'farayand_shakhes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','moalefe_id'], 'required'],
            [['moalefe_id'], 'integer'],
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
            'moalefe_id' => 'شناسه معلفه',
        ];
    }
}
