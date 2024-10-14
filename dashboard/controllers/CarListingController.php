<?php

namespace dashboard\controllers;

use common\models\CarListing;
use common\models\CarListingSearch;
use common\models\ReportQueue;
use dashboard\models\CreateCsvJob;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarListingController implements the CRUD actions for CarListing model.
 */
class CarListingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     *
     * If creation is successful, the browser will be redirected to the 'report-queue/index' page.
     * @return string|\yii\web\Response
     */
    public function actionFilter()
    {
        $searchModel = new CarListingSearch();
        $reportModel = new ReportQueue();
        $respons = $this->request->post();

        if ($respons) {
            $filteredData = $searchModel->searchForCSV($respons, 'admin');
            $reportName = $respons['ReportQueue']['name'] ?? null;
            $reportModel->name = $reportName;
            $reportModel->status = ReportQueue::STATUS_SUBMITTED;
            $reportModel->save();
            $jobId = Yii::$app->queue->push(new CreateCsvJob([
                'reportId' => $reportModel->id,
                'filteredData' => $filteredData,
            ]));
            return $this->redirect(['report-queue/index']);

        }

        return $this->render('filter', [
            'searchModel' => $searchModel,
            'reportModel' => $reportModel,
        ]);
    }

    /**
     * Lists all CarListing models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CarListingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, 'admin');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CarListing model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CarListing model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CarListing();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $cache = Yii::$app->cache;
                $cache->flush();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CarListing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $cache = Yii::$app->cache;
            $cache->flush();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CarListing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CarListing model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CarListing the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CarListing::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
