<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FarayandDetail;

/**
 * FarayandDetail_serach represents the model behind the search form about `common\models\FarayandDetail`.
 */
class FarayandDetail_serach extends FarayandDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'farayand_id', 'shakhes_id', 'user_id', 'status'], 'integer'],
            [['karkonan', 'karkonan_fam', 'omom_moshtari', 'moshtari_vije', 'moshtari_family', 'sazman_moshtari', 'karkona_sazman', 'moshtarian_sazman', 'omome_jame', 'jame_gogra', 'jame_sharay', 'sazman_saham', 'sherkat_zir', 'modir_sazman'], 'safe'],
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
        $query = FarayandDetail::find();

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
            'farayand_id' => $this->farayand_id,
            'shakhes_id' => $this->shakhes_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'karkonan', $this->karkonan])
            ->andFilterWhere(['like', 'karkonan_fam', $this->karkonan_fam])
            ->andFilterWhere(['like', 'omom_moshtari', $this->omom_moshtari])
            ->andFilterWhere(['like', 'moshtari_vije', $this->moshtari_vije])
            ->andFilterWhere(['like', 'moshtari_family', $this->moshtari_family])
            ->andFilterWhere(['like', 'sazman_moshtari', $this->sazman_moshtari])
            ->andFilterWhere(['like', 'karkona_sazman', $this->karkona_sazman])
            ->andFilterWhere(['like', 'moshtarian_sazman', $this->moshtarian_sazman])
            ->andFilterWhere(['like', 'omome_jame', $this->omome_jame])
            ->andFilterWhere(['like', 'jame_gogra', $this->jame_gogra])
            ->andFilterWhere(['like', 'jame_sharay', $this->jame_sharay])
            ->andFilterWhere(['like', 'sazman_saham', $this->sazman_saham])
            ->andFilterWhere(['like', 'sherkat_zir', $this->sherkat_zir])
            ->andFilterWhere(['like', 'modir_sazman', $this->modir_sazman]);

        return $dataProvider;
    }
}
