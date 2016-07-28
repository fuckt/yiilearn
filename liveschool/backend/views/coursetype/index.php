<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchCoursetype */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coursetypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coursetype-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create ' . 'Coursetype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcoursetype',
            'label',
            'created_at',
            'updated_at',
            'status',
            // 'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
