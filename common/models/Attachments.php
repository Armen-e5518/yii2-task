<?php

namespace common\models;

use frontend\components\File;
use frontend\components\Helper;
use Yii;

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

    /**
     * @param $id
     * @param $data
     * @param $file
     * @return array
     */
    public static function SaveImagesByProductId($id, $data, $file)
    {
        self::deleteAll(['product_id' => $id, 'status' => self::STATUS_IMAGE]);
        if (!empty($data['images'])) {
            foreach ($data['images'] as $k => $item) {
                $res = File::UploadFile($file, $k, 'images', 'image', true);
                $f = empty($item['image']) ? null : $item['image'];
                if ($res['status'] || !empty($f)) {
                    $model = new self();
                    $model->product_id = $id;
                    $model->status = self::STATUS_IMAGE;
                    $model->name = !empty($res['file_name']) ? $res['file_name'] : $f;
                    !$model->save() ? Helper::Out($model->getErrors()) : '';
                } else {
                    return $res;
                }
            }
        }
        return [
            'status' => true
        ];
    }

    /**
     * @param $id
     * @param $data
     * @param $file
     * @return array
     */
    public static function SaveVideoByProductId($id, $data, $file)
    {
        self::deleteAll(['product_id' => $id, 'status' => self::STATUS_VIDEO]);
        if (!empty($data['videos'])) {
            foreach ($data['videos'] as $k => $item) {
                $res = File::UploadFile($file, $k, 'videos', 'video', false);
                $f = empty($item['video']) ? null : $item['video'];
                if ($res['status'] || !empty($f)) {
                    $model = new self();
                    $model->product_id = $id;
                    $model->status = self::STATUS_VIDEO;
                    $model->name = !empty($res['file_name']) ? $res['file_name'] : $f;
                    $model->save();
                } else {
                    return $res;
                }
            }
        }
        return [
            'status' => true
        ];
    }

    /**
     * @param $id
     * @return Attachments[]
     */
    public static function GetVideosByProductId($id)
    {
        return self::findAll(['product_id' => $id, 'status' => self::STATUS_VIDEO]);
    }

    /**
     * @param $id
     * @return Attachments[]
     */
    public static function GetImagesByProductId($id)
    {
        return self::findAll(['product_id' => $id, 'status' => self::STATUS_IMAGE]);
    }
}
