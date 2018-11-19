<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sub_sub_categories".
 *
 * @property int $id
 * @property string $name
 * @property string $sub_cat_id
 */
class SubSubCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_sub_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_cat_id'], 'default', 'value' => null],
            [['sub_cat_id'], 'integer'],
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
            'sub_cat_id' => 'Sub Cat ID',
        ];
    }

    /**
     * @param $id
     * @return SubCategories|null
     */
    public function GetParentCategory($id)
    {
        return SubCategories::GetCategoryById($id);
    }

    /**
     * @param $ids
     * @return int
     */
    public static function DeleteSubSubCatById($ids)
    {
        return self::deleteAll(['sub_cat_id' => $ids]);
    }

    /**
     * @param $id
     * @return array
     */
    public static function GetCategoriesByCatId($id)
    {
        return self::find()->select(["name", 'id'])->where(['sub_cat_id'=>$id ])->indexBy('id')->column();
    }
}
