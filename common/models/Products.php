<?php

namespace common\models;

use frontend\components\Helper;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $upc
 * @property int $case_count
 * @property int $cat_id
 * @property int $sub_cat_id
 * @property int $sub_sub_cat_id
 * @property string $name
 * @property string $description
 * @property string $brand
 * @property string $size
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['upc'], 'required'],
            [['case_count'], 'default', 'value' => null],
            [['case_count', 'cat_id', 'sub_cat_id', 'sub_sub_cat_id'], 'integer'],
            [['upc', 'name', 'description', 'brand', 'size'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'upc' => 'Upc',
            'case_count' => 'Case Count',
            'name' => 'Name',
            'description' => 'Description',
            'brand' => 'Brand',
            'size' => 'Size',
            'cat_id' => 'Category',
            'sub_cat_id' => 'Sub Category',
            'sub_sub_cat_id' => 'Sub Sub Category',
        ];
    }

    /**
     * @param $products
     * @return array|bool
     */
    public static function SaveProductFromExcel($products)
    {
        if (!empty($products)) {
            foreach ($products as $product) {
                $model = new self();
                $model->upc = (string)$product['upc'];
                $model->case_count = (int)$product['case_count'];
                $model->name = (string)$product['name'];
                $model->description = (string)$product['description'];
                $model->brand = (string)$product['brand'];
                $model->size = (string)$product['size'];
                if (!$model->save()) {
                    return $model->getErrors();
                } else {
                    $res_v = Attachments::SaveVideoAttachment($product['video_attachment'], $model->id);
                    if ($res_v != true) {
                        return $res_v;
                    }
                    $res_v = Attachments::SaveImageAttachment($product['image_attachment'], $model->id);
                    if ($res_v != true) {
                        return $res_v;
                    }
                }
            }
        }
        return true;
    }
}
