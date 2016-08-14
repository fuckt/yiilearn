<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Camera */

$this->title = 'Create ' . 'Camera';
$this->params['breadcrumbs'][] = ['label' => 'Cameras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camera-create">

    <?= $this->render('_form', [
        'model' => $model,
        'rooms' => $rooms,
    ]) ?>

</div>
