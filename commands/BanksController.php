<?php

namespace app\commands;

use app\components\PrivateBankClient;
use app\models\CurrencyInfo;
use Throwable;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\httpclient\Client;

class BanksController extends Controller
{
    private const PRIVATE_BANK = 1;

    /**
     * Отримання даних з ПриватБанку
     * ./yii banks/private-bank-synchronize
     * @return int
     * @throws \yii\httpclient\Exception
     */
    public function actionPrivateBankSynchronize()
    {
        $privateBankClient = new PrivateBankClient([
            'responseConfig' => ['format' => Client::FORMAT_JSON]
        ]);
        try {
            $response = $privateBankClient->get('p24api/pubinfo?json&exchange&coursid=5')->send();
            if ($response->isOk) {

                foreach (json_decode($response->getContent()) as $currency) {
                    $currencyInfo = CurrencyInfo::findOne([
                        'ccy' => $currency->ccy,
                        'base_ccy' => $currency->base_ccy,
                        'bank_id' => self::PRIVATE_BANK
                    ]);

                    if (is_null($currencyInfo)) {
                        $currencyInfo = new CurrencyInfo();
                        $currencyInfo->bank_id = self::PRIVATE_BANK;
                        $currencyInfo->ccy = $currency->ccy;
                        $currencyInfo->base_ccy = $currency->base_ccy;
                        $currencyInfo->buy = $currency->buy;
                        $currencyInfo->sale = $currency->sale;
                        $currencyInfo->created_at = date('Y-m-d H:m:s');
                        $currencyInfo->updated_at = date('Y-m-d H:m:s');

                        if ($currencyInfo->validate()) {
                            $currencyInfo->save();
                        } else {
                            print_r($currencyInfo->getErrors());
                        }
                    } else {
                        $currencyInfo->ccy = $currency->ccy;
                        $currencyInfo->base_ccy = $currency->base_ccy;
                        $currencyInfo->updated_at = date('Y-m-d H:m:s');

                        if ($currencyInfo->validate()) {
                            $currencyInfo->update();
                        } else {
                            print_r($currencyInfo->getErrors());
                        }
                    }
                }

            } else {
                return ExitCode::UNSPECIFIED_ERROR;
            }
        } catch (Throwable $e) {
            $this->stdout($e->getMessage());
            Yii::error("Interrupt connection to private bank");
        }
        $this->stdout("Finish");
        return ExitCode::OK;
    }
}