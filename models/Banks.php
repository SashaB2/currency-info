<?php


namespace app\models;


use yii\db\ActiveRecord;

class Banks extends ActiveRecord
{
    public static function tableName()
    {
        return '{{banks}}';
    }
}