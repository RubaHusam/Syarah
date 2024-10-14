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
            [['id', 'year'], 'integer'],
            [['price','mileage'], 'number'],
            [['make', 'model', 'title', 'description', 'status'], 'safe'],
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

        $query = $this->filterDate($query);

        return $dataProvider;
    }


    public function searchForCSV($params, $user)
    {
        $query = CarListing::find();
        if ($user == 'user')
            $query->where(['status' => CarListing::STATUS_AVAILABLE]);

        $this->load($params);

        $query = $this->filterDate($query);

        return $query->all();
    }

    public function totalSales($params)
    {
        $query = CarListing::find();

        $this->load($params);

        $query = $this->filterDate($query);
        $total_sales = $query->andFilterWhere(['status' => CarListing::STATUS_SOLD])->sum('price') ?: 0;
        return $total_sales;
    }

    public function soldCars($params)
    {
        $query = CarListing::find();

        $this->load($params);

        $query = $this->filterDate($query);
        $sold_cars = $query->andFilterWhere(['status' => CarListing::STATUS_SOLD])->count() ?: 0;
        return $sold_cars;
    }
    public function availableCars($params)
    {
        $query = CarListing::find();

        $this->load($params);

        $query = $this->filterDate($query);
        $available_cars = $query->andFilterWhere(['status' => CarListing::STATUS_AVAILABLE])->count() ?: 0;
        return $available_cars;
    }

    public function mostSalesModels($params)
    {
        $query = CarListing::find();

        $this->load($params);

        $query = $this->filterDate($query);
        $query->andFilterWhere(['status' => CarListing::STATUS_SOLD]);
        
        $mostSalesModels = $query->select([ 'model', 'COUNT(*) AS sold_count'])
        ->groupBy(['model'])
        ->orderBy(['sold_count' => SORT_DESC])
        ->limit(1)
        ->asArray()
        ->all();
    
        return !empty($mostSalesModels) ? $mostSalesModels[0]['model'] : "";
    }

    public function filterDate($query)
    {
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
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $query;
    }


}

