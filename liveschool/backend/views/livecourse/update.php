<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Livecourse */

$this->title = 'Update ' . 'Livecourse' . ' ' . $model->idlivecourse;
$this->params['breadcrumbs'][] = ['label' => 'Livecourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idlivecourse, 'url' => ['view', 'id' => $model->idlivecourse]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="livecourse-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
