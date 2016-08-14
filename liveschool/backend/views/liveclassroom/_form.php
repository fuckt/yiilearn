<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Liveclassroom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="liveclassroom-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false); ?>

    <?= $form->field($model, 'updated_at')->hiddenInput(['value'=>time()])->label(false); ?>
	<?php
	if($model->isNewRecord){
    		echo $form->field($model, 'created_at')->hiddenInput(['value'=>time()])->label(false);
	}
	?>

<?= $form->field($model, 'status')->dropDownList(\backend\models\Liveclassroom::getArrayStatus()) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
