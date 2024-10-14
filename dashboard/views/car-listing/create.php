<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CarListing $model */
/** @var common\models\Images $imageModel */

$this->title = 'Create Car Listing';
$this->params['breadcrumbs'][] = ['label' => 'Car Listings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-listing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'imageModel' => $imageModel,
    ]) ?>

</div>
