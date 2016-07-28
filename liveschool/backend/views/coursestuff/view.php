<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Coursestuff */

$this->title = $model->idcoursestuff;
$this->params['breadcrumbs'][] = ['label' => 'Coursestuffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coursestuff-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idcoursestuff], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idcoursestuff], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcoursestuff',
            'label',
            'url:url',
            'user_id',
            'courseid',
[
    'attribute' => 'status',
    'value' => $model->statusLabel,
],
'created_at:datetime',
'updated_at:datetime',
            'sort_order',
        ],
    ]) ?>

</div>
