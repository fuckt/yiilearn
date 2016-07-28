<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Coursetype */

$this->title = $model->idcoursetype;
$this->params['breadcrumbs'][] = ['label' => 'Coursetypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coursetype-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idcoursetype], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idcoursetype], [
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
            'idcoursetype',
            'label',
            'created_at',
            'updated_at',
            'status',
            'sort_order',
        ],
    ]) ?>

</div>
