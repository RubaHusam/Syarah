<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="card mb-4" style="width: 200px; text-decoration: none; color: inherit;">
    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="card-link">
        <?php
        $firstImage = $model->images ? Yii::$app->params['storefront'] . $model->images[0]->path : Yii::$app->params['storefront'] . 'images/logoN.png';
        ?>
        <img src="<?= Html::encode($firstImage) ?>" class="card-img-top"
            alt="Car Image: <?= Html::encode($model->title) ?>">
        <div class="card-body">
            <h6 class="card-title"><?= Html::encode($model->title) ?></h6>
            <span class="text-primary"><?= Html::encode($model->price) ?> JOD</span><br>
        </div>
    </a>
</div>