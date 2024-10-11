<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\UserPurchase[] $purchases */

$this->title = 'Your Purchased Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-purchase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Car Model</th>
                <th>Date of Purchase</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchases as $purchase): ?>
                <tr>
                    <td><?= Html::encode($purchase->car->model) ?></td> <!-- Assuming 'model' is a field in CarListing -->
                    <td><?= Html::encode($purchase->date) ?></td>
                    <td><?= Html::encode($purchase->car->price) ?></td> <!-- Assuming 'price' is a field in CarListing -->
                </tr>
            <?php endforeach; ?>
            <?php if (empty($purchases)): ?>
                <tr>
                    <td colspan="4" class="text-center">No purchased cars found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php Pjax::end(); ?>

</div>
