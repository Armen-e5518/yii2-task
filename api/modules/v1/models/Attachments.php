<?php

namespace api\modules\v1\models;


/**
 * This is the model class for table "attachments".
 *
 * @property string $id
 * @property int $product_id
 * @property int $status
 * @property string $name
 */
class Attachments extends \yii\db\ActiveRecord
{

    const STATUS_VIDEO = 1;
    const STATUS_IMAGE = 0;
    const MAX_COUNT_ATTACHMENTS = 9;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'status' => 'status',
        ];
    }


    public static function GetAttachmentsByProductId($id)
    {
        return self::find()->where(['product_id' => $id])->asArray()->all();
    }

}
