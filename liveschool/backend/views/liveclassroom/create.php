<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Liveclassroom */

$this->title = 'Create ' . 'Liveclassroom';
$this->params['breadcrumbs'][] = ['label' => 'Liveclassrooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liveclassroom-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
