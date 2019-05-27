<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farayand_detail".
 *
 * @property integer $id
 * @property integer $farayand_id
 * @property integer $shakhes_id
 * @property string $karkonan
 * @property string $karkonan_fam
 * @property string $omom_moshtari
 * @property string $moshtari_vije
 * @property string $moshtari_family
 * @property string $sazman_moshtari
 * @property string $karkona_sazman
 * @property string $moshtarian_sazman
 * @property string $omome_jame
 * @property string $jame_gogra
 * @property string $jame_sharay
 * @property string $sazman_saham
 * @property string $sherkat_zir
 * @property string $modir_sazman
 * @property integer $user_id
 * @property integer $status
 */
class FarayandDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'farayand_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['farayand_id', 'shakhes_id', 'user_id', 'status'], 'required'],
            [['farayand_id', 'shakhes_id', 'user_id', 'status'], 'integer'],
            [['karkonan', 'karkonan_fam', 'omom_moshtari', 'moshtari_vije', 'moshtari_family', 'sazman_moshtari', 'karkona_sazman', 'moshtarian_sazman', 'omome_jame', 'jame_gogra', 'jame_sharay', 'sazman_saham', 'sherkat_zir', 'modir_sazman'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'farayand_id' => 'شناسه فرایند',
            'shakhes_id' => 'شاخص',
            'karkonan' => 'کارکنان ستادي',
            'karkonan_fam' => 'خانواده کارکنان ',
            'omom_moshtari' => 'عموم مشتريان ',
            'moshtari_vije' => 'مشتريان ويژه ',
            'moshtari_family' => 'خانواده و معرفي شدگان مشتريان ويژه',
            'sazman_moshtari' => 'سازمان مشتري',
            'karkona_sazman' => 'کارکنان سازمان مشتري ',
            'moshtarian_sazman' => 'مشتريان سازمان مشتري ',
            'omome_jame' => 'عموم جامعه',
            'jame_gogra' => 'جامعه بر اساس منطقه جغرافيايي خاص ',
            'jame_sharay' => 'جامعه بر اساس شرايط و مشخصه خاص ',
            'sazman_saham' => 'سازمان هاي سهامدار',
            'sherkat_zir' => 'شرکت هاي زير مجمعوعه سازمان بانک ',
            'modir_sazman' => 'مديران سازمان بانک ',
            'user_id' => 'انجام دهنده',
            'status' => 'وضعیت',
        ];
    }
}
