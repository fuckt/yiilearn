<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Coursetype */

$this->title = 'Create ' . 'Coursetype';
$this->params['breadcrumbs'][] = ['label' => 'Coursetypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coursetype-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
