<?php

namespace api\modules\v1\controllers;


use api\modules\v1\models\Attachments;
use yii\rest\ActiveController;


/**
 * Class AttachmentsController
 * @package api\modules\v1\controllers
 */
class AttachmentsController extends ActiveController
{

    public $modelClass = 'api\modules\v1\models\Attachments';

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        // disable the "delete", "create", "update", "view" and "options" actions
        unset($actions['delete'], $actions['create'], $actions['update'], $actions['view'], $actions['options']);
        return $actions;
    }


    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionGetProductAttachmentsById($id)
    {
        return Attachments::GetAttachmentsByProductId($id);
    }


}