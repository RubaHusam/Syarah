<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="card mb-4" style="width: 200px; text-decoration: none; color: inherit;">
    <a href="<?= Url::to(['view', 'id' => $model->id]) ?>">
        <img src="https://cdn.syarah.com/photos-thumbs/online-v1/0x960/online/posts/212675/orignal-1725530370-474.jpg" 
             class="card-img-top" alt="Default Car Image">
        <div class="card-body">
            <h6 class="card-title"><?= Html::encode($model->title) ?></h6>
            <span class="text-primary"><?= Html::encode($model->price) ?> JOD</span><br>
        </div>
    </a>
</div>
