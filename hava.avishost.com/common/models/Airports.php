<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "airports".
 *
 * @property integer $id
 * @property string $name
 * @property string $city_name
 * @property string $city_name_fa
 * @property string $country_name
 * @property string $country_name_fa
 * @property integer $isPopular
 * @property string $date_add
 */
class Airports extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'airports';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'city_name', 'city_name_fa', 'country_name', 'country_name_fa', 'isPopular', 'date_add'], 'required'],
            [['isPopular'], 'integer'],
            [['date_add'], 'safe'],
            [['name', 'city_name', 'city_name_fa', 'country_name', 'country_name_fa'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'city_name' => 'City Name',
            'city_name_fa' => 'City Name Fa',
            'country_name' => 'Country Name',
            'country_name_fa' => 'Country Name Fa',
            'isPopular' => 'Is Popular',
            'date_add' => 'Date Add',
        ];
    }

    public static function check_new_city($q) {



        $q = str_replace("Ü", "UE", $q);
        $q = str_replace("ü", "ue", $q);
        $q = str_replace("ä", "ae", $q);
        $q = str_replace("Ä", "AE", $q);
        $q = str_replace("Ö", "OE", $q);
        $q = str_replace("ö", "oe", $q);


        
        //$q = mb_convert_encoding($q, 'HTML-ENTITIES', "UTF-8");
        //echo $q;
        //exit();
        //$q="Bari";
        
        $url = 'https://ws.alibaba.ir/api/v1/basic-info/airports/international?filter=q=%7B"ct":"' . urlencode($q) . '"%7D';
        
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */
        }


        $result = json_decode($result);






        foreach ($result->result->items as $airp) {





            $c = new Airports();
            $c->name = $airp->name;
            $c->id = $airp->code;



            foreach ($airp->city->displayName as $key => $x) {

                if ($x->language == "fa-IR") {
                    $c->city_name_fa = $x->value;
                } else {
                    $c->city_name = $x->value;
                }
            }
            foreach ($airp->city->country->displayName as $key => $x) {

                if ($x->language == "fa-IR") {
                    $c->country_name_fa = $x->value;
                } else {
                    $c->country_name = $x->value;
                }
            }



            $c->isPopular = 0;
            if ($airp->isPopular == "true")
                $c->isPopular = 1;
            $c->date_add = date('Y-m-d H:i:s');





            $ex = Airports::findOne([$airp->code]);

            if (!$ex->id) {
                $c->save();

                //print_r($c->getErrors());
            }
        }
    }

}
