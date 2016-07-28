<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Liveclassroom */

$this->title = $model->idliveclassroom;
$this->params['breadcrumbs'][] = ['label' => 'Liveclassrooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liveclassroom-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idliveclassroom], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idliveclassroom], [
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
            'idliveclassroom',
            'label',
            'desc',
            'user_id',
[
    'attribute' => 'status',
    'value' => $model->statusLabel,
],
'created_at:datetime',
'updated_at:datetime',
        ],
    ]) ?>

</div>
