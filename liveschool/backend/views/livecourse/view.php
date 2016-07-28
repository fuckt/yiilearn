<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Livecourse */

$this->title = $model->idlivecourse;
$this->params['breadcrumbs'][] = ['label' => 'Livecourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livecourse-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idlivecourse], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idlivecourse], [
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
            'idlivecourse',
            'stime:datetime',
            'etime:datetime',
            'label',
            'user_id',
            'roomid',
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
