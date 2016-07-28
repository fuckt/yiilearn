<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Livecourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livecourse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stime')->textInput() ?>

    <?= $form->field($model, 'etime')->textInput() ?>

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
