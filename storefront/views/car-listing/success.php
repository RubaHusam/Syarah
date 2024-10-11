<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CarListing $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Car Listings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-listing-view container mt-4">

    <div class="row mb-4">
        <div class="col-md-2">
            <img src="https://cdn.syarah.com/photos-thumbs/online-v1/0x960/online/posts/212675/orignal-1725530370-474.jpg"
                alt="Car Image: <?= Html::encode($model->title) ?>" class="img-fluid rounded">
        </div>
        <div class="col-md-4">
            <h1 class="font-weight-bold"><?= Html::encode($model->title) ?></h1>
            <div class="description mb-4">
                <p><?= Html::encode($model->description) ?></p>
            </div>
            <strong>Make:</strong> <?= Html::encode($model->make) ?>
            <strong>Model:</strong> <?= Html::encode($model->model) ?>
            <strong>Year:</strong> <?= Html::encode($model->year) ?>
            <strong>Price:</strong> <?= Html::encode($model->price) ?>
            <strong>Mileage:</strong> <?= Html::encode($model->mileage) ?>
            <strong>Status:</strong> <?= Html::encode($model->status) ?>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 30vh;">
        <h1 class="text-success text-center">You have successfully Purchased</h1>

    </div>
    <div class="d-flex justify-content-end">

        <?= Html::a('Your Purchase', ['/user-purchase/index'], [
            'class' => 'btn btn-danger',
        ]) ?>
    </div>

</div>