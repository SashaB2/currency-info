<?php


namespace app\models;


class CurrencyInfo extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{currency_info}}';
    }

    public function rules()
    {
        return [
            [['ccy', 'base_ccy', 'buy', 'sale'], 'required'],
            [['ccy', 'base_ccy'], 'string', 'length' => 3],
            [['buy', 'sale'], 'number']
        ];
    }

    public static function getCurrencyExchangeInfo(){
        return (new \yii\db\Query())
            ->select([
                'currency_info.id',
                'banks.bank_name_ua',
                'currency_info.ccy',
                'currency_info.base_ccy',
                'currency_info.buy',
                'currency_info.sale',
                'currency_info.updated_at',
            ] )
            ->from('currency_info')
            ->innerJoin('banks', 'currency_info.bank_id = banks.id')->all();
    }

}