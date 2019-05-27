<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Request;

/**
 * Request_serach represents the model behind the search form about `common\models\Request`.
 */
class Request_serach extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from_id', 'to_id', 'type', 'user_id', 'status'], 'integer'],
            [['flight_list', 'issue', 'system_respond', 'admin_respond', 'date_create', 'date_update'], 'safe'],
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
        $query = Request::find();

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
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'type' => $this->type,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'flight_list', $this->flight_list])
            ->andFilterWhere(['like', 'issue', $this->issue])
            ->andFilterWhere(['like', 'system_respond', $this->system_respond])
            ->andFilterWhere(['like', 'admin_respond', $this->admin_respond]);

        return $dataProvider;
    }
}
