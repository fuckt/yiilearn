<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Camera */

$this->title = $model->idcamera;
$this->params['breadcrumbs'][] = ['label' => 'Cameras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camera-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idcamera], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idcamera], [
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
            'idcamera',
            'label',
            'desc',
            'roomid',
            'user_id',
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
