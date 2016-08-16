<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchLivecourse */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Livecourses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livecourse-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create ' . 'Livecourse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'idlivecourse',
            'stime:datetime',
            'etime:datetime',
            'label',
            //'user_id',
            // 'roomid',
            // 'created_at',
            // 'updated_at',
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
            // 'sort_order',

[
'class' => 'yii\grid\ActionColumn',
'header' => '操作',
'template' => '{view} {update} {delete} {addcoursestuff}',
'buttons' => [
'addcoursestuff' => function ($url, $model, $key) {
		
                    return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, ['title' => '添加教材'] ); 
                 },
],
 'headerOptions' => ['width' => '80'],
],

        ],
    ]); ?>

</div>
