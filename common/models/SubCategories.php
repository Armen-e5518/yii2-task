<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sub_categories".
 *
 * @property int $id
 * @property string $name
 * @property int $cat_id
 */
class SubCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id'], 'default', 'value' => null],
            [['cat_id'], 'integer'],
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
            'name' => 'Name',
            'cat_id' => 'Parent category',
        ];
    }

    /**
     * @return array
     */
    public static function GetAll()
    {
        return self::find()->select(["name", 'id'])->indexBy('id')->column();
    }

    /**
     * @param $id
     * @return array
     */
    public static function GetCategoriesByCatId($id)
    {
        return self::find()->select(["name", 'id'])->where(['cat_id'=>$id ])->indexBy('id')->column();
    }

    /**
     * @param $id
     * @return Categories|null
     */
    public function GetParentCategory($id)
    {
        return Categories::GetCategoryById($id);
    }

    /**
     * @param $id
     * @return SubCategories|null
     */
    public static function GetCategoryById($id)
    {
        return self::findOne($id);
    }

    /**
     * @param $id
     * @return int
     */
    public static function DeleteSubCatById($id)
    {
        $ids = self::find()->select('id')->where(['cat_id' => $id])->column();
        SubSubCategories::DeleteSubSubCatById($ids);
        return self::deleteAll(['cat_id' => $id]);
    }
}
