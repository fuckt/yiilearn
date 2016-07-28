<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Camera;

/**
 * SearchCamera represents the model behind the search form about `backend\models\Camera`.
 */
class SearchCamera extends Camera
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcamera', 'roomid', 'user_id', 'created_at', 'updated_at', 'status', 'sort_order'], 'integer'],
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
        $query = Camera::find();
        
        $query->orderBy(['sort_order' => SORT_ASC, 'created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idcamera' => $this->idcamera,
            'roomid' => $this->roomid,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'sort_order' => $this->sort_order,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
