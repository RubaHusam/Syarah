<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CarListing;

/**
 * CarListingSearch represents the model behind the search form of `common\models\CarListing`.
 */
class CarListingSearch extends CarListing
{
    public $year_min;
    public $year_max;
    public $price_min;
    public $price_max;

    public function rules()
    {
        return [
            [['id', 'year', 'price', 'mileage'], 'integer'],
            [['make', 'model', 'title', 'description','status'], 'safe'],
            [['year_min', 'year_max', 'price_min', 'price_max'], 'integer'],
        ];
    }

    public function search($params, $user)
    {
        $query = CarListing::find();
        if ($user == 'user')
            $query->where(['status' => CarListing::STATUS_AVAILABLE]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'mileage' => $this->mileage,
        ]);

        if (!empty($this->year_min)) {
            $query->andFilterWhere(['>=', 'year', $this->year_min]);
        }
        if (!empty($this->year_max)) {
            $query->andFilterWhere(['<=', 'year', $this->year_max]);
        }

        if (!empty($this->price_min)) {
            $query->andFilterWhere(['>=', 'price', $this->price_min]);
        }
        if (!empty($this->price_max)) {
            $query->andFilterWhere(['<=', 'price', $this->price_max]);
        }

        $query->andFilterWhere(['like', 'make', $this->make])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'title', $this->title]);



        return $dataProvider;
    }
}

