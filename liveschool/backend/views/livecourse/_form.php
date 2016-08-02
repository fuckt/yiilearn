<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\Livecourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livecourse-form">

    <?php $form = ActiveForm::begin(); ?>

<?php
echo '<label class="control-label">课程开始时间</label>';
echo DateTimePicker::widget([
    'name' => 'Livecourse[stime]',
    'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yy-M-dd HH:ii P'
    ]
]);

echo '<label class="control-label">课程结束时间</label>';
echo DateTimePicker::widget([
    'name' => 'Livecourse[etime]',
    'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yy-M-dd HH:ii P'
    ]
]);
?>


    <?= $form->field($model, 'label')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'roomid')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

<?= $form->field($model, 'status')->dropDownList(\backend\models\Livecourse::getArrayStatus()) ?>


    <?= $form->field($model, 'sort_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
