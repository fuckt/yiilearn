<?php

namespace backend\controllers;

use Yii;
use backend\models\Livecourse;
use backend\models\SearchLivecourse;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LivecourseController implements the CRUD actions for Livecourse model.
 */
class LivecourseController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
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
        //if(!Yii::$app->user->can('readYourAuth')) exit('No Auth');

        $searchModel = new SearchLivecourse();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $arrayStatus = Livecourse::getArrayStatus();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrayStatus' => $arrayStatus,
        ]);
    }

    /**
     * Displays a single Livecourse model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //if(!Yii::$app->user->can('readYourAuth')) exit('No Auth');
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Livecourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //if(!Yii::$app->user->can('createYourAuth')) exit('No Auth');

        $model = new Livecourse();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post())) {
		if($model->created_at){
			//有提交过来
			$model['stime'] =  strtotime($model['stime']);
			$model['etime'] =  strtotime($model['etime']);
			if($model->save()){
            			return $this->redirect(['view', 'id' => $model->idlivecourse]);
			}
		}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Livecourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //if(!Yii::$app->user->can('updateYourAuth')) exit('No Auth');

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idlivecourse]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Livecourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //if(!Yii::$app->user->can('deleteYourAuth')) exit('No Auth');

        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = Livecourse::STATUS_DELETED;
        $model->save();

        return $this->redirect(['index']);
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
