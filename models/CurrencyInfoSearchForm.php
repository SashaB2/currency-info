<?php


namespace app\models;


use yii\base\Model;

class CurrencyInfoSearchForm extends Model
{
    public $id;
    public $bankName;
    public $ccy;
    public $baseCcy;
    public $buy;
    public $sale;
    public $updated;

    public function rules()
    {
        return [
            ['id', 'integer'],
            ['bankName', 'string', 'length' => [3, 255]]
        ];
    }
}