<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ReportQueue $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="report-queue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'submitted' => 'Submitted', 'pending' => 'Pending', 'completed' => 'Completed', 'failed' => 'Failed', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'error_note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
