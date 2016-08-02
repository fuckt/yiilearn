<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchLivecourse */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Livecourses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livecourse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Livecourse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idlivecourse',
            'stime:datetime',
            'etime:datetime',
            'label',
            'user_id',
            // 'roomid',
            // 'created_at',
            // 'updated_at',
            // 'status',
            // 'sort_order',
            // 'course_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
