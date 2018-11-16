<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $upc
 * @property int $case_count
 * @property string $name
 * @property string $description
 * @property string $brand
 * @property double $size
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
            [['case_count'], 'default', 'value' => null],
            [['case_count'], 'integer'],
            [['size'], 'number'],
            [['upc', 'name', 'description', 'brand'], 'string', 'max' => 255],
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
        ];
    }
}
