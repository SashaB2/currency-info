<?php

namespace app\controllers;


use app\models\CurrencyInfo;
use app\models\CurrencyInfoSearchForm;
use app\models\LoginForm;
use app\models\Temm;
use Yii;
use yii\web\Controller;

class CurrencyExchangeController extends Controller
{
    public function actionIndex()
    {


        $model = new CurrencyInfoSearchForm();
        $formSearch = Yii::$app->getRequest()->post();

        $isAllParamsNull = false;
        foreach (Yii::$app->getRequest()->getBodyParam('CurrencyInfoSearchForm') as $param){
            if(!is_null($param)){
                $isAllParamsNull = true;
                break;
            }
        }

        if ($model->load($formSearch) and $isAllParamsNull) {
            if ($model->validate($formSearch))
                return $this->render('main', compact('currencyInfo', 'model'));
        } else {
            $currencyInfo = CurrencyInfo::getCurrencyExchangeInfo();
            return $this->render('main', compact('currencyInfo', 'model'));
        }

    }
}