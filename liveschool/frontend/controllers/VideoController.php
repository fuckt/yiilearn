<?php

namespace frontend\controllers;

use Yii;
use backend\models\Livecourse;
use backend\models\Camera;
use funson86\blog\models\BlogCatalog;
use funson86\blog\models\BlogPost;
use funson86\blog\models\BlogCatalogSearch;
use backend\models\SearchLivecourse;
use yii\data\ActiveDataProvider;
use backend\models\Liveclassroom;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideoController implements the CRUD actions for Livecourse model.
 */
class VideoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Livecourse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchLivecourse();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	$query = Livecourse::find();

	$provider = new ActiveDataProvider([
	    'query' => $query,
	    'pagination' => [
	        'pageSize' => 10,
	    ],
	    'sort' => [
	        'defaultOrder' => [
	            'created_at' => SORT_DESC,
	        ]
	    ],
	]);

	// 返回一个Post实例的数组
	$courses = $provider->getModels();
	$formated = array_chunk($courses,3);
        return $this->render('list', [
            'data' => $formated,
        ]);
    }

    /**
     * Displays a single Livecourse model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	//get relative blog
	$PostQuery = BlogPost::find()->where(['course_id'=>$id]);
	$PostProvider = new ActiveDataProvider([
	    'query' => $PostQuery,
	    'pagination' => [
	        'pageSize' => 20,
	    ],
	]);
	$posts = $PostProvider->getModels();
	//get all catalog
	$query = BlogCatalog::find();
	$provider = new ActiveDataProvider([
	    'query' => $query,
	    'pagination' => [
	        'pageSize' => 20,
	    ],
	]);

	$catas = $provider->getModels();
        return $this->render('detail', [
            'model' => $this->findModel($id),
            'catas' => array_chunk($catas,4),
            'posts' => $posts,
        ]);
    }

	public function actionLive($id){
		if (($model = Camera::findOne($id)) !== null) {
			if (($roomModel = Liveclassroom::findOne($model->roomid)) !== null) {
			}else{
		            throw new NotFoundHttpException('The requested page does not exist.');
			}
			return $this->render('livedetail', [
	            		'model' => $model,
	            		'room' => $roomModel,
		        ]);	
	        } else {
	            throw new NotFoundHttpException('The requested page does not exist.');
        	}
	}


    /**
     * Finds the Livecourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Livecourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Livecourse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
