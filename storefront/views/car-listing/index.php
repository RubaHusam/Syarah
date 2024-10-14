<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var common\models\CarListingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-listing-index container mt-4">
    <div class="row">
        <div class="col-md-3">
            <h4>Filters</h4>
            <?php $form = ActiveForm::begin([
                'method' => 'get',
                'action' => ['index'],
            ]); ?>

            <?= $form->field($searchModel, 'make')->textInput(['placeholder' => 'Search by make']) ?>
            <?= $form->field($searchModel, 'model')->textInput(['placeholder' => 'Search by model']) ?>

            <div class="form-group">
                <label>Year Range</label>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($searchModel, 'year_min')->textInput(['placeholder' => 'Min year'])->label(false) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($searchModel, 'year_max')->textInput(['placeholder' => 'Max year'])->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Price Range</label>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($searchModel, 'price_min')->textInput(['placeholder' => 'Min price'])->label(false) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($searchModel, 'price_max')->textInput(['placeholder' => 'Max price'])->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-full-width']) ?>
            </div>


            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-9">
            <?php Pjax::begin(); ?>

            <div class="pagination-container text-right mb-3">
            <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => function ($model) {
                            return $this->render('_car_listing_item', ['model' => $model]);
                        },
                    'layout' => "{pager}\n{items}",
                    'itemOptions' => ['class' => 'col-md-3 item'],
                    'options' => ['class' => 'row'],
                ]); ?>
            </div>


            <?php Pjax::end(); ?>
        </div>

    </div>

</div>