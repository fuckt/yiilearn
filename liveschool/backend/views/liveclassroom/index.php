<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchLiveclassroom */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Liveclassrooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liveclassroom-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create ' . 'Liveclassroom', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

 //           'idliveclassroom',
            'label',
            'desc',
            //'user_id',
            //'updated_at',
            // 'created_at',
            // 'status',
[
    'attribute' => 'status',
    'format' => 'html',
    'value' => function ($model) {
            if ($model->status === $model::STATUS_ACTIVE) {
                $class = 'label-success';
            } elseif ($model->status === $model::STATUS_INACTIVE) {
                $class = 'label-warning';
            } else {
                $class = 'label-danger';
            }

            return '<span class="label ' . $class . '">' . $model->statusLabel . '</span>';
        },
    'filter' => Html::activeDropDownList(
            $searchModel,
            'status',
            $arrayStatus,
            ['class' => 'form-control', 'prompt' => Yii::t('app', 'PROMPT_STATUS')]
        )
],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
