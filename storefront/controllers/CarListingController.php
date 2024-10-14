<?php

namespace storefront\controllers;

use common\models\CarListing;
use common\models\CarListingSearch;
use common\models\Images;
use common\models\UserPurchase;
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
     * Lists all CarListing models.
     *
     * @return string
     */
    public function actionIndex()
    {   
        $cache = Yii::$app->cache;
        $cacheKey = 'car_listing_' . md5(json_encode($this->request->queryParams));
        $dataProvider = $cache->get($cacheKey);

        $searchModel = new CarListingSearch();

        if ($dataProvider === false) {
        
            $dataProvider = $searchModel->search($this->request->queryParams, 'user');
            $cache->set($cacheKey, $dataProvider, 600);
        }

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
        $imageModel = Images::findAll(['car_id' => $id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'imageModel' => $imageModel,
        ]);
    }

    /**
     * Displays a single CarListing model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSuccess($id)
    {
        $model = CarListing::findOne(['id' => $id, 'status' => CarListing::STATUS_SOLD]);

        return $this->render('success', [
            'model' => $model
        ]);
    }

    public function actionPurchase($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $model = $this->findModel($id);
        $model->status = CarListing::STATUS_SOLD;
        $model->save();

        $userPurchase = new UserPurchase();
        $userPurchase->car_id = $id;
        $userPurchase->user_id = Yii::$app->user->id;
        $userPurchase->date = date('Y-m-d H:i:s');

        if ($userPurchase->save()) {
            return $this->redirect(['success', 'id' => $model->id]);
        } else {
            return $this->redirect(['index']);
        }

    }


    /**
     * Displays a single CarListing model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPayment($id)
    {
        return $this->render('payment', [
            'model' => $this->findModel($id),
        ]);
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
        if (($model = CarListing::findOne(['id' => $id, 'status' => CarListing::STATUS_AVAILABLE])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
