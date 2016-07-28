<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Coursetype */

$this->title = 'Update ' . 'Coursetype' . ' ' . $model->idcoursetype;
$this->params['breadcrumbs'][] = ['label' => 'Coursetypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcoursetype, 'url' => ['view', 'id' => $model->idcoursetype]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coursetype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
