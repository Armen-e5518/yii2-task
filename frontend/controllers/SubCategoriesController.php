<?php

namespace frontend\controllers;

use common\models\Categories;
use common\models\SubSubCategories;
use Yii;
use common\models\SubCategories;
use common\models\search\SubCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubCategoriesController implements the CRUD actions for SubCategories model.
 */
class SubCategoriesController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all SubCategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubCategories model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SubCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubCategories();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Saved...');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'cats' => Categories::GetAll(),
        ]);
    }

    /**
     * Updates an existing SubCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Saved...');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'cats' => Categories::GetAll(),
        ]);
    }

    /**
     * Deletes an existing SubCategories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        SubSubCategories::DeleteSubSubCatById($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SubCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubCategories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
