<?php

use common\models\CarListing;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CarListing $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Car Listings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<style>
    .carousel-img {
        width: 600px;
        height: 600px%;
        object-fit: cover;
    }
</style>


<div class="row mb-4">
    <div class="col-md-7 ">
        <div id="imageCarousel" class="carousel slide carousel-img" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($imageModel as $index => $image): ?>
                    <li data-target="#imageCarousel" data-slide-to="<?= $index ?>"
                        class="<?= $index === 0 ? 'active' : '' ?>"></li>
                <?php endforeach; ?>
            </ol>

            <div class="carousel-inner">
                <?php if (empty($imageModel)): ?>
                    <?php $defaultImagePath = Yii::$app->params['storefront'] . 'images/logoN.png'; ?>
                    <div class="carousel-item active">
                        <img src="<?= $defaultImagePath ?>" class="d-block carousel-img" alt="Default Image" />
                    </div>
                <?php else: ?>
                    <?php foreach ($imageModel as $index => $image): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <?php $imagePath = Yii::$app->params['storefront'] . $image->path; ?>
                            <img src="<?= $imagePath ?>" class="d-block carousel-img" alt="Car Image" />
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
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
            <li class="list-group-item" style="<?= $model->status === CarListing::STATUS_SOLD ? 'color: red;' : '' ?>">
                <strong>Status:</strong> <?= Html::encode($model->status) ?>
            </li>
        </ul>
        <div>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>

    </div>
</div>




</div>