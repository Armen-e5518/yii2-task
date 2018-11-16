<?php

namespace common\models;


use yii\db\ActiveRecord;



class Users extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test.users';
    }
}
