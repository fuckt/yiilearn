<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Coursestuff;

/**
 * SearchCoursestuff represents the model behind the search form about `backend\models\Coursestuff`.
 */
class SearchCoursestuff extends Coursestuff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcoursestuff', 'user_id', 'courseid', 'created_at', 'updated_at', 'status', 'sort_order'], 'integer'],
            [['label', 'url'], 'safe'],
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
        $query = Coursestuff::find();
        
        $query->orderBy(['sort_order' => SORT_ASC, 'created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idcoursestuff' => $this->idcoursestuff,
            'user_id' => $this->user_id,
            'courseid' => $this->courseid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'sort_order' => $this->sort_order,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
