<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Liveclassroom;

/**
 * SearchLiveclassroom represents the model behind the search form about `backend\models\Liveclassroom`.
 */
class SearchLiveclassroom extends Liveclassroom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idliveclassroom', 'user_id', 'updated_at', 'created_at', 'status'], 'integer'],
            [['label', 'desc'], 'safe'],
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
        $query = Liveclassroom::find();
        
        $query->orderBy(['sort_order' => SORT_ASC, 'created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idliveclassroom' => $this->idliveclassroom,
            'user_id' => $this->user_id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
