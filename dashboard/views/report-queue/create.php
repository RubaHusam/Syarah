<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CarListing $model */

$this->title = 'Create Report Queue';
$this->params['breadcrumbs'][] = ['label' => 'Report Queues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-queue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
