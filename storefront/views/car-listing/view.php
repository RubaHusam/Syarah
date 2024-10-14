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
        <div class="col-md-7">
            <img src="https://cdn.syarah.com/photos-thumbs/online-v1/0x960/online/posts/212675/orignal-1725530370-474.jpg"
                alt="Car Image: <?= Html::encode($model->title) ?>" class="img-fluid rounded">
        </div>
        <div class="col-md-5">
            <h1 class="font-weight-bold"><?= Html::encode($model->title) ?></h1>
            <div class="description mb-4">
                <p><?= Html::encode($model->description) ?></p>
            </div>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Make:</strong> <?= Html::encode($model->make) ?></li>
                <li class="list-group-item"><strong>Model:</strong> <?= Html::encode($model->model) ?></li>
                <li class="list-group-item"><strong>Year:</strong> <?= Html::encode($model->year) ?></li>
                <li class="list-group-item"><strong>Price:</strong> <?= Html::encode($model->price) ?>JOD</li>
                <li class="list-group-item"><strong>Mileage:</strong> <?= Html::encode($model->mileage) ?>KM</li>
            </ul>
            <div>
                <?= Html::a('Book it now', ['payment', 'id' => $model->id], [
                    'class' => 'btn btn-success btn-lg btn-block',
                    'style' => 'width: 100%;', 
                ]) ?>
            </div>

        </div>
    </div>

</div>