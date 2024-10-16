<?php

use common\models\CarListing;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\CarListingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Car Listings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-listing-index">


    <div class="d-flex justify-content-between align-items-center ">
        <div>
            <h1 class="d-inline"><?= Html::encode($this->title) ?></h1>
        </div>
        <div>
            <?= Html::a('Create Car Listing', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <div class="d-flex justify-content-around mt-3 ">
        <div class="alert alert-info text-center mt-3">
            <h4>Total Sales: <?= Html::encode($totalSales) ?></h4>
        </div>
        <div class="alert alert-success text-center mt-3">
            <h4>Most Sales Models: <?= Html::encode($mostPopularModels) ?></h4>
        </div>
        <div class="alert alert-warning text-center mt-3">
            <h4>#Sold Cars: <?= Html::encode($soldCars) ?></h4>
        </div>
        <div class="alert alert-danger text-center mt-3">
            <h4>#Available Cars: <?= Html::encode($availableCars) ?></h4>
        </div>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pagination-container text-right mb-3 mt-3">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => 'Image',
                    'format' => 'raw', 
                    'value' => function (CarListing $model) {
                        $firstImage = $model->images ? Yii::$app->params['storefront'] . $model->images[0]->path : Yii::$app->params['storefront'] . 'images/logoN.png'; 
        
                        return Html::img($firstImage, [
                            'alt' => 'Car Image: ' . Html::encode($model->title),
                            'class' => 'img-fluid rounded',
                            'style' => 'width: 100px; height: auto;', 
                        ]);
                    },
                ],
                'title',
                'make',
                'model',
                'price',
                'year',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function (CarListing $model) {
                                $statusLabel = Html::encode($model->status);
                                $class = $model->status === CarListing::STATUS_SOLD ? 'text-danger' : 'text-success';
                                return Html::tag('span', $statusLabel, ['class' => $class]);
                            },
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, CarListing $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            },
                ],
            ],
            'pager' => [
                'class' => \yii\widgets\LinkPager::className(),
                'options' => ['class' => 'pagination'],
                'linkContainerOptions' => ['class' => 'pagination-item'],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

</div>