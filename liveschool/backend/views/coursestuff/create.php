<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Coursestuff */

$this->title = 'Create ' . 'Coursestuff';
$this->params['breadcrumbs'][] = ['label' => 'Coursestuffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coursestuff-create">

    <?= $this->render('_form', [
        'model' => $model,
        'cid' => $cid,
    ]) ?>

</div>
