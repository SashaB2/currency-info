<?php

namespace app\controllers;

use app\components\SourceCurrencyInfoTarget;
use app\models\CurrencyInfo;
use DateInterval;
use DateTime;
use Yii;
use yii\web\Controller;

class InfoController extends Controller
{


    public function actionIndex()
    {
        $data[] = null;
        $cacheIndex = 'dataCurrencyInfo';
        $cacheDateIndexPlusHours = 'dateIndexPlusHours';
        $cache = Yii::$app->getCache();
        $dateTime = new DateTime();

        if(!$cache->get($cacheDateIndexPlusHours)){
            $dateTimePlusHour = new DateTime();
            $cache->set($cacheDateIndexPlusHours, $dateTimePlusHour);
        }

        $interval = $dateTime->diff($cache->get($cacheDateIndexPlusHours));

        if ($interval->h < 1) {
            $dateTimePlusHour = $cache->get($cacheDateIndexPlusHours);
            $cache->set($cacheDateIndexPlusHours, $dateTimePlusHour->add(new DateInterval("PT2H")));

            try {
                $privateBankClient = new SourceCurrencyInfoTarget();
                $privateBankResponse = $privateBankClient->get('/p24api/pubinfo?exchange&json&coursid=11')->send();
            } catch (\Exception $e) {
                Yii::error($e->getMessage());
            }

            if ($privateBankResponse->isOk && isset($privateBankResponse->data)) {
                $arr_data = $privateBankResponse->data;
                $cache->add($cacheIndex, $arr_data);
            } else {
                Yii::error('Error get data from Private bank API');
            }
        }
//        $data = json_encode($cache->get($cacheIndex));
        $data = $cache->get($cacheIndex);

        return $this->render('info', compact('data'));
    }
}