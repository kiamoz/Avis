<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Airports;

/**
 * Airports_serach represents the model behind the search form about `common\models\Airports`.
 */
class Airports_serach extends Airports
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'isPopular'], 'integer'],
            [['name', 'city_name', 'city_name_fa', 'country_name', 'country_name_fa', 'date_add'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Airports::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'isPopular' => $this->isPopular,
            'date_add' => $this->date_add,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'city_name_fa', $this->city_name_fa])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'country_name_fa', $this->country_name_fa]);

        return $dataProvider;
    }
}
