<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

/** @var yii\web\View $this */
/** @var common\models\CarListing $model */
/** @var common\models\Images $imageModel */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-listing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?php if (isset($imageModel)): ?>
        <?= $form->field($imageModel, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
    <?php endif; ?>
    <?= $form->field($model, 'make')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'year')->textInput() ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'mileage')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'status')->dropDownList(['available' => 'Available', 'sold' => 'Sold'], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>