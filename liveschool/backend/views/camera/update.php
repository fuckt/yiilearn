<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Camera */

$this->title = 'Update ' . 'Camera' . ' ' . $model->idcamera;
$this->params['breadcrumbs'][] = ['label' => 'Cameras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcamera, 'url' => ['view', 'id' => $model->idcamera]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="camera-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
