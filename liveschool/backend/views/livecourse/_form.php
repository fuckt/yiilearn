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
        'format' => 'yyyy-mm-dd h:i:s'
    ]
]);

echo '<label class="control-label">课程结束时间</label>';
echo DateTimePicker::widget([
    'name' => 'Livecourse[etime]',
    'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd h:i:s'
    ]
]);
?>


    <?= $form->field($model, 'label')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false); ?>

<?= $form->field($model, 'roomid')->dropDownList(\backend\models\Liveclassroom::getRooms()) ?>


    <?= $form->field($model, 'created_at')->hiddenInput(['value'=>$model->isNewRecord?time():$model->created_at])->label(false); ?>
    <?= $form->field($model, 'updated_at')->hiddenInput(['value'=>time()])->label(false); ?>


<?= $form->field($model, 'status')->dropDownList(\backend\models\Livecourse::getArrayStatus()) ?>


    <?= $form->field($model, 'sort_order')->hiddenInput(['value'=>0])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
