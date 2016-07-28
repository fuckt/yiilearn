<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Coursestuff */

$this->title = 'Update ' . 'Coursestuff' . ' ' . $model->idcoursestuff;
$this->params['breadcrumbs'][] = ['label' => 'Coursestuffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcoursestuff, 'url' => ['view', 'id' => $model->idcoursestuff]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coursestuff-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
