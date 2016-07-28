<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Liveclassroom */

$this->title = 'Update ' . 'Liveclassroom' . ' ' . $model->idliveclassroom;
$this->params['breadcrumbs'][] = ['label' => 'Liveclassrooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idliveclassroom, 'url' => ['view', 'id' => $model->idliveclassroom]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="liveclassroom-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
