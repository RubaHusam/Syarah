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
            <li class="list-group-item"><strong>Price:</strong> <?= Html::encode($model->price) ?></li>
            <li class="list-group-item"><strong>Mileage:</strong> <?= Html::encode($model->mileage) ?></li>
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