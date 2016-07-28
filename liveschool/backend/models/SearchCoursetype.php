<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Coursetype;

/**
 * SearchCoursetype represents the model behind the search form about `backend\models\Coursetype`.
 */
class SearchCoursetype extends Coursetype
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcoursetype', 'created_at', 'updated_at', 'status', 'sort_order'], 'integer'],
            [['label'], 'safe'],
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
        $query = Coursetype::find();
        
        $query->orderBy(['sort_order' => SORT_ASC, 'created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idcoursetype' => $this->idcoursetype,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'sort_order' => $this->sort_order,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label]);

        return $dataProvider;
    }
}
