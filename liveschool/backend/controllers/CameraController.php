<?php

namespace backend\controllers;

use Yii;
use backend\models\Camera;
use backend\models\Liveclassroom;
use yii\data\ActiveDataProvider;

use backend\models\SearchCamera;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CameraController implements the CRUD actions for Camera model.
 */
class CameraController extends Controller
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
     * Lists all Camera models.
     * @return mixed
     */
    public function actionIndex()
    {
        //if(!Yii::$app->user->can('readYourAuth')) exit('No Auth');
	$rooms = Liveclassroom::getRooms();

        $searchModel = new SearchCamera();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $arrayStatus = Camera::getArrayStatus();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrayStatus' => $arrayStatus,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Displays a single Camera model.
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
     * Creates a new Camera model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //if(!Yii::$app->user->can('createYourAuth')) exit('No Auth');
        $model = new Camera();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idcamera]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Camera model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //if(!Yii::$app->user->can('updateYourAuth')) exit('No Auth');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idcamera]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Camera model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //if(!Yii::$app->user->can('deleteYourAuth')) exit('No Auth');

        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = Camera::STATUS_DELETED;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Camera model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Camera the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Camera::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
