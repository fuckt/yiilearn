<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Coursestuff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coursestuff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false); ?>


    <?= $form->field($model, 'courseid')->hiddenInput(['value'=>$cid])->label(false); ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value'=>$model->isNewRecord?time():$model->created_at])->label(false); ?>
    <?= $form->field($model, 'updated_at')->hiddenInput(['value'=>time()])->label(false); ?>


<?= $form->field($model, 'status')->dropDownList(\backend\models\Coursestuff::getArrayStatus()) ?>


    <?= $form->field($model, 'sort_order')->hiddenInput(['value'=>0])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
