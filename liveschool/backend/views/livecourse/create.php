<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Livecourse */

$this->title = 'Create ' . 'Livecourse';
$this->params['breadcrumbs'][] = ['label' => 'Livecourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livecourse-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
