<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var common\models\CarListingSearch $searchModel */
/** @var common\models\ReportQueue $reportModel */

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="car-listing-index container mt-4">

    <div class="row justify-content-center ">
        <div class="col-md-4">
            <h4>CSV data</h4>
            <?php $form = ActiveForm::begin([
                'method' => 'post',
            ]); ?>

            <?= $form->field($reportModel, 'name')->textInput(['placeholder' => 'Name of File']) ?>
            <?= $form->field($searchModel, 'make')->textInput(['placeholder' => 'Make']) ?>
            <?= $form->field($searchModel, 'model')->textInput(['placeholder' => 'Model']) ?>

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
                <?= Html::submitButton('Create CSV', ['class' => 'btn btn-primary btn-full-width']) ?>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>