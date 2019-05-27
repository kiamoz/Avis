<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farayand_moalefe".
 *
 * @property integer $id
 * @property string $name
 * @property integer $bod_id
 */
class FarayandMoalefe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'farayand_moalefe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','bod_id'], 'required'],
            [['bod_id'], 'integer'],
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
            'bod_id' => 'بعد',
        ];
    }
}
