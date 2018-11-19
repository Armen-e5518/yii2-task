<?php

namespace api\modules\v1\controllers;


use api\modules\v1\models\Products;
use yii\rest\ActiveController;


/**
 * Facebook Controller API
 */
class ProductsController extends ActiveController
{

    public $modelClass = 'api\modules\v1\models\Products';

    public function actions()
    {
        $actions = parent::actions();
        // disable the "delete", "create", "update", "view" and "options" actions
        unset($actions['delete'], $actions['create'], $actions['update'], $actions['view'], $actions['options']);
        return $actions;
    }

    /**
     * @return array|null
     */
    public function actionGetAllProducts()
    {
        return Products::GetAllProducts();
    }


}