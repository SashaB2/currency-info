<?php


namespace app\models;


use yii\base\Model;

class Temm extends Model
{
    public $username;

    public function rules()
    {
        return [
            // username and password are both required
            [['username'], 'required'],
            // rememberMe must be a boolean value
//            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
//            ['password', 'validatePassword'],
        ];
    }
}