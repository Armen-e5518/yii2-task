<?php

namespace frontend\controllers;

use common\models\Attachments;
use common\models\Categories;
use common\models\SubCategories;
use common\models\SubSubCategories;
use frontend\components\File;
use frontend\models\ImportFile;
use Yii;
use common\models\Products;
use common\models\search\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Product successfully added...");
            return $this->redirect(['update', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'cats' => Categories::GetAll()
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $res_image = false;
        $res_video = false;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $res_image = Attachments::SaveImagesByProductId($model->id, Yii::$app->request->post(), $_FILES);
            $res_video = Attachments::SaveVideoByProductId($model->id, Yii::$app->request->post(), $_FILES);
            if (empty($res_image['error']) && empty($res_video['error'])) {
                Yii::$app->session->setFlash('success', "Product successfully updated...");
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'res_image' => $res_image,
            'res_video' => $res_video,
            'videos' => Attachments::GetVideosByProductId($id),
            'images' => Attachments::GetImagesByProductId($id),
            'cats' => Categories::GetAll(),
            'sub_cats' => SubCategories::GetCategoriesByCatId($model->cat_id),
            'sub_sub_cats' => SubSubCategories::GetCategoriesByCatId($model->sub_cat_id),
        ]);
    }

    public function actionImport()
    {
        $model = new ImportFile();
        $res = true;
        if (Yii::$app->request->isPost) {
            $model->excel = UploadedFile::getInstance($model, 'excel');
            $file = $model->upload();
            if ($file != false) {
                $data = \moonland\phpexcel\Excel::widget([
                    'mode' => 'import',
                    'fileName' => $file,
                    'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                    'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
                    'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
                ]);
                $res = Products::SaveProductFromExcel($data);
                if ($res === true) {
                    Yii::$app->session->setFlash('success', "Products successfully imported...");
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('file',
            [
                'model' => $model,
                'res' => $res
            ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Attachments::DeleteImagesAttachmentsByProductId($id);
        Attachments::DeleteVideoAttachmentsByProductId($id);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
