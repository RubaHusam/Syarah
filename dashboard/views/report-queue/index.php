<?php

use common\models\ReportQueue;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Report Queues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-queue-index">

    <div class="d-flex justify-content-between align-items-center ">
        <div>
            <h1 class="d-inline"><?= Html::encode($this->title) ?></h1>
        </div>
        <div>
            <?= Html::a('Create CSV', ['/car-listing/filter'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function (ReportQueue $model) {
                        $statusLabel = Html::encode($model->status);
                        $class = '';
                        switch ($model->status) {
                            case ReportQueue::STATUS_FAILED:
                                $class = 'text-danger';
                                break;
                            case ReportQueue::STATUS_COMPLETED:
                                $class = 'text-success';
                                break;
                            default:
                                $class = 'text-warning';
                                break;
                        }

                        return Html::tag('span', $statusLabel, ['class' => $class]);
                    },
            ],
            'error_note:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{download}',
                'buttons' => [
                    'download' => function ($url, ReportQueue $model) {
                            if ($model->status === ReportQueue::STATUS_COMPLETED && $model->path) {
                                return Html::a('Download', [$model->path], [
                                    'class' => 'btn btn-primary',
                                    'title' => 'Download File',
                                    'data-pjax' => '0',
                                ]);
                            }
                        },
                ],
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>

</div>