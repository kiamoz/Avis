<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property integer $from_id
 * @property integer $to_id
 * @property string $flight_list
 * @property integer $type
 * @property string $issue
 * @property integer $user_id
 * @property integer $status
 * @property string $system_respond
 * @property string $admin_respond
 * @property string $date_create
 * @property string $date_update
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id'], 'required'],
            [['from_id', 'to_id', 'type', 'user_id', 'status'], 'integer'],
            [['flight_list', 'issue', 'system_respond', 'admin_respond'], 'string'],
            [['date_create', 'date_update'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_id' => 'From ID',
            'to_id' => 'To ID',
            'flight_list' => 'Flight List',
            'type' => 'Type',
            'issue' => 'Issue',
            'user_id' => 'User ID',
            'status' => 'Status',
            'system_respond' => 'System Respond',
            'admin_respond' => 'Admin Respond',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }
}
